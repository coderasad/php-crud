<!doctype html>
<html lang="en">

<head>
	<title>Code Fun</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta content="<?php echo "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/'; ?>" name="url">
	<?php
	require "model/OurModel.php";
	$om = new OurModel();
	?>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<div class="ar-wraper bg-light py-5">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h1> PHP CRUD </h1>
					<h5>Code Fun</h5>
					<div id=alert-msg></div>
				</div>
				<!-- start country form  -->
				<div class="ar-form col-5 offset-2">
					<form class="border my-5 p-3">
						<div class="form-group">
							<label for="countryName">Full Country Name</label>
							<input type="text" name="countryName" class="form-control" placeholder="Enter Country Name">
						</div>
						<div class="form-group">
							<label for="shortName">Short Name</label>
							<input type="text" name="shortName" class="form-control" placeholder="Enter Short Name">
						</div>
						<div class="form-group">
							<label for="code">Country Code</label>
							<input type="text" name="code" class="form-control" placeholder="Enter Country code">
							<input type="hidden" name='id' value="">
						</div>
						<div class="">
							<span id="save" class="btn btn-info">Save</span>
						</div>
					</form>
				</div>
				<!-- start countryArray  -->
				<div class="col-3">
					<?php
					$countryArray = [
						'Bangladesh',
						'Pakistan',
						'India',
						'Srilanka',
						'Nepal',
						'Bhutan',
					];
					?>
					<ul class="list-group my-5">
						<li class="list-group-item active">Country Name</li>
						<?php
						foreach ($countryArray as $data) { ?>
							<li class="list-group-item" data-id="<?php echo $data ?>"><?php echo $data ?></li>
						<?php }
						?>

					</ul>
				</div>
			</div>
			<!-- start view data  -->
			<div class="row">
				<div class="col-8 offset-2">
					<h2 class="text-center">View Data</h2>
					<table class="mb-0 text-center table border view_country">
						<tr>
							<th>Id</th>
							<th>Country Name</th>
							<th>Short Name</th>
							<th>Country Code</th>
						</tr>
						<?php
						$data = $om->view('info', '*');
						$id = 1;
						while ($d = $data->fetch_object()) {
							$cid = $d->id;
							$countryName = $d->countryName;
							$shortName = $d->shortName;
							$code = $d->code; ?>
							<tr class="trData" cid='<?php echo $cid ?>' countryName='<?php echo $countryName ?>' shortName='<?php echo $shortName ?>' code='<?php echo $code ?>'>
								<td><?php echo $id++ ?></td>
								<td><?php echo $countryName ?></td>
								<td><?php echo $shortName ?></td>
								<td><?php echo $code ?></td>
							</tr>

						<?php }
						?>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- model edit form  -->
	

	<div class="modal fade" id="ar-model">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Country Form</h5>
					<button type="button" class="ar-close btn" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="p-3">
						<div class="form-group">
							<label for="country_name">Full Country Name</label>
							<input type="text" name="country_name" class="form-control" placeholder="Enter Country Name">
						</div>
						<div class="form-group">
							<label for="shortName">Short Name</label>
							<input type="text" name="short_name" class="form-control" placeholder="Enter Short Name">
						</div>
						<div class="form-group">
							<label for="code">Country Code</label>
							<input type="text" name="codes" class="form-control" placeholder="Enter Country code">
							<input type="hidden" name='id' value="">
						</div>
					</form>
				</div>
				<div class="modal-footer">					
					<span id="update" class="btn btn-warning">Update</span>
					<span id="delete" class="btn btn-danger">delete</span>
				</div>
			</div>
		</div>
	</div>








	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="assets/js/api.js"></script>
</body>

</html>