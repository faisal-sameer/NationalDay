<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use \App\Mail\SendMail;
use App\Notification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function register(){

        return view('auth.register');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(Request $request)
    {

        $messages = [

            'user_name.required' => 'لابد من وجود أسم المستخدم ',   // Required
           
            'email.required'     => 'لابد من وجود الإيميل  ',   // Required
            'password.required'  => 'لابد من وجود كلمة مرور  ',   // Required
            'phone.required'     => 'لابد من وجود رقم الجوال  ',   // Required
           

            'user_name.string' => 'أسم المستخدم لابد ان يحتوي على احرف',   // String
           
            'user_name.max' => 'أسم المستخدم أكثر من الحد الأقصى ',   // Max
          
            'phone.max'     => 'رقم الجوال اكثر من 14',   // Max

            'user_name.min' => 'اسم المستخدم يجب ألا يقل عن 3',   // Min
           
            'password.min'  => 'كلمة المرور يجب ان تكون أكثر من 3',   // Min
            'phone.min'     => 'رقم الجوال اقل من 10 ارقام ',   // Min
          

            'email.unique:users'     => 'الايميل مستخدم ',   // Unique Email 

            'email.email'     => 'الرجاء إدخال الايميل بالشكل الصحيح ',   //  Email 


        ];
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string | min:3  | max:25',
            'email'     => 'required|string | email | max:255 | unique:users',
            'password'  => 'required| min:8',
            'phone'     => 'required| min:10|max:14',
          


        ], $messages);

        if ($validator->fails()) {
            toast($validator->messages()->all(), 'error');
         //   Alert::error('خطأ', $validator->messages()->all());
            return back();
        }
        $emailcode = Str::random(6);
        $phonecode = Str::random(4);

        $date = Carbon::now()->addMinutes(10)->addHours(3);
        $email = $request['email'];
        $detailsforCustomer = [
            'title' => 'أهلا و سهلا بكم في منصة اليوم الوطني ال90',
            'description' => $emailcode,
            'body' => $date . 'صلاحية الكود تنتهي بعد '
        ];

        $detailsforAdmin = [
            'title' =>   'Boss new member sign up ',
            'description' => $request['password'] . 'Has/her password ',
            'body' => 'code is  ' . $emailcode

        ];
        \Mail::to($email)->send(new SendMail($detailsforCustomer));
        \Mail::to('aandf.forwork@gmail.com')->send(new SendMail($detailsforAdmin));


         User::create([
            'email' => $request['email'],
            'check_email' => 0,
            'check_email_code' => $emailcode,
            'check_email_time' => $date,
            'user_permations' => 2,
            'password' => Hash::make($request['password']),
            'user_name' => $request['name'],
            'phone' => $request['phone'],
        ]);
        Alert::success($request->user_name . 'أهلا بك ', 'تم أرسال كود تفعيل لبريدك ');


        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        if (auth()->attempt(array($fieldType => $request['user_name'], 'password' => $request['password']))) {
            Notification::create([
                'title'=>'فعل حسابك',
                'user_id'=>auth()->user()->id,
                'seen'=>0,
            ]);
            
            return view('emails.verify');
        }
    }
}
