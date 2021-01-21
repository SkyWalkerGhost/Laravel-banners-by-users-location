<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Banner;
use Jenssegers\Agent\Agent;
use DB;


class PagesController extends Controller
{
    public function welcome()
    {
        // here way to detect Users IP Address ==> request()->ip()
        $VisitorsIP 	=  '12.26.231.1';
        $DataArray		= unserialize(file_get_contents('http://ip-api.com/php/' . $VisitorsIP));
        $users_country 	= $DataArray['country'];
        $users_city 	= $DataArray['city'];

        $agent      	= new Agent;
        $Platform   	= $agent->platform();   // detect platform, windows, ubuntu

        $getBanner 		= DB::select('SELECT * 
		        							FROM banners 
		        						WHERE target_country 	= "'.$users_country.'" 
		        							OR target_city 		= "'.$users_city.'" 
		        							OR target_os 		= "'.$Platform.'" 
		        						LIMIT 1');

        return view('/welcome')->with('ShowBannerToUsers', $getBanner);

    }


}
