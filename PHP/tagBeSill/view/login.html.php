<?php 

if (isset($success) && $success) {
    $success = '<p class"alert alert-success">You are logged in!</p>';
} else {
    $success = '';
}

if (isset($error) && $error) {
    $error = '<p class"alert alert-danger">Login failed!</p>';
} else {
    $error = '';
}
    
$content = <<<EOT
<form method="POST" id="loginForm">
    $success
    $error
    <div class="form-group">
        <label for="nickname">Nickname</label>
        <input type="text" class="form-control" id="nicknameLogin" aria-describedby="nicknameHelp" placeholder="Enter your nickname here please..." name="nicknameLogin">
    </div>
    <div class="form-group">
        <label for="passwordLogin">Password</label>
        <input type="password" class="form-control" id="passwordLogin" placeholder="Enter your Password here please..." name="passwordLogin">
    </div>
    <button type="submit" class="btn btn-primary" id="submitRegister" name="submitRegister">Submit</button>
</form>
EOT;
    
$title = 'Tag be sill Register';

include __DIR__ . '/Base.html.php';