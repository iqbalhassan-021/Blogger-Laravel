<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{

    public function home(){
        $blogs = DB::table('blog')->get()->reverse();
        $count = DB::table('blog')->get();
        $lastTwoBlogs = $count->splice(-2)->reverse();
        $siteDetails = DB::table('siteinfo')->get();

        return view('home',[
            'blogs' => $blogs,
            'lastTwoBlogs' => $lastTwoBlogs,
            'siteDetails' => $siteDetails
        ]);
    }
    
    public function search(Request $request){
        $blogs = DB::table('blog')->get();
        $siteDetails = DB::table('siteinfo')->get();
        $searchValue = $request->query('search');
        $searchResults = DB::table('blog')->where('blogtitle', 'like', '%' . $searchValue . '%')->get();
        return view('search',[
            'blogs' => $blogs,
            'siteDetails' => $siteDetails,
            'searchResults' => $searchResults
        ]);
    }
    public function auth(){
        return view('auth');
    }
    public function single($id){
        $targetted_blog = blog::find($id);
        $blogs = DB::table('blog')->get()->reverse();
        $siteDetails = DB::table('siteinfo')->get();
        return view('single',[
            'blogs' => $blogs,
            'siteDetails' => $siteDetails,
            'targetted_blog' => $targetted_blog
        ]);
    }
    public function blogs(){
        $blogs = DB::table('blog')->get();
        $siteDetails = DB::table('siteinfo')->get();
        return view('blogs',[
            'blogs' => $blogs,
            'siteDetails' => $siteDetails
        ]);
    }
}
