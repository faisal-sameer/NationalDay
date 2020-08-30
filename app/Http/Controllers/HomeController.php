<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use \App\Mail\SendMail;
use App\Notification;

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
        if ($userCode == $code) {
            if ($now <= $codetime) {
                User::where('id', auth()->user()->id)
                    ->update([
                        'check_email' => 1,
                        'check_email_code' => 0
                    ]);
                Alert::toast('تم تفعيل الحساب ', 'success');
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

                return view('home')->with('user', $user_notification);
            } else {
                User::where('id', auth()->user()->id)
                    ->update(['check_email_code' => 0,]);
                Alert::toast('انتهاء صلاحية الكود أضغط على إعادة إرسال الكود  ', 'warning');

                return back();
            }
        } else {
            Alert::toast('الكود غير صحيح  ', 'error');

            return back();
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
        Alert::image('Image Title!', 'Image Description', '/ksaa.jpg', 'Image Width', 'Image Height');

        $user_notification = 10;

        return view('user.challenge1')->with('user', $user_notification);
    }
}
