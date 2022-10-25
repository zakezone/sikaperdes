<?= $this->include('sikaperdes/layout/user/content-header') ?>
<?= $this->include('sikaperdes/layout/user/content-topbar') ?>
<?= $this->include('sikaperdes/layout/user/content-sidebar') ?>

<div class="page-content" id="content">
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
            <div class="col-lg-12">
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="form-group row">
                        <label for="kd_login" class="col-sm-2 col-form-label">Kode Login</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" readonly class="form-control" id="kd_login" name="kd_login" value="<?= htmlspecialchars($user['kd_login'], ENT_QUOTES); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user['nama'], ENT_QUOTES); ?>" readonly>
                            <small class="form-text text-danger"><?= $validation->getError('nama'); ?></small>
                        </div>
                    </div>
                    <?php if ($user['email'] != '') : ?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                <small class="form-text text-danger"><?= $validation->getError('email'); ?></small>
                            </div>
                            <div class="col-sm-4">
                                <button type="editemail" class="btn btn-info" id="editemail" data-email="" data-userid="<?= $user['user_id']; ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="contohemail@mail.com" value="<?= old('email'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('email'); ?></small>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($user['hp'] != '') : ?>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-2 col-form-label">Nomor HP (whatsapp)</label>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" id="phone-mask" name="hp" value="<?= htmlspecialchars($user['hp'], ENT_QUOTES); ?>" placeholder="Contoh: 85234567890 (tanpa angka 0 didepan)" readonly>
                                <small class="form-text text-danger"><?= $validation->getError('hp'); ?></small>
                            </div>
                            <div class="col-sm-4">
                                <button type="edithp" class="btn btn-info" id="edithp" data-hp="" data-userid="<?= $user['user_id']; ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-2 col-form-label">Nomor HP (whatsapp)</label>
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" id="phone-mask" name="hp" value="<?= htmlspecialchars($user['hp'], ENT_QUOTES); ?>" placeholder="Contoh: 85234567890 (tanpa angka 0 didepan)" value="<?= old('hp'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('hp'); ?></small>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group row">
                        <label for="hp" class="col-sm-2 col-form-label">Gambar Profile</label>
                        <div class="col-sm-6 mb-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('img/user/profile/' . $user['image']) ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="image">Gambar yang akan diupload</label>
                                        <input type="hidden" name="imagelama" value="<?= htmlspecialchars($user['image'], ENT_QUOTES); ?>">
                                        <input type="file" class="form-control mb-3" id="image" name="image" onchange="previewImgUser()">
                                        <small class="form-text text-danger"><?= $validation->getError('image'); ?></small>
                                        <button type="submit" name="submit" class="btn btn-primary">Edit Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?= $this->include('sikaperdes/layout/user/content-footer') ?>