<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/* The `class isAdmin` is defining a middleware in PHP using the Laravel framework. This middleware
checks if the user making the request is an admin by calling the `isAdmin` method. If the user is
not an admin, the middleware aborts the request with a 401 Unauthorized HTTP response. */
class isAdmin
{
    /**
     * This function checks if the user is an admin and aborts the request if they are not.
     * 
     * @param request  is an instance of the Request class which represents an HTTP request
     * made to the application. It contains information about the request such as the HTTP method,
     * headers, and parameters.
     * @param next  is a closure that represents the next middleware in the pipeline. It is
     * responsible for passing the request to the next middleware and returning the response generated
     * by the next middleware.
     * 
     * @return the result of calling the `` closure with the `` parameter. This means that
     * if the user is an admin, the request will be passed on to the next middleware or controller in
     * the pipeline. If the user is not an admin, the function will abort the request with a 401
     * Unauthorized HTTP response.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->isAdmin($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    /**
     * The function checks if the user is an admin by verifying their user type ID.
     * 
     * @param request  is an object that represents the HTTP request made to the server. It
     * contains information about the request such as the HTTP method, headers, and any data sent in
     * the request body. In this specific function,  is used to access the authenticated user's
     * information to determine if they have admin privileges
     * 
     * @return a boolean value indicating whether the user in the request is an admin or not. The
     * function checks if the `tipo_id` attribute of the user in the request is equal to 1, which is
     * typically used to represent an admin user. If the `tipo_id` is equal to 1, the function returns
     * `true`, indicating that the user is an admin. Otherwise,
     */
    protected function isAdmin($request)
    {
        // Write your logic to check if the user us admin.

        // something like
        return $request->user()->tipo_id == 1;
    }
}
