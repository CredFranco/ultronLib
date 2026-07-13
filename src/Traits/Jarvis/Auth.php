<?php

namespace Jarvis\Traits\Jarvis;

trait Auth
{
    public function auth(string $username, string $password, string $type_user =''): mixed
    {
        $response = $this->postRequest('login', [
            'login' => $username,
            'senha' => $password,
            'type_user' => $type_user,
        ]);

        if (! $response->successful()) {
            return [
                'status' => false,
                'response' => $response->json()['response'] ?? 'Erro ao realizar login',
            ];
        }

        return [
            'status' => true,
            'responde' => 'Login realizado com sucesso',
            'data' => $response->json()['data'] ?? null,
        ];
    }
}
