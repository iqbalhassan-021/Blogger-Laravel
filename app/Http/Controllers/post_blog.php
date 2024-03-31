<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class post_blog extends Controller
{
    function add_blog(Request $request){
        $filename = '';
        if ($request->hasFile('blogimg')) {
            $image = $request->file('blogimg'); // Use 'productImage' instead of 'image'
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/'), $filename);
            $filename = $request->getSchemeAndHttpHost() . '/assets/images/' . $filename;
        }
        $currentDateTime = date('Y-m-d H:i:s');
        $blog = new blog();
        $blog->blogtitle = $request->blogtitle;
        $blog->id = $request->blogtitle;
        $blog->content = $request->content;
        $blog->blogimg = $filename;
        $blog->time = $currentDateTime;
        $blog->save();
        return response()->noContent();
    }
    function delete($id){
        $blog = blog::find($id);
        $blog ->delete();
        return response()->noContent();
    }
}
