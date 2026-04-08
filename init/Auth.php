<?php

require_once "core.php";

class Auth {

        public static function login (object $user) : void{
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user'] = $user ;
        }

        public static function user () : object {
            return $_SESSION['user'];
        }

        public static function is_loggedin (){

            if(isset($_SESSION['user_id'] ) && !empty($_SESSION['user_id'])){
                return true;
            }

            return false;
        }

        
}