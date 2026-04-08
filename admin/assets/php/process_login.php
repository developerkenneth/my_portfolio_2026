<?php

require_once "../init/core.php";
require_once ROOT_PATH."/init/Database.php";
require_once ROOT_PATH."/init/Auth.php";
session_start();

$errors = [];

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $password = trim($_POST['password']);
    $username = trim($_POST['username']);

    if(empty($password) || empty($username)){
        $errors[] = "username and password are required";
    }

    if(empty($errors) === true){


        if(strtolower($username) !== "admin"){
            $errors[] = "invalid password or username";
        }

        if(empty($errors) === true){
            // get hashed password
            $db = new Database;
            $conn = $db->getConnection();
            $sql = "SELECT * FROM `admins` WHERE `username` = ? LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $count = $stmt->rowCount();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if($count < 1){
                $errors[] = "invalid password or username";
            }else{
                $password_hashed = $result->password;
                if(password_verify($password, $password_hashed)){
                    // create a session
                    try{

                        Auth::login($result);
                        // redirect
                        header("Location:index.php?message=login was successful");
                        exit;

                    }catch(\ErrorException $e){
                           $errors[]= $e->getMessage();
                    }

                }else{
                    $errors[] = "invalid password or username";
                }
            }
            
        }
    }
}