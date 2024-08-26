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
                <div class="box-header">
                    <h3 class="box-title">Data: <?= $nama_sample->nama_data ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <button class="btn btn-success btn-sm" onclick="add_anak()"><i class="fa fa-plus"></i> Tambah Data Anak</button>

                    <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Import Data Anak</button>

                    <a type="button" href="<?= base_url('naivebayes/naivebayes') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Kembali</a>
                    <a type="button" href="<?= base_url('naivebayes/naivebayes') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Analisis Data</a>

                    <table id="tabel-1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:5%">No.</th>
                                <th>Nama Lengkap Anak</th>
                                <th style="width:5%">Jenis Kelamin</th>
                                <th style="width:5%">Umur</th>
                                <th style="width:10%">Nilai Tes NST</th>
                                <th>Orang Tua</th>
                                <th>Pendidikan Orang Tua</th>
                                <th>Pekerjaan Orang Tua</th>
                                <th style="width:5%">Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_anak as $key => $value): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value->nama_anak ?></td>
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
                                    <td><?= $value->keterangan ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="delete_data(<?= $value->id_anak ?>)"><i class="fa fa-trash"></i></button>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Analisis : <?= $nama_sample->nama_data ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">

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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-modal">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
<!-- /.content -->
<script>
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
</script>