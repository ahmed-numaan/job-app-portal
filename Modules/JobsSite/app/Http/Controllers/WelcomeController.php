<?php

namespace Modules\JobsSite\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function page_not_found()
    {
        return view('jobssite::404');
    }

    public function about()
    {
        return view('jobssite::about');
    }

    public function jobslist()
    {
        return view('jobssite::jobslist');
    }

    public function category()
    {
        return view('jobssite::category');
    }
    public function profile()
    {
        return view('jobssite::profile');
    }
    public function search()
    {
        return view('jobssite::search');
    }
    public function testimonials()
    {
        return view('jobssite::testimonials');
    }
    public function contact()
    {
        return view('jobssite::contact');
    }
    public function applications()
    {
        return view('jobssite::applications');
    }
    public function change_password()
    {
        return view('jobssite::auth.passwords.update');
    }
}
