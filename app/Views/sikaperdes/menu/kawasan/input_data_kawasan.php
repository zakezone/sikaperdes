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
                            <div class="row mb-3">
                                <label for="id_kawasan" class="col-sm-3 col-form-label card-title-desc">Nama Wilayah Kawasan :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_kawasan" data-trigger id="choices-single-default">
                                        <option value="">DAFTAR KAWASAN</option>
                                        <?php foreach ($namakawasan as $nmk) : ?>
                                            <option value="<?= $nmk['id']; ?>" <?= old('id_kawasan') == $nmk['id'] ? 'selected' : ''; ?>><?= $nmk['id'] . ' - ' . $nmk['nm_kawasan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('id_kawasan'); ?></small>
                            </div>
                            <div class="row">
                                <label for="jenisklasifikasi" class="col-sm-3 col-form-label card-title-desc">Jenis Klasifikasi Kawasan :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jenisklasifikasi" data-trigger id="choices-single-default">
                                        <option value="">JENIS KLASIFIKASI</option>
                                        <?php foreach ($jenisklasifikasi as $jk) : ?>
                                            <option value="<?= $jk['jenis_klasifikasi']; ?>" <?= old('jenisklasifikasi') == $jk['jenis_klasifikasi'] ? 'selected' : ''; ?>><?= $jk['id'] . ' - ' . $jk['jenis_klasifikasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('jenisklasifikasi'); ?></small>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="row">
                                <?php if (session()->get('role_id_sikaperdes') == 1) : ?>
                                    <div class="col-lg-3 col-md-3 mb-2">
                                        <label for="filtkabupaten" class="form-label font-size-13 text-muted">Kabupaten</label>
                                        <select class="form-select mb-3" name="filtkabupaten" id="filtkabupaten">
                                            <option value=""></option>
                                            <?php foreach ($listKabupaten as $lkab) : ?>
                                                <option value="<?= $lkab['kd_wilayah']; ?>" <?= old('filtkabupaten') == $lkab['kd_wilayah'] ? 'selected' : ''; ?>><?= $lkab['kd_wilayah'] . ' - ' . $lkab['akses']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= $validation->getError('filtkabupaten'); ?></small>
                                    </div>
                                <?php endif; ?>

                                <div class="col-lg-3 col-md-3 mb-2">
                                    <label for="filtkecamatan" class="form-label font-size-13 text-muted">Kecamatan</label>
                                    <select class="form-select" name="filtkecamatan" id="filtkecamatan">
                                        <option value=""></option>
                                        <?php foreach ($listKecamatan as $lkec) : ?>
                                            <option value="<?= $lkec['kd_wilayah']; ?>" <?= old('filtkecamatan') == $lkec['kd_wilayah'] ? 'selected' : ''; ?>><?= $lkec['kd_wilayah'] . ' - ' . $lkec['akses']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= $validation->getError('filtkecamatan'); ?></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-2">
                                    <label for="filtkeldesa" class="form-label font-size-13 text-muted">Desa</label>
                                    <select class="form-select" name="filtkeldesa" id="filtkeldesa">
                                        <option value=""></option>
                                        <?php foreach ($listKeldesa as $lkdes) : ?>
                                            <option value="<?= $lkdes['kd_wilayah']; ?>" <?= old('filtkeldesa') == $lkdes['kd_wilayah'] ? 'selected' : ''; ?>><?= $lkdes['kd_wilayah'] . ' - ' . $lkdes['akses']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= $validation->getError('filtkeldesa'); ?></small>
                                </div>

                                <div class="col-lg-3 col-md-3 mb-2">
                                    <label for="tahun_pembentukan" class="form-label font-size-13 text-muted">Tahun</label>
                                    <select class="form-select" name="tahun_pembentukan" id="tahun_pembentukan">
                                        <option value=""></option>
                                        <?php for ($tahun_pembentukan = 2016; $tahun_pembentukan <= date('Y'); $tahun_pembentukan++) : ?>
                                            <option value="<?= $tahun_pembentukan; ?>" <?= old('tahun_pembentukan') == $tahun_pembentukan ? 'selected' : ''; ?>><?= $tahun_pembentukan; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= $validation->getError('tahun_pembentukan'); ?></small>
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
                                                    <input type="text" class="form-control" id="sk_lokasi_kawasan" name="sk_lokasi_kawasan" placeholder="Kosongkan jika belum ada" value="<?= old('sk_lokasi_kawasan'); ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>SK TKPKP KAWASAN</p>
                                                <code>
                                                    <input type="text" class="form-control" id="sk_tkpkp_kawasan" name="sk_tkpkp_kawasan" placeholder="Kosongkan jika belum ada" value="<?= old('sk_tkpkp_kawasan'); ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PERBUP RPKP</p>
                                                <code>
                                                    <input type="text" class="form-control" id="perbup_rpkp" name="perbup_rpkp" placeholder="Kosongkan jika belum ada" value="<?= old('perbup_rpkp'); ?>">
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
                                                    <input type="text" class="form-control" id="perda_kab_pembangunan" name="perda_kab_pembangunan" placeholder="Kosongkan jika belum ada" value="<?= old('perda_kab_pembangunan'); ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PERBUP</p>
                                                <code>
                                                    <input type="text" class="form-control" id="perbup_pembangunan" name="perbup_pembangunan" placeholder="Kosongkan jika belum ada" value="<?= old('perbup_pembangunan'); ?>">
                                                </code>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>SK TKPKP KABUPATEN</p>
                                                <code>
                                                    <input type="text" class="form-control" id="sk_tkpkp_kab_pembangunan" name="sk_tkpkp_kab_pembangunan" placeholder="Kosongkan jika belum ada" value="<?= old('sk_tkpkp_kab_pembangunan'); ?>">
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
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan0" name="potensi_kawasan0" placeholder="Wajib diisi" value="<?= old('potensi_kawasan0'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan1" name="potensi_kawasan1" value="<?= old('potensi_kawasan1'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan2" name="potensi_kawasan2" value="<?= old('potensi_kawasan2'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan3" name="potensi_kawasan3" value="<?= old('potensi_kawasan3'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan4" name="potensi_kawasan4" value="<?= old('potensi_kawasan4'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan5" name="potensi_kawasan5" value="<?= old('potensi_kawasan5'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan6" name="potensi_kawasan6" value="<?= old('potensi_kawasan6'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan7" name="potensi_kawasan7" value="<?= old('potensi_kawasan7'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan8" name="potensi_kawasan8" value="<?= old('potensi_kawasan8'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kawasan9" name="potensi_kawasan9" value="<?= old('potensi_kawasan9'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>PRODUK UNGGULAN</p>
                                                <input type="text" class="form-control mb-3" id="produk_unggulan0" name="produk_unggulan0" placeholder="Kosongkan jika belum ada" value="<?= old('produk_unggulan0'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan1" name="produk_unggulan1" value="<?= old('produk_unggulan1'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan2" name="produk_unggulan2" value="<?= old('produk_unggulan2'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan3" name="produk_unggulan3" value="<?= old('produk_unggulan3'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan4" name="produk_unggulan4" value="<?= old('produk_unggulan4'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan5" name="produk_unggulan5" value="<?= old('produk_unggulan5'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan6" name="produk_unggulan6" value="<?= old('produk_unggulan6'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan7" name="produk_unggulan7" value="<?= old('produk_unggulan7'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan8" name="produk_unggulan8" value="<?= old('produk_unggulan8'); ?>">
                                                <input type="text" class="form-control mb-3" id="produk_unggulan9" name="produk_unggulan9" value="<?= old('produk_unggulan9'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="grid-example mt-2 mt-sm-0">
                                                <p>POTENSI KERJASAMA</p>
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama0" name="potensi_kerjasama0" placeholder="Kosongkan jika belum ada" value="<?= old('potensi_kerjasama0'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama1" name="potensi_kerjasama1" value="<?= old('potensi_kerjasama1'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama2" name="potensi_kerjasama2" value="<?= old('potensi_kerjasama2'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama3" name="potensi_kerjasama3" value="<?= old('potensi_kerjasama3'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama4" name="potensi_kerjasama4" value="<?= old('potensi_kerjasama4'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama5" name="potensi_kerjasama5" value="<?= old('potensi_kerjasama5'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama6" name="potensi_kerjasama6" value="<?= old('potensi_kerjasama6'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama7" name="potensi_kerjasama7" value="<?= old('potensi_kerjasama7'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama8" name="potensi_kerjasama8" value="<?= old('potensi_kerjasama8'); ?>">
                                                <input type="text" class="form-control mb-3" id="potensi_kerjasama9" name="potensi_kerjasama9" value="<?= old('potensi_kerjasama9'); ?>">
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
                                                    <img class="img-thumbnail img-preview0">
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <small class="form-text text-danger"><?= $validation->getError('image0'); ?></small>
                                                    <div class="form-group">
                                                        <label for="image0">Gambar 1</label>
                                                        <input type="file" class="form-control mb-3" id="image0" name="image0" accept="image/*" onchange="previewImgUser0()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <img class="img-thumbnail img-preview1">
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image1">Gambar 2</label>
                                                        <input type="file" class="form-control mb-3" id="image1" name="image1" onchange="previewImgUser1()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <img class="img-thumbnail img-preview2">
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image2">Gambar 3</label>
                                                        <input type="file" class="form-control mb-3" id="image2" name="image2" onchange="previewImgUser2()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <img class="img-thumbnail img-preview3">
                                                </div>
                                                <div class="col-sm-9" style="margin: auto;">
                                                    <div class="form-group">
                                                        <label for="image3">Gambar 4</label>
                                                        <input type="file" class="form-control mb-3" id="image3" name="image3" onchange="previewImgUser3()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3" style="margin: auto;">
                                                    <img class="img-thumbnail img-preview4">
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
                                                    <img class="img-thumbnail img-preview5">
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
                                                <textarea name="keterangan" id="keterangan" cols="30" rows="5"></textarea>
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
                    <input type="hidden" class="form-control" id="created" name="created" value="<?= time(); ?>">
                    <button class="btn btn-primary col-lg-3" type="submit" name="submit">Input Data Kawasan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>