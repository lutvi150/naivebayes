<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Data
		<small>Naive Bayes Akurasi</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Tables</a></li>
		<li class="active">Data tables</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header width-birder">
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
								class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i
								class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <div class="alert alert-success" role="alert">
                        <strong>Tingkat Akurasi Naive Bayes Berdasarkan data dan prediksi yang diberikan : <?=$akurasi['persentase']?></strong>
                    </div>
					<div class="col-md-4 text-center">

						<h4>Akurasi Data testing</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="">Prediksi</td>
								<td class="">Siap</td>
								<td class="">Belum</td>
							</tr>
							<tr>
								<td class="">Siap</td>
								<td class="">5</td>
								<td class="">8</td>
							</tr>
							<tr>
								<td class="">Belum</td>
								<td class="">4</td>
								<td class="">0</td>
							</tr>

						</table>
					</div>
					<div class="col-md-4 text-center">

						<h4>Jumlah Hasil</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="">Hasil</td>
								<td class="">Jumlah</td>
								<td class="">Nama</td>
							</tr>
							<tr>
								<td class="">TP</td>
								<td class=""><?=$tp?></td>
								<td class="">Alifa naufalyn,raihan al sabda,aliya
									husna,alfin al gifari,alya farisha</td>
							</tr>
							<tr>
								<td class="">TN</td>
								<td class=""><?=$tn?></td>
								<td class="">Sakinah,rafasha,aliya
									husna,nazril,adelia,marya,zhafira,khaira</td>
							</tr>
							<tr>
								<td class="">FP</td>
								<td class=""><?=$fp?></td>
								<td class="">Faeza,rezaldi,andyra naifa,meisya</td>
							</tr>
							<tr>
								<td class="">FN</td>
								<td class=""><?=$fn?></td>
								<td class=""></td>
							</tr>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
