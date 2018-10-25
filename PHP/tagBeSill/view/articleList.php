<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tag be sill home page</title>
</head>	
<body>
	<h1>Crazy Bastards</h1>
	<ul style='list-style:none'>
    	<?php 
        	foreach($articles as $article) {
        	    foreach($article as $k=>$v ){
        	        
        	        if (strlen($v[-1]) >= 50) {
        	            echo 'tuncated';
        	            $x = substr($v[-1], 1 ,50) ;
        	            echo "<li style='font-weight:bold'>".$k."</li><li>".$x."</li>";
        	        } else {
        	            echo "<li style='font-weight:bold'>".$k."</li><li>".$v."</li>";
        	        }
        	    }
        	}
    	?>
	</ul>
</body>
</html>