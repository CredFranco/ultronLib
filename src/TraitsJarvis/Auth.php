<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Auth
{
    protected array $possibles = [
            "broker",
            "internal"
    ];

    public function auth(string $username, string $password): mixed
    {
        $response = $this->postRequest("auth", [
            'username' => $username,
            'password' => $password,
        ]);

        if (!$response->successful()) {
            return [
                "status"    =>  false,
                "responde"  =>  $response->json()['message']
            ];
        }

        return [
            "status"    =>  true,
            "responde"  =>  "Login realizado com sucesso",
            "data"      =>  $response->json()['data']
        ];
    }

}
