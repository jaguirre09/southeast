<?php


namespace App\Http\Controllers\Content;


use Oneago\Arcturus\Core\Http\ViewResponse;


/**
 * Class HeaderController
 */
class HeaderController
{
    /**
     * @param string $view Template defined in router
     * @param array|null $customVars Vars defined in router
     * @return string|ViewResponse
     */
    public function index(string $view, ?array $customVars): string|ViewResponse
    {
        $twigVars = [
            "body" => "Example page for basic php Oneago project. Start creating."
        ];

        if ($customVars !== null) {
            $twigVars = array_merge($customVars, $twigVars);
        }
        return template($view, $twigVars);
    }
}