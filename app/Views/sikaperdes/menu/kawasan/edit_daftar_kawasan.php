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
        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <label for="kd_kab" class="col-sm-2 col-form-label">Kabupaten :</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="kd_kab" name="kd_kab">
                                <option value="">DAFTAR KABUPATEN...</option>
                                <?php foreach ($list_kab as $lk) : ?>
                                    <option value="<?= $lk['kd_kab']; ?>" <?= $lk['kd_kab'] == $kd_kab_select ? 'selected' : ''; ?>><?= $lk['kd_kab'] . ' - ' . $lk['nm_kab']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <small class="form-text text-danger"><?= $validation->getError('kd_kab'); ?></small>
                    </div>
                    <div class="form-group row">
                        <label for="nm_kawasan" class="col-sm-2 col-form-label">Nama Kawasan</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="nm_kawasan" name="nm_kawasan" value="<?= $nm_kawasan['nm_kawasan']; ?>">
                            <small class="form-text text-danger"><?= $validation->getError('nm_kawasan'); ?></small>
                            <button type="submit" name="submit" class="btn btn-primary mt-4">Edit Daftar Kawasan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<?= $this->include('sikaperdes/layout/user/content-footer') ?>