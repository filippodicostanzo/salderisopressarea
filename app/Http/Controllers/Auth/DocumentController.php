<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
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

        $this->title = 'documents';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Document::orderBy('order', 'ASC')->paginate(30);
        return view('auth.documents.index', ['items' => $items, 'title' => $this->title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.documents.create');
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
            'file' => 'required',
            'visible' => 'required',
            'description' => 'required',
        ]);

        $document = new Document($request->all());
        $document->order = 0;
        $res = $document->save();
        $message = $res ? 'Il Documento ' . $document->name . ' è stato inserito' : 'Il Documento ' . $document->name . ' non è stato inserito';
        session()->flash('message', $message);
        return redirect()->route('documents.index');


        /* $request->validate([
             'file' => 'required|mimes:pdf,txt,xlx,csv|max:2048',
         ]);*/

        /*
        $fileName = time().'.'.$request->file->extension();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');


        var_dump($filePath);

        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
*/

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('auth.documents.show', ['item' => $document, 'title' => $this->title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $item = $document;
        return view('auth.documents.edit', ['item' => $item, 'title' => $this->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'file' => 'required',
            'visible' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $res = Document::find($document->id_code)->update($data);
        $message = $res ? 'Il Documento ' . $document->name . ' è stato modificato' : 'Il Documento ' . $document->name . ' non è stata modificato';
        session()->flash('message', $message);
        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $res = $document->delete();
        $message = $res ? 'Il Documento ' . $document->name . ' è stato cancellato' : 'Il Documento ' . $document->name . ' non è stato cancellato';
        session()->flash('message', $message);
        return redirect()->route('documents.index');
    }
}
