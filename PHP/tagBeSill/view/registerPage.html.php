<?php 

$nicknameError = '';
$passwordRegisterError = '';
$passwordRegisterConfirmError = '';
$successMessage = '';

# Nickname error handling
if (!empty($errors['nickname'])) {
    $nicknameError = '<ul class="alert alert-danger" role="alert">';
        foreach($errors['nickname'] as $errorText){
            $nicknameError .= '<li>' . $errorText . '</li>';
    }
    $nicknameError .= '</ul>';
}

# Password error handling
if (!empty($errors['passwordRegister'])) {
    $passwordRegisterError = '<ul class="alert alert-danger" role="alert">';
    foreach($errors['passwordRegister'] as $errorText){
        $passwordRegisterError .= '<li>' . $errorText . '</li>';
    }
    $passwordRegisterError .= '</ul>';
}

# Password Confirm error handling
if (!empty($errors['passwordConfirmRegister'])) {
    $passwordRegisterConfirmError = '<ul class="alert alert-danger" role="alert">';
    foreach($errors['passwordConfirmRegister'] as $errorText){
        $passwordRegisterConfirmError .= '<li>' . $errorText . '</li>';
    }
    $passwordRegisterConfirmError .= '</ul>';
}

$nickname = $_POST['nickname'] ?? '';

if (isset($success) && $success) {
    $success = '<div class="alert alert-success">You successfuly registered!</div>';
} else {
    $success = '';
}

$content = <<<EOT
<form method="POST" id="registerForm">
    $success
    <div class="form-group">
        <label for="nickname">Nickname</label>
        <input type="text" class="form-control" id="nicknameRegister" value="$nickname" aria-describedby="nicknameHelp" placeholder="Enter your nickname here please..." name="nicknameRegister">
        $nicknameError
    </div>
    <div class="form-group">
        <label for="passwordRegister">Password</label>
        <input type="password" class="form-control" id="passwordRegister" placeholder="Enter your Password" here please... name="passwordRegister">
        $passwordRegisterError
    </div>
    <div class="form-group">
        <label for="passwordConfirmRegister">Confirm Password</label>
        <input type="password" class="form-control" id="passwordConfirmRegister" placeholder="Confirm your Password here.." name="passwordConfirmRegister">
        $passwordRegisterConfirmError
    </div>
    <button type="submit" class="btn btn-primary" id="submitRegister" name="submitRegister">Submit</button>
</form>
EOT;
    
$title = 'Tag be sill Register';

include __DIR__ . '/Base.html.php';