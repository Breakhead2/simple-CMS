<?php

function getBooks(){
    return getAssocResult("SELECT * FROM products");
}

function getBook($id){
   return getOneResult("SELECT * FROM products WHERE id = {$id}");
}