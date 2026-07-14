<?php

namespace Jarvis;

use Illuminate\Support\Facades\Http;
use Jarvis\Traits\Jarvis\Auth;

class JarvisRepository
{
    use Auth;

    protected mixed $url = '';

    // protected string $token = '';

    protected array $headers = [];

    public function __construct()
    {
        $this->url = config('ultron-lib.jarvis.url');
        if (is_null($this->url) || empty($this->url)) {
            throw new \Exception('URL do serviço do Jarvis não encontrada.');
        }
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
