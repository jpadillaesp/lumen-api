<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use Closure;
use Auth0\SDK\JWTVerifier;

/**
 * Description of Auth0Middleware
 *
 * @author Root
 */
class Auth0Middleware {

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!$request->hasHeader('Authorization')) {
            return response()->json('Authorization Header not found', 401);
        }

        $token = $request->bearerToken();

        if ($request->header('Authorization') == null || $token == null) {
            return response()->json('No token provided', 401);
        }

        $this->retrieveAndValidateToken($token);

        return $next($request);
    }

    public function retrieveAndValidateToken($token) {
        try {
            $verifier = new JWTVerifier([
                'supported_algs' => ['RS256'],
                'valid_audiences' => ['AUTH0_API_AUDIENCE'],
                'authorized_iss' => ['AUTH0_DOMAIN']
            ]);

            $decoded = $verifier->verifyAndDecode($token);
        } catch (\Auth0\SDK\Exception\CoreException $e) {
            throw $e;
        };
    }

}
