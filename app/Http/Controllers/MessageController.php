<?php
/**
 * Created by IntelliJ IDEA.
 * User: omar-
 * Date: 17/04/2017
 * Time: 06:46
 */

namespace App\Http\Controllers;


use App\Models\Message;

class MessageController extends Controller
{

    public function index() {
        return Message::all();
    }

}