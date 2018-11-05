<?php 

require_once __DIR__ . '/../model/User.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    # Nickname handling
    if (!isset($_POST['nicknameRegister'])) {
        $errors['nickname'] = ['A nickname must be provided!'];
    }
    
    if (empty($_POST['nicknameRegister'] )) {
        if (!isset($_POST['nicknameRegister'])) {
            $errors['nickname'] = [];
        }
        $errors['nickname'][] = 'Nickname cant be empty!';
    }
    
    # Password handling
    if (!isset($_POST['passwordRegister'])) {
        $errors['passwordRegister'] = ['A password must be provided!'];
    }
    
    if (empty($_POST['passwordRegister'] )) {
        if (!isset($_POST['passwordRegister'])) {
            $errors['passwordRegister'] = [];
        }   
        $errors['passwordRegister'][] = 'Password cant be empty!';
    }
    
    # Password Confirm
        if (!isset($_POST['passwordConfirmRegister'])) {
            $errors['passwordConfirmRegister'] = ['Passwords must match!'];
        }
    
    if($_POST['passwordRegister'] !== $_POST['passwordConfirmRegister']){
        $errors['passwordConfirmRegister'] = ['Passwords must match!'];
    }
    
    if (empty($errors)){
        $success = true;
        createUser($_POST['nicknameRegister'], $_POST['passwordRegister']);
    }
}

include __DIR__ . "/../view/registerPage.html.php";
