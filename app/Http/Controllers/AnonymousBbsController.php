<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class AnonymousBbsController extends Controller
{

    public function index() {
        $comments = Comment::where('authed_flag', '=', false)
            ->orderby('id', 'desc')
            ->limit(3)
            ->get();
        return view('anon.index')->with('comments', $comments);
    }

    public function create(Request $request) {
        Comment::create([
            'body' => $request['body'],
            'user_name' => $request['user_name'],
            'authed_flag' => false,
            'ip_address' => $request->getClientIp(),
        ]);

        return redirect(route('anon'));
    }
}
