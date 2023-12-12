<?php

namespace App\Componets;



use GuzzleHttp\Client;

class ImportDataNewsToDatabase
{
    public $client;

    /**
     * @param $clirnt
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://newsapi.org/v2',
            'tiomeout' => 2.0,
            'verify' => false
        ]);


    }


}
