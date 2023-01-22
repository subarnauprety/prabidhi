<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = AboutUs::latest()->get();
        return view('admin.aboutus.index', compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes',
            'short_description' => 'sometimes',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        AboutUs::create($data);
        notify()->success("aboutus is Created");
        return redirect()->route('aboutus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus = AboutUs::find($id);
        return view('admin.aboutus.edit', ['aboutus' => $aboutus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'sometimes',
            'image' => 'sometimes'
        ]);
        $aboutUs = AboutUs::find($id);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images'), $aboutUs->image)) {
                File::delete(public_path('images', $aboutUs->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        AboutUs::find($aboutUs->id)->update($data);
        notify()->success("aboutus is updated");
        return redirect()->route('aboutus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        if (File::exists(public_path('images'), $aboutUs->image)) {
            File::delete(public_path('images', $aboutUs->image));
        }
        notify()->success('aboutUs is deleted');
        return redirect()->route('aboutus.index');
    }
}
