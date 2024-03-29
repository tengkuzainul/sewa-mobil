<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Massage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $car = Car::latest()->get();
        $cars = Car::all();
        $massage = Massage::all();
        $users = User::all();

        if (Auth::check() && Auth::user()->is_admin == 1) {
            return view('backend.dashboard', compact('cars', 'massage', 'users'));
        } else {
            return view('frontend.pages.home', compact('car'));
        }
    }

    public function landingPage()
    {
        return view('frontend.pages.home');
    }

    public function detailCar()
    {
        return view('frontend.pages.detail');
    }
}
