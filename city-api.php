<?php

require "vendor/autoload.php";


$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$api_key = getenv('API_KEY');
$city = get_the_title();
$country = get_post_field('post_content', $post_id);
$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/forecast?q='.$city.','.$country.'&mode=json&units=imperial&appid='.$api_key);

$weather = json_decode($res->getBody(), true);

$weather_list = $weather['list'];


// class ArrangeWeather {

//     public $temp = '';
//     public $maxtemp = '';
//     public $mintemp = '';
//     public $weathers = [];

//     public function MakeList($array) {
//         $this->weathers = $array['list'];
//     }


// }

?>