<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBbsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $comments = Comment::where('authed_flag', '=', true)
            ->orderby('id', 'desc')
            ->limit(3)
            ->get();
        return view('auth.index')->with('comments', $comments);
    }

    public function create(Request $request) {
        Comment::create([
            'body' => $request['body'],
            'user_name' => Auth::user()->name,
            'authed_flag' => true,
            'ip_address' => $request->getClientIp(),
        ]);
        return redirect(route('auth'));
    }
}
