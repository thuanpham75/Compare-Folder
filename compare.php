<?php 
spl_autoload_register(function($class_name){
	require './app/'.$class_name.'.php';
});

$dir = null;
$dir1 = null;
$resource = new Resource();
if(isset($_POST['btnCompare'])){
	$dir = $_POST['links'];
	$dir1 = $_POST['links1'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>COMPARE FOLDER</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="js/scripts.js">
</head>
<body>
	<div class="container content">
		<div class="logo">
			<img src="public/images/logo.png" class="img-responsive">
		</div>

		<form action="compare.php" method="POST">
			<div class="form-group">
				<label for="link">Enter link 1:</label>
				<input type="text" class="form-control" id="link" name="links"> 
			</div>
			<div class="form-group">
				<label for="link">Enter link 2:</label>
				<input type="text" class="form-control" id="link" name="links1">
			</div>

			<button id="compare"  type="submit" name="btnCompare" class="btn btn-primary">Compare</button>

		</form>
		<div class="result">
			<h2 id="hidden" class="kq">COMPARE RESULT</h2>
			<span>
				<?php  if(isset($_POST['btnCompare'])){
					if($dir  == $dir1) {
						echo "Two directories are the same";
					}
					else {
						echo "Two different directories";
					}
				}?>
			</span>
		</div>
		<div class="dir">
			<div class="row">
				<div class="col-md-6">
					<div class="address1">
						<h2 id="hidden">Structure link 1 <i class="fa fa-hand-o-down" aria-hidden="true"></i></h2>
							<?php 
							if($dir != null) {
								$resource->dirToArray($dir);
							}
							?>
						

					</div>
					
				</div>	
				<div class="col-md-6">
					<div class="address2">
						<h2 id="hidden">Structure link 2 <i class="fa fa-hand-o-down" aria-hidden="true"></i></h2>
						<div class="dir2">
								<?php 
								if($dir1 != null) {
									$resource->dirToArray($dir1);
								}
								?>
						</div>
					</div>
				</div>	
			</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>


