<?php
session_start();
error_reporting( E_ALL );
require_once "vendor/autoload.php";

use Tracy\Debugger;
define("APP_DIR", __DIR__);
Debugger::$strictMode = TRUE;
Debugger::enable();
Debugger::barDump($_GET, 'Data $_GET');
Debugger::barDump($_POST, 'Data $_POST');
Debugger::barDump($_SESSION, 'Data $_SESSION');

$db = new \DibiConnection(
    (array)json_decode(
        file_get_contents(APP_DIR."/config/mysql.json")
    )
);
$dibiPanel = new \Dibi\Bridges\Tracy\Panel;
$dibiPanel->register($db);
