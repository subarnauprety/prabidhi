<?php

namespace App\Http\Controllers;

use App\Models\BlogType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogTypes = BlogType::latest()->paginate(10);
        return view('admin.BlogTypes.index', compact('blogTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.BlogTypes.create');
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
            'type_title' => 'required',
            'status' => 'required',
        ]);
        $data['slug'] = Str::slug($data['type_title']);

        BlogType::create($data);
        notify()->success("Blog type is created");
        return redirect()->route('blog-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogType  $blogType
     * @return \Illuminate\Http\Response
     */
    public function show(BlogType $blogType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogType  $blogType
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogType $blogType)
    {
        return view('admin.BlogTypes.edit', ['blogType' => $blogType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogType  $blogType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogType $blogType)
    {
        $data = $request->validate([
            'type_title' => 'required',
            'status' => 'required',
        ]);
        $data['slug'] = Str::slug($data['type_title']);

        BlogType::find($blogType->id)->update($data);
        notify()->success("Blog type is updated");
        return redirect()->route('blog-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogType  $blogType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogType $blogType)
    {
        $blogType->delete();
        notify()->success("Blog type is deleted");
        return redirect()->route('blog-types.index');
    }
}
