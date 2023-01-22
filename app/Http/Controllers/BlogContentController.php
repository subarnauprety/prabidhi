<?php

namespace App\Http\Controllers;

use App\Models\BlogContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogContent  $blogContent
     * @return \Illuminate\Http\Response
     */
    public function show(BlogContent $blogContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogContent  $blogContent
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogContent $blogContent)
    {
        return view('admin.blogContent.edit',['blogContent'=>$blogContent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogContent  $blogContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogContent $blogContent)
    {
        if ($request->hasFile('blog_content_image')) {
            if (File::exists(public_path('images'), $blogContent->blog_content_image)) {
                File::delete(public_path('images', $blogContent->blog_content_image));
            }
            $image = $request->file('blog_content_image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['blog_content_image'] = $img;
        }
        $blogContent->find($blogContent->id)->update($request->all());
        notify()->success('blogContent is updated');
return redirect()->route('blogs.show',$blogContent->blog_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogContent  $blogContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogContent $blogContent)
    {
        $blogContent->delete();
        if (File::exists(public_path('images'), $blogContent->blog_content_image)) {
            File::delete(public_path('images', $blogContent->blog_content_image));
        }
        notify()->success('blogContent is deleted');
        return redirect()->back();
    }
}
