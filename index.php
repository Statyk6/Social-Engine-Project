<?php
/**
 * Created by PhpStorm
 * User: Kravets Alexandr
 * Social Engine Project
 * Date: 25.03.2019
 * Time: 14:20
 */
session_start();
header('Content-Type: text/html; charset=utf-8'); // Задал кодировку по умолчанию UTF-8
header("Cache-Control: no-store, no-cache, must-revalidate");
require_once("configs/database.php");

// Объявил суперглобальную переменную $_SERVER
if ($_SERVER['REQUEST_URI'] == '/') { 
    $Page = 'index'; // Если адрес пустой заносим файл index
    $Module = 'index';
} else {
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Парсим адрес страницы
    $URL_Parts = explode('/', trim($URL_Path, '/')); // Если адрес страницы не пустой, то разбиваем на части массив
    $Page = array_shift($URL_Parts); // Переменная $Page это имя страницы
    $Module = array_shift($URL_Parts); // Переменная $Module это имя модуля

    if (!empty($Module)) { // Если модули не пустые, то разбиваем параметры в массив через цикл for
        $Param = array();
        for($i = 0; $i < count($URL_Parts); $i++) {
            $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
        }
    }
}

if($Page == 'index') include ('models/page/index.php'); // Подключаем страницы к файлу Index


function head($title) {
    include("views/web/head.php");
}

function bottom() {
    include("views/web/bottom.php");
}
?>
