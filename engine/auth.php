<?php

function getUser(){
    return $_SESSION['auth']['login'];
}

function is_admin(){
    return $_SESSION['auth']['login'] == "admin";
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie("user_id", "", time() - 3600, "/");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

function is_auth(){
    if (isset($_COOKIE['user_id']) && !isset($_SESSION['auth']['login'])){
        $user_id = $_COOKIE['user_id'];
        $login = getOneResult("SELECT login FROM users WHERE user_id = '{$user_id}'");
        if (isset($login)){
            $_SESSION['auth']['login'] = $login['login'];

    }
    return isset($_SESSION['auth']['login']);
}

if (isset($_POST['sign_in'])){
    if(($_POST['login']) != "" || ($_POST['password']) != ""){
        $login = $_POST['login'];
        $pass = $_POST['password'];
        if(auth($login,$pass)){
            if (isset($_POST['remember'])){
                $user_id = uniqid(rand(), true);
                $id = (int)$_SESSION['auth']['id'];
                executeSql("UPDATE users SET user_id = '{$user_id}' WHERE id={$id}");
                setcookie("user_id", $user_id, time() + 3600, "/");
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }else{
            $_REQUEST['error'] = "Неверный пароль";
        }
    }else{
        $_REQUEST['error'] = "Форма не заполнена";
    }

}

function auth($login, $pass){
    $db = getDataBase();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $result = getOneResult("SELECT * FROM users WHERE login = '{$login}'");
    if (password_verify($pass, $result['pass'])) {
        $_SESSION['auth']['login'] = $login;
        $_SESSION['auth']['id'] = $result['id'];
       return true;
    }
    return false;
}


if (isset($_POST['sign_up'])){
    if(($_POST['login']) != "" || ($_POST['password']) != ""){
        $login = $_POST['login'];
        $pass = $_POST['password'];
        createUser($login, $pass);
        if(isset($_POST['remember'])){
            $result = getOneResult("SELECT user_id FROM users WHERE login = '{$login}'");
            setcookie("user_id", $result['user_id'], time() + 3600, "/");
        }
        header("Location: /");
    }else{
        $_REQUEST['error'] = "Форма не заполнена";
    }
}

function createUser($login, $pass){
    $user_id = uniqid(rand(), true);
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    executeSql("INSERT INTO users (login, user_id, pass) VALUES ('{$login}','{$user_id}','{$pass}')");
    $_SESSION['auth']['login'] = $login;
}

