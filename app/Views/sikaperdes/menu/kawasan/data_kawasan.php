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
        <hr>
        <div class="row">
            <div class="col-12">
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="txt_csrfname_sie" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="row">
                        <div class="col-lg-2 col-md-2 mb-2">
                            <label for="statusfilt" class="form-label font-size-13 text-muted">Status</label>
                            <select class="form-select" name="statusfilt" id="statusfilt">
                                <option value=""></option>
                                <?php foreach ($getdatastatus as $gds) : ?>
                                    <option value="<?= $gds; ?>"><?= $gds; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?= session()->getFlashdata('message'); ?>
                        <div class="table-responsive mt-4 mb-4">
                            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kabupaten</th>
                                        <th scope="col">Jumlah Kec.</th>
                                        <th scope="col">Jumlah Desa</th>
                                        <th scope="col">Nama Kawasan</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Status</th>
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