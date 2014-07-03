<?php

class PNix
{
    public function __construct()
    {
        $this->init_yii_framework();
    }

    private function init_yii_framework()
    {
	// Ребят, не юзайте ебаные фреймворки.

        require_once('Time.php');

        $yii = root . 'yii_directory';
        $config = root . '/protected/config/main.php';

        require_once($yii);
        Yii::createWebApplication($config)->run();
    }
}

function puts($argument)
{
    CVarDumper::dump($argument, 10, true);
}

function is_not_null($variable)
{
    return !is_null($variable)? true : false;
}

function abort($message)
{
    puts($message);
    die();
}

