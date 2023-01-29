<?php

namespace App\Http\Controllers;

use App\Models\Stack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stacks = Stack::latest()->get();
        return view("admin.stacks.index", compact("stacks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.stacks.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required'

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        Stack::create($data);
        notify()->success("Stack is Created");
        return redirect()->route('stacks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function show(Stack $stack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function edit(Stack $stack)
    {
        return view('admin.stacks.edit', ['partner' => $stack]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stack $stack)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'sometimes',
            'status' => 'required'
        ]);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images'), $stack->image)) {
                File::delete(public_path('images', $stack->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        Stack::find($stack->id)->update($data);
        notify()->success("stack is updated");
        return redirect()->route('stacks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stack $stack)
    {
        $stack->delete();
        if (File::exists(public_path('images'), $stack->image)) {
            File::delete(public_path('images', $stack->image));
        }
        notify()->success('stack is deleted');
        return redirect()->route('stacks.index');
    }
}
