<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\News;

class NewsController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $News = News::orderBy('created_at','DESC')->get();

        foreach($News as $key => $value){
            $value->img = Storage::url($value->img);
        }

        return response()->json($News);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "string|required",
            "body" => "string|required",
            "img" => "required|image"
        ]);

        $News = new News;

        $News->title = $request->title;
        $News->body = $request->body;
        $News->img = $request->file('img')->store('News','public');
        $News->user_id = Auth::user()->id;

        $News->save();

        return response()->json([
            "statse" => true,
            "massege" => "new News Aded"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $News = News::find($id);
        $News->img = Storage::url($News->img);
        return response()->json($News);
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
        $this->validate($request,[
            "title" => "string|required",
            "body" => "string|required",
            "img" => "image"
        ]);

        $News = News::find($id);

        $News->title = $request->title;
        $News->body = $request->body;
        if($request->hasFile('img')){
            Storage::delete('public/'.$News['img']);
            $News->img = $request->file('img')->store('News','public');
        }
        $News->user_id = Auth::user()->id;

        $News->save();

        return response()->json([
            "statse" => true,
            "massege" => $request->title." has update"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $News = News::find($id);
        News::destroy($id);

        if(!is_null($News['img'])){
            Storage::delete('public/'.$News['img']);
        }

        return response()->json([
            "statse" => true,
            "massege" => $News['title']." delete",
        ]);
    }
}
