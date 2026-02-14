<?php

namespace App\Http\Controllers;

use App\Models\Course;

class DSIMTController extends Controller
{
    /**
     * LMS course IDs keyed by name – for Enroll Now links (login then redirect to LMS dashboard).
     */
    private function lmsCoursesByNames(): \Illuminate\Support\Collection
    {
        $names = [
            'Web Development With Python Programming',
            'DIT & CIT',
            'Amazon(Virtual Assistant)',
            'Web Development',
            'Digital Marketing',
            'Graphic Design',
            'Video Editing',
            'UI & UX Design',
            'Trading',
            'Diploma in Information Technology',
            'Mobile Application Development',
            'Certificate in Information Technology',
        ];

        return Course::whereIn('name', $names)->get()->keyBy('name');
    }

    public function index()
    {
        return view('main-website.index');
    }

    public function aboutUs()
    {
        return view('main-website.about-us');
    }

    public function contact()
    {
        return view('main-website.contact');
    }

    public function courses()
    {
        $courses = Course::with('courseMode')
            ->withCount('enrollments')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('main-website.courses', compact('courses'));
    }

    public function boardCourses()
    {
        $lmsCourses = $this->lmsCoursesByNames();

        return view('main-website.board-courses', compact('lmsCourses'));
    }

    public function specialCourse()
    {
        return view('main-website.special-course');
    }

    public function scholarshipCourse()
    {
        return view('main-website.scholarship-course');
    }

    public function meritScholarship()
    {
        return view('main-website.merit-scholarship');
    }

    public function meritInternships()
    {
        return view('main-website.merit-internships');
    }

    public function events()
    {
        return view('main-website.events-grid');
    }

    public function gallery()
    {
        return view('main-website.our-gallery');
    }

    public function services()
    {
        return view('main-website.services');
    }

    public function comingSoon($id = null)
    {
        return view('main-website.coming-soon', ['id' => $id]);
    }

    public function error404()
    {
        return view('main-website.404');
    }

    public function admissionPitpForm()
    {
        return view('main-website.admission-form.pitp-form');
    }

    public function admissionApply()
    {
        return view('main-website.admission-form.apply');
    }

    public function admissionJoinUs()
    {
        return view('main-website.admission-form.join-us');
    }

    public function login()
    {
        return view('main-website.login');
    }

    public function registration()
    {
        return view('main-website.registration');
    }
}
