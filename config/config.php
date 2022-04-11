<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/*
Данные админки:
Логин: admin
Пароль: 12345
*/



/*Данные для подключения к базе данных */
define('HOST', 'localhost:3306');
define('USER', 'denis_s');
define('PASS', 'Fib0naccI12358');
define('DB_NAME', 'localhost');

/* Подключение модулей движка */
require "../engine/db.php";
require "../engine/controller.php";
require "../engine/auth.php";
require "../engine/render.php";


/* Подключение остальных модулей */
require "../models/loadToDB.php";
require "../models/products.php";
require "../models/cart.php";
require "../models/order.php";
require "../models/reviews.php";
require "../models/doFeedbackAction.php";
