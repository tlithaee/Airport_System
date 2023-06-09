<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="asset/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-header mx-auto text-center">
			<h1>Single Destination</h1>
		</div>
		<div class="card-body">
			<form action="proses_daftar(single).php" method="POST">	
				<fieldset>
					<div class="row">
						<div class="col-md-6">
							<label for="from">From: </label>
							<select name="from" class="form-select">
								<?php
								$query = "SELECT * FROM Bandara";
								$result = mysqli_query($db, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['B_ID'] . '</option>';
								}
								?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="to">To: </label>
							<select name="to" class="form-select">
								<?php
								mysqli_data_seek($result, 0);
								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['B_ID'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="date">Tanggal Berangkat: </label>
							<input type="datetime-local" id="departureDateTime" name="departureDateTime" required class="form-control">
						</div>
                        <div class="col">
							<label for="date">Tanggal Sampai: </label>
							<input type="datetime-local" id="ArrivalDateTime" name="ArrivalDateTime" required class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="pesawat">Pesawat: </label>
							<select name="pesawat" class="form-select">
								<?php
								$query = "SELECT * FROM model_pesawat";
								$result = mysqli_query($db, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['Mp_Nama'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="economy_price">Harga Ekonomi: </label>
							<input type="text" name="economy_price" placeholder="Harga Ekonomi" class="form-control" />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="businnes_price">Harga Bisnis: </label>
							<input type="text" name="businnes_price" placeholder="Harga Bisnis" class="form-control" />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="businnes_price">Harga FirstClass: </label>
							<input type="text" name="first_price" placeholder="Harga First" class="form-control" />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input type="submit" value="Tambah Penerbangan" name="daftar" class="btn btn-primary" />
						</div>
					</div>	
				</fieldset>
			</form>
		</div>
	</div>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
