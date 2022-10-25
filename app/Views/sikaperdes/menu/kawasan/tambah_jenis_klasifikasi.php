<?= $this->include('sikaperdes/layout/user/content-header') ?>
<?= $this->include('sikaperdes/layout/user/content-topbar') ?>
<?= $this->include('sikaperdes/layout/user/content-sidebar') ?>

<div class="page-content" id="content">
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
        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="jenis_klasifikasi" class="col-sm-2 col-form-label">Nama Klasifikasi</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="jenis_klasifikasi" name="jenis_klasifikasi" value="<?= old('jenis_klasifikasi'); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('jenis_klasifikasi'); ?></small>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary mt-4">Tambah Jenis Klasifikasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<?= $this->include('sikaperdes/layout/user/content-footer') ?>