<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    protected function welcome()
    {
        Alert::image('Image Title!', 'Image Description', '/ksaa.jpg', 'Image Width', 'Image Height');
      //  Alert::success('شكرا لك ','لقد تم أستلام مشاركتك بنجاح أبحث دوما عن المعرفة لأن العالم مليء بالعقد ');
        $user_notification = 10;

        return view('welcome')->with('user', $user_notification);
    }
    protected function test(Request $request){
        $word = $request->one . $request->two . $request->three . $request->four . $request->five . $request->six . $request->seven ;
       
      
        Alert::success('the word is : ' , $word);

        return back();
    }
}
