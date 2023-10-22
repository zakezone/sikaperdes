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
        <!-- Page Heading -->
        <div class="col-md-6 col-xl-6"><?= session()->getFlashdata('message'); ?></div>
        <div class="card mb-3 col-md-6 col-xl-6">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('img/user/profile/' . $user['image']) ?>" class="card-img">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"><?= $user['kd_wilayah']; ?></p>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><?= $user['hp']; ?></p>
                        <p class="badge bg-primary"><?= $user['pin']; ?></p>
                        <p class="card-text"><small class="text-muted">Member sejak, <?= date('d F Y', $user['tanggal']); ?></small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->include('sikaperdes/layout/user/content-footer') ?>