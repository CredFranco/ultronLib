<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Auth
{

    public function auth(string $username, string $password): mixed
    {
        $response = $this->postRequest("auth", [
            'username' => $username,
            'password' => $password,
        ]);

        if (!$response->successful()) {
            return [
                "status"    =>  false,
                "responde"  =>  $response->json()['response']
            ];
        }

        return [
            "status"    =>  true,
            "responde"  =>  "Login realizado com sucesso",
            "data"      =>  $response->json()['data']
        ];
    }

}
