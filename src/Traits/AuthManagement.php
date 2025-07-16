<?php

namespace Ultron\Traits;

use Illuminate\Support\Facades\Log;

trait AuthManagement
{
    protected array $possibles = [
            "broker",
            "internal"
    ];

    public function authManagement(string $username, string $password): mixed
    {
        foreach($this->possibles as $value)
        {
            $response = $this->postRequest("management/authenticate/{$value}", [
                'username' => $username,
                'password' => $password,
            ]);

            if ($response->successful()) {
                return [
                    "status"    =>  true,
                    "responde"  =>  "Login realizado com sucesso",
                    "data"      =>  $response->json()['data']
                ];
            }
        }

        return null;
    }

}
