<?php

namespace Atlas\Traits\Atlas;

trait Auth
{
    public function auth(string $username, string $password): mixed
    {
        $response = $this->postRequest('auth', [
            'username' => $username,
            'password' => $password,
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
