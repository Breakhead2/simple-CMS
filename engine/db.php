<?php
function getDataBase(){
    static $db = null;
    if (is_null($db)){
        $db = @mysqli_connect(HOST, USER, PASS, DB_NAME);
    }
    return $db;
}

function getAssocResult($sql){
    $result = @mysqli_query(getDataBase(), $sql) or die(mysqli_error(getDataBase()));
    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}

function getOneResult($sql){
    $result = @mysqli_query(getDataBase(), $sql) or die(mysqli_error(getDataBase()));
    return mysqli_fetch_assoc($result);
}

function executeSql($sql){
    @mysqli_query(getDataBase(), $sql) or die(mysqli_error(getDataBase()));
    return mysqli_affected_rows(getDataBase());
}