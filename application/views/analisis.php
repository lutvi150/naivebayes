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
                    <h3 class="box-title">Analisis Data Naive Bayes</h3>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="card">
                        <div class="col-md-2">
                            <select name="data" onchange="analisis()" class="form-control col-md-4" id="data">
                                <option value="">Pilih Data</option>
                                <?php foreach ($data as $key => $value) : ?>
                                    <option value="<?= $value->id_data ?>"><?= $value->nama_data ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-12 ">
                            <a href="#" id="training" class="btn btn-success btn-sm" onclick="jenis_data(0)">Data Training</a>
                            <a href="#" id="testing" class="btn btn-warning btn-sm" onclick="jenis_data(1)">Data Testing</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h4>Atribut Kelas</h4>
                        <table class="table text-center table-bordered atribut-kelas">
                            <tr>
                                <td class="head-atribut" colspan="2">Kelas</td>
                            </tr>
                            <tr>
                                <td>Siap</td>
                                <td class="atribut-kelas-siap"></td>
                            </tr>
                            <tr>
                                <td>Belum Siap</td>
                                <td class="atribut-kelas-belum-siap"></td>
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
                                <td class="atribut-jenis-kelamin-siap-laki-laki"></td>
                                <td class="atribut-jenis-kelamin-siap-perempuan"></td>
                            </tr>
                            <tr>
                                <td>Belum Siap</td>
                                <td class="atribut-jenis-kelamin-belum-siap-laki-laki"></td>
                                <td class="atribut-jenis-kelamin-belum-siap-perempuan"></td>
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
                                <td class="atribut-usia-siap-5"></td>
                                <td class="atribut-usia-siap-6"></td>
                            </tr>
                            <tr>
                                <td>Belum Siap</td>
                                <td class="atribut-usia-belum-siap-5"></td>
                                <td class="atribut-usia-belum-siap-6"></td>
                            </tr>
                        </table>
                    </div>
                    <!-- use if jenis == -->
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
                                <td class="atribut-emosional-y-siap"></td>
                                <td class="atribut-emosional-y-belum-siap"></td>
                            </tr>
                            <tr>
                                <td>Tidak</td>
                                <td class="atribut-emosional-t-siap"></td>
                                <td class="atribut-emosional-t-belum-siap"></td>
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
                                <td class="atribut-kognitif-y-siap"></td>
                                <td class="atribut-kognitif-y-belum-siap"></td>
                            </tr>
                            <tr>
                                <td>Tidak</td>
                                <td class="atribut-kognitif-t-siap"></td>
                                <td class="atribut-kognitif-t-belum-siap"></td>
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
                                <td class="atribut-sosial-y-siap"></td>
                                <td class="atribut-sosial-y-belum-siap"></td>
                            </tr>
                            <tr>
                                <td>Tidak</td>
                                <td class="atribut-sosial-t-siap"></td>
                                <td class="atribut-sosial-t-belum-siap"></td>
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
                                <td class="atribut-calistung-y-siap"></td>
                                <td class="atribut-calistung-y-belum-siap"></td>
                            </tr>
                            <tr>
                                <td>Tidak</td>
                                <td class="atribut-calistung-t-siap"></td>
                                <td class="atribut-calistung-t-belum-siap"></td>
                            </tr>
                        </table>
                    </div>
                    <!-- end if -->
                    <div class="col-md-4 text-center">

                        <h4>Probalitas Kelas</h4>
                        <table class="table text-center table-bordered atribut-jenis-kelamin">
                            <tr>
                                <td class="head-atribut" rowspan="3">Probalitas Kelas</td>
                                <td class="head-atribut">Siap</td>
                                <td class="head-atribut">Belum Siap</td>
                            </tr>
                            <tr>
                                <td class="atribut-kelas-siap"></td>
                                <td class="atribut-kelas-belum-siap"></td>
                            </tr>
                            <tr>
                                <td class="probabilitas-kelas-siap"></td>
                                <td class="probabilitas-kelas-belum-siap"></td>
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
</section>

<script>
    $(document).ready(function() {
        document.body.style.zoom = "80%";
        sessionStorage.setItem("jenis_data", 1);
    });
    let url = "<?= base_url() ?>"
    jenis_data = (jenis) => {
        sessionStorage.setItem("jenis_data", jenis);
        if (jenis == 0) {
            $("#training").removeClass('btn-warning').addClass("btn-success");
            $("#testing").removeClass("btn-success").addClass('btn-warning');
        } else {
            $("#testing").removeClass('btn-warning').addClass("btn-success");
            $("#training").removeClass("btn-success").addClass('btn-warning');
        }
        analisis();
    }
    analisis = () => {
        let id_data = $("#data").children("option:selected").val();
        let jenis = sessionStorage.getItem("jenis_data");
        $.ajax({
            type: "POST",
            url: url + "naivebayes/process_analisis",
            data: {
                id_data: id_data,
                jenis: jenis
            },
            dataType: "JSON",
            success: function(response) {
                if (response.status == 'success') {
                    let data = response.analisis.data;
                    // atribut kelas
                    $(".atribut-kelas-siap").text(data.atribut_kelas.siap);
                    $(".atribut-kelas-belum-siap").text(data.atribut_kelas.belum_siap);
                    // atribut jenis kelamin
                    $(".atribut-jenis-kelamin-siap-laki-laki").text(data.atribut_jenis_kelamin.siap.laki_laki);
                    $(".atribut-jenis-kelamin-siap-perempuan").text(data.atribut_jenis_kelamin.siap.perempuan);
                    $(".atribut-jenis-kelamin-belum-siap-laki-laki").text(data.atribut_jenis_kelamin.belum_siap.laki_laki);
                    $(".atribut-jenis-kelamin-belum-siap-perempuan").text(data.atribut_jenis_kelamin.belum_siap.perempuan);
                    // atribut usia
                    $(".atribut-usia-siap-5").text(data.atribut_usia.siap.usia_5);
                    $(".atribut-usia-siap-6").text(data.atribut_usia.siap.usia_6);
                    $(".atribut-usia-belum-siap-5").text(data.atribut_usia.belum_siap.usia_5);
                    $(".atribut-usia-belum-siap-6").text(data.atribut_usia.belum_siap.usia_6);
                    // atribut emosional
                    $(".atribut-emosional-y-siap").text(data.atribut_emosional.y.siap);
                    $(".atribut-emosional-y-belum-siap").text(data.atribut_emosional.y.belum_siap);
                    $(".atribut-emosional-t-siap").text(data.atribut_emosional.t.siap);
                    $(".atribut-emosional-t-belum-siap").text(data.atribut_emosional.t.belum_siap);
                    // atribut kognitif
                    $(".atribut-kognitif-y-siap").text(data.atribut_kognitif.y.siap);
                    $(".atribut-kognitif-y-belum-siap").text(data.atribut_kognitif.y.belum_siap);
                    $(".atribut-kognitif-t-siap").text(data.atribut_kognitif.t.siap);
                    $(".atribut-kognitif-t-belum-siap").text(data.atribut_kognitif.t.belum_siap);
                    // atribut sosial
                    $(".atribut-sosial-y-siap").text(data.atribut_sosial.y.siap);
                    $(".atribut-sosial-y-belum-siap").text(data.atribut_sosial.y.belum_siap);
                    $(".atribut-sosial-t-siap").text(data.atribut_sosial.t.siap);
                    $(".atribut-sosial-t-belum-siap").text(data.atribut_sosial.t.belum_siap);
                    // atribut calistung
                    $(".atribut-calistung-y-siap").text(data.atribut_calistung.y.siap);
                    $(".atribut-calistung-y-belum-siap").text(data.atribut_calistung.y.belum_siap);
                    $(".atribut-calistung-t-siap").text(data.atribut_calistung.t.siap);
                    $(".atribut-calistung-t-belum-siap").text(data.atribut_calistung.t.belum_siap);
                    // probabilitas kelas
                    $(".probabilitas-kelas-siap").text(data.probabilitas_kelas.siap);
                    $(".probabilitas-kelas-belum-siap").text(data.probabilitas_kelas.belum_siap);
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
    };
</script>