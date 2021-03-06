<?php

namespace Illuminate\Foundation\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
//        if (Auth::check()) {
            if (Auth::user()->role_id == 3 or Auth::user()->role_id == 4) {
//                return redirect(RouteServiceProvider::HOME);
                        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
            }elseif (Auth::user()->role_id == 3 and Auth::user()->is_trainer == 1){
//                return redirect(route('Trainer/dashboard'));
                        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/trainer/dashboard';

            }elseif (Auth::user()->role_id == 1){
//                return redirect(route('dashboard'));
                        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/dashboard';

            }
//        }

//        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
