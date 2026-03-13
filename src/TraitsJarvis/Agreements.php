<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Agreements
{

    public function agreements(string $name, string $status): mixed
    {
        $response = $this->getRequest("agreements", [
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
            "responde"  =>  "Bancos consultados com sucesso",
            "data"      =>  $response->json()['data']
        ];
    }

}
