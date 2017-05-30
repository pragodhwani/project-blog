<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use App\Role;
use Illuminate\Http\Request;
use App\Photo;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=\App\Role::lists('name','id');
        $roles=[''=>'Choose Options']+$roles->toArray();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(UsersRequest $request)
    {
        $users=$request->all();
        if($file=$request->file('photo_id')) {
            $users['password'] = bcrypt($users['password']);
            $name=time() . $file->getClientOriginalName();
            $photo = Photo::create(['file' => $name]);
            $file->move('images',$name);
            $users['photo_id'] = $photo->id;
            //echo dd($users);
            User::create($users);
            Session::flash('message',public_path());
            return redirect('/admin/users/');
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
        $user=User::findOrFail($id);
        $roles=Role::lists('name','id');
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $data=$request->all();
        if($file=$request->file('photo_id')) {

            $data['password'] = bcrypt($data['password']);
            $name=time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $data['photo_id']=$photo->id;
            $user->update($data);
            Session::flash('message',"Updation Successfull");
            return redirect('admin/users');
        }
        else{
            $data['password'] = bcrypt($data['password']);
            $user->update($data);
            Session::flash('message',"Updation Successfull");
            return redirect('admin/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        unlink(public_path().$user->photo->file);
        $idd=$user->photo_id;
        $photo=Photo::findOrFail($idd);
        $photo->delete();
        $user->delete();
        Session::flash('message',"Deletion Successfull");
        return redirect('admin/users');
    }
}
