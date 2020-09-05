<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use \App\Mail\SendMail;
use App\Notification;
use App\Challenge;
use App\Record;
use App\Attemp;
use PhpParser\Node\Expr\Array_;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function DailyRewardShow(){
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $sites = User::all() ;
        $arr = Array('user'=>$user_notification , 'names'=>$sites);

        return view('reword' , $arr );
    }
    protected function DailyRewardHome(){
        
        $home =   Record::all()->where('from',1)->random(1);

      //  return $home->id ;

      $winHome = $home[0]->user->user_name . '  ' . 'الفائز من منسوبي الجامعة ام القرى ' ; 

      Alert::success('مبروك الفائزين بالسحب الاول ',$winHome);
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
            //// need to know how to create a new line with sweet alert 
        return back();
    }
    protected function DailyRewardAway(){
        
        $away =  Record::all()->where('from',0)->random(1);

      //  return $home->id ;

      $winAway = $away[0]->user->user_name . '  ' . 'الفائز من خارج جامعة ام القرى  ' ; 

      Alert::success('مبروك الفائزين بالسحب الاول ',$winAway);
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
            //// need to know how to create a new line with sweet alert 
        return back();
    }
    protected function ControllerShow(){
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challenge = Challenge::all();

        $arr = Array('user'=>$user_notification , 'challenge'=>$challenge);
        return view('admin.ourController' , $arr);
    }
    protected function ChallengeOpen(Request $request){

        Challenge::where('id',$request->selected)
        ->update(['status'=>1]);
        return back ();
    }
    protected function ChallengeClose(Request $request){
        
        Challenge::where('id',$request->selected)
        ->update(['status'=>2]);
        return back ();
    }
}
