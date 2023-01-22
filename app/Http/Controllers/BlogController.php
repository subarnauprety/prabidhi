<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data  = $request->validate([
            'blog_type_id'=>'required|exists:blog_types,id',
            'title'=>"required",
            'description'=>"required",
            'status'=>"required",
            'image'=>'sometimes'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        $data['slug'] = Str::slug($data['title']);
        $blog =  Blog::create($data);
        $content =0;
        if($request->content){
            $content = count($request->content);
        }
        if($content > 0){
            foreach($request->content as $key => $cont){
                $newContent = new BlogContent();
                $newContent->blog_id = $blog->id;
                $newContent->content_title = $request->content_title[$key];
                $newContent->content = $request->content[$key];
                if ($request->blog_content_image[$key]) {
                    $image = $request->blog_content_image[$key];
                    if($image->getClientOriginalName() !== ''){
                        $img = time() . '.' . $image->getClientOriginalName();
                        $image->move(public_path('images'), $img);
                        $newContent->blog_content_image = $img;
                    }

                }
                $newContent->save();

            }
        }
        notify()->success('Blog is created');
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show',['blog'=>$blog]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data  = $request->validate([
            'blog_type_id'=>'required|exists:blog_types,id',
            'title'=>"required",
            'description'=>"required",
            'status'=>"required",
            'image'=>'sometimes'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        $data['slug'] = Str::slug($data['title']);
       Blog::find($blog->id)->update($data);
       $content =0;
       if($request->content){
           $content = count($request->content);
       }
        if($content > 0){
            foreach($request->content as $key => $cont){
                $newContent = new BlogContent();
                $newContent->blog_id = $blog->id;
                $newContent->content_title = $request->content_title[$key];
                $newContent->content = $request->content[$key];
                if ($request->blog_content_image[$key]) {
                    $image = $request->blog_content_image[$key];
                    if($image->getClientOriginalName() !== ''){
                        $img = time() . '.' . $image->getClientOriginalName();
                        $image->move(public_path('images'), $img);
                        $newContent->blog_content_image = $img;
                    }

                }
                $newContent->save();

            }
        }
        notify()->success('Blog is created');
        return redirect()->route('blogs.index');  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        if (File::exists(public_path('images'), $blog->image)) {
            File::delete(public_path('images', $blog->image));
        }
        notify()->success('Blog is deleted');
        return redirect()->route('blogs.index');    }
}
