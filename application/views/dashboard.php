<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?= $anak->jumlah_anak ?></h3>

					<p>Jumlah Anak</p>
				</div>
				<div class="icon">
					<i class="ion ion-person"></i>
				</div>
				<a href="<?= base_url('grafik/index/jumlah_anak') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $anak->laki ?></sup></h3>

					<p>Kesiapan</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="<?= base_url('grafik/index/kesiapan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?= $anak->perempuan ?></h3>

					<p>Kemampuan</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="<?= base_url('grafik/index/kemampuan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
		<section class="col-lg-12 connectedSortable">

			<!-- quick email widget -->
			<div class="box box-info">
				<div class="box-header">
					<i class="fa fa-envelope"></i>

					<h3 class="box-title">Informasi</h3>

				</div>
				<div class="box-body">
					<div class="text-center">
						<h1>
							MEMPREDIKSI TINGKAT AKURASI KESIAPAN DAN KEMATANGAN ANAK MASUK SEKOLAH DASAR TK NEGERI PEGASING</h1>
					</div>
					<div class="text-center">
						<img class="logo-app" src="<?= base_url() ?>assets/icon/logo_tk.jpg" alt="" srcset="">
					</div>
				</div>
			</div>

		</section>
		<!-- Left col -->
		<section class="col-lg-6 connectedSortable" hidden>

			<!-- quick email widget -->
			<div class="box box-info">
				<div class="box-header">
					<i class="fa fa-envelope"></i>

					<h3 class="box-title">Perbandingan Anak Perempuan dan Laki-laki</h3>

				</div>
				<div class="box-body">
					<canvas id="myChart"></canvas>
				</div>
			</div>

		</section>
	</div>
	<!-- /.row (main row) -->

</section>
<!-- /.content -->
