<?php

namespace Jarvis\TraitsJarvis;

use Illuminate\Support\Facades\Log;

trait Branches
{

    public function branches(string $name, string $status): mixed
    {
        $response = $this->getRequest("branches", [
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
            "responde"  =>  "Filiais consultadas com sucesso",
            "data"      =>  $response->json()['data']
        ];
    }

}
