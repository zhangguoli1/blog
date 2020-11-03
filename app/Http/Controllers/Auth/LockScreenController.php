<?php 

namespace App\Http\Controllers\Auth;



class LockScreenController extends Controller
{
    public function lock()
    {	
    	echo '123';exit;
        if (!Admin::user()) {
            return redirect(config('admin.route.prefix'));
        }

        if (!$url = session()->get(LockScreen::LOCK_KEY)) {
            $url = url()->previous();
            session()->put(LockScreen::LOCK_KEY, $url);
        }

        return view('laravel-admin-lock-screen::lock');
    }

    public function unlock(Request $request)
    {
        if (!Admin::user()) {
            return redirect(config('admin.route.prefix'));
        }

        if (!session()->has(LockScreen::LOCK_KEY)) {
            return redirect(admin_url());
        }

        if (Hash::check(trim($request->get('password')), Admin::user()->password)) {
            $previous = session()->get(LockScreen::LOCK_KEY);

            session()->forget(LockScreen::LOCK_KEY);

            return redirect($previous);
        }

        return back()->withInput()->withException(new \Exception('password incorrect'));
    }
    public function locks(){
    	echo 123;exit;
    }
}