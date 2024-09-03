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
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header width-birder">
					<h3 class="box-title">Data: <?= $nama_sample->nama_data ?></h3>
					<h3 class="box-title">Performace: <?= $analisis['time_execution'] ?></h3>
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
					<button class="btn btn-success btn-sm" onclick="add_anak()"><i class="fa fa-plus"></i> Tambah Data Anak</button>

					<button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Import Data Anak</button>

					<a type="button" href="<?= base_url('naivebayes/naivebayes') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Kembali</a>
					<!-- <a type="button" hidden href="<?= base_url('naivebayes/naivebayes') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Analisis Data</a> -->

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
							<?php if ($data_anak['status'] == 'data_exist'): ?>
								<?php foreach ($data_anak['result'] as $key => $value): ?>
									<tr>
										<td style="width:1%"><?= $key + 1 ?></td>
										<td>
											<table class="table text-center">
												<tr>
													<td>
														<?php if ($value->foto_anak == "" && $value->jenis_kelamin == 'L') {
															$foto = base_url('assets/icon/a_cowok.jpg');
														} elseif ($value->foto_anak == "" && $value->jenis_kelamin == 'P') {
															$foto = base_url('assets/icon/a_cewek.jpg');
														} else {
															$foto = base_url($value->foto_anak);
														} ?>

														<img class="foto-anak" src="<?= $foto ?>" alt="" srcset="">
													</td>
												</tr>
												<tr>
													<td class="text-center nama-anak"><?= $value->nama_anak ?></td>
												</tr>
												<tr>
													<td> <button class="btn btn-success btn-xs" onclick="ubah_foto(<?= $value->id_anak ?>)">Ubah Foto</button></td>
												</tr>
											</table>
										</td>
										<td><?= $value->jenis_kelamin ?></td>
										<td><?= $value->umur ?></td>
										<td><?= $value->nst ?></td>
										<td>
											Ayah:<?= $value->nama_ayah ?><br>
											Ibu: <?= $value->nama_ibu ?>
										</td>
										<td>
											Ayah:<?= $value->pendidikan_ayah ?><br>
											Ibu: <?= $value->pendidikan_ibu ?>
										</td>
										<td>
											Ayah:<?= $value->pekerjaan_ayah ?><br>
											Ibu: <?= $value->pekerjaan_ibu ?>
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
													<td><?= $value->emosional ?></td>
													<td><?= $value->kognitif ?></td>
													<td><?= $value->sosial ?></td>
													<td><?= $value->calistung ?></td>
												</tr>
												<tr>
													<td colspan="4"><button type="button" onclick="edit_kemampuan('<?= $value->id_anak ?>')" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Kemampuan Anak</button></td>
												</tr>
											</table>
										</td>
										<td><?= $value->keterangan ?></td>
										<td><?= $value->kesiapan ?>%</td>
										<td>
											<button class="btn btn-danger btn-sm" onclick="delete_data(<?= $value->id_anak ?>)"><i class="fa fa-trash"></i></button>
											<button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
											<button class="btn btn-success btn-sm"><i class="fa fa-upload"></i></button>
											<button class="btn btn-success btn-sm" onclick="show_data('<?= $value->id_anak ?><')"><i class="fa fa-eye"></i></button>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Analisis : <?= $nama_sample->nama_data ?></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-4 text-center">
						<h4>Atribut Kelas</h4>
						<table class="table text-center table-bordered atribut-kelas">
							<tr>
								<td class="head-atribut" colspan="2">Kelas</td>
							</tr>
							<tr>
								<td>Siap</td>
								<td><?= $analisis['data_testing']['atribut_kelas']['siap'] ?></td>
							</tr>
							<tr>
								<td>Belum Siap</td>
								<td><?= $analisis['data_testing']['atribut_kelas']['belum_siap'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 text-center">

						<h4>Atribut Jenis Kelamin</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut">Jenis Kelamin</td>
								<td class="head-atribut">Laki-Laki</td>
								<td class="head-atribut">Perempuan</td>
							</tr>
							<tr>
								<td>Siap</td>
								<td><?= $analisis['data_testing']['atribut_jenis_kelamin']['siap']['laki_laki'] ?></td>
								<td><?= $analisis['data_testing']['atribut_jenis_kelamin']['siap']['perempuan'] ?></td>
							</tr>
							<tr>
								<td>Belum Siap</td>
								<td><?= $analisis['data_testing']['atribut_jenis_kelamin']['belum_siap']['laki_laki'] ?></td>
								<td><?= $analisis['data_testing']['atribut_jenis_kelamin']['belum_siap']['perempuan'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 text-center">

						<h4>Atribut Usia</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut">Usia</td>
								<td class="head-atribut">5 tahun</td>
								<td class="head-atribut">6 tahun</td>
							</tr>
							<tr>
								<td>Siap</td>
								<td><?= $analisis['data_testing']['atribut_usia']['siap']['5'] ?></td>
								<td><?= $analisis['data_testing']['atribut_usia']['siap']['6'] ?></td>
							</tr>
							<tr>
								<td>Belum Siap</td>
								<td><?= $analisis['data_testing']['atribut_usia']['belum_siap']['5'] ?></td>
								<td><?= $analisis['data_testing']['atribut_usia']['belum_siap']['6'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3 text-center">

						<h4>Atribut Emosional</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut">Emosional</td>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td>Ya</td>
								<td><?= $analisis['data_testing']['atribut_emosional']['y']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_emosional']['y']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td>Tidak</td>
								<td><?= $analisis['data_testing']['atribut_emosional']['t']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_emosional']['t']['belum_siap'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3 text-center">

						<h4>Atribut Kognitif</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut">Kognitif</td>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td>Ya</td>
								<td><?= $analisis['data_testing']['atribut_kognitif']['y']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_kognitif']['y']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td>Tidak</td>
								<td><?= $analisis['data_testing']['atribut_kognitif']['t']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_kognitif']['t']['belum_siap'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3 text-center">

						<h4>Atribut Sosial</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut">Sosial</td>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td>Ya</td>
								<td><?= $analisis['data_testing']['atribut_sosial']['y']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_sosial']['y']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td>Tidak</td>
								<td><?= $analisis['data_testing']['atribut_sosial']['t']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_sosial']['t']['belum_siap'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3 text-center">

						<h4>Atribut Calistung</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut">Calistung</td>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td>Ya</td>
								<td><?= $analisis['data_testing']['atribut_calistung']['y']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_calistung']['y']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td>Tidak</td>
								<td><?= $analisis['data_testing']['atribut_calistung']['t']['siap'] ?></td>
								<td><?= $analisis['data_testing']['atribut_calistung']['t']['belum_siap'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 text-center">

						<h4>Probalitas Kelas</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>
								<td class="head-atribut" rowspan="3">Probalitas Kelas</td>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['siap'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['belum_siap_count'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 text-center">

						<h4>Nilai P (Ci)</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>

								<td class="head-atribut" colspan="2">Nilai P (Ci)</td>
							</tr>
							<tr>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['siap'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['belum_siap_count'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 text-center">

						<h4>Probalitas Kelas</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">

							<tr>
								<td class="head-atribut"></td>
								<td class="head-atribut"></td>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td rowspan="2">Jenis Kelamin</td>
								<td><?= $analisis['data_testing']['probabilitas_jenis_kelamin']['laki_laki']['jenis_kelamin'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_jenis_kelamin']['laki_laki']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_jenis_kelamin']['laki_laki']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_jenis_kelamin']['laki_laki']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_jenis_kelamin']['laki_laki']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_jenis_kelamin']['perempuan']['jenis_kelamin'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_jenis_kelamin']['perempuan']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_jenis_kelamin']['perempuan']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_jenis_kelamin']['perempuan']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_jenis_kelamin']['perempuan']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td rowspan="2">Usia</td>
								<td><?= $analisis['data_testing']['probabilitas_usia']['5']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_usia']['5']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_usia']['5']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_usia']['5']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_usia']['5']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_usia']['6']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_usia']['6']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_usia']['6']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_usia']['6']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_usia']['6']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td rowspan="2">Emosional</td>
								<td><?= $analisis['data_testing']['probabilitas_emosional']['y']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_emosional']['y']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_emosional']['y']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_emosional']['y']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_emosional']['y']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_emosional']['t']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_emosional']['t']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_emosional']['t']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_emosional']['t']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_emosional']['t']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td rowspan="2">Kognitif</td>
								<td><?= $analisis['data_testing']['probabilitas_kognitif']['y']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kognitif']['y']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_kognitif']['y']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kognitif']['y']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_kognitif']['y']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kognitif']['t']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kognitif']['t']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_kognitif']['t']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kognitif']['t']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_kognitif']['t']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td rowspan="2">Sosial</td>
								<td><?= $analisis['data_testing']['probabilitas_sosial']['y']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_sosial']['y']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_sosial']['y']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_sosial']['y']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_sosial']['y']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_sosial']['t']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_sosial']['t']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_sosial']['t']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_sosial']['t']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_sosial']['t']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td rowspan="2">Calistung</td>
								<td><?= $analisis['data_testing']['probabilitas_calistung']['y']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_calistung']['y']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_calistung']['y']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_calistung']['y']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_calistung']['y']['belum_siap_count'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_calistung']['t']['keterangan'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_calistung']['t']['siap'] ?>=<?= $analisis['data_testing']['probabilitas_calistung']['t']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_calistung']['t']['belum_siap'] ?>=<?= $analisis['data_testing']['probabilitas_calistung']['t']['belum_siap_count'] ?></td>
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
	<div class="row" hidden>
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header text-center">
					<div class="form-group">
						<select name="" class="form-control" id="select-anak" onchange="change_anak()">
							<?php foreach ($data_anak as $key => $value): ?>
								<option value="<?= $value->id_anak ?>"><?= $value->nama_anak ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<h3 class="box-title">Pengujian Dengan Data Murid: <span class="text-primary nama-anak-test">Nama Anak</span></h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-4 text-center">

						<h4>Data Sample Testing</h4>
						<table class="table text-center table-bordered atribut-jenis-kelamin">
							<tr>

								<td class="head-atribut" colspan="2">Nilai P (Ci)</td>
							</tr>
							<tr>
								<td class="head-atribut">Siap</td>
								<td class="head-atribut">Belum Siap</td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['siap'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['belum_siap'] ?></td>
							</tr>
							<tr>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['siap_count'] ?></td>
								<td><?= $analisis['data_testing']['probabilitas_kelas']['belum_siap_count'] ?></td>
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

<!-- use for add datasheet -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="add-anak" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title title-modal">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info" role="alert">
					<strong>Info</strong>
					<p>Kemampuan Anak akan otomatis di buat Y, untuk mengubah melalui table ketika data sudah tampil</p>
				</div>
				<form action="" id="form_data_anak" method="post">
					<div class="form-group">
						<label for="">Nama Anak</label>
						<input type="text" name="nama_anak" id="nama_anak" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted text-error e-nama_anak"></small>
					</div>
					<div class="form-group">
						<label for="">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
						<small id="helpId" class="text-muted text-error e-jenis_kelamin"></small>
					</div>
					<div class="form-group">
						<label for="">Umur</label>
						<input type="number" name="umur" id="umur" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted text-error e-umur"></small>
					</div>
					<div class="form-group">
						<label for="">Nama Ayah</label>
						<input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted text-error e-nama_ayah"></small>
					</div>
					<div class="form-group">
						<label for="">Nama Ibu</label>
						<input type="text" name="nama_ibu" id="nama_ayah" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted text-error e-nama_ibu"></small>
					</div>

					<div class="form-group">
						<label for="">Pendidikan Ayah</label>
						<select name="pendidikan_ayah" class="form-control" id="pendidikan_ayah">
							<?php foreach ($pendidikan as $key => $value): ?>
								<option value="<?= $value ?>"><?= $value ?></option>
							<?php endforeach ?>
						</select>
						<small id="helpId" class="text-muted text-error e-pendidikan_ayah"></small>
					</div>
					<div class="form-group">
						<label for="">Pendidikan Ibu</label>
						<select name="pendidikan_ibu" class="form-control" id="pendidikan_ibu">
							<?php foreach ($pendidikan as $key => $value): ?>
								<option value="<?= $value ?>"><?= $value ?></option>
							<?php endforeach ?>
						</select>
						<small id="helpId" class="text-muted text-error e-pendidikan_ibu"></small>
					</div>
					<div class="form-group">
						<label for="">Pekerjaan Ayah</label>
						<select name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah">
							<?php foreach ($pekerjaan as $key => $value): ?>
								<option value="<?= $value ?>"><?= $value ?></option>
							<?php endforeach ?>
						</select>
						<small id="helpId" class="text-muted text-error e-pekerjaan_ayah"></small>
					</div>
					<div class="form-group">
						<label for="">Pekerjaan Ibu</label>
						<select name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu">
							<?php foreach ($pekerjaan as $key => $value): ?>
								<option value="<?= $value ?>"><?= $value ?></option>
							<?php endforeach ?>
						</select>
						<small id="helpId" class="text-muted text-error e-pekerjaan_ibu"></small>
					</div>
					<div class="form-group">
						<label for="">NST</label>
						<input type="number" name="nst" id="nst" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted text-error e-nst"></small>
					</div>

					<div class="form-group">
						<label for="">Keterangan</label>
						<select name="keterangan" class="form-control" id="keterangan">
							<option value="SIAP">SIAP</option>
							<option value="BELUM">BELUM SIAP</option>
						</select>
						<small id="helpId" class="text-muted text-error e-keterangan"></small>
					</div>
					<input type="text" hidden name="type" id="type">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="store_data()" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- edit kemampuan anak -->
<div class="modal fade" id="modal-kemampuan-anak" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Kemampuan Anak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="form-kemampuan-anak" method="post">
					<div class="form-group">
						<label for="">Emosional</label>
						<select name="emosional" class="form-control" id="emosional">
							<option value="Y">Y</option>
							<option value="T">T</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Kognitif</label>
						<select name="kognitif" class="form-control" id="kognitif">
							<option value="Y">Y</option>
							<option value="T">T</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Sosial</label>
						<select name="sosial" class="form-control" id="sosial">
							<option value="Y">Y</option>
							<option value="T">T</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Calistung</label>
						<select name="calistung" class="form-control" id="calistung">
							<option value="Y">Y</option>
							<option value="T">T</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="update_kemampuan()" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal ubah foto anak -->
<div class="modal fade" id="modal-ubah-foto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Foto Anak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="form-ubah-foto" enctype="multipart/form-data" method="post">
					<div class="text-center">
						<img width="150px" src="<?= base_url('assets/icon/no_image.jpg') ?>" id="output" />
					</div>
					<div class="form-group">
						<label for="">Foto Anak</label>
						<input type="file" name="foto_anak" onchange="loadFile(event)" id="foto_anak" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted text-error e-foto_anak">Foto yang diperbolehkan JPEG,JPG, PNG</small>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="upload_foto()">Save</button>
			</div>
		</div>
	</div>
</div>
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
						<td>Nama</td>
						<td>:</td>
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
				<div class="alert alert-success " role="alert">
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
	add_anak = () => {
		$("#type").val("add");
		$(".title-modal").text("Tambah Anak");
		$('#add-anak').modal('show');
	}
	show_form_edit = (id_data, data_name) => {
		sessionStorage.setItem('id_data', id_data);
		$("#nama_data").val(data_name);
		$("#type").val("edit");
		$(".title-sheet").text("Edit Data");
		$('#add-datasheet').modal('show');
	}
	delete_data = (id) => {
		Swal.fire({
			title: 'Kamu Yakin?',
			text: "Data yang di hapus tidak dapat dikembalikan!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, hapus data!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: url + "naivebayes/delete_anak",
					data: {
						id: id
					},
					dataType: "JSON",
					success: function(response) {
						if (response.status == 'success') {
							Swal.fire({
								icon: 'success',
								title: response.message,
								showConfirmButton: false,
								timer: 1500
							})
							setInterval(() => {
								location.reload();
							}, 1500);
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Something went wrong!',
							})
						}
					},
					error: function() {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Something went wrong!',
						})
					}
				}, )
			} else {
				Swal.fire({
					icon: 'success',
					title: 'Gagal',
					text: 'Data gagal dihapus!',
				})
			}
		})
	}
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
		}
	};
	store_data = () => {
		$(".text-error").text("");
		let nama_data = $('#nama_data').val();
		let type = $('#type').val();
		let id_anak = sessionStorage.getItem('id_anak');
		let id_sample = "<?= $id_data ?>"
		$("#form_data_anak").ajaxForm({
			type: "POST",
			url: url + "naivebayes/store_anak",
			data: {
				type: type,
				id_anak: id_anak,
				id_sample: id_sample,
			},
			dataType: "JSON",
			success: function(response) {
				if (response.status == 'validation_failed') {
					$.each(response.message, function(indexInArray, valueOfElement) {
						$(".e-" + indexInArray).text(valueOfElement);
					});
				} else if (response.status == 'success') {
					Swal.fire({
						icon: 'success',
						title: response.message,
						showConfirmButton: false,
						timer: 1500
					})
					setInterval(() => {
						location.reload();
					}, 1500);
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong!',
					})
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
				})
				console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
			}
		}).submit();
	}
	$(document).ready(function() {
		$("#tabel-1").DataTable()
	});
	edit_kemampuan = (id_anak) => {
		sessionStorage.setItem('id_anak', id_anak);
		$.ajax({
			type: "POST",
			url: url + "naivebayes/get_kemampuan_anak",
			data: {
				id_anak: id_anak
			},
			dataType: "JSON",
			success: function(response) {
				if (response.status == 'success') {
					let yes = `<option selected value="Y">Y</option>
							<option value="T">T</option>`;
					let no = `<option value="Y">Y</option>
							<option selected value="N">N</option>`;
					let emosional = response.data.emosional == 'Y' ? yes : no;
					let kognitif = response.data.kognitif == 'Y' ? yes : no;
					let sosial = response.data.sosial == 'Y' ? yes : no;
					let calistung = response.data.calistung == 'Y' ? yes : no;
					$("#emosional").html(emosional);
					$("#kognitif").html(kognitif);
					$("#sosial").html(sosial);
					$("#calistung").html(calistung);
					$("#modal-kemampuan-anak").modal('show');
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong!',
					})
				}
			}
		});
	}
	update_kemampuan = () => {
		$('#form-kemampuan-anak').ajaxForm({
			type: "POST",
			url: url + "naivebayes/edit_kemampuan_anak",
			data: {
				id_anak: sessionStorage.getItem('id_anak')
			},
			dataType: "JSON",
			success: function(response) {
				Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: response.message,
					showConfirmButton: false,
					timer: 1500
				})
				setInterval(() => {

					location.reload();
				}, 1500);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
				})
			}
		}).submit();
	}
	ubah_foto = (id_anak) => {
		sessionStorage.setItem('id_anak', id_anak);
		$("#modal-ubah-foto").modal('show');
	}
	upload_foto = () => {
		$("#form-ubah-foto").ajaxForm({
			type: "POST",
			url: url + "naivebayes/update_foto_anak",
			data: {
				id_anak: sessionStorage.getItem('id_anak')
			},
			dataType: "JSON",
			success: function(response) {
				Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: response.message,
					showConfirmButton: false,
					timer: 1500
				})
				setInterval(() => {

					location.reload();
				}, 1500);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
				})
			}
		}).submit();
	}

	function change_anak() {
		let id_anak = $('#select-anak').children("option:selected").val();
		let id_sample = "<?= $id_data ?>";
		sessionStorage.setItem('id_anak', id_anak);
		$.ajax({
			type: "POST",
			url: url + "naivebayes/test_for_data",
			data: {
				id_anak: sessionStorage.getItem('id_anak'),
				id_data: id_sample,
			},
			dataType: "JSON",
			success: function(response) {
				if (response.status == 'success') {
					$(".nama-anak-test").text(response.data_anak.nama_anak);
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
				})
			}
		});
	}
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
				$(".rekomendasi").text(`Jadi probabilitas bahwa ${response.data.nama_anak} siap masuk sekolah dasar adalah sekitar 99.4%  .`)
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