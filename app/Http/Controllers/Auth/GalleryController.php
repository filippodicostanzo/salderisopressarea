<?php

namespace App\Http\Controllers\Auth;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
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

        $this->title = 'galleries';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::orderBy('name', 'ASC')->paginate(30);
        return view('auth.galleries.index', ['items' => $items, 'title' =>$this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'cover' => 'required',
            'visible' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);

        $gallery = new Gallery($request->all());
        $gallery->order = 0;
        $res = $gallery->save();
        $message = $res ? 'La Gallery ' . $gallery->name . ' è stata inserita' : 'Il Gallery ' . $gallery->name . ' non è stata inserita';
        session()->flash('message', $message);
        return redirect()->route('galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {


        return view('auth.galleries.show', ['item' => $gallery, 'title'=>$this->title]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $item = $gallery;
        return view('auth.galleries.edit', ['item' => $item, 'title'=>$this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'cover' => 'required',
            'visible' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);

        $data = $request->all();
        $res = Gallery::find($gallery->id_code)->update($data);
        $message = $res ? 'La Gallery ' . $gallery->name . ' è stata modificata' : 'La Gallery ' . $gallery->name . ' non è stata modificata';
        session()->flash('message', $message);
        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $res = $gallery->delete();
        $message = $res ? 'La Gallery ' . $gallery->name . ' è stata cancellata' : 'La Gallery ' . $gallery->name . ' non è stata cancellata';
        session()->flash('message', $message);
        return redirect()->route('galleries.index');
    }


}
