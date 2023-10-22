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
        <a type="button" class="btn btn-info waves-effect waves-light mb-3" href="<?= base_url('user/menu-admin/input_daftar_kawasan'); ?>">Tambah Daftar Kawasan [+]</a>
        <hr>
        <div class="row">
            <div class="col-12">
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="row">
                        <div class="col-lg-3 col-md-3 mb-2">
                            <label for="filtkabupaten" class="form-label font-size-13 text-muted">Kabupaten</label>
                            <select class="form-select" name="filtkabupaten" id="filtkabupaten">
                                <option value=""></option>
                                <option value="all">All</option>
                                <?php foreach ($tab_idkawasan as $tik) : ?>
                                    <option value="<?= $tik['kd_kab']; ?>"><?= $tik['kd_kab'] . ' - ' . $tik['nm_kab']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?= session()->getFlashdata('message'); ?>
                        <div class="table-responsive mt-4 mb-4">
                            <table class="table align-middle datatable dt-responsive table-check nowrap text-center" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Kawasan</th>
                                        <th scope="col">Kabupaten</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>