<?php

function prepareVariables($page){
    $params = [];

    if(is_auth()){
        $params['auth'] = true;
        $params['user'] = getUser();
        $params['admin'] = false;
        if ($params['user'] == "admin"){
            $params['admin'] = true;
        }
    }


    switch ($page) {
        case 'index':
            $params['title'] = "Главная";
            break;

        case 'signup':
            $params['title'] = "Регистрация";
            doFeedbackAction($_REQUEST['action']);
            break;

        case 'products':
            $params['title'] = "Каталог товаров";
            $params['books'] = getBooks();
            doFeedbackAction($_REQUEST['action']);
            break;

        case 'item':
            $id = (int)($_REQUEST['id']);
            $params['book'] = getBook($id);
            $messages['result'] = doFeedbackAction($_REQUEST['action']);
            $messages['messages'] = getReviews($id);
            $messages['action'] = 'add';
            $messages['btn_text'] = 'Отправить';
            $params['reviews'] = $messages;
            break;

        case 'cart':
            $params['title'] = "Корзина";
            if(isset($_GET['session'])){
                $session = $_GET['session'];
            }else{
                $session = session_id();
            }
            $params['cart'] = getCart($session);
            $params['sum'] = getSumItems($session);
            doFeedbackAction($_REQUEST['action']);
            $params['checkCart'] = checkingCart($session);
            break;

        case 'orders':
            $params['title'] = "Список заказов";
            $params['orders']= getOrders($params['user']);
            $params['status'] = translateStatus($params['orders'][0]['status']);
            break;

        case 'api':
            doFeedbackAction($_REQUEST['action']);
            break;

        default:
            die("404");
    }

    return $params;
}

