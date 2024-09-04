<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Grafik
		<small><?= $jenis ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Tables</a></li>
		<li class="active">Data tables</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row" <?= $jenis == 'jumlah_anak' ? "" : 'hidden' ?>>
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Perbandingan Anak Perempuan dan Laki-laki</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-4"></div>
					<div class="col-md-4">

						<canvas id="jenis_kelamin"></canvas>
					</div>
					<div class="col-md-4"></div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<div class="row" <?= $jenis == 'kesiapan' ? "" : 'hidden' ?>>
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Perbandingan Anak Siap dan Tidak Siap</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-4"></div>
					<div class="col-md-4">

						<canvas id="kesiapan_anak"></canvas>
					</div>
					<div class="col-md-4"></div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<div class="row" <?= $jenis == 'kemampuan' ? "" : 'hidden' ?>>
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Perbandingan Kemampuan Anak</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-4"></div>
					<div class="col-md-4">

						<canvas id="kemampuan"></canvas>
					</div>
					<div class="col-md-4"></div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="<?= base_url() ?>assets/chart.js/dist/chart.js"></script> -->
<script>
	let url = "<?= base_url() ?>";
	$(document).ready(function() {
		get_data();
	});
	get_data = () => {
		$.ajax({
			type: "GET",
			url: url + "grafik/jenis_kelamin",
			dataType: "JSON",
			success: function(response) {

				jenis_kelamin(response.jenis_kelamin);
				grafik_siap(response.kesiapan);
				kemampuan(response.emosional);
			}
		});
	}
	jenis_kelamin = (result) => {
		const ctx = document.getElementById('jenis_kelamin');

		new Chart(ctx, {
			type: 'pie',
			data: {
				labels: result.label,
				datasets: [{
					label: 'Jumlah',
					data: result.data,
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});

	}
	grafik_siap = (result) => {

		const ctx = document.getElementById('kesiapan_anak');
		const data = {
			labels: result.label,
			datasets: [{
				label: 'Data Anak Siap dan Tidak',
				data: result.data,
				backgroundColor: [
					'rgb(255, 99, 132)',
					'rgb(54, 162, 235)',
					'rgb(255, 205, 86)'
				],
				hoverOffset: 4
			}]
		};
		const config = {
			type: 'doughnut',
			data: data,
		};

		new Chart(ctx, config);
	}

	kemampuan = (result) => {
		const ctx = document.getElementById('kemampuan');

		const data = {
			labels: result.label,
			datasets: [{
				label: 'Data Perkembangan Emosional Anak',
				data: result.data,
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 205, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(201, 203, 207, 0.2)'
				],
				borderColor: [
					'rgb(255, 99, 132)',
					'rgb(255, 159, 64)',
					'rgb(255, 205, 86)',
					'rgb(75, 192, 192)',
					'rgb(54, 162, 235)',
					'rgb(153, 102, 255)',
					'rgb(201, 203, 207)'
				],
				borderWidth: 1
			}]
		};
		const config = {
			type: 'bar',
			data: data,
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			},
		};
		new Chart(ctx, config);
	}
</script>
