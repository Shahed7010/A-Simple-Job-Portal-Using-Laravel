<?php

namespace App\Http\Controllers;

use App\Application;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function apply(){
         $id=$_GET['id'];
         $post_id=$_GET['post_id'];
         $user = User::findOrFail($id);
         if(!$user->resume_id){
             return redirect()->route('user.edit',$id);
         }
         $post=Post::findOrFail($post_id);


         $app = new Application;
         $app->applicant_id=$id;
         $app->company_id=$post->user_id;
         $app->company=$post->user->first_name.' '.$post->user->last_name;
         $app->title=$post->job_title;
         $app->location=$post->location;
         $app->resume=$user->resume->name;
         $app->post_id=$post->id;

         $app->save();

        $applied = Application::findOrFail($app->id);
        return view('application',compact('applied','post'));
    }
}
