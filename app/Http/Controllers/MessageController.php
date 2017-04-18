<?php
/**
 * Created by IntelliJ IDEA.
 * User: omar-
 * Date: 17/04/2017
 * Time: 06:46
 */

namespace App\Http\Controllers;


use App\Events\MessageCreated;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index() {
        return Message::all();
    }

    public function store(Request $request) {
        $message = Message::create(array_merge($request->all(), ['author_id' => \Auth::user()->id]));
        $message->load('author');
        broadcast(new MessageCreated($message))->toOthers();
        return ['status' => 200, 'message' => $message];
    }

}