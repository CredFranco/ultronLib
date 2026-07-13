<?php

namespace Atlas;

use Illuminate\Support\Facades\Http;
use Atlas\Traits\Atlas\Auth;

class AtlasRepository
{
    use Auth;

    protected mixed $url = '';

    // protected string $token = '';

    protected array $headers = [
    ];

    public function __construct()
    {
        $this->url = env('ATLAS_URL');
        if (is_null($this->url) || empty($this->url)) {
            throw new \Exception('URL do serviço do Atlas não encontrada.');
        }

        $this->headers['X-Client-Token'] = env('ATLAS_CLIENT_TOKEN');
        $this->headers['X-Client'] = 'ultron-lib';
    }

    public function postRequest(string $uri, array $body = [], $token = null, bool $jsonDecode = false)
    {
        if (! is_null($token)) {
            $this->headers = [
                'Authorization' => "Bearer {$token}",
            ];
        }
        $response = Http::withHeaders($this->headers)->post("{$this->url}/{$uri}", $body)->throw();
        if ($jsonDecode) {
            return $response->json();
        }

        return $response;

    }

    public function getRequest(string $uri, $token = null, bool $json = true, bool $jsonDecode = false)
    {
        if (! is_null($token)) {
            $this->headers = [
                'Authorization' => "Bearer {$token}",
            ];
        }

        $response = Http::withHeaders($this->headers)->get("{$this->url}/{$uri}")->throw();
        if ($jsonDecode) {
            return $response->json();
        }

        return $response;

    }
}
