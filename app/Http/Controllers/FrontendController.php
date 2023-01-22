<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Design;
use App\Models\DesignForm;
use App\Models\Faq;
use App\Models\NewsNotice;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceQuery;
use App\Models\ServiceType;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }
    public function designPage()
    {
        $designs = Design::latest()->paginate(20);
        return view("frontend.pages.design", compact("designs"));
    }
    public function services()
    {
        $services = Service::latest()->get();
        return view('frontend.pages.Services.services', compact('services'));
    }
    public function serviceDetailPage($slug)
    {
        $service = ServiceType::where('slug', $slug)->first();
        return view('frontend.pages.Services.serviceDetails', compact('service'));
    }
    public function sendQuery(Request $request)
    {
        $store = new ServiceQuery();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->number = $request->number;
        $store->message = $request->message;
        $store->type = $request->type;
        $store->save();

        return redirect()->back()->with("msg", "Your query is sent. Thank you!");
    }
    public function sendDesignQuery(Request $request)
    {
        $store = new DesignForm();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->number = $request->number;
        $store->message = $request->message;
        $store->type = $request->type;
        $store->save();

        return redirect()->back()->with("msg", "Your query is sent. Thank you!");
    }
    public function sendMessage(Request $request)
    {
    }
    public function faq()
    {
        $faqs = Faq::latest()->get();
        return view('frontend.pages.faqs', compact('faqs'));
    }
    public function contactPage()
    {
        return view('frontend.pages.contact');
    }
    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.pages.blogs.blogs', compact('blogs'));
    }
    public function blogDetailPage($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('frontend.pages.blogs.blogDetail', compact('blog'));
    }
    public function news()
    {
        $news = NewsNotice::latest()->get();
        return view('frontend.pages.newsPage', compact('news'));
    }
    public function aboutus()
    {
        return view('frontend.pages.aboutus');
    }
    public function projects()
    {
        $projects = Project::latest()->paginate(12);
        return view('frontend.pages.project', compact('projects'));
    }
    public function clients()
    {
        $clients = Client::latest()->paginate(12);
        return view('frontend.pages.clients', compact('clients'));
    }
}
