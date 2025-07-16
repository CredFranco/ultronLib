<?php

namespace Ultron;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Ultron\Traits\AuthManagement;
use Ultron\Traits\BrokersManagement;

class UltronRepository
{
    use AuthManagement, BrokersManagement;

    protected mixed $url = '';
    protected mixed $ultron_key = '';

    public function __construct()
    {
        $this->url = env('URL_SERVICE_ULTRON');
        if(is_null($this->url) || empty($this->url)){
            throw new \Exception("URL do serviço do Ultron não encontrada.");
        }
        // $this->ultron_key = config('ultron_key');
        $this->ultron_key = env('ULTRON_KEY');

        if(is_null($this->ultron_key) || empty($this->ultron_key)){
            throw new \Exception("Chave de acesso do Ultron não encontrada");
        }
    }

    public function postRequest(string $uri, array $body = [])
    {
        return Http::withHeaders([
            'application-key' => $this->ultron_key,
        ])->post("{$this->url}/api/{$uri}", $body);
    }

    public function getRequest(string $uri)
    {
        return Http::withHeaders([
            'application-key' => $this->ultron_key,
        ])->get("{$this->url}/api/{$uri}");
    }
}
