<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Staff;

class StaffController extends Controller
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
        $Staff = Staff::orderBy('created_at','DESC')->get();

        return view('staff.list',['nav'=>'Stafflist','Staffs'=>$Staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create',['nav'=>'Staffadd']);
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
            "img" => "required|image"
        ]);

        $Staff = new Staff;

        $Staff->name = $request->name;
        $Staff->img = $request->file('img')->store('Staff','public');
        $Staff->user_id = Auth::user()->id;

        $Staff->save();

        return redirect('/allStaff');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Staff = Staff::find($id);
        
        return view('staff.edit',['nav'=>'Staffadd','Staff'=>$Staff]);
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
            "img" => "image"
        ]);

        $Staff = Staff::find($id);
        $Staff->name = $request->name;
        if($request->hasFile('img')){
            Storage::delete('public/'.$Staff['img']);
            $Staff->img = $request->file('img')->store('Staff','public');
        }
        $Staff->user_id = Auth::user()->id;
        $Staff->save();

        return redirect('/allStaff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Staff = Staff::find($id);
        Staff::destroy($id);

        if(!is_null($Staff['img'])){
            Storage::delete('public/'.$Staff['img']);
        }

        return redirect('/allStaff');
    }
}
