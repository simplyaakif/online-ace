<?php

    namespace App\Http\Controllers;

    use App\Models\Course;

    class HomeController extends Controller {

        public function index()
        {
            $courses = Course::has('batches')->get();
            return view('website.home',compact('courses'));
        }

        public function registerOnline()
        {
            return view('website.register-online');
        }
    }
