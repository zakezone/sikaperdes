<?= $this->include('sie/layout/user/content-header') ?>
<?= $this->include('sie/layout/user/content-topbar') ?>
<?= $this->include('sie/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../img/bg/sitkd/bg-body-dark.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>

        <?php if (substr($rolak['kd_login'], 4)  == "0101") : ?>
            <h4 class="mb-4 text-gray text-center">Daftar user SIPOLAHTA - DISPERMADES Provinsi Jawa Tengah</h4>
        <?php elseif (substr($rolak['kd_login'], 4) == "0201") : ?>
            <h4 class="mb-4 text-gray text-center">Daftar user SIPOLAHTA - DUKCAPIL Provinsi Jawa Tengah</h4>
        <?php endif; ?>

        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="row">

                <div class="col-lg-4 col-md-4 mb-2">
                    <label for="filtkecamatan" class="form-label font-size-13 text-muted">Kecamatan</label>
                    <select class="form-select" name="filtkecamatan" id="filtkecamatan">
                        <option value=""></option>
                        <?php foreach ($listKecamatan as $lkec) : ?>
                            <option value="<?= $lkec['kd_wilayah']; ?>" <?= $filtkecamatan == $lkec['kd_wilayah'] ? 'selected' : ''; ?>><?= $lkec['kd_wilayah'] . ' - ' . $lkec['akses']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-lg-4 col-md-4 mb-2">
                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Kelurahan/Desa</label>
                    <select class="form-select" name="filtkeldesa" id="filtkeldesa">
                        <option value=""></option>
                        <?php foreach ($listKeldesa as $lkdes) : ?>
                            <option value="<?= $lkdes['kd_wilayah']; ?>" <?= $filtkeldesa == $lkdes['kd_wilayah'] ? 'selected' : ''; ?>><?= $lkdes['kd_wilayah'] . ' - ' . $lkdes['akses']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td><input class="btn btn-primary col-md-2" type="submit" name="filter" value="Filter"></input></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <?= session()->getFlashdata('message'); ?>

                <div class="table-responsive mt-4 mb-4">
                    <table class="table align-middle dt-responsive table-check nowrap" id="datatable" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Petugas</th>
                                <th scope="row" style="text-align: center;">KODE LOGIN</th>
                                <th scope="row" style="text-align: center;">OPD</th>
                                <th scope="row" style="text-align: center;">Ampuan</th>
                                <th scope="row" style="text-align: center;">Akses</th>
                                <th scope="row" style="text-align: center;">Role</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->include('sie/layout/user/content-footer') ?>