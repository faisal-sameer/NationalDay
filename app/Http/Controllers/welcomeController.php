<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function __construct()
    {
       
    }
    protected function welcome()
    {
      //  Alert::image('Image Title!', 'Image Description', '/ksaa.jpg', 'Image Width', 'Image Height');

        $user_notification = null;

        return view('welcome');
    }
    protected function test(Request $request){
        $word = $request->one . $request->two . $request->three . $request->four . $request->five . $request->six . $request->seven ;
       
      
        Alert::success('the word is : ' , $word);

        return back();
    }
}
