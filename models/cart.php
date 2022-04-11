<?php
function insertCart($item_id){
    $session = session_id();
    $quantity = getQuantity($session, $item_id);
    if ($quantity >= 1){
        $quantity++;
        return executeSql("UPDATE cart SET quantity = {$quantity} WHERE cart.session_id = '{$session}' AND cart.id_item = {$item_id}");
    }
    $quantity = 1;
    return executeSql("INSERT INTO cart (id_item, session_id, quantity) VALUES ('$item_id', '$session', '{$quantity}')");
}

function getCart($session){
    return getAssocResult("SELECT cart.id as cart_id, quantity, products.id as product_id, products.price, products.code, cart.quantity  FROM (cart, products) WHERE cart.session_id = '{$session}' AND cart.id_item = products.id");
}

function getSumItems($session){
     return getOneResult("SELECT SUM(products.price * cart.quantity) as sum FROM (cart, products) WHERE cart.session_id = '{$session}' AND cart.id_item = products.id");
}

function getCountCart($session){
    return getOneResult("SELECT SUM(quantity) as counter_items FROM cart WHERE cart.session_id = '{$session}'");
}

function deleteFromCart($item_id, $cart_id){
    $session = session_id();
    $quantity = getQuantity($session, $item_id);
    if ($quantity > 1){
        $quantity--;
        return executeSql("UPDATE cart SET quantity = {$quantity} WHERE cart.session_id = '{$session}' AND cart.id_item = {$item_id}");
    }
    return executeSql("DELETE FROM cart WHERE cart.session_id = '{$session}' AND id = {$cart_id}");
}
function getQuantity($session, $id_item){
    $items = getCart($session);
    foreach ($items as $value) {
        if($id_item == $value['product_id']){
            return $value['quantity'];
        }
    }
    return 0;
}

function checkingCart($session){
    $result = getOneResult("SELECT * FROM cart WHERE session_id = '{$session}'");
    return (is_null($result)) ? false : true;
}
