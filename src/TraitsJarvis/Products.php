<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Products
{

    public function products(string $name, string $status): mixed
    {
        $response = $this->getRequest("products", [
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
            "responde"  =>  "Produtos consultados com sucesso",
            "data"      =>  $response->json()['data']
        ];
    }

}
