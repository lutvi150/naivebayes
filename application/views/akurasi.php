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
					<div class="card">
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Pilih Data</label>
								<select name="data" onchange="akurasi()" class="form-control col-md-4" id="data">
									<option value="">Pilih Data</option>
									<?php foreach ($data as $key => $value) : ?>
										<option value="<?= $value->id_data ?>"><?= $value->nama_data ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="col-md-12">
							<div class="alert alert-success" role="alert">
								<strong>Tingkat Akurasi Naive Bayes Berdasarkan data dan prediksi yang diberikan : <span id="persentase"></span></strong>
							</div>
						</div>
						<div class="col-md-6 text-center" hidden>

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
						<div class="col-md-6 text-center" hidden>

							<h4>Hasil Hitungan Manual </h4>
							<table class="table text-center table-bordered atribut-jenis-kelamin">
								<tr>
									<td class="">Hasil</td>
									<td class="">Jumlah</td>
									<td class="">Nama</td>
								</tr>
								<tr>
									<td class="">TP</td>
									<td class=""><input type="text" clas="form-control"></td>
									<td class="">Alifa naufalyn,Sakina al sabda,aliya
										husna,alfin al gifari,alya farisha</td>
								</tr>
								<tr>
									<td class="">TN</td>
									<td class=""><input type="text" name="form-control" id=""></td>
									<td class="">Sakinah,rafasha,aliya
										husna,nazril,adelia,marya,zhafira,khaira</td>
								</tr>
								<tr>
									<td class="">FP</td>
									<td class="">0</td>
									<td class="">Faeza,rezaldi,andyra naifa,meisya</td>
								</tr>
								<tr>
									<td class="">FN</td>
									<td class="">0</td>
									<td class="">Aliya</td>
								</tr>
							</table>
						</div>
						<div class="col-md-6 text-center">

							<h4>Jumlah Hasil</h4>
							<table class="table text-center table-bordered atribut-jenis-kelamin">
								<tr>
									<td class="">Hasil</td>
									<td class="">Jumlah</td>
									<td class="">Nama</td>
								</tr>
								<tr>
									<td class="">TP</td>
									<td class="count_tp"></td>
									<td class="tp"></td>
								</tr>
								<tr>
									<td class="">TN</td>
									<td class="count_tn"></td>
									<td class="tn"></td>
								</tr>
								<tr>
									<td class="">FP</td>
									<td class="count_fp"></td>
									<td class="fp"></td>
								</tr>
								<tr>
									<td class="">FN</td>
									<td class="count_fn"></td>
									<td class="fn"></td>
								</tr>
							</table>
						</div>
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
<script>
	let url = "<?= base_url() ?>";
	akurasi = () => {
		$.ajax({
			type: "POST",
			url: url + "naivebayes/process_akurasi",
			data: {
				id_data: $("#data").children("option:selected").val()
			},
			dataType: "JSON",
			success: function(response) {
				$(".count_tp").text(response.count_tp);
				$(".count_tn").text(response.count_tn);
				$(".count_fp").text(response.count_fp);
				$(".count_fn").text(response.count_fn);
				let tp = "";
				for (let index = 0; index < response.tp.length; index++) {
					tp += `${response.tp[index].nama_anak}, `;
				}
				$(".tp").text(tp);
				let tn = "";
				for (let index = 0; index < response.tn.length; index++) {
					tn += `${response.tn[index].nama_anak}, `;
				}
				$(".tn").text(tn);
				let fp = "";
				for (let index = 0; index < response.fp.length; index++) {
					fp += `${response.fp[index].nama_anak}, `;
				}
				$(".fp").text(fp);
				let fn = "";
				for (let index = 0; index < response.fn.length; index++) {
					fn += `${response.fn[index].nama_anak}, `;
				}
				$(".fn").text(fn);
				$("#persentase").text(response.akurasi.persentase + " %");
				console.log(response.akurasi.persentase);

			},
		});
	}
</script>