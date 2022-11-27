<?php
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));
define('URL','http://' . $_SERVER['HTTP_HOST'] . URL_ROOT);

date_default_timezone_set("HongKong");

$configs = [
    'path' => [
        'ASSETS' => URL_ROOT.'assets/',
        'FUNCTIONS' => URL_ROOT.'functions/',
        'UPLOADS' => URL_ROOT.'uploads/',
        'VENDORS' => URL_ROOT.'vendors/'
    ],

    // LOCALHOST CONFIG //
    'database' => [
        'DB_HOST' => 'localhost',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => '',
        'DB_NAME' => 'isearch',
        'GOOGLE_URI' => 'http://localhost/isearch.asticom.com.ph/login.php'
    ],

    // DEV SERVER CONFIG //
    // 'database' => [
    //     'DB_HOST' => 'localhost',
    //     'DB_USERNAME' => 'root',
    //     'DB_PASSWORD' => '',
    //     'DB_NAME' => 'isearchdb',
    //     'GOOGLE_URI' => 'https://dev-isearch.agc.com.ph/login.php'
    // ],

    'config' => [
        'APP_NAME' => 'i-Search',
        'APP_VERSION' => '2.0.0',
        'DATE_FORMAT' => 'Y-m-d H:i:s'
    ],

    'developer' => [
        'DEV_NAME' => '',
        'DEV_COMPANY' => 'Asticom Technology Inc.',
        'DEV_URL' => 'https://asticom.com.ph/'
    ]
];

foreach ($configs as $config) {
    foreach ($config as $key => $value) {
        define($key, $value);
    }
}


$date_logs = date("Y-m-d H:i:s");

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set('error_log', 'ERROR_REPORTING.LOG');


?>