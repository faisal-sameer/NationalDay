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
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Alert::image('Image Title!', 'Image Description', '/ksaa.jpg', 'Image Width', 'Image Height');
        //$user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        if (auth()->user() == null) {
            return view('home');
        } else {
            $challengeinfo1 = Attemp::where('challenge_id', 1)->get();
            $challengeAnswer1 = Attemp::where(['challenge_id' => 1, 'status' => 4])->get();
            $countinfo1 = count($challengeinfo1);
            $countAnswer1 = count($challengeAnswer1);
            $challengeinfo2 = Attemp::where('challenge_id', 2)->get();
            $challengeAnswer2 = Attemp::where(['challenge_id' => 2, 'status' => 4])->get();
            $countinfo2 = count($challengeinfo2);
            $countAnswer2 = count($challengeAnswer2);
            $challengeinfo3 = Attemp::where('challenge_id', 3)->get();
            $challengeAnswer3 = Attemp::where(['challenge_id' => 3, 'status' => 4])->get();
            $countinfo3 = count($challengeinfo3);
            $countAnswer3 = count($challengeAnswer3);
            $challengeinfo4 = Attemp::where('challenge_id', 4)->get();
            $challengeAnswer4 = Attemp::where(['challenge_id' => 4, 'status' => 4])->get();
            $countinfo4 = count($challengeinfo4);
            $countAnswer4 = count($challengeAnswer4);
            $challengeinfo5 = Attemp::where('challenge_id', 5)->get();
            $challengeAnswer5 = Attemp::where(['challenge_id' => 5, 'status' => 4])->get();
            $countinfo5 = count($challengeinfo5);
            $countAnswer5 = count($challengeAnswer5);
            $challengeinfo6 = Attemp::where('challenge_id', 6)->get();
            $challengeAnswer6 = Attemp::where(['challenge_id' => 6, 'status' => 4])->get();
            $countinfo6 = count($challengeinfo6);
            $countAnswer6 = count($challengeAnswer6);
            $challengeinfo7 = Attemp::where('challenge_id', 7)->get();
            $challengeAnswer7 = Attemp::where(['challenge_id' => 7, 'status' => 4])->get();
            $countinfo7 = count($challengeinfo7);
            $countAnswer7 = count($challengeAnswer7);
            $challengeinfo8 = Attemp::where('challenge_id', 8)->get();
            $challengeAnswer8 = Attemp::where(['challenge_id' => 8, 'status' => 4])->get();
            $countinfo8 = count($challengeinfo8);
            $countAnswer8 = count($challengeAnswer8);
            $challengeinfo9 = Attemp::where('challenge_id', 9)->get();
            $challengeAnswer9 = Attemp::where(['challenge_id' => 9, 'status' => 4])->get();
            $countinfo9 = count($challengeinfo9);
            $countAnswer9 = count($challengeAnswer9);

            $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
            $arr = array(
                'challengeinfo1' => $countinfo1, 'challengeAnswer1' =>  $countAnswer1,
                'challengeinfo2' => $countinfo2, 'challengeAnswer2' =>  $countAnswer2,
                'challengeinfo3' => $countinfo3, 'challengeAnswer3' =>  $countAnswer3,
                'challengeinfo4' => $countinfo4, 'challengeAnswer4' =>  $countAnswer4,
                'challengeinfo5' => $countinfo5, 'challengeAnswer5' =>  $countAnswer5,
                'challengeinfo6' => $countinfo6, 'challengeAnswer6' =>  $countAnswer6,
                'challengeinfo7' => $countinfo7, 'challengeAnswer7' =>  $countAnswer7,
                'challengeinfo8' => $countinfo8, 'challengeAnswer8' =>  $countAnswer8,
                'challengeinfo9' => $countinfo9, 'challengeAnswer9' =>  $countAnswer9,




                'user' => $user_notification
            );
            return view('home', $arr);
        }
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

        $ChallengeOne = Challenge::where('id', 1)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 1)->get();
        $challengeAnswer = Record::where('challenge_id', 1)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);


        if ($ChallengeOne->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeOne->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge1', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge1', $arr);
                }

                return view('user.challenge1', $arr);
            }
        }
    }
    protected function challenge1answer(Request $request)
    {
        $answerOne = $request->four . $request->three . $request->two . $request->one;
        $ChallengeOne = Challenge::where('id', 1)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeOne->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerOne == $ChallengeOne->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerOne,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerOne,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerOne,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerOne,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerOne,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeOne->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerOne,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge2()
    {
        $ChallengeTwo = Challenge::where('id', 2)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 2)->get();
        $challengeAnswer = Record::where('challenge_id', 2)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);

        if ($ChallengeTwo->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeTwo->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge2', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge2', $arr);
                }

                return view('user.challenge2', $arr);
            }
        }
    }



    protected function challenge2answer(Request $request)
    {
        $answerTwo =   $request->one .  $request->two . ' ' .  $request->three . $request->four . $request->five . ' ' . $request->six .
            $request->seven .  $request->eaght . ' ' .  $request->nine .  $request->ten .  $request->eleven .  $request->twelv . ' ' .  $request->therten .  $request->fourten .
            $request->fiften .  $request->sixten . ' ' .  $request->seventen .  $request->eaghten .  $request->ninten .  $request->twenty . ' ' .  $request->twentyone .  $request->twentytwo .
            $request->twentythree .  $request->twentyfour;

        $ChallengeTwo = Challenge::where('id', 2)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeTwo->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerTwo == $ChallengeTwo->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTwo,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTwo,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTwo,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTwo,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTwo,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTwo->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTwo,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }
    protected function challenge3()
    {
        $ChallengeThree = Challenge::where('id', 3)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 3)->get();
        $challengeAnswer = Record::where('challenge_id', 3)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        if ($ChallengeThree->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeThree->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge3', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge3', $arr);
                }

                return view('user.challenge3', $arr);
            }
        }
    }
    protected function challenge3answer(Request $request)
    {
        $answerThree =    $request->one .  $request->two  .  $request->three . $request->four . $request->five  . $request->six .
            $request->seven .  $request->eaght  .  $request->nine .  $request->ten;
        $ChallengeThree = Challenge::where('id', 3)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeThree->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerThree == $ChallengeThree->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerThree,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerThree,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerThree,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerThree,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerThree,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeThree->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerThree,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge4()
    {
        $ChallengeFour = Challenge::where('id', 4)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 4)->get();
        $challengeAnswer = Record::where('challenge_id', 4)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);

        if ($ChallengeFour->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeFour->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge4', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge4', $arr);
                }

                return view('user.challenge4', $arr);
            }
        }
    }
    protected function challenge4answer(Request $request)
    {
        $answerFour =     $request->one .  $request->two  .  $request->three . $request->four . $request->five . ' ' . $request->six .
            $request->seven .  $request->eaght  .  $request->nine .  $request->ten . ' ' .  $request->eleven .  $request->twelv .   $request->therten;
        $ChallengeFour = Challenge::where('id', 4)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeFour->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerFour == $ChallengeFour->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFour,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFour,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFour,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFour,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFour,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFour->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFour,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge5()
    {
        $ChallengeFive = Challenge::where('id', 5)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 5)->get();
        $challengeAnswer = Record::where('challenge_id', 5)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);
        if ($ChallengeFive->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeFive->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge5', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge5', $arr);
                }

                return view('user.challenge5', $arr);
            }
        }
    }
    protected function challenge5answer(Request $request)
    {
        $answerFive =   $request->seven . $request->six . $request->five . $request->four . $request->three .  $request->two . $request->one;

        $ChallengeFive = Challenge::where('id', 5)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeFive->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerFive == $ChallengeFive->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFive,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFive,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFive,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFive,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFive,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeFive->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerFive,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge6()
    {
        $ChallengeSix = Challenge::where('id', 6)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 6)->get();
        $challengeAnswer = Record::where('challenge_id', 6)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);
        if ($ChallengeSix->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeSix->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge6', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge6', $arr);
                }

                return view('user.challenge6', $arr);
            }
        }
    }
    protected function challenge6answer(Request $request)
    {
        $answerSix =  $request->five . $request->four . $request->three .  $request->two . $request->one;

        $ChallengeSix = Challenge::where('id', 6)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeSix->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerSix == $ChallengeSix->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSix,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSix,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSix,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSix,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSix,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSix->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSix,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge7()
    {

        $ChallengeSeven = Challenge::where('id', 7)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 7)->get();
        $challengeAnswer = Record::where('challenge_id', 7)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);

        if ($ChallengeSeven->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeSeven->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge7', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge7', $arr);
                }

                return view('user.challenge7', $arr);
            }
        }
    }


    protected function challenge7answer(Request $request)
    {
        $answerSeven =   $request->one .  $request->two .  $request->three . $request->four . $request->five .  $request->six;
        $ChallengeSeven = Challenge::where('id', 7)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeSeven->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerSeven == $ChallengeSeven->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSeven,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSeven,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSeven,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSeven,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSeven,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeSeven->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerSeven,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }


    protected function challenge8()
    {

        $ChallengeEight = Challenge::where('id', 8)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 8)->get();
        $challengeAnswer = Record::where('challenge_id', 8)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);

        if ($ChallengeEight->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeEight->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge8', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge8', $arr);
                }

                return view('user.challenge8', $arr);
            }
        }
    }
    protected function challenge8answer(Request $request)
    {
        $answerEight =   $request->one .  $request->two .  $request->three . $request->four  . ' ' . $request->five . $request->six . ' ' .
            $request->seven .  $request->eaght .  $request->nine .  $request->ten .  $request->eleven;


        $ChallengeEight = Challenge::where('id', 8)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeEight->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerEight == $ChallengeEight->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerEight,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerEight,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerEight,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerEight,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerEight,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeEight->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerEight,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge9()
    {

        $ChallengeNine = Challenge::where('id', 9)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 9)->get();
        $challengeAnswer = Record::where('challenge_id', 9)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);

        if ($ChallengeNine->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeNine->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge9', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge9', $arr);
                }

                return view('user.challenge9', $arr);
            }
        }
    }
    protected function challenge9answer(Request $request)
    {
        $answerNine =   $request->one .  $request->two .  $request->three . $request->four . $request->five . ' ' . $request->six .
            $request->seven .  $request->eaght .   $request->nine .  $request->ten;

        $ChallengeNine = Challenge::where('id', 9)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeNine->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerNine == $ChallengeNine->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerNine,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerNine,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerNine,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerNine,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerNine,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeNine->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerNine,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }

    protected function challenge10()
    {

        $ChallengeNine = Challenge::where('id', 10)->first();
        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
        $challengeinfo = Attemp::where('challenge_id', 10)->get();
        $challengeAnswer = Record::where('challenge_id', 10)->get();
        $countinfo = count($challengeinfo);
        $countAnswer = count($challengeAnswer);
        $arr = array('challengeinfo' => $countinfo, 'challengeAnswer' =>  $countAnswer, 'user' => $user_notification);

        if ($ChallengeNine->status == 2) {
            Alert::info('لا يمكنك الدخول على هذه الصفحة ', 'لم يبدا وقت السوال بعد ');

            return view('home')->with('user', $user_notification);
        } else {
            $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeNine->id])->get()->last();
            $time = Carbon::now()->addHours(3);


            if ($attemp == null) {

                return view('user.challenge10', $arr);
            } else {
                if ($attemp->status == 2 && $attemp->time > $time) {
                    Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 3) {
                    Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                    return view('home')->with('user', $user_notification);
                } else if ($attemp->status == 4) {
                    Alert::success('لقد جاوبت على هذا السؤال بالفعل ', 'لا يمكنك إعادة إرسال للجواب ');

                    return view('home')->with('user', $user_notification);
                } else {
                    return view('user.challenge10', $arr);
                }

                return view('user.challenge10', $arr);
            }
        }
    }
    protected function challenge10answer(Request $request)
    {
        $answerTen =   $request->one .  $request->two .  $request->three . $request->four . ' ' . $request->eaght . $request->seven   .
            $request->six .  $request->five;

        $ChallengeTen = Challenge::where('id', 10)->first();
        $attemp = Attemp::where(['user_id' => auth()->user()->id, 'challenge_id' => $ChallengeTen->id])->get();

        $time = Carbon::now()->addHours(3);
        $timeClose = Carbon::now()->addHours(3)->addSeconds(90);

        if ($answerTen == $ChallengeTen->answer) {
            if (strpos(auth()->user()->email, "uqu") == true) {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 1,
                ]);
            } else {
                Record::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 1,
                    'time' => $time,
                    'from' => 0,
                ]);
            }
            if ($attemp->count() == null) {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTen,
                    'time' => $time,
                ]);
            } else {
                Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 4,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTen,
                    'time' => $time,
                ]);
            }
        } else {
            if ($attemp->count() + 1  == 3) {

                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTen,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 6) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 2,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTen,
                    'time' => $timeClose,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::info('لقد انتهت محاولاتك الثلاثة ', 'يجب عليك الأنتظار 90 ثانية ');

                return view('home')->with('user', $user_notification);
            } else  if ($attemp->count() + 1  == 9) {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 3,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTen,
                    'time' => $time,
                ]);
                $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();
                Alert::error('لقد انتهت محاولاتك ال 9', 'تم إغلاق السؤال ');

                return view('home')->with('user', $user_notification);
            } else {
                $attemp =  Attemp::create([
                    'user_id' => auth()->user()->id,
                    'challenge_id' => $ChallengeTen->id,
                    'status' => 1,
                    'attemp' => $attemp->count() + 1,
                    'answer' =>  $answerTen,
                    'time' => $time,
                ]);

                Alert::warning('الإجابة غير صحيحة ', 'حاول مره أخرى ');
                return back();
            }
        }
        Alert::success('إجابة صحيحة ', 'مبروك لقد دخلت على السحب اليومي و سحب الجائزة الكبرى ');

        $user_notification = Notification::where(['user_id' => auth()->user()->id, 'seen' => 0])->get();

        return view('home')->with('user', $user_notification);
    }
}
