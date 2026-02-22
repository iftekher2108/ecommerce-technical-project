<?php

namespace Shop\Admin\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;



class Authenticate extends Middleware
{

    protected function unauthenticated($request, array $guards)
    {
        if (in_array('admin', $guards)) {
            throw new AuthenticationException(
                'Unauthenticated.',
                $guards,
                route('auth.login')
            );
        }

        if (in_array('web', $guards)) {
            throw new AuthenticationException(
                'Unauthenticated.',
                $guards,
                route('home.login')
            );
        }

        throw new AuthenticationException(
            'Unauthenticated.',
            $guards,
            route('home.index')
        );
    }
}