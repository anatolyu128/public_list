<?php

namespace App\Http\Controllers;

use App\Posts;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Posts::all();
        $ip = $request->ip();
        return view("index", compact(['posts', 'ip']));
    }

    public function create()
    {
        return view("create-post");
    }

    public function uploadPost(Request $request)
    {
        if (!empty($request->post("title") and $request->post("content"))) {

            if ($request->hasFile("picture")) {
                $path = $request->file("picture")->store("public");
                $path = str_replace("public", "storage", $path);
            } else {
                $path = "NULL";
            }


            $post = new Posts;

            $post->title = $request->post("title");
            $post->content = $request->post("content");
            $post->picture = $path;

            $post->save();

        }

        return redirect("/");
    }

    public function delete( $id )
    {
        try {
            $row = Posts::find($id);
            $row->picture = str_replace("storage", "public", $row->picture);
            Storage::delete($row->picture);
            Posts::destroy($id);
        } catch (\Exception $e) {
            echo $e;
        }
        return redirect("/");
    }
}
