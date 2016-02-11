<?php

require "vendor/autoload.php";
use League\Csv\Reader;

if (!ini_get("auto_detect_line_endings")) {
    ini_set("auto_detect_line_endings", '1');
}

$csv_file = Reader::createFromPath(__DIR__ .'/weather.csv');

class MakePages{

    public $weather_keys = [];
    public $result = [];

    public function GetKeys($array) {
        $this->weather_keys = $array->fetchOne();
        // return $this->weather_keys;
    }

    public function CreateArray($array) {
        $all = $array->fetchAll();
        $remove_first = array_shift($all);
        foreach ($all as $item) {
            $this->result[] = array_combine($this->weather_keys, $item);
        }
        // return $this->result[0]["country"];
    }

    public function MakePages(){
        foreach ($this->result as $page) {
            $post_data = array(
                'post_title' => $page["name"],
                'post_content' => $page["country"],
                'post_type' => 'page',
                'post_status' => 'publish',
                );

            wp_insert_post($post_data);
        }
    }

}

$new = new MakePages();
$new->GetKeys($csv_file);
$new->CreateArray($csv_file);
// $new->MakePages();

?>