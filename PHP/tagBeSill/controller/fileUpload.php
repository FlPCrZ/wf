<?php 


function addFile() : bool {
    $config = include __DIR__ . '/../config/config.php';
    
    $errors = []; 
    $fileExtensions = ['jpeg','jpg','png']; 
    
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    
    $s1 = explode('.', $fileName);
    $fileExtension = strtolower(end($s1));
  
    
    if (isset($_FILES)) {
        if (! in_array($fileExtension, $fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            exit();
        }
        
        if ($fileSize > 20000000) {
            $errors[] = "This file is more than 20MB. Sorry, it has to be less than or equal to 2MB";
            exit();
        }

            
        if (empty($errors)) {
            
            $didUpload = move_uploaded_file($_FILES['image']['tmp_name'], $config['public_path'] . 'img\\uploads\\' . basename($fileName));
            
            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
                return true;
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
                return false;
            }
            
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
            return false;
        }
    }
}
