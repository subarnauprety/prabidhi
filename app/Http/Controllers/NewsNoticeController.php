<?php

namespace App\Http\Controllers;

use App\Models\NewsNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsNotice::latest()->get();
        return view('admin.notice.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
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
            'image' => 'required',
            'status' => 'required',
            'link' => 'required',

        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        NewsNotice::create($data);
        notify()->success("News is Created");
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsNotice  $newsNotice
     * @return \Illuminate\Http\Response
     */
    public function show(NewsNotice $newsNotice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsNotice  $newsNotice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsNotice::find($id);
        return view('admin.notice.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsNotice  $newsNotice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsNotice $newsNotice)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'sometimes',
            'status' => 'required',
            'link' => 'required',

        ]);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images'), $newsNotice->image)) {
                File::delete(public_path('images', $newsNotice->image));
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $img);
            $data['image'] = $img;
        }
        NewsNotice::find($newsNotice->id)->update($data);
        notify()->success("News is updated");
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsNotice  $newsNotice
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsNotice $newsNotice)
    {
        $newsNotice->delete();
        if (File::exists(public_path('images'), $newsNotice->image)) {
            File::delete(public_path('images', $newsNotice->image));
        }
        notify()->success('News is deleted');
        return redirect()->route('news.index');
    }
}
