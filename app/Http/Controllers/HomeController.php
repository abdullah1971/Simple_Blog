<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* get all the published post */
        $posts = Post::WHERE('status','publish')->get();

        /* get the unique catagory with their post amount */
        $catagory = Post::where('status','publish')->distinct('catagory')->select('catagory')->get();

        foreach ($catagory as $value) {
            $temp = Post::where('status','publish')->where('catagory',"$value->catagory")->select('catagory')->count();
            $catagoryCount["$value->catagory"] = $temp;
        }

        /* get the unique year and their amount */
        $year = Post::where('status','publish')->select('updated_at')->get();
        
        $yearCount = array();

        foreach ($year as  $value) {
            $temp = $value->updated_at->format('Y');


            if(!array_key_exists("$temp", $yearCount))
                $yearCount["$temp"] = 0;

            $yearCount["$temp"]++;
        }

        // $splitName = explode(' ', URL::previous(), 2);

        // return $splitName;

        return view('home', compact(['posts','catagory','catagoryCount','year','yearCount']));
    }

    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required|string|max:50',
        ]);
        // return $request->search;
        $temp = $request->search;
        $temp = "string";
        // return $temp;
        $searchResult = Post::where('heading','LIKE', "%".$temp."%")->get();
        return $searchResult;
    }


    public function catagory($catagory){
        /* get all the post which belongs to this catagory */
        $posts = Post::WHERE('status','publish')->where('catagory',"$catagory")->get();

        /* get the unique catagory with their post amount */
        $catagory = Post::where('status','publish')->distinct('catagory')->select('catagory')->get();

        foreach ($catagory as $value) {
            $temp = Post::where('status','publish')->where('catagory',"$value->catagory")->select('catagory')->count();
            $catagoryCount["$value->catagory"] = $temp;
        }

        /* get the unique year and their amount */
        $year = Post::where('status','publish')->select('updated_at')->get();
        
        $yearCount = array();

        foreach ($year as  $value) {
            $temp = $value->updated_at->format('Y');


            if(!array_key_exists("$temp", $yearCount))
                $yearCount["$temp"] = 0;

            $yearCount["$temp"]++;
        }
        
        return view('home', compact(['posts','catagory','catagoryCount','year','yearCount']));
    }




    public function archive($year){
        /* get all the post which belongs to this catagory */
        $posts = Post::WHERE('status','publish')->get();
        $temporary = array();

        /* get the desired years result */
        foreach ($posts as $key => $value) {
            // echo "$value<br>";
            $updateDate = $value->updated_at->format('Y');

            if( $updateDate == $year){
                array_push($temporary, $value);
                    // echo "$temporary<br>";
            }
        }
        $posts = $temporary;
        // return $temporary;
        // return $posts;

        /* get the unique catagory with their post amount */
        $catagory = Post::where('status','publish')->distinct('catagory')->select('catagory')->get();

        foreach ($catagory as $value) {
            $temp = Post::where('status','publish')->where('catagory',"$value->catagory")->select('catagory')->count();
            $catagoryCount["$value->catagory"] = $temp;
        }

        /* get the unique year and their amount */
        $year = Post::where('status','publish')->select('updated_at')->get();
        
        $yearCount = array();

        foreach ($year as  $value) {
            $temp = $value->updated_at->format('Y');


            if(!array_key_exists("$temp", $yearCount))
                $yearCount["$temp"] = 0;

            $yearCount["$temp"]++;
        }
        
        return view('home', compact(['posts','catagory','catagoryCount','year','yearCount']));
    }
}
