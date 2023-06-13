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
			<h1>Multiple Destination</h1>
		</div>
		<div class="card-body">
			<form action="proses_daftar(Multiple).php" method="POST">	
				<fieldset>
				<div class="row">
					<div class="col">
						<div class="card">
						<div class="card-header">
							<div class="row">
							<div class="col">
								<label for="from">Dari Bandara</label>
								<select name="from" class="form-select" id="fromSelect">
								<?php
								$query = "SELECT * FROM Bandara";
								$result = mysqli_query($db, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['B_ID'] . '</option>';
								}
								?>
								</select>
							</div>
							<div class="col">
								<label for="transit">Ke Bandara</label>
								<select name="transit" class="form-select" id="transitSelect">
								<?php
								$query = "SELECT * FROM Bandara";
								$result = mysqli_query($db, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['B_ID'] . '</option>';
								}
								?>
								</select>
							</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
							<div class="col">
								<label>DepartureTime:</label>
							</div>
							<div class="col">
								<input type="datetime-local" id="departureTime1" name="departureTime1" required>
							</div>
							</div>
							<div class="row">
							<div class="col">
								<label>ArrivalTime:</label>
							</div>
							<div class="col">
								<input type="datetime-local" id="arrivalTime1" name="arrivalTime1" required>
							</div>
							</div>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
						<div class="card-header">
							<div class="row">
							<div class="col">
								<label for="transit">Dari Bandara</label>
								<select name="transit" class="form-select" id="duplicate">
								<?php
								$query = "SELECT * FROM Bandara";
								$result = mysqli_query($db, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['B_ID'] . '</option>';
								}
								?>
								</select>
							</div>
							<div class="col">
								<label for="to">Ke Bandara</label>
								<select name="to" class="form-select" id="toSelect">
								<?php
								$query = "SELECT * FROM Bandara";
								$result = mysqli_query($db, $query);

								while ($row = mysqli_fetch_assoc($result)) {
									echo '<option>' . $row['B_ID'] . '</option>';
								}
								?>
								</select>
							</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
							<div class="col">
								<label>DepartureTime:</label>
							</div>
							<div class="col">
								<input type="datetime-local" id="departureTime2" name="departureTime2" required>
							</div>
							</div>
							<div class="row">
							<div class="col">
								<label>ArrivalTime:</label>
							</div>
							<div class="col">
								<input type="datetime-local" id="arrivalTime2" name="arrivalTime2" required>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>
					<script>
                        const transitSelect1 = document.getElementById('transitSelect');
                        const transitSelect2 = document.getElementById('duplicate');

                        // Add an event listener to the first transit select
                        transitSelect1.addEventListener('change', () => {
                            // Set the selected value of the second transit select to match the first transit select
                            transitSelect2.value = transitSelect1.value;
                        });

                        // Add an event listener to the second transit select
                        transitSelect2.addEventListener('change', () => {
                            // Set the selected value of the first transit select to match the second transit select
                            transitSelect1.value = transitSelect2.value;
                        });
					</script>
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
