<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Jenssegers\Agent\Agent;
use DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth', ['except' => 'dashboard', 'index', 'create', 'show', 'edit']);
    }


    public function index()
    {
        $visitors = Post::orderBy('id', 'DESC')->take(50)->get();
        return view('posts.index')->with('VisitorsData', $visitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // redirect create page
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // get ip address
        // $request->ip()
        $IPaddress              = '1.1.99.243';

        $agent                  = new Agent;
        $Platform               = $agent->platform();   // detect platform, windows, ubuntu
        $Browser                = $agent->browser();    // chrome, safari, IEm Firefox
        

        // get platform and browser version
        $PlatformVersion        = $agent->version($Platform);
        $Browserversion         = $agent->version($Browser);

        $PlatformName           = $Platform . ' ' . $PlatformVersion;
        $BrowserName            = $Browser . ' ' . round($Browserversion, 2);


        $AddStore = new Post;
        $AddStore->ip           = $IPaddress;
        $DataArray              = unserialize(file_get_contents('http://ip-api.com/php/' . $IPaddress));


        $AddStore->country      = $DataArray['country'];
        $AddStore->browser      = $BrowserName;
        $AddStore->os           = $PlatformName;
        $AddStore->status       = 'ACTIVE';
        $AddStore->city         = $DataArray['city'];
        $AddStore->user_id      = auth()->user()->id;
        
        // save this data to database
        $AddStore->save();

        return redirect('/dashboard')->with('success', 'Data Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // show single data
        $SingleData     =   Post::find($id);
        
        if($SingleData == TRUE) 
        {
            return view('posts.show')->with(['ShowSingleData' => $SingleData]);
        } else {
            return redirect('/index')->with('error', 'Link Not Found');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EditData     =   Post::find($id);

        if($EditData == TRUE) 
        {
            if(auth()->user()->id == $EditData->user_id)
            {
                return view('posts.edit')->with(['EditSingleData' => $EditData]);
            
            } else {

                return redirect('/index')->with('error', 'Unauthorized Page');
            }

        } else {
            return redirect('/index')->with('error', 'Link not found');
        }



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
        $this->validate($request, [
            'country' => 'required|max:30',
            'city'  => 'required|max:25',
        ]);

        $UpdateData = Post::find($id);

        $UpdateData->country    = $request->input('country');
        $UpdateData->city       = $request->input('city');
        
        // update and save data
        $UpdateData->save();

        return redirect('/dashboard')->with('success', 'Data Successfully Updated');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DeleteRecords = Post::find($id);
        
        if(auth()->user()->id == $DeleteRecords->user_id)
        {
            $DeleteRecords->delete();
            return redirect('/index')->with('success', 'Data Successfully Deleted');
        
        } else {

            return redirect('/index')->with('error', 'Unaccesseble Request');
        }

    }
}
