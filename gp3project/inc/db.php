<?php

//Defining username and password
const USERNAME = "root";
const PASSWORD = "root";
const DSN      = "mysql:host=localhost;dbname=productPage";

//Connecting to the database
try {
    $conn = new PDO(DSN, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connected";
}catch (Exception $e){
    echo "Error ". $e->getMessage();
    exit();
}