<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\generalfunction;

class UsersSettingsController extends Controller
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
    public function index(Request $request)
    {
        if(auth()->user()->level < 3){
            generalfunction::notificationMsg($request, 'error', 'You do not have authorization to this function');
            return back();
        }

        $index = 0;
        $listdata = User::where('level', '<', '3')->get();
        foreach($listdata as $temp_listdata){
            if($temp_listdata->level == '1'){
                $listdata[$index]->level = 'Admin';
            }
            if($temp_listdata->level == '2'){
                $listdata[$index]->level = 'Manager';
            }
            if($temp_listdata->level == '3'){
                $listdata[$index]->level = 'Owner';
            }
            if($temp_listdata->level == '4'){
                $listdata[$index]->level = 'Developer';
            }
            $index++;
        }
        return view('pages.settings.userssettings.users')->with('listdata',$listdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth()->user()->level < 3){
            generalfunction::notificationMsg($request, 'error', 'You do not have authorization to this function');
            return back();
        }
        return view('pages.settings.userssettings.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errormsg = [
            'required' => 'This field is required',
        ];

        $this->validate($request, [
            'username' => 'required',
            'useremail' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'userlevel' => 'required',
        ],$errormsg);

        $insert = new User();
        $insert->name = $request->input('username');
        $insert->email = $request->input('useremail');
        $insert->password =  bcrypt($request->input('password'));
        if($request->input('userlevel') == 'Admin'){
            $insert->level = '1';
        }elseif($request->input('userlevel') == 'Manager'){
            $insert->level = '2';
        }
        $insert->save();

        generalfunction::notificationMsg($request, 'success', 'User created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->level < 3){
            generalfunction::notificationMsg($request, 'error', 'You do not have authorization to this function');
            return back();
        }

        $edititem = User::find($id);
        return view('pages.settings.userssettings.edituser')->with('edititem', $edititem);
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
        $errormsg = [
            'required' => 'This field is required',
        ];

        $this->validate($request, [
            'username' => 'required',
            'useremail' => 'required|string|email|max:255',
            'userlevel' => 'required',
        ],$errormsg);
        
        $update = User::find($id);
        $update->name = $request->input('username');
        $update->email = $request->input('useremail');
        if($request->input('userlevel') == 'Admin'){
            $update->level = '1';
        }elseif($request->input('userlevel') == 'Manager'){
            $update->level = '2';
        }
        $update->save();

        generalfunction::notificationMsg($request, 'success', 'User edited successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deleteitem = User::find($id);
        $deleteitem->delete();
        generalfunction::notificationMsg($request, 'warning', 'User deleted successfully');
        return redirect('/usrsettings');
    }
}
