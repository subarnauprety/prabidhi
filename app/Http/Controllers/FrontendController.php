<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutUsResource;
use App\Http\Resources\BannerResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\StackResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TestimonialResource;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Newsletter;
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
        $banner =  $id ? Banner::where("id", $id)->get() : Banner::latest()->take(1)->get();
        return BannerResource::collection($banner);
    }
    public function allBanners()
    {
        return Banner::latest()->get();
    }
    public function allServices($limit = null)
    {
        if ($limit !== null) {
            return ServiceResource::collection(Service::latest()->take($limit)->get());
        }
        return ServiceResource::collection(Service::latest()->get());
    }
    public function projects($limit = null)
    {
        if ($limit !== null) {
            return ProjectResource::collection(Project::latest()->take($limit)->get());
        }
        return ProjectResource::collection(Project::latest()->get());
    }
    public function allprojects()
    {
        return ProjectResource::collection(Project::paginate(12));
    }
    public function blogs($limit = null)
    {
        if ($limit !== null) {
            return BlogResource::collection(Blog::latest()->take($limit)->get());
        }
        // return Blog::latest()->paginate(10);
        return BlogResource::collection(Blog::latest()->paginate(10));
    }
    public function blogDetail($slug)
    {
        return new BlogResource(Blog::where("slug", $slug)->first());
    }
    public function testimonials()
    {
        return TestimonialResource::collection(Testimonial::latest()->get());
    }
    public function teams()
    {
        return TeamResource::collection(Team::get());
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
        return StackResource::collection(Stack::latest()->get());
    }
    public function about()
    {
        return AboutUsResource::collection(AboutUs::all());
    }
    public function storeNewsletter(Request $request)
    {
        $data = $request->validate([
            "email" => "required|unique:newsletters,email",
            "status" => "sometimes"
        ]);
        Newsletter::create($data);
        return response()->json(["msg" => "suscribed"]);
    }
    public function page($slug)
    {
        return new PageResource(NewsNotice::where("slug", $slug)->first());
    }
}
