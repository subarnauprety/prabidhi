<?php

namespace App\Http\Controllers;

use App\Models\AboutInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutInfo = AboutInfo::latest()->get();
        return view('admin.aboutusInfo.index', compact('aboutInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutusInfo.create');
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
            'image' => 'sometimes'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        AboutInfo::create($data);
        notify()->success("about info is Created");
        return redirect()->route('about-info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutInfo  $aboutInfo
     * @return \Illuminate\Http\Response
     */
    public function show(AboutInfo $aboutInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutInfo  $aboutInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutInfo = AboutInfo::find($id);
        return view('admin.aboutusInfo.edit', compact('aboutInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutInfo  $aboutInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes'
        ]);
        $aboutUs = AboutInfo::find($id);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images'), $aboutUs->image)) {
                File::delete(public_path('images', $aboutUs->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        AboutInfo::find($aboutUs->id)->update($data);
        notify()->success("aboutus info is updated");
        return redirect()->route('about-info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutInfo  $aboutInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutInfo $aboutInfo)
    {
        //
    }
}
