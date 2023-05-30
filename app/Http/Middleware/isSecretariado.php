<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSecretariado
{
    public function handle(Request $request, Closure $next)
    {
        if (!$this->isSecretariado($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    protected function isSecretariado($request)
    {
        // Write your logic to check if the user us admin.

        // something like
        return $request->user()->tipo_id == 6;
    }
}
