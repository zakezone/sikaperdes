<?= $this->include('sikaperdes/layout/user/content-header') ?>
<?= $this->include('sikaperdes/layout/user/content-topbar') ?>
<?= $this->include('sikaperdes/layout/user/content-sidebar') ?>

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
        <div class="row">
            <div class="col-12">
                <div class="col-md-6 col-xl-6"><?= session()->getFlashdata('message'); ?></div>
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="col-sm-6 mb-3">
                        <label for="current_password" class="form-label">Password saat ini</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" class="form-control <?= ($validation->hasError('current_password') ? 'is-invalid' : '') ?>" id="current_password" name="current_password" placeholder="Masukan password saat ini" value="<?= old('current_password'); ?>" aria-label="current_password" aria-describedby="password-addon">
                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                            <div class="invalid-feedback">
                                <?= $validation->getError('current_password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="new_password1" class="form-label">Password baru</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" class="form-control <?= ($validation->hasError('new_password1') ? 'is-invalid' : '') ?>" id="new_password1" name="new_password1" placeholder="Masukan password baru" value="<?= old('new_password1'); ?>" aria-label="new_password1" aria-describedby="password-addon1">
                            <button class="btn btn-light ms-0" type="button" id="password-addon1"><i class="mdi mdi-eye-outline"></i></button>
                            <div class="invalid-feedback">
                                <?= $validation->getError('new_password1') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="new_password2" class="form-label">Password baru (verifikasi)</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input type="password" class="form-control <?= ($validation->hasError('new_password2') ? 'is-invalid' : '') ?>" id="new_password2" name="new_password2" placeholder="Masukan password baru" aria-label="new_password2" aria-describedby="password-addon2">
                            <button class="btn btn-light ms-0" type="button" id="password-addon2"><i class="mdi mdi-eye-outline"></i></button>
                            <div class="invalid-feedback">
                                <?= $validation->getError('new_password2') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 col-form-group mt-5">
                        <button type="submit" name="submit" class="btn btn-primary">Ganti password</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>