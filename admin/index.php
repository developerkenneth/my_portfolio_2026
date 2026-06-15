<?php
require_once "../init/core.php";
require_once ROOT_PATH."/init/Auth.php";
session_start();
Auth::logout_redirect();

// add page title
$page_title = "Inquiries";
// including all php assets
include_once "assets/php/head.php";
include_once "assets/php/sidebar.php";
include_once "assets/php/header.php";