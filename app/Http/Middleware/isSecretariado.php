<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSecretariado
{
    /**
     * This function checks if the user is authorized as a secretariat and aborts the request if not.
     * 
     * @param request  is an instance of the Request class which represents an HTTP request
     * made to the application. It contains information about the request such as the HTTP method,
     * headers, and parameters.
     * @param next  is a closure that represents the next middleware in the pipeline. It is
     * responsible for passing the request to the next middleware and returning the response generated
     * by the subsequent middleware.
     * 
     * @return the result of calling the `` closure with the `` parameter. This means that
     * if the user is authorized (i.e. isSecretariado returns true), the request will be passed on to
     * the next middleware or controller in the pipeline.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->isSecretariado($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    /**
     * The function checks if the user is a secretary based on their user type ID.
     * 
     * @param request The  parameter is an instance of the Illuminate\Http\Request class, which
     * represents an HTTP request made to the application. It contains information about the request,
     * such as the HTTP method, URL, headers, and any data that was sent with the request. In this
     * case, the function is using the
     * 
     * @return a boolean value indicating whether the user in the request is a "secretariado" or not.
     * The function checks if the "tipo_id" attribute of the user in the request is equal to 6, which
     * is the ID for the "secretariado" user type. If the user is a "secretariado", the function
     * returns true, otherwise it returns false.
     */
    protected function isSecretariado($request)
    {
        // Write your logic to check if the user us admin.

        // something like
        return $request->user()->tipo_id == 6;
    }
}
