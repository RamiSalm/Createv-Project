<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Pation;

class PationController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pation = Pation::orderBy('created_at','DESC')->get();

        return view('pation.list',['nav'=>'Pationlist','Pations'=>$Pation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pation.create',['nav'=>'Pationadd']);
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
            "name" => "string|required",
            "number" => "string|required",
            "address" => "string|required",
            "img" => "required|image",
            "username" => "string|required",
            "pass" => "string|required",
            "age" => "string|required",
        ]);

        $Pation = new Pation;

        $Pation->name = $request->name;
        $Pation->number = $request->number;
        $Pation->address = $request->address;
        $Pation->img = $request->file('img')->store('Pation','public');
        $Pation->username = $request->username;
        $Pation->pass = $request->pass;
        $Pation->resault = $request->resault;
        $Pation->age = $request->age;
        $Pation->user_id = Auth::user()->id;

        $Pation->save();

        return redirect('/allPation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pation = Pation::find($id);

        return view('pation.edit',['nav'=>'Pationadd','Pation'=>$Pation]);
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
            "name" => "string|required",
            "number" => "string|required",
            "address" => "string|required",
            "img" => "image",
            "username" => "string|required",
            "pass" => "string|required",
            "resault" => "string|required",
            "age" => "string|required",
        ]);

        $Pation = Pation::find($id);

        $Pation->name = $request->name;
        $Pation->number = $request->number;
        $Pation->address = $request->address;
        if($request->hasFile('img')){
            Storage::delete('public/'.$Pation['img']);
            $Pation->img = $request->file('img')->store('Pation','public');
        }
        $Pation->username = $request->username;
        $Pation->pass = $request->pass;
        $Pation->resault = $request->resault;
        $Pation->age = $request->age;
        $Pation->user_id = Auth::user()->id;

        $Pation->save();
        return redirect('/allPation');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pation = Pation::find($id);
        Pation::destroy($id);

        if(!is_null($Pation['img'])){
            Storage::delete('public/'.$Pation['img']);
        }

        return redirect('/allPation');
    }
}
