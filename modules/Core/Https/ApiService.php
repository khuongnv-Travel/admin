<?php

namespace Modules\Core\Https;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function callApi($url, $params, $method = 'post')
    {
        $data = Http::$method($url, $params);
        $response = $data->getBody()->getContents();
        $response = json_decode($response, true);
        return $response;
    }
}