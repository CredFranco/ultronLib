<?php

namespace Jarvis;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Jarvis\TraitsJarvis\Auth;

class JarvisRepository
{
    use Auth;

    protected mixed $url = '';
    protected mixed $ultron_key = '';
    protected array $headers = [];

    public function __construct()
    {
        $this->url = env('MANAGEMENT_URL');
        if(is_null($this->url) || empty($this->url)){
            throw new \Exception("URL do serviço do Jarvis não encontrada.");
        }
    }

    public function postRequest(string $uri, array $body = [], $token = null)
    {
        if(!is_null($token)){
            $this->headers = [
                'Authorization' => "Bearer {$token}"
            ];
        }
        return Http::withHeaders($this->headers)->post("{$this->url}/api/{$uri}", $body);
    }

    public function getRequest(string $uri, $token = null)
    {
        if(!is_null($token)){
            $this->headers = [
                'Authorization' => "Bearer {$token}"
            ];
        }
        return Http::withHeaders($this->headers)->get("{$this->url}/api/{$uri}");
    }
}
