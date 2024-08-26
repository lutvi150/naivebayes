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
                    <h3 class="box-title">Data Naive Bayes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <button class="btn btn-success btn-sm" onclick="show_form()"><i class="fa fa-plus"></i> Datasheet</button>
                    <table id="tabel-1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Data</th>
                                <th>Tanggal Hitung</th>
                                <th>Jumlah Sample</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td style="width: 5%;"><?= $key + 1 ?></td>
                                    <td><?= $value->nama_data ?></td>
                                    <td><?= $value->tanggal_hitung ?></td>
                                    <td><?= $value->jumlah_data ?></td>
                                    <td style="width: 20%;">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="delete_data('<?= $value->id_data ?>')"><i class="fa fa-trash"></i> Hapus </button>
                                        <button type="button" onclick="show_form_edit('<?= $value->id_data ?>','<?= $value->nama_data ?>')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit </button>
                                        <a href="<?= base_url("naivebayes/config_data/" . $value->id_data) ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> DataSheet</a>
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

<!-- use for add datasheet -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="add-datasheet" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-sheet">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nama Data</label>
                        <input type="text" name="nama_data" id="nama_data" class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted text-error e-nama_data"></small>
                        <input type="text" hidden id="type">
                    </div>
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
    show_form = () => {
        $("#type").val("add");
        $(".title-sheet").text("Tambah Data");
        $('#add-datasheet').modal('show');
    }
    show_form_edit = (id_data, data_name) => {
        sessionStorage.setItem('id_data', id_data);
        $("#nama_data").val(data_name);
        $("#type").val("edit");
        $(".title-sheet").text("Edit Data");
        $('#add-datasheet').modal('show');
    }
    delete_data = (id_data) => {
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
                    url: url + "naivebayes/delete_data",
                    data: {
                        id_data: id_data
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
        let id_data = sessionStorage.getItem('id_data');
        $.ajax({
            type: "POST",
            url: url + "naivebayes/store_data_name",
            data: {
                nama_data: nama_data,
                type: type,
                id_data: id_data
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
        });
    }
    $(document).ready(function() {
        $("#tabel-1").DataTable()
    });
</script>