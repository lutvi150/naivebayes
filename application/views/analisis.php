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

                <a href="<?= base_url("naivebayes/analisis/1") ?>"
                    class="btn <?= $jenis == 0 ? "btn-success" : "btn-outline-success" ?> btn-sm">Data Training</a>
                <a href="<?= base_url("naivebayes/analisis") ?>"
                    class="btn <?= $jenis == 1 ? "btn-success" : "btn-outline-success" ?> btn-sm">Data Testing</a>
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
                                <td><?= $analisis['data']['atribut_kelas']['siap'] ?></td>
                            </tr>
                            <tr>
                                <td>Belum Siap</td>
                                <td><?= $analisis['data']['atribut_kelas']['belum_siap'] ?></td>
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
                                <td><?= $analisis['data']['atribut_jenis_kelamin']['siap']['laki_laki'] ?></td>
                                <td><?= $analisis['data']['atribut_jenis_kelamin']['siap']['perempuan'] ?></td>
                            </tr>
                            <tr>
                                <td>Belum Siap</td>
                                <td><?= $analisis['data']['atribut_jenis_kelamin']['belum_siap']['laki_laki'] ?></td>
                                <td><?= $analisis['data']['atribut_jenis_kelamin']['belum_siap']['perempuan'] ?></td>
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
                                <td><?= $analisis['data']['atribut_usia']['siap']['5'] ?></td>
                                <td><?= $analisis['data']['atribut_usia']['siap']['6'] ?></td>
                            </tr>
                            <tr>
                                <td>Belum Siap</td>
                                <td><?= $analisis['data']['atribut_usia']['belum_siap']['5'] ?></td>
                                <td><?= $analisis['data']['atribut_usia']['belum_siap']['6'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($jenis == 1) : ?>
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
                                    <td><?= $analisis['data']['atribut_emosional']['y']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_emosional']['y']['belum_siap'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tidak</td>
                                    <td><?= $analisis['data']['atribut_emosional']['t']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_emosional']['t']['belum_siap'] ?></td>
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
                                    <td><?= $analisis['data']['atribut_kognitif']['y']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_kognitif']['y']['belum_siap'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tidak</td>
                                    <td><?= $analisis['data']['atribut_kognitif']['t']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_kognitif']['t']['belum_siap'] ?></td>
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
                                    <td><?= $analisis['data']['atribut_sosial']['y']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_sosial']['y']['belum_siap'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tidak</td>
                                    <td><?= $analisis['data']['atribut_sosial']['t']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_sosial']['t']['belum_siap'] ?></td>
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
                                    <td><?= $analisis['data']['atribut_calistung']['y']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_calistung']['y']['belum_siap'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tidak</td>
                                    <td><?= $analisis['data']['atribut_calistung']['t']['siap'] ?></td>
                                    <td><?= $analisis['data']['atribut_calistung']['t']['belum_siap'] ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-4 text-center">

                        <h4>Probalitas Kelas</h4>
                        <table class="table text-center table-bordered atribut-jenis-kelamin">
                            <tr>
                                <td class="head-atribut" rowspan="3">Probalitas Kelas</td>
                                <td class="head-atribut">Siap</td>
                                <td class="head-atribut">Belum Siap</td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_kelas']['siap'] ?></td>
                                <td><?= $analisis['data']['probabilitas_kelas']['belum_siap'] ?></td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_kelas']['siap_count'] ?></td>
                                <td><?= $analisis['data']['probabilitas_kelas']['belum_siap_count'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4 text-center" hidden>

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
                                <td><?= $analisis['data']['probabilitas_kelas']['siap'] ?></td>
                                <td><?= $analisis['data']['probabilitas_kelas']['belum_siap'] ?></td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_kelas']['siap_count'] ?></td>
                                <td><?= $analisis['data']['probabilitas_kelas']['belum_siap_count'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div hidden class="col-md-4 text-center">

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
                                <td><?= $analisis['data']['probabilitas_jenis_kelamin']['laki_laki']['jenis_kelamin'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_jenis_kelamin']['laki_laki']['siap'] ?>=<?= $analisis['data']['probabilitas_jenis_kelamin']['laki_laki']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_jenis_kelamin']['laki_laki']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_jenis_kelamin']['laki_laki']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_jenis_kelamin']['perempuan']['jenis_kelamin'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_jenis_kelamin']['perempuan']['siap'] ?>=<?= $analisis['data']['probabilitas_jenis_kelamin']['perempuan']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_jenis_kelamin']['perempuan']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_jenis_kelamin']['perempuan']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Usia</td>
                                <td><?= $analisis['data']['probabilitas_usia']['5']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_usia']['5']['siap'] ?>=<?= $analisis['data']['probabilitas_usia']['5']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_usia']['5']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_usia']['5']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_usia']['6']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_usia']['6']['siap'] ?>=<?= $analisis['data']['probabilitas_usia']['6']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_usia']['6']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_usia']['6']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Emosional</td>
                                <td><?= $analisis['data']['probabilitas_emosional']['y']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_emosional']['y']['siap'] ?>=<?= $analisis['data']['probabilitas_emosional']['y']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_emosional']['y']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_emosional']['y']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_emosional']['t']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_emosional']['t']['siap'] ?>=<?= $analisis['data']['probabilitas_emosional']['t']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_emosional']['t']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_emosional']['t']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Kognitif</td>
                                <td><?= $analisis['data']['probabilitas_kognitif']['y']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_kognitif']['y']['siap'] ?>=<?= $analisis['data']['probabilitas_kognitif']['y']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_kognitif']['y']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_kognitif']['y']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_kognitif']['t']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_kognitif']['t']['siap'] ?>=<?= $analisis['data']['probabilitas_kognitif']['t']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_kognitif']['t']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_kognitif']['t']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Sosial</td>
                                <td><?= $analisis['data']['probabilitas_sosial']['y']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_sosial']['y']['siap'] ?>=<?= $analisis['data']['probabilitas_sosial']['y']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_sosial']['y']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_sosial']['y']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_sosial']['t']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_sosial']['t']['siap'] ?>=<?= $analisis['data']['probabilitas_sosial']['t']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_sosial']['t']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_sosial']['t']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">Calistung</td>
                                <td><?= $analisis['data']['probabilitas_calistung']['y']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_calistung']['y']['siap'] ?>=<?= $analisis['data']['probabilitas_calistung']['y']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_calistung']['y']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_calistung']['y']['belum_siap_count'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $analisis['data']['probabilitas_calistung']['t']['keterangan'] ?></td>
                                <td><?= $analisis['data']['probabilitas_calistung']['t']['siap'] ?>=<?= $analisis['data']['probabilitas_calistung']['t']['siap_count'] ?>
                                </td>
                                <td><?= $analisis['data']['probabilitas_calistung']['t']['belum_siap'] ?>=<?= $analisis['data']['probabilitas_calistung']['t']['belum_siap_count'] ?>
                                </td>
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
    });
    let url = "<?= base_url() ?>"
</script>