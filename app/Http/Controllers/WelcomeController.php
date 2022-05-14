<?php


namespace App\Http\Controllers;


use Oneago\Arcturus\Core\Http\ViewResponse;


/**
 * Class WelcomeController is a example class, you can delete or use as a model example for your app
 */
class WelcomeController
{
    public function index(string $view, array $customVars = null): ViewResponse
    {
        $twigVars = [
            "body" => "Example page for basic php Oneago project",
            "title" => "Welcome!!"
        ];

        if ($customVars !== null) {
            $twigVars = array_merge($customVars, $twigVars);
        }
        return template($view, $twigVars);
    }
}
