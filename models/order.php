<?php

function validForm($post){
    foreach ($post as $key => $value){
        if ($value == ''){
            switch ($key){
                case 'name':
                    $key = "Имя";
                    break;
                case 'surname':
                    $key = "Фамилия";
                    break;
                case 'phone':
                    $key = "Телефон";
                    break;
                case 'postcode':
                    $key = "Почтовый индекс";
                    break;
                case 'address':
                    $key = "Адрес";
                    break;
                default:
                    break;
            }
            $_REQUEST['error'] = "Незаполнено поле {$key}";
            return false;
        }
    }
    return true;
}

function createOrder($session, $post){
    $status = "reading";
    $data = mb_substr(date(DATE_RFC822), 0, -6);
    return executeSql("INSERT INTO orders (session_id, name, surname, phone, address, postcode, status, data) VALUES ('{$session}', '{$post['name']}', '{$post['surname']}', '{$post['phone']}', '{$post['address']}', {$post['postcode']}, '{$status}', '{$data}')");
}

function getOrders($user){
    if($user == "admin"){
        return getAssocResult("SELECT * FROM orders");
    }else{
        return getAssocResult("SELECT * FROM orders WHERE user='{$user}'");
    }
}

function changeOrderStatus($id, $status){
    return executeSql("UPDATE orders SET status = '{$status}' WHERE id = '{$id}'");
}

function deleteOrder($id){
    return executeSql("DELETE FROM orders WHERE id={$id} AND status = 'closed'");
}

function translateStatus($response){
    $answer = "";
    switch ($response){
        case 'reading':
            $answer = "Обработка";
            break;
        case 'confirmed':
            $answer = "Подтвержден";
            break;
        case 'delivered':
            $answer = "Доставлен";
            break;
        case 'closed':
            $answer = "Закрыт";
            break;
    }
    return $answer;
}