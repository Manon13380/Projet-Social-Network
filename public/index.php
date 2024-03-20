<?php
session_start();
require_once(__DIR__ ."/../Src/Models/Db.php");
require_once(__DIR__ ."/../Src/Models/repositories/UserRepository.php");
require_once(__DIR__ ."/../Src/Models/repositories/PostRepository.php");
require_once(__DIR__ ."/../Src/Models/User.php");
require_once(__DIR__ ."/../Src/Models/Post.php");
require_once(__DIR__ . "/../Src/Controllers/Controller.php");
require_once(__DIR__ ."/../Src/Controllers/LoginController.php");
require_once(__DIR__. "/../Src/Controllers/SubscribeController.php");
require_once(__DIR__. "/../Src/Controllers/HomePageController.php");
require_once(__DIR__ ."/../Core/Router.php");
$app =new Router();
$app->start();



?>