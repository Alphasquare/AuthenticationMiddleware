<?php

namespace Auth;

use QueryAuth\Credentials\Credentials;
use QueryAuth\Factory;
use QueryAuth\Request\Adapter\Incoming\SlimRequestAdapter;

class AuthMiddleware extends \Slim\Middleware
{
    public function call()
    {
        // Get reference to application
        $app = $this->app;

        # Authentication code, decide if to die & return a 401, or a 200 OK.
        $factory = new Factory();
        $requestValidator = $factory->newRequestValidator();
        $credentials = new Credentials('hAlAhUIPDtYIx4MgFcEijGQsukPGydAka3d6jTQ1', 'o9NIFMSbIIp9qMgGMcQOIRHnqYyUgIcKx0gpBTqisG8Ll67n4hTyRDd/Nvk2');

        $request = $app->request;

        # Catch issues in validation.
        try {
            $check = $requestValidator->isValid(new SlimRequestAdapter($request), $credentials);
            if (!$check) {
                http_response_code(401);
                die("HTTP/1.1 401 Unauthorized");       
            }
        } catch (Exception $e) {
            // echo exception, in an json array
            die($utils::api_msg($e->getMessage());
        }

        // Run inner middleware and application
        $this->next->call();
    }
}