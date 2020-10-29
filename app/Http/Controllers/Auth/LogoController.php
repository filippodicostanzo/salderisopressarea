<?php

namespace App\Http\Controllers\Auth;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{

    private $title;
    private $user;


    /**
     * Create a constrcut of class
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

        $this->title = 'logos';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Logo::orderBy('id_code', 'ASC')->paginate(30);
        return view('auth.logos.index', ['items' => $items, 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'image' => 'required',
            'visible' => 'required',
            'description' => 'required',
        ]);

        $logo = new Logo($request->all());
        $logo->order = 0;
        $res = $logo->save();
        $message = $res ? 'Il Logo ' . $logo->name . ' è stato inserito' : 'Il Logo ' . $logo->name . ' non è stato inserito';
        session()->flash('message', $message);
        return redirect()->route('logos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Logo $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {

        return view('auth.logos.show', ['item' => $logo, 'title' => $this->title]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Logo $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        $item = $logo;
        return view('auth.logos.edit', ['item' => $item, 'title'=>$this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Logo $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'image' => 'required',
            'visible' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $res = Logo::find($logo->id_code)->update($data);
        $message = $res ? 'Il Logo ' . $logo->name . ' è stato modificato' : 'Il Logo ' . $logo->name . ' non è stato modificato';
        session()->flash('message', $message);
        return redirect()->route('logos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Logo $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        $res = $logo->delete();
        $message = $res ? 'Il Logo ' . $logo->name . ' è stato cancellato' : 'Il Logo ' . $logo->name . ' non è stato cancellato';
        session()->flash('message', $message);
        return redirect()->route('logos.index');
    }
}
