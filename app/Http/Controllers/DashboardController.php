<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
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
    public function dashboard()
    {
        $user_id = auth()->user('id');
        $id = $user_id->id;
        $user = Post::where('user_id', $id)->orderBy('created_at', 'DESC')->take(1000)->get();

        return view('dashboard')->with('my_added_data', $user);
    }
}
