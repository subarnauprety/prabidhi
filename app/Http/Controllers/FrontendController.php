<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;

use App\Models\NewsNotice;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceQuery;
use App\Models\Stack;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function singleBanner($id = null)
    {
        return $id ? Banner::find($id) : Banner::latest()->first();
    }
    public function allBanners()
    {
        return Banner::latest()->get();
    }
    public function allServices()
    {
        return Service::latest()->get();
    }
    public function projects()
    {
        return Project::latest()->get();
    }
    public function testimonials()
    {
        return Testimonial::latest()->get();
    }
    public function teams()
    {
        return Team::all();
    }
    public function contactForm(Request $request)
    {
        $data = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "message" => "required",
            "number" => "required",

        ]);
        Contact::create($data);
        return "Your message is submitted. Thank you.";
    }
    public function quote(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "service" => "required",
            "email" => "required",
            "message" => "required",
            "number" => "sometimes",

        ]);
        ServiceQuery::create($data);
        return "Your query is submitted. Thank you.";
    }
    public function partners()
    {
        return Partner::latest()->get();
    }
    public function stacks()
    {
        return Stack::latest()->get();
    }
}
