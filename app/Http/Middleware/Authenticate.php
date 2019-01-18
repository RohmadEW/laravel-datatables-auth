<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\MasterData\TahunAjaranSemester;
use App\Model\Akun;

class Authenticate extends Middleware {

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request) {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards) {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        $next_request = $next($request);

        if ($request->user()->suspended) {
            $this->auth->logout();
            return redirect()->guest('login')
                            ->withErrors([
                                'email' => 'This account is suspended. Contact administrator for more information.',
            ]);
        }

        return $next_request;
    }

}
