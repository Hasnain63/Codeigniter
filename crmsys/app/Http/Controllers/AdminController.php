<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use PhpParser\Node\Expr\New_;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin/login');
    }
    public function loginsubmit(Request $request)
    {
        $attempt = user::select('*')->where([
            ['id', '=', $request->id],
            ['email', '=', $request->email],
            ['password', '=', $request->password]
        ])->get();
        if (count($attempt) > 0) {
            $secretKey =  User::where('email', session()->get('email'))->pluck('secretKey')->first();
            $request->session()->put('LogData', [$request->input()]);
            $request->session()->put('email',  $request->email);
            $request->session()->put('secretKey',  $secretKey);
            if (is_null($secretKey)) {
                $google2fa = new Google2FA();
                $secretKey = $google2fa->generateSecretKey();
                $qrCodeUrl = $google2fa->getQRCodeUrl(
                    $request->name,
                    $request->email,
                    $secretKey
                );
                return view('admin/2fa')->with(compact(['qrCodeUrl', 'secretKey']));
            }
            return view('admin/2fa')->with(compact(['secretKey']));
        } else {

            return redirect('/');
        }
    }
    public function authentication(Request $request)
    {

        $code = $request->code;
        $secretKey = $request->secretKey;
        $google2fa = new Google2FA();
        $oathTotp = $google2fa->getCurrentOtp($secretKey);

        if ($code == $oathTotp) {

            User::where('email', session()->get('email'))->update(['secretKey' => $secretKey]);
            return redirect('/dashboard');
        }
    }






    public function create()
    {
        return view('admin/create');
    }
    public function createlogin(Request $request)
    {
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('/');
    }
    public function logout()
    {
        Session()->forget('LogData');
        Session()->flush();
        return redirect('/');
    }
}