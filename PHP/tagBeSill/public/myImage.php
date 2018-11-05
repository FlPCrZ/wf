<?php 
$errors = '';
$CL = '<script>console.log("<?php var_dump("'.$image.'"); ?>")</script>';
if ($_SERVER['REQUEST_METHOD']== 'POST' ){      
    if (!preg_match('#^image/.+#', $_FILES['image']['type'])) {$errors['type'] = 'No file provided.';}
    else if ($_FILES['image']['size'] > 1000000) {$errors['size'] = 'Your file is too big';} else if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {$errors['size'] = 'There ws an error in the upload!';
              
    } else {
        $image = imagecreatefromstring(file_get_contents($_FILES['image']['tmp_name']));
        $toDisplay = imagescale($image, 300, 300);
        header('Content-Type: image/png');
        image($toDisplay);
        exit;
    }
}?>
<form method='POST' enctype='multipart/form-data'>
    <input type='file' name='image'>
    <input type='submit'>
</form>


<!--
$image = imagecreate(300, 300);
$bgColor = imagecolorallocate($image, 0, 0, 150);
$textColor = imagecolorallocate($image, 255, 255, 255);
imagestring($image, 20, 100, 130, 'Crazy Bastards', $textColor);

$image = imagescale($image, 150 , 150);
$image = imagerotate($image, 45 , 100);
header('Content-type: image/png');
imagepng($image);
-->