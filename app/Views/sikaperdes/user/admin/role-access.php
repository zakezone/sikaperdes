<?= $this->include('sikaperdes/layout/user/content-header') ?>
<?= $this->include('sikaperdes/layout/user/content-topbar') ?>
<?= $this->include('sikaperdes/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../../img/bg/sitkd/bg-body.png);
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
            <div class="col-lg-6">
                <?= session()->getFlashdata('message'); ?>

                <h5>Kode Login : <?= $kd_login['kd_login']; ?></h5>

                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col" style="text-align: center;">Access menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="form-check form-switch" style="margin-left: 50%;">
                                        <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                        <?php if ($role['role_akses'] != "Belum Assign") : ?>
                                            <input class="form-check-input admin-sie" type="checkbox" <?= check_access_sie($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>