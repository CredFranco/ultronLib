<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Banks
{

    public function banks(?string $name, $status): mixed
    {
        $response = $this->getRequest("banks", [
            'name' => $name,
            'status' => $status,
        ]);

        if (!$response->successful()) {
            $json = $response->json();

            return [
                "status"   => false,
                "response" => $json['response'] ?? $json['message'] ?? "Erro HTTP {$response->status()}",
                "data"     => $json['data'] ?? []
            ];
        }

        return [
            "status"   => true,
            "response" => "Bancos consultados com sucesso",
            "data"     => $response->json()['data'] ?? []
        ];
    }

}
