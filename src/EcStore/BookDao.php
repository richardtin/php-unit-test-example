<?php

namespace App\EcStore;


class BookDao
{
    public function insert(Order $order)
    {
        // directly depend on some web service
        // $client = new HttpClient();
        // $response = $client->post("http://api.richard.io/order", $order);
        // $response->statusCode();
        throw new Exception('Not implemented');
    }
}