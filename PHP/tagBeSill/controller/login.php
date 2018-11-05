<?php 

require_once __DIR__ . '/../model/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

   if (!isset($_POST['nicknameLogin']) || empty($_POST['nicknameLogin']) || !isset($_POST['passwordLogin']) ){
       $error = true;
   }
   
   try {
       $user = findOneUserByNickname($_POST['nicknameLogin']);
   } catch (Exception $e){
       $error = true;;
   }
   
   if ($user && $_POST['passwordLogin'] == $user['password']){
      login($user);
       $success = true;
   } else {
       $error = true;
   }
}

include __DIR__ . "/../view/login.html.php";

