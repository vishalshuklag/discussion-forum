<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateDiscussionRequest;
use Illuminate\Support\Str;
use App\Discussion;

class DiscussionsController extends Controller
{

    public function __contruct(){
        $this->middleware('auth')->only(['create', 'store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index',[
            'discussions' => Discussion::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        dd($request);
        // Discussion::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'channel_id' => $request->channel,
        //     'user_id' => Auth::user()->id
        // ]);

        auth()->user()->discussions()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'content' => $request->content,
            'channel_id' => $request->channel,
        ]);

        session()->flash('success', 'Discussion Created Successfully !!');

        return redirect()->route('discussions.index');
    }

    public function insert(Request $request) {
        // dd($request->all());
        auth()->user()->discussions()->create([
        'title' => $request->title,
        'slug' => Str::slug($request->title, '-'),
        'content' => $request->content,
        'channel_id' => $request->channel,
        ]);

        session()->flash('success', 'Discussion Created Successfully !!');

        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        // dd($discussion);
        return view('discussions.show',[
            'discussion' => $discussion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
