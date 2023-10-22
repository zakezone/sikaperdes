<?= $this->include('sikaperdes/layout/user/content-header') ?>
<?= $this->include('sikaperdes/layout/user/content-topbar') ?>
<?= $this->include('sikaperdes/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../../../img/bg/sitkd/bg-body-dark.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>
        <?= session()->getFlashdata('bobotmessage'); ?>
        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Wilayah Administrasi Pemerintahan</h4>
                            <p class="card-title-desc">Beberapa wilayah yang tergabung dalam Kawasan <b style="color: red;"><?= $nm_kawasan; ?></b></p>
                            <p class="card-title-desc">Jenis Klasifikasi Kawasan adalah <b style="color: red;"><?= $dokumen['klasifikasi']; ?></b></p>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Kabupaten</th>
                                            <th scope="col" class="text-center">Kecamatan</th>
                                            <th scope="col" class="text-center">Desa</th>
                                            <th scope="col" class="text-center">Tahun Pembentukan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bank_data as $bd) : ?>
                                            <tr>
                                                <td class="text-center"><?= $bd['nm_kab']; ?></td>
                                                <td class="text-center"><?= $bd['nm_kec']; ?></td>
                                                <td class="text-center"><?= $bd['nm_des']; ?></td>
                                                <td class="text-center"><?= $bd['tahun_pembentukan']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Legalitas</h4>
                            <p class="card-title-desc">Dokumen administratif</p>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div>
                                <h5 class="font-size-13 mb-2">Kawasan Perdesaan</h5>
                                <div class="bg-soft-light p-3 text-center">
                                    <div class="row align-items-center" style="min-height: 6rem;">
                                        <div class="col-sm-4">
                                            <div class="grid-example">
                                                <p>SK LOKASI KAWASAN</p>
                                                <p class="font-size-14"><?= $dokumen_sk['sk_lokasi_kawasan']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>SK TKPKP KAWASAN</p>
                                                <p class="font-size-14"><?= $dokumen_sk['sk_tkpkp_kawasan']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PERBUP RPKP</p>
                                                <p class="font-size-14"><?= $dokumen_sk['perbup_rpkp']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 class="font-size-13 mb-2">Pembangunan Kawasan Perdesaan</h5>
                                <div class="bg-soft-light p-3 text-center">
                                    <div class="row align-items-center" style="min-height: 6rem;">
                                        <div class="col-sm-4">
                                            <div class="grid-example">
                                                <p>PERDA KABUPATEN</p>
                                                <p class="font-size-14"><?= $dokumen_sk['perda_kab_pembangunan']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PERBUP</p>
                                                <p class="font-size-14"><?= $dokumen_sk['perbup_pembangunan']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>SK TKPKP KABUPATEN</p>
                                                <p class="font-size-14"><?= $dokumen_sk['sk_tkpkp_kab_pembangunan']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Keunggulan</h4>
                            <p class="card-title-desc">Daftar komponen produk dan potensi kawasan</p>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div>
                                <h5 class="font-size-13 mb-2">Keunggulan Kawasan Perdesaan</h5>
                                <div class="bg-soft-light p-3">
                                    <div class="row align-items-center" style="min-height: 6rem;">
                                        <div class="col-sm-4">
                                            <div class="grid-example">
                                                <p class="text-center">POTENSI PRODUK</p>
                                                <?php $no = 1; ?>
                                                <?php if ($potensi_kawasan != "-") : ?>
                                                    <?php foreach ($potensi_kawasan as $pk) : ?>
                                                        <?php if ($pk != '') : ?>
                                                            <p class="font-size-14"><?= $no++ . '. ' . $pk; ?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p class="font-size-14"><?= $potensi_kawasan; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p class="text-center">PRODUK UNGGULAN</p>
                                                <?php $no = 1; ?>
                                                <?php if ($produk_unggulan != "-") : ?>
                                                    <?php foreach ($produk_unggulan as $pu) : ?>
                                                        <?php if ($pu == '-') : ?>
                                                            <code>
                                                                <center>-</center>
                                                            </code>
                                                        <?php elseif ($pu != '') : ?>
                                                            <p class="font-size-14"><?= $no++ . '. ' . $pu; ?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p class="font-size-14"><?= $produk_unggulan; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p class="text-center">POTENSI KERJASAMA</p>
                                                <?php $no = 1; ?>
                                                <?php if ($potensi_kerjasama_pihak3 != "-") : ?>
                                                    <?php foreach ($potensi_kerjasama_pihak3 as $pks) : ?>
                                                        <?php if ($pks == '-') : ?>
                                                            <code>
                                                                <center>-</center>
                                                            </code>
                                                        <?php elseif ($pks != '') : ?>
                                                            <p class="font-size-14"><?= $no++ . '. ' . $pks; ?></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p class="font-size-14"><?= $potensi_kerjasama_pihak3; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 class="font-size-13 mb-2">Gambar produk unggulan dan peta deliniasi Kawasan Perdesaan</h5>
                                <div class="bg-soft-light p-3 text-center">
                                    <div class="row align-items-center" style="min-height: 6rem;">
                                        <div class="col-sm-4">
                                            <div class="grid-example">
                                                <p>GAMBAR PRODUK</p>
                                                <?php $no = 1; ?>
                                                <?php if ($img_produk_unggulan != "-") : ?>
                                                    <?php foreach ($img_produk_unggulan as $ipu) : ?>
                                                        <?php if ($ipu != '') : ?>
                                                            <p class="font-size-14"><?= $no++ . '. '; ?><img src="/img/uploadfile/produk_unggulan/<?= $ipu; ?>" alt="" width="100"><br></p>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <p class="font-size-14"><?= $img_produk_unggulan; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>GAMBAR PETA DELINIASI</p>
                                                <?php if ($dokumen['img_peta_delimitasi'] == "-") : ?>
                                                    <code>-</code>
                                                <?php else : ?>
                                                    <p class="font-size-14"><img src="/img/uploadfile/peta_delimitasi/<?= $dokumen['img_peta_delimitasi']; ?>" alt="" width="200"></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>KETERANGAN</p>
                                                <?php if ($dokumen['keterangan'] == null) : ?>
                                                    <code>-</code>
                                                <?php else : ?>
                                                    <p class="font-size-14"><?= $dokumen['keterangan']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <dl class="row align-items-center">
            <dd class="col text-center mb-4">
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" name="status" id="status" value="disetujui">
                    <?php if ($dokumen['verifikasi'] == "pending" || $dokumen['verifikasi'] == "revisi") : ?>
                        <button class="btn btn-primary col-lg-6" type="submit" name="submit" id="bobot">Disetujui</button>
                    <?php else : ?>
                        <button disabled class="btn btn-primary col-lg-6" type="submit" name="submit" id="bobot">Disetujui</button>
                    <?php endif; ?>
                </form>
            </dd>
            <dd class="col text-center mb-4">
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" name="status" id="status" value="revisi">
                    <?php if ($dokumen['verifikasi'] == "pending" || $dokumen['verifikasi'] == "revisi") : ?>
                        <button class="btn btn-warning col-lg-6" type="submit" name="submit" id="bobot">Revisi</button>
                    <?php else : ?>
                        <button class="btn btn-warning col-lg-6" type="submit" name="submit" id="bobot">Revisi</button>
                    <?php endif; ?>
                </form>
            </dd>
        </dl>
    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>