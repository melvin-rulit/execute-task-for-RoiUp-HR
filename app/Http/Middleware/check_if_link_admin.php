<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class check_if_link_admin
{

    public function handle($request, Closure $next)
    {

        if ($request->link === 'fhuefhreifyegyrfgtweeuyg'){
            return redirect()->route('admin.admin_page');
        }

        return $next($request);
    }
}
