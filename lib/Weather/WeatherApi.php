<?php


require __DIR__."/../../vendor/autoload.php";


class WeatherApi {

    public $apicall = [];
    public $client;
    public $api_key;

    public function __construct() {

        $dotenv = new Dotenv\Dotenv(__DIR__.'/../..');
        $dotenv->load();
        $this->api_key = getenv('API_KEY');
        $this->client = new GuzzleHttp\Client();

    }

    public function callAPI($country, $city) {

        $result = $this->client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast?q='.$city.','.$country.'&mode=json&units=imperial&appid='.$this->api_key);

        $this->apicall = json_decode($result->getBody(), true);

        return $this->apicall;

    }

    public function ararngeAPI() {



    }

    public function currentDayWeather() {



    }
    
}