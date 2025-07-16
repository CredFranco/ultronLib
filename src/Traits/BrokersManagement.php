<?php

namespace Ultron\Traits;

use Ultron\Adapter\FiltersBrokersAdapter;
use Illuminate\Support\Facades\Log;

trait BrokersManagement
{
    public function brokersList(string $type, string $manager = "", array $filter = []): array
    {
        if($type != "admin"){
            $filter['manager'] = $manager;
        }

        $filter = "?" . http_build_query(FiltersBrokersAdapter::adapt($filter));

        $route = "management/broker";

        $response = $this->getRequest($route . $filter);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json()['data'];
    }

}
