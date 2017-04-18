<?php
/**
 * Created by IntelliJ IDEA.
 * User: omar-
 * Date: 17/04/2017
 * Time: 18:55
 */

namespace App\Http\Controllers;


class ChatController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        \JavaScript::put(['user' => \Auth::user()]);
        return view('chat.show');
    }

}