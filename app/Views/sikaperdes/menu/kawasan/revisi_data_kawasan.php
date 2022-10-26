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
                        </div><!-- end card header -->

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
                                                <code>
                                                    <input type="text" class="form-control" id="sk_lokasi_kawasan" name="sk_lokasi_kawasan" value="<?= $dokumen_sk['sk_lokasi_kawasan']; ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>SK TKPKP KAWASAN</p>
                                                <code>
                                                    <input type="text" class="form-control" id="sk_tkpkp_kawasan" name="sk_tkpkp_kawasan" value="<?= $dokumen_sk['sk_tkpkp_kawasan']; ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PERBUP RPKP</p>
                                                <code>
                                                    <input type="text" class="form-control" id="perbup_rpkp" name="perbup_rpkp" value="<?= $dokumen_sk['perbup_rpkp']; ?>">
                                                </code>
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
                                                <code>
                                                    <input type="text" class="form-control" id="perda_kab_pembangunan" name="perda_kab_pembangunan" value="<?= $dokumen_sk['perda_kab_pembangunan']; ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PERBUP</p>
                                                <code>
                                                    <input type="text" class="form-control" id="perbup_pembangunan" name="perbup_pembangunan" value="<?= $dokumen_sk['perbup_pembangunan']; ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>SK TKPKP KABUPATEN</p>
                                                <code>
                                                    <input type="text" class="form-control" id="sk_tkpkp_kab_pembangunan" name="sk_tkpkp_kab_pembangunan" value="<?= $dokumen_sk['sk_tkpkp_kab_pembangunan']; ?>">
                                                </code>
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
                                <div class="bg-soft-light p-3 text-center">
                                    <div class="row align-items-center" style="min-height: 6rem;">
                                        <div class="col-sm-4">
                                            <div class="grid-example">
                                                <p>POTENSI PRODUK</p>
                                                <small class="form-text text-danger"><?= $validation->getError('potensi_kawasan0'); ?></small>
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan0" name="potensi_kawasan0" value="<?= $potensi_kawasan[0]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan1" name="potensi_kawasan1" value="<?= $potensi_kawasan[1]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan2" name="potensi_kawasan2" value="<?= $potensi_kawasan[2]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan3" name="potensi_kawasan3" value="<?= $potensi_kawasan[3]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan4" name="potensi_kawasan4" value="<?= $potensi_kawasan[4]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan5" name="potensi_kawasan5" value="<?= $potensi_kawasan[5]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan6" name="potensi_kawasan6" value="<?= $potensi_kawasan[6]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan7" name="potensi_kawasan7" value="<?= $potensi_kawasan[7]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan8" name="potensi_kawasan8" value="<?= $potensi_kawasan[8]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan9" name="potensi_kawasan9" value="<?= $potensi_kawasan[9]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PRODUK UNGGULAN</p>
                                                <input type="text" class="form-control mb-3" id="produk_unggulan0" name="produk_unggulan0" placeholder="Kosongkan jika belum ada" value="<?= $produk_unggulan[0]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan1" name="produk_unggulan1" value="<?= $produk_unggulan[1]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan2" name="produk_unggulan2" value="<?= $produk_unggulan[2]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan3" name="produk_unggulan3" value="<?= $produk_unggulan[3]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan4" name="produk_unggulan4" value="<?= $produk_unggulan[4]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan5" name="produk_unggulan5" value="<?= $produk_unggulan[5]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan6" name="produk_unggulan6" value="<?= $produk_unggulan[6]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan7" name="produk_unggulan7" value="<?= $produk_unggulan[7]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan8" name="produk_unggulan8" value="<?= $produk_unggulan[8]; ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan9" name="produk_unggulan9" value="<?= $produk_unggulan[9]; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>POTENSI KERJASAMA</p>
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama0" name="potensi_kerjasama0" placeholder="Kosongkan jika belum ada" value="<?= $potensi_kerjasama_pihak3[0]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama1" name="potensi_kerjasama1" value="<?= $potensi_kerjasama_pihak3[1]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama2" name="potensi_kerjasama2" value="<?= $potensi_kerjasama_pihak3[2]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama3" name="potensi_kerjasama3" value="<?= $potensi_kerjasama_pihak3[3]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama4" name="potensi_kerjasama4" value="<?= $potensi_kerjasama_pihak3[4]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama5" name="potensi_kerjasama5" value="<?= $potensi_kerjasama_pihak3[5]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama6" name="potensi_kerjasama6" value="<?= $potensi_kerjasama_pihak3[6]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama7" name="potensi_kerjasama7" value="<?= $potensi_kerjasama_pihak3[7]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama8" name="potensi_kerjasama8" value="<?= $potensi_kerjasama_pihak3[8]; ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama9" name="potensi_kerjasama9" value="<?= $potensi_kerjasama_pihak3[9]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 class="font-size-13 mb-2">Gambar produk unggulan dan peta delimitasi Kawasan Perdesaan</h5>
                                <div class="bg-soft-light p-3 text-center">
                                    <div class="row align-items-center" style="min-height: 6rem;">
                                        <div class="col-sm-4">
                                            <div class="grid-example">
                                                <p>GAMBAR PRODUK</p>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <img src="<?= base_url('img/uploadfile/produk_unggulan/' . $img_produk_unggulan[0]) ?>" class="img-thumbnail img-preview0">
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <small class="form-text text-danger"><?= $validation->getError('image0'); ?></small>
                                                    <div class="form-group">
                                                        <label for="image0">Gambar 1</label>
                                                        <input type="file" class="form-control mb-3" id="image0" name="image0" accept="image/*" onchange="previewImgUser0()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <?php if ($img_produk_unggulan[1] != '') : ?>
                                                        <img src="<?= base_url('img/uploadfile/produk_unggulan/' . $img_produk_unggulan[1]) ?>" class="img-thumbnail img-preview1">
                                                    <?php else : ?>
                                                        <img class="img-thumbnail img-preview1">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image1">Gambar 2</label>
                                                        <input type="file" class="form-control mb-3" id="image1" name="image1" onchange="previewImgUser1()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <?php if ($img_produk_unggulan[2] != '') : ?>
                                                        <img src="<?= base_url('img/uploadfile/produk_unggulan/' . $img_produk_unggulan[2]) ?>" class="img-thumbnail img-preview2">
                                                    <?php else : ?>
                                                        <img class="img-thumbnail img-preview2">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image2">Gambar 3</label>
                                                        <input type="file" class="form-control mb-3" id="image2" name="image2" onchange="previewImgUser2()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <?php if ($img_produk_unggulan[3] != '') : ?>
                                                        <img src="<?= base_url('img/uploadfile/produk_unggulan/' . $img_produk_unggulan[3]) ?>" class="img-thumbnail img-preview3">
                                                    <?php else : ?>
                                                        <img class="img-thumbnail img-preview3">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image3">Gambar 4</label>
                                                        <input type="file" class="form-control mb-3" id="image3" name="image3" onchange="previewImgUser3()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <?php if ($img_produk_unggulan[4] != '') : ?>
                                                        <img src="<?= base_url('img/uploadfile/produk_unggulan/' . $img_produk_unggulan[4]) ?>" class="img-thumbnail img-preview4">
                                                    <?php else : ?>
                                                        <img class="img-thumbnail img-preview4">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image4">Gambar 5</label>
                                                        <input type="file" class="form-control mb-3" id="image4" name="image4" accept="image/*" onchange="previewImgUser4()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>GAMBAR PETA DELIMITASI</p>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <img src="<?= base_url('img/uploadfile/peta_delimitasi/' . $dokumen['img_peta_delimitasi']) ?>" class="img-thumbnail img-preview5">
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <small class="form-text text-danger"><?= $validation->getError('image5'); ?></small>
                                                    <div class="form-group">
                                                        <label for="image5">Preview</label>
                                                        <input type="file" class="form-control mb-3" id="image5" name="image5" onchange="previewImgUser5()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>KETERANGAN</p>
                                                <textarea name="keterangan" id="keterangan" cols="30" rows="5"><?= $dokumen_sk['keterangan'] != '' ? $dokumen_sk['keterangan'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col-lg-12">
                    <input type="hidden" class="form-control" id="verifikasi" name="verifikasi" value="pending">
                    <input type="hidden" class="form-control" id="tgl_verifikasi" name="tgl_verifikasi" value="0">
                    <button class="btn btn-primary col-lg-3" type="submit" name="submit">Simpan Data Kawasan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>