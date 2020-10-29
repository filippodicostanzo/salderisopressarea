<?php

namespace App\Http\Controllers\Auth;

use App\Models\Ingredient;
use App\Models\Structure;
use App\Models\StructureUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    private $user;
    private $title;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user(); // returns user
            return $next($request);
        });

        $this->title = 'Admin';
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counter = [];
        $counter['documents'] = DB::table('documents')->count();
        $counter['logos'] = DB::table('logos')->count();
        $counter['galleries'] = DB::table('galleries')->count();
        $counter['videos'] = DB::table('videos')->count();

        return view('home', compact('counter'));
    }

}
