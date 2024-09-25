<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Data
		<small>Naive Bayes</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Tables</a></li>
		<li class="active">Data tables</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header width-birder">
				<h3 class="box-title">Hasil Prediksi</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="alert alert-info" role="alert">
					<strong>Infor</strong>
					<p>Kemampuan Anak</p>
					<ul>
						<li>E = Emosional</li>
						<li>K = Kognitif</li>
						<li>S = Sosial</li>
						<li>C = Calistung</li>
					</ul>
					<p>
						Untuk melakukan preview foto anak, silahkan klik foto</p>
				</div>

				<a type="button" href="<?= base_url('naivebayes/data_show/' . $id_data) ?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Kembali</a>

				<table id="tabel-1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width:1%">No.</th>
							<th>Nama Lengkap Anak</th>
							<th style="width:1%">Jenis Kelamin</th>
							<th style="width:1%">Umur</th>
							<th style="width:1 %">Nilai Tes NST</th>
							<th>Orang Tua</th>
							<th>Pendidikan Orang Tua</th>
							<th>Pekerjaan Orang Tua</th>
							<th>Kemampuan Anak</th>
							<th style="width:1%">Ket</th>
							<th style="width: 1%;">Prob Kesiapan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($prediksi as $key => $value): ?>
							<tr>
								<td style="width:1%"><?= $key + 1 ?></td>
								<td>
									<table class="table text-center">
										<tr>
											<td>
												<?php if ($value->data_anak->foto_anak == "" && $value->data_anak->jenis_kelamin == 'L') {
													$foto = base_url('assets/icon/a_cowok.jpg');
												} elseif ($value->data_anak->foto_anak == "" && $value->data_anak->jenis_kelamin == 'P') {
													$foto = base_url('assets/icon/a_cewek.jpg');
												} else {
													$foto = base_url($value->data_anak->foto_anak);
												} ?>

												<img class="foto-anak" src="<?= $foto ?>" alt="" srcset="">
											</td>
										</tr>
										<tr>
											<td class="text-center nama-anak"><?= $value->data_anak->nama_anak ?></td>
										</tr>
									</table>
								</td>
								<td><?= $value->data_anak->jenis_kelamin ?></td>
								<td><?= $value->data_anak->umur ?></td>
								<td><?= $value->data_anak->nst ?></td>
								<td>
									Ayah:<?= $value->data_anak->nama_ayah ?><br>
									Ibu: <?= $value->data_anak->nama_ibu ?>
								</td>
								<td>
									Ayah:<?= $value->data_anak->pendidikan_ayah ?><br>
									Ibu: <?= $value->data_anak->pendidikan_ibu ?>
								</td>
								<td>
									Ayah:<?= $value->data_anak->pekerjaan_ayah ?><br>
									Ibu: <?= $value->data_anak->pekerjaan_ibu ?>
								</td>
								<td>
									<table class="table text-center">
										<tr>
											<td>E</td>
											<td>K</td>
											<td>S</td>
											<td>C</td>
										</tr>
										<tr class="">
											<td><?= $value->data_anak->emosional ?></td>
											<td><?= $value->data_anak->kognitif ?></td>
											<td><?= $value->data_anak->sosial ?></td>
											<td><?= $value->data_anak->calistung ?></td>
										</tr>
									</table>
								</td>
								<td><?= $value->data_anak->keterangan ?></td>
								<?php $pembulatan = (int)$this->session->userdata('hitungan') == null ? 2 : (int)$this->session->userdata('hitungan'); ?>
								<td style="width:20%">
									<table>
										<tr>
											<td>Siap</td>
											<td>:</td>
											<td><?= sprintf('%.' . $pembulatan . 'f', $value->probabilitas['siap']) ?></td>
										</tr>
										<!-- <tr>
											<td>Belum</td>
											<td>:</td>
											<td><?= $value->probabilitas['belum'] ?></td>
										</tr> -->
										<tr>
											<?php $tanda = $value->probabilitas['siap'] > $value->probabilitas['belum'] ? " > " : " < ";
											?>
											<td>Analisa</td>
											<td>:</td>
											<td colspan="3"><?= sprintf('%.' . $pembulatan . 'f', $value->probabilitas['siap']) . $tanda . sprintf('%.' . $pembulatan . 'f', $value->probabilitas['belum']) ?></td>
										</tr>
										<tr>
											<td>Persentase Siap</td>
											<td>:</td>
											<td><?= (round($value->probabilitas['siap'], 4)) * 100  ?>%</button></td>
										</tr>
										<tr>
											<td>Kesimpulan</td>
											<td>:</td>
											<td><button class="btn btn-<?= $value->prediksi == 'SIAP' ? 'success' : 'danger' ?> btn-xs"><?= $value->prediksi ?></button></td>
										</tr>
									</table>
								</td>
								<td>
									<button class="btn btn-success btn-sm" onclick="show_data('<?= $value->data_anak->id_anak ?><')"><i class="fa fa-eye"></i></button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
	</div>
	<!-- /.row -->
</section>

<!-- Modal -->
<div class="modal fade" id="priview-data-anak" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Data Anak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tr>
						<td style="width:40%">Nama</td>
						<td style="width:1%">:</td>
						<td id="nama_anak_view"></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td id="jenis_kelamin_view"></td>
					</tr>
					<tr>
						<td>Umur</td>
						<td>:</td>
						<td id="umur_view"></td>

					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td>:</td>
						<td id="nama_ayah_view"></td>
					</tr>
					<tr>
						<td>Nama Ibu</td>
						<td>:</td>
						<td id="nama_ibu_view"></td>
					</tr>
				</table>
				<br>
				<table class="table table-bordered">
					<tr>
						<td style="width:1%">Emosional</td>
						<td style="width:1%">:</td>
						<td class="emosional_view"></td>
					</tr>
					<tr>
						<td>Kognitif</td>
						<td>:</td>
						<td class="kognitif_view"></td>
					</tr>
					<tr>
						<td>Sosial</td>
						<td>:</td>
						<td class="sosial_view"></td>
					</tr>
					<tr>
						<td>Calistung</td>
						<td>:</td>
						<td class="calistung_view"></td>
					</tr>
				</table>
				<div id="show-alert" class="alert alert-success " role="alert">
					<span class="rekomendasi"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->
<script>
	$(document).ready(function() {
		document.body.style.zoom = "80%";
	});
	let url = "<?= base_url() ?>"

	$(document).ready(function() {
		$("#tabel-1").DataTable()
	});

	show_data = (id_anak) => {
		$.ajax({
			type: "POST",
			url: url + "naivebayes/get_data_anak_spesifik",
			data: {
				id_anak: id_anak
			},
			dataType: "JSON",
			success: function(response) {
				$("#priview-data-anak").modal('show');
				$("#nama_anak_view").text(response.data.nama_anak);
				$("#jenis_kelamin_view").text(response.data.jenis_kelamin);
				$("#umur_view").text(response.data.umur);
				$("#nama_ayah_view").text(response.data.nama_ayah);
				$("#nama_ibu_view").text(response.data.nama_ibu);
				$(".emosional_view").text(response.data.emosional);
				$(".kognitif_view").text(response.data.kognitif);
				$(".sosial_view").text(response.data.sosial);
				$(".calistung_view").text(response.data.calistung);
				let message;
				if (response.analisis == "SIAP") {
					$("#show-alert").removeClass("alert-danger").addClass("alert-success");
					message = `Jadi probabilitas bahwa ${response.data.nama_anak} siap masuk sekolah dasar adalah ${response.siap} %`
				} else {
					$("#show-alert").removeClass("alert-success").addClass("alert-danger");
					message = `Jadi probabilitas bahwa ${response.data.nama_anak} tidak siap masuk sekolah dasar adalah ${response.tidak} %`
				}
				$(".rekomendasi").text(message);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'Check your internet connection!',
					showConfirmButton: false,
					timer: 1500
				})

			}
		});
	}
</script>