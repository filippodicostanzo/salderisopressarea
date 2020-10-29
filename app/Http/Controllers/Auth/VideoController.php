<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
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

        $this->title = 'video';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Video::orderBy('name', 'ASC')->paginate(30);
        return view('auth.videos.index', ['items' => $items, 'title' => $this->title]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('auth.videos.create', ['title' => $this->title]);
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
            'url' => 'required',
            'visible' => 'required',
            'description' => 'required',
        ]);

        $video = new Video($request->all());
        $video->order = 0;
        $res = $video->save();
        $message = $res ? 'Il Video ' . $video->name . ' è stato inserito' : 'Il Video ' . $video->name . ' non è stato inserito';
        session()->flash('message', $message);
        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {

        return view('auth.videos.show', ['item' => $video, 'title' => $this->title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $item = $video;
        return view('auth.videos.edit', ['item' => $item, 'title'=>$this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $data = $request->all();
        $res = Video::find($video->id_code)->update($data);
        $message = $res ? 'Il Video ' . $video->name . ' è stato modificato' : 'Il Video ' . $video->name . ' non è stato modificato';
        session()->flash('message', $message);
        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $res = $video->delete();
        $message = $res ? 'Il Video ' . $video->name . ' è stato cancellato' : 'La Gallery ' . $video->name . ' non è stato cancellato';
        session()->flash('message', $message);
        return redirect()->route('videos.index');
    }
}
