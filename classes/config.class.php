<?php

namespace EDSManager\Classes;

class Config {

    protected $values = array();

    public function __construct($file) {

        $MySettings[] = array();

        if ($file == "") $file = CONFIG_FILE;

        if (file_exists($file)) {
            include $file;
            $this->values = $MySettings;
        }

    }

    public function get($key) {
        return isset($this->values[$key]) ? $this->values[$key] : null;
    }
}

