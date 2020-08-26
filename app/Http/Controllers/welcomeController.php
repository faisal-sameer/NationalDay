<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function welcome()
    {
        Alert::image('Image Title!', 'Image Description', '/ksaa.jpg', 'Image Width', 'Image Height');

        $user_notification = null;

        return view('welcome');
    }
}
