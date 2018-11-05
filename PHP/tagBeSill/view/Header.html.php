<?php 
require_once __DIR__ . '/../model/User.php';
?>

<header class="container mb-5">
	<div class="row">
    	<div class="col-sm-3">
    		<img alt="Logo" src="/img/logo.png" class="img-fluid">
    	</div>
    	<div class="col align-self-end">
    		<h1>
    			<strong class="fs-important">
    				<span class="c-red">Tag</span><span class="c-green">Be</span><span class="c-blue">Sill</span>
    			</strong>
    			<span class="fs-05">Project management system</span>
    		</h1>
    	</div>
	</div>
	<hr>
	<nav class="nav nav-lg nav-fill nav-justified" id="navbar">
		<a href="/" class="<?php if ($_SERVER['REQUEST_URI'] == '/'){?>active<?php }?>">Home</a>
		
		<?php if (getCurrentUser() !== null) {?>
		  <a class="nav" href="/logout.php">Logout</a>
		  <a class="nav" href="/createProject.php">Create Project</a>
		<?php } else { ?>
    		<a href="/register.php" class="<?php if ($_SERVER['REQUEST_URI'] == '/register.php'){?>active<?php }?>" >Register</a>
    		<a href="/login.php" class="<?php if ($_SERVER['REQUEST_URI'] == '/login.php'){?>active<?php }?>" >Login</a>
		<?php } ?>
	</nav>
	
</header>
