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

					<a type="button" href="<?= base_url('naivebayes/tabel_data') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Kembali</a>
					<a type="button" href="<?= base_url('naivebayes/prediksi/' . $id_data) ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Analisis Data</a>
					<a type="button" href="#" onclick="priview_analisis();" class="btn btn-info btn-sm"><i class="fa fa-wrench"></i> Setting Analisis</a>
					<a href="<?= base_url('naivebayes/data_show/' . $id_data) ?>" class="btn <?= $jenis == 'training' ? 'btn-success' : 'btn-warning' ?> btn-sm"><i class="fa fa-eye"></i> Data Training</a>
					<a href="<?= base_url('naivebayes/data_show/' . $id_data . '/testing') ?>" class="btn <?= $jenis == 'testing' ? 'btn-success' : 'btn-warning' ?> btn-sm"><i class="fa fa-eye"></i> Data Testing</a>

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
								<th>Jenis Data</th>
								<th style="width:1%">Ket</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data_anak['status'] == 'data_exist'): ?>
								<?php foreach ($data_anak['result'] as $key => $value): ?>
									<tr>
										<TD style="width:1%"><?= $key + 1 ?></TD>
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
										<td>
											<select name="" class="form-control" onchange="update_jenis(<?= $value->id_anak ?>)" id="">
												<option <?= $value->jenis_data == 0 ? "selected" : "" ?> value="0">Training</option>
												<option <?= $value->jenis_data == 1 ? "selected" : "" ?> value="1">Testing</option>
											</select>
										</td>
										<td><?= $value->keterangan ?></td>

										<td>
											<button class="btn btn-danger btn-sm" onclick="delete_data(<?= $value->id_anak ?>)"><i class="fa fa-trash"></i></button>
											<button class="btn btn-warning btn-sm" onclick="edit_data(<?= $value->id_anak ?>)"><i class="fa fa-edit"></i></button>
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
						<input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="" aria-describedby="helpId">
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
<!-- Modal -->
<div class="modal fade" id="priview-analisis" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pilih detail hitungan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info" role="alert">
					<strong>Info</strong>
					<ul>
						<li>Rentang perhitungan adalah mulai dari 4 di belakang koma sampai dengan 20 angka di belakang koma</li>
					</ul>
				</div>
				<div class="form-group">
					<label for="">Pembulatan Angkat Hasil Hitung</label><input type="number" class="form-control" name="hitungan" value="<?= $this->session->userdata('hitungan') ?>">
					<small id="helpId" class="text-muted text-error e-hitungan">Rentang angka yang bisa di gunakan adalah 4 sampai dengan 20</small>
				</div>

				<div class="form-group">
					<label for="">Rentang</label><input type="text" value="<?= $this->session->userdata('rentang') ?>" class="form-control" name="rentang">
					<small id="helpId" class="text-muted text-error e-hitungan">Rentang Akurasi</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="store_count_analisis()">Simpan</button>
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
	edit_data = (id_anak) => {
		sessionStorage.setItem('id_anak', id_anak);
		$.ajax({
			type: "POST",
			url: url + "naivebayes/edit_data_anak",
			data: {
				id_anak: id_anak
			},
			dataType: "JSON",
			success: function(response) {
				if (response.status == 'success') {
					$("#type").val("edit");
					$(".title-modal").text("Edit Data Anak");
					let jenis_kelamin;
					if (response.data.jenis_kelamin == 'L') {
						jenis_kelamin = `<option selected value="L">Laki-laki</option><option value="P">Perempuan</option>`
					} else {
						jenis_kelamin = `<option value="L">Laki-laki</option><option selected value="P">Perempuan</option>`
					}
					let keterangan;
					if (response.data.keterangan == 'SIAP') {
						keterangan = `<option selected value="SIAP">SIAP</option><option value="BELUM">BELUM SIAP</option>`
					} else {
						keterangan = `<option value="SIAP">SIAP</option><option selected value="BELUM">BELUM SIAP</option>`
					}
					let pekerjaan_ayah;
					let pekerjaan_ibu;
					$.each(response.pekerjaan, function(indexInArray, valueOfElement) {
						pekerjaan_ayah += `<option ${response.data.pekerjaan_ayah == valueOfElement ? "selected" : "" } value="${valueOfElement}">${valueOfElement}</option>`;
						pekerjaan_ibu += `<option ${response.data.pekerjaan_ibu == valueOfElement ? "selected" : "" } value="${valueOfElement}">${valueOfElement}</option>`;
					});
					let pendidikan_ibu;
					let pendidikan_ayah;
					$.each(response.pendidikan, function(indexInArray, valueOfElement) {
						pendidikan_ibu += `<option ${response.data.pendidikan_ibu == valueOfElement ? "selected" : "" } value="${valueOfElement}">${valueOfElement}</option>`;
						pendidikan_ayah += `<option ${response.data.pendidikan_ayah == valueOfElement ? "selected" : "" } value="${valueOfElement}">${valueOfElement}</option>`;
					});
					$("#nama_anak").val(response.data.nama_anak);
					$("#jenis_kelamin").html(jenis_kelamin);
					$("#umur").val(response.data.umur);
					$("#nama_ayah").val(response.data.nama_ayah);
					$("#nama_ibu").val(response.data.nama_ibu);
					$("#pendidikan_ayah").html(pendidikan_ayah);
					$("#pendidikan_ibu").html(pendidikan_ibu);
					$("#pekerjaan_ayah").html(pekerjaan_ayah);
					$("#pekerjaan_ibu").html(pekerjaan_ibu);
					$("#nst").val(response.data.nst);
					$("#keterangan").html(keterangan);
					$('#add-anak').modal('show');
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
		});
	}
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

	change_anak = () => {
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
	update_jenis = (id_anak) => {
		$.ajax({
			type: "POST",
			url: url + "naivebayes/update_jenis_data",
			data: {
				id_anak: id_anak
			},
			dataType: "JSON",
			success: function(response) {
				console.log(response);

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
	priview_analisis = () => {
		$("#priview-analisis").modal('show');
	}
	store_count_analisis = () => {
		$.ajax({
			type: "POST",
			url: url + "naivebayes/hitungan_analisis",
			data: {
				hitungan: $("[name='hitungan']").val(),
				rentang: $("[name='rentang']").val(),
			},
			dataType: "JSON",
			success: function(response) {
				if (response.status == 'success') {
					$("#priview-analisis").modal('hide');
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: response.message,
						showConfirmButton: false,
						timer: 1500
					});
				}
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