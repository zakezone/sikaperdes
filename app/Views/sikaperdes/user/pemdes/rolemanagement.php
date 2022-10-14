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

        <?php if (substr($rolak['kd_login'], 10)  == "0101") : ?>
            <h4 class="mb-4 text-gray text-center">Daftar user SIPOLAHTA - DISPERMADES Provinsi Jawa Tengah</h4>
        <?php elseif (substr($rolak['kd_login'], 10) == "0201") : ?>
            <h4 class="mb-4 text-gray text-center">Daftar user SIPOLAHTA - DUKCAPIL Provinsi Jawa Tengah</h4>
        <?php endif; ?>

        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

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