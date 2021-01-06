<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// uncomment later
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Services;
use App\Bookmark;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use Auth;
// use DB;


class BookmarksController extends Controller
{
    // uncomment later
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = Bookmark::where('user_id','=', Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->orderBy('title','ASC')
            ->simplePaginate(5);
        //for any actions, lets grab the messages
        $message = \Session::get('message') ? \Session::get('message') : array();

        //render with all of the necassary data
        return view('home')->with(array(
            'bookmarks' => $bookmarks,
            'message' => $message
        ));
    }


    public function addBookmark(Request $request)
    {
        //scope
        $current_user = Auth::user();
        
        //create a new bookmark and associate with current user
        $bookmark = new Bookmark;
        $bookmark->user()->associate($current_user->id);

        //configure the bookmark
        $bookmark->title = $request->title;
        $bookmark->url = $request->url;
        $bookmark->note = $request->note;
        //save it
        $bookmark->save();

        //all is well, so pass back a message
        $message = array(
            'status' => 'OK', 
            'message' => 'Bookmark added!'
        );

        //redirect to the dashboard view with the message
        return redirect('home')
            ->with('message',$message);
    }

    public function updateBookmark(Request $request)
    {
        //scope
        $current_user = Auth::user();
        
        //grab the bookmark the user wishes to edit
        $bookmark = Bookmark::where([
            'user_id' => $current_user->id,
            'id' => $request->bm_id
        ])->first();

        //update the bookmark
        $bookmark->title = $request->bm_name;
        $bookmark->url = $request->bm_url;
        $bookmark->note = $request->bm_note;
        //save it
        $bookmark->save();

        //if there are tags assigned...
        
        //all is well, so pass back a message
        $message = array(
            'status' => 'OK', 
            'message' => 'Bookmark updated!'
        );

        //redirect to the dashboard view with the message
        return redirect('home')
            ->with('message',$message);
    }

    public function deleteBookmark(Request $request)
    {
        //grab the desired bookmark
        $bookmark_to_delete = Bookmark::where('user_id','=', Auth::user()->id)
            ->find($request->bm_id);

        //for response message
        $message = array();
        $bookmark_to_del=array($bookmark_to_delete);
        //if this user does not own the bookmark, fail and return
        if(!count($bookmark_to_del)) {
            $message = array(
            'status' => 'Error',
            'message' => 'That bookmark cannot be removed! You are not the owner!'
        );

        //user owns the bookmark, so lets proceed and delete it
        } else {
            $bookmark_to_delete->delete();
            $message = array(
                'status' => 'OK',
                'message' => 'Bookmark with name: '. $bookmark_to_delete->title .' removed!'
            );
        }
        
        //redirect to the dashboard view with the message
        return redirect('home')
            ->with('message',$message);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
