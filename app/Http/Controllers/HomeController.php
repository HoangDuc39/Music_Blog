<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }
    public function HomeIndex()
    {
        $data = DB::select('select (SELECT COUNT(*) FROM articles ) as table1Count, (SELECT COUNT(*) FROM categories ) as table2Count , (SELECT COUNT(*) FROM auths ) as table3Count , (SELECT COUNT(*) FROM users )as table4Count;');
        return view('admin', compact('data'));
    }
    public function signup()
    {
        return view('signup');
    }


    public function UserStore(Request $request)
    {

    $password = $request->input('password');
    $re_password = $request->input('retypePassword');

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));


    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }
    $user->save();
    return redirect()->route('login');

    }

    public function contact()
    {
        return view('contact');
    }
    public function sendEmail(Request $request)
    {
        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        );
        Mail::to('nghiaduc3901@gmail.com')->send(new MyEmail($data));

        return view('email_success');
    }
}
