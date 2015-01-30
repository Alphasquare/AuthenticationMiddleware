# AuthenticationMiddleware
Authentication Middleware for Slim PHP framework, built for Mxious.

## Installation

    composer require "alphasquare/authmiddleware"

## Usage

Add the middleware.:

    $app->add(new \Auth\AuthMiddleware);
Then pass requests to it using the jeremykendall/query-auth documentation instructions.
This takes care of authenticating all requests.
All requests will be authenticated.
