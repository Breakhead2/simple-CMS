<?php
function getReviews($id){
    return getAssocResult("SELECT * FROM reviews WHERE id_item={$id} ORDER BY id DESC");
}

function sendReview($id_item, $name, $review){
    return executeSql("INSERT INTO reviews(id_item, user_name, review) VALUES ('{$id_item}','{$name}','{$review}')");
}

function removeReview($id_review){
    return executeSql("DELETE FROM reviews WHERE id = {$id_review}");
}

function editReview($id_review){
    return getOneResult("SELECT * FROM reviews WHERE id = {$id_review}");
}

function updateReview($name, $review, $id_review){
    return executeSql("UPDATE reviews SET user_name = '{$name}', review = '{$review}' WHERE id = {$id_review}");
}