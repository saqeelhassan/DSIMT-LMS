<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\Post;

class DSIMTWebsiteController extends Controller
{
    public function index()
    {
        $courses = Course::with('courseMode')->withCount('enrollments')->latest()->take(6)->get();
        return view('DSIMT-Webiste.index', compact('courses'));
    }

    public function about()
    {
        return view('DSIMT-Webiste.about');
    }

    public function contact()
    {
        return view('DSIMT-Webiste.contact');
    }

    public function course()
    {
        $courses = Course::with('courseMode')->withCount('enrollments')->latest()->paginate(12)->withQueryString();
        return view('DSIMT-Webiste.course', compact('courses'));
    }

    public function courseDetail(Course $course)
    {
        $course->load('courseMode')->loadCount('enrollments');
        return view('DSIMT-Webiste.course-detail', compact('course'));
    }

    public function event()
    {
        $events = Event::published()->latest('event_date')->paginate(9)->withQueryString();
        return view('DSIMT-Webiste.event', compact('events'));
    }

    public function eventDetail(Event $event)
    {
        return view('DSIMT-Webiste.event-detail', compact('event'));
    }

    public function blogList()
    {
        $posts = Post::published()->latest('published_at')->paginate(9)->withQueryString();
        return view('DSIMT-Webiste.blog-list', compact('posts'));
    }

    public function blogDetail(Post $post)
    {
        return view('DSIMT-Webiste.blog-detail', compact('post'));
    }

    public function gallery()
    {
        return view('DSIMT-Webiste.gallery');
    }

    public function instructors()
    {
        return view('DSIMT-Webiste.instructors');
    }

    public function pricing()
    {
        return view('DSIMT-Webiste.pricing');
    }

    public function testimonial()
    {
        return view('DSIMT-Webiste.testimonial');
    }

    public function faq()
    {
        return view('DSIMT-Webiste.faq');
    }

    public function search()
    {
        $query = request('q', '');
        $courses = Course::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->with('courseMode')->latest()->paginate(12)->withQueryString();
        return view('DSIMT-Webiste.search', compact('courses', 'query'));
    }


    public function searchDetail()
    {
        return view('DSIMT-Webiste.search-detail');
    }

    public function commingSoon()
    {
        return view('DSIMT-Webiste.comming');
    }

    public function error404()
    {
        return view('DSIMT-Webiste.404');
    }
}
