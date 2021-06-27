<?php

namespace EDSManager\Classes;

class Config {

    protected $values = array();

    public function __construct($file) {

        $MySettings[] = array();

        if ($file == "") $file = CONFIG_FILE;


        if (file_exists($file)) {

            include_once $file;
            $this->values = $MySettings;
        }

        echo 'test:';
        var_dump($this->values);
    }

    public function get($key) {

     //   var_dump($key);
     //   var_dump($this->values[$key]);

        return isset($this->values[$key]) ? $this->values[$key] : null;
    }
}

