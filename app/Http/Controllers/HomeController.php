<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        return view('home');
    }
    protected function verify()
    {
        return view('emails.verify');
    }

    protected function checkverify(Request $request)
    {

        $userCode = $request->verifyCode;
        $code = auth('api')->user()->random_code_email;
        //$date = Carbon::now()->addHours(3);
        $now =  Carbon::now()->addHours(3);
        $codetime = auth('api')->user()->code_time_email;
        if ($userCode == $code) {
            if ($now <= $codetime) {
                User::where('id', auth('api')->user()->id)
                    ->update([
                        'check_email' => 1,
                        'random_code_email' => 0
                    ]);

                return view('home');
            } else {
                User::where('id', auth('api')->user()->id)
                    ->update(['random_code_email' => 0,]);
                return back();
            }
        } else {
            return back();
        }
    }
}
