<?php

function doFeedbackAction($action){

    $result = [];

    switch ($action){
        case 'add':
            if($_REQUEST['user'] !== "" ||$_REQUEST['review'] !== "" ){
                $db = getDataBase();
                $id = (int)($_REQUEST['id']);
                $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_REQUEST['user'])));
                $review = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_REQUEST['review'])));
                sendReview($id, $name, $review);
            }
            break;

        case 'delete':
            $idReview = (int)($_REQUEST['id_review']);
            removeReview($idReview);
            break;

        case 'edit':
            $messages['current_id'] = $_REQUEST['id_review'];
            $messages['btn_text'] = 'Изменить';
            $messages['action'] = 'save';
            $idReview = (int)($_REQUEST['id_review']);
            $result = editReview($idReview);
            break;

        case 'save':
            $db = getDataBase();
            $id_review = (int)($_REQUEST['id_review2']);
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_REQUEST['user'])));
            $review = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_REQUEST['review'])));
            updateReview($name, $review, $id_review,);
            break;

        case 'add_to_cart':
            $id_item = $_REQUEST['id_item'];
            insertCart($id_item);
            break;

        case 'delete_from_cart':
            $item_id = (int)$_POST['product_id'];
            $cart_id = (int)$_POST['cart_id'];
            deleteFromCart($item_id, $cart_id);
            header('Location:' . $_SERVER['HTTP_REFERER']);
            die();

        case 'order':
            $session = session_id();
            if(validForm($_POST)){
                createOrder($session, $_POST);
                setcookie("status", "ok", time() +120, "/");
                session_regenerate_id();
            }
            header('Location:' . $_SERVER['HTTP_REFERER']);
            die();

        case 'changeStatus':
            $status = $_GET['status'];
            $id = $_GET['id'];
            changeOrderStatus($id, $status);
            break;

    }
    return $result;
}