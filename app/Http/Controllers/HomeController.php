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

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Alert::image('Image Title!', 'Image Description', '/ksaa.jpg', 'Image Width', 'Image Height');
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function verify()
    {
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('emails.verify')->with('user', $user_notification);
    }

    protected function checkverify(Request $request)
    {

        $userCode = $request->verifyCode;
        $code = auth()->user()->check_email_code;
        //$date = Carbon::now()->addHours(3);
        $now =  Carbon::now()->addHours(3);
        $codetime = auth()->user()->check_email_time;
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        if ($userCode == $code) {
            if ($now <= $codetime) {
                User::where('id', auth()->user()->id)
                    ->update([
                        'check_email' => 1,
                        'check_email_code' => 0
                    ]);
                Alert::toast('تم تفعيل الحساب ', 'success');

                return view('home')->with('user', $user_notification);
            } else {
                User::where('id', auth()->user()->id)
                    ->update(['check_email_code' => 0,]);
                Alert::toast('انتهاء صلاحية الكود أضغط على إعادة إرسال الكود  ', 'warning');

                return view('emails.verify')->with('user', $user_notification);
            }
        } else {
            Alert::toast('الكود غير صحيح  ', 'error');

            return view('emails.verify')->with('user', $user_notification);
        }
    }
    protected function ResendCode(Request $request)
    {

        $date = Carbon::now()->addMinutes(10)->addHours(3);
        $emailcode = Str::random(6);
        $email = auth()->user()->email;
        User::where('id', auth()->user()->id)
            ->update([
                'check_email' => 0,
                'check_email_code' => $emailcode,
                'check_email_time' => $date
            ]);
        $detailsforCustomer = [
            'title' => 'أهلا و سهلا بكم في منصة اليوم الوطني ال90',
            'description' => $emailcode,
            'body' => $date . 'صلاحية الكود تنتهي بعد '
        ];

        $detailsforAdmin = [
            'title' =>   'Boss new member sign up ',
            'description' => 'Has/her password ',
            'body' => 'code is  ' . $emailcode

        ];
        \Mail::to($email)->send(new SendMail($detailsforCustomer));
        \Mail::to('aandf.forwork@gmail.com')->send(new SendMail($detailsforAdmin));

        Alert::toast('تم إرسال الكود التفعيل لبريدك   ', 'info');

        return back();
      
    }
    protected function challenge1()
    {
        $ChallengeOne = Challenge::where('id',1)->first();
        $attemp = Attemp::where(['user_id'=>auth()->user()->id , 'challenge_id'=>$ChallengeOne->id])->get()->last();
        $time = Carbon::now()->addHours(3);

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        if ($attemp == null ) {

            return view('user.challenge1')->with('user', $user_notification);  
        
        }else {
            if ($attemp->status == 2 && $attemp->time > $time) {
                Alert::info('لقج انتهت محاولاتك الثلاثة ','يجب عليك الأنتظار 90 ثانية ');
    
                return view('home')->with('user', $user_notification); 
            }else if ($attemp->status == 3 ){
                Alert::error('لقد انتهت محاولاتك ال 9','تم إغلاق السؤال ');
    
                return view('home')->with('user', $user_notification); 
            }else if ($attemp->status == 4 ){
                Alert::success('لقد جاوبت على هذا السؤال بالفعل ','لا يمكنك إعادة إرسال للجواب ');
    
                return view('home')->with('user', $user_notification); 
            }
            else{
                return view('user.challenge1')->with('user', $user_notification);  

            }
           
            return view('user.challenge1')->with('user', $user_notification);  

        }
       
      
    }
    protected function challenge1answer(Request $request){
        $answerOne = $request->four . $request->three . $request->two . $request->one;
        $ChallengeOne = Challenge::where('id',1)->first();
        $attemp = Attemp::where(['user_id'=>auth()->user()->id , 'challenge_id'=>$ChallengeOne->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);
      
        if ($answerOne == $ChallengeOne->answer) {
            if (strpos(auth()->user()->email, "uqu") == true ) {
                Record::create([
                    'user_id'=>auth()->user()->id,
                    'challenge_id'=>$ChallengeOne->id,
                    'status'=>1,
                    'time'=>$time,
                    'from'=>1,
                ]);
                }else{
            Record::create([
                'user_id'=>auth()->user()->id,
                'challenge_id'=>$ChallengeOne->id,
                'status'=>1,
                'time'=>$time,
                'from'=>0,
            ]);
        }
                if ($attemp->count() == null ) {
                    Attemp::create([
                        'user_id'=>auth()->user()->id,
                        'challenge_id'=>$ChallengeOne->id,
                        'status'=>4,
                        'attemp'=>$attemp->count() + 1,
                        'answer'=>  $answerOne,
                        'time'=>$time,
                    ]);
                 }else {
                    Attemp::create([
                        'user_id'=>auth()->user()->id,
                        'challenge_id'=>$ChallengeOne->id,
                        'status'=>4,
                        'attemp'=>$attemp->count() + 1 ,
                        'answer'=>  $answerOne,
                        'time'=>$time,
                    ]);
                 }
          
        }else{
                if ($attemp->count() + 1  == 3) {
                     
                    $attemp =  Attemp::create([
                        'user_id'=>auth()->user()->id,
                        'challenge_id'=>$ChallengeOne->id,
                        'status'=>2,
                        'attemp'=>$attemp->count() + 1 ,
                        'answer'=>  $answerOne,
                        'time'=>$timeClose,
                    ]);
                    $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                    Alert::info('لقج انتهت محاولاتك الثلاثة ','يجب عليك الأنتظار 90 ثانية ');
    
                    return view('home')->with('user', $user_notification); 
                
                }else  if ($attemp->count() + 1  == 6) {
                    $attemp =  Attemp::create([
                        'user_id'=>auth()->user()->id,
                        'challenge_id'=>$ChallengeOne->id,
                        'status'=>2,
                        'attemp'=>$attemp->count() + 1 ,
                        'answer'=>  $answerOne,
                        'time'=>$timeClose,
                    ]);
                    $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                    Alert::info('لقج انتهت محاولاتك الثلاثة ','يجب عليك الأنتظار 90 ثانية ');
    
                    return view('home')->with('user', $user_notification); 
                
                }else  if ($attemp->count() + 1  == 9) {
                    $attemp =  Attemp::create([
                        'user_id'=>auth()->user()->id,
                        'challenge_id'=>$ChallengeOne->id,
                        'status'=>3,
                        'attemp'=>$attemp->count() + 1 ,
                        'answer'=>  $answerOne,
                        'time'=>$time,
                    ]);
                    $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                    Alert::error('لقد انتهت محاولاتك ال 9','تم إغلاق السؤال ');
    
                    return view('home')->with('user', $user_notification); 
                
                }
           else{
           $attemp =  Attemp::create([
                'user_id'=>auth()->user()->id,
                'challenge_id'=>$ChallengeOne->id,
                'status'=>1,
                'attemp'=>$attemp->count() + 1 ,
                'answer'=>  $answerOne,     
                'time'=>$time,
            ]);
           
            Alert::warning('الإجابة غير صحيحة ','حاول مره أخرى ');
            return back();
        }
        }
        Alert::success('إجابة صحيحة ','مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification); 
       }
}
