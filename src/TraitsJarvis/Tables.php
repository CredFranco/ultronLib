<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Tables
{

    public function tables(string $name, string $status): mixed
    {
        $response = $this->getRequest("tables", [
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
            "status"    =>  true,
            "responde"  =>  "Operações consultadas com sucesso",
            "data"      =>  $response->json()['data']
        ];
    }

}
