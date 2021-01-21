<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UploadedBanner = Banner::orderBy('created_at', 'DESC')->get();
        return view('posts.uploaded_baners')->with('UploadedBanner', $UploadedBanner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TargetCountryData  = Post::orderBy('country', 'ASC')->groupBy('country')->take(150)->get();
        $TargetCityData     = Post::orderBy('city', 'ASC')->groupBy('city')->take(150)->get();
        $TargetOsData       = Post::orderBy('os', 'ASC')->groupBy('os')->take(150)->get();

        // redirect banner upload pages
        return view('posts.banner')->with([
                                            'TargetCountryData' => $TargetCountryData, 
                                            'TargetCityData' => $TargetCityData, 
                                            'TargetOsData' => $TargetOsData
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate form field
        $this->validate($request, [
            
            'target_country'    =>  'required|max:30',
            'target_city'       =>  'required|max:30',
            'target_os'         =>  'required|max:15',
            'placement_period'  =>  'required',
            'banner_upload'     =>  'required|mimes:jpeg,jpg,png,gif|max:1000',

        ]);


        if (Banner::where('target_country', $request->input('target_country'))->exists()) 
        {
            return redirect()->back()->with('error', 'Target Country already exists');

        } else {


            $Data = new Banner;
            $Data->target_country   = $request->input('target_country');
            $Data->target_city      = $request->input('target_city');
            $Data->target_os        = $request->input('target_os');
            $Data->placement_period = $request->input('placement_period');
            $Data->user_id          = auth()->user()->id;
            $Data->banner_image     = $request->file('banner_upload')->store('public/banner_upload');

            // save data to database
            $Data->save();

            return redirect()->back()->with('success', 'Banner Upload Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SingleData     =   Banner::find($id);
        return view('posts.show_banners')->with(['error' => 'da' , 'ShowSingleBanners' => $SingleData]);

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
        $DeleteRecords = Banner::find($id);
        
        if (auth()->user()->id == $DeleteRecords->user_id)
        {

            $imgWillDelete = public_path() . '/storage' . str_replace('public', "", $DeleteRecords->banner_image);
            unlink($imgWillDelete);

            $DeleteRecords->delete();
            
            return redirect('/uploaded_baners')->with('success', 'Data Successfully Deleted');

        }

        return redirect('/uploaded_baners')->with('error', 'Unaccesseble Request');
    }
}
