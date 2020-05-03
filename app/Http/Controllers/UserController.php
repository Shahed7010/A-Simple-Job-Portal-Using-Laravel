<?php

namespace App\Http\Controllers;

use App\Application;
use App\Photo;
use App\Resume;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
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
        $valid = $request->validate([
            'photo_id'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'resume_id'=>'mimes:pdf|max:1000',
        ]);
        $input = $request->all();
        $user = User::findOrFail($id);

        if($file = $request->file('photo_id')) {
            if($user->photo_id){
                unlink(public_path() . $user->photo->name);
                $photo_data = Photo::findOrFail($user->photo_id);
                $photo_data->delete($user->photo_id);
            }
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['name'=>$name]);
            $input['photo_id']= $photo->id;
        }
        if($file = $request->file('resume_id')) {
            if($user->resume_id){
                unlink(public_path() . $user->resume->name);
                $resume_data = Resume::findOrFail($user->resume_id);
                $resume_data->delete($user->resume_id);
            }
            $name = time().$file->getClientOriginalName();
            $file->move('documents',$name);
            $resume = Resume::create(['name'=>$name]);
            $input['resume_id']= $resume->id;
        }
//        if($input['password']) {
//            $input['password'] = bcrypt($request->password);
//        }
        if($user->update($input)){
            Application::where('applicant_id',$id)->update(['resume' => '/documents/'.$name]);
            \session()->flash('action','The user has been Updated!');
        }
        return redirect('/user/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->photo_id != null) {
            unlink(public_path() . $user->photo->name);
            $photo_data = Photo::findOrFail($user->photo_id);
            $photo_data->delete($user->photo_id);
        }
        if($user->delete()){
            \session()->flash('action','The user has been Deleted!');
        }

        return redirect('/user');
    }

}
