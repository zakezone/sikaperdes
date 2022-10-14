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
        <h4 class="mb-4 text-gray text-center">Daftar Registrasi API SIPOLAHTA - DISPERMADESDUKCAPIL Provinsi Jawa Tengah</h4>
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form action="" method="POST">
                    <?= csrf_field() ?>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="Cari data user.." name="keywordapi" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="tombolcari">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col table-responsive">
            <button type="button" class="btn btn-info waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" id="RegApi">Registrasi User</button>
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registrasi User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php if ($user['kd_login'] == "22222222220101") : ?>
                            <form action="<?= base_url('user/dispermades-provinsi/register_api'); ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="aplication" class="form-label">Nama aplikasi</label>
                                        <input type="text" class="form-control" id="aplication" name="aplication" placeholder="Masukan nama aplikasi">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($user['kd_login'] == "22222222220201") : ?>
                            <form action="<?= base_url('user/dukcapil-provinsi/register_api'); ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="aplication" class="form-label">Nama aplikasi</label>
                                        <input type="text" class="form-control" id="aplication" name="aplication" placeholder="Masukan nama aplikasi">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <table>
                <tr>
                    <td>
                        Hasil pencarian : <?= $total_rows; ?>
                    </td>
                    <td>
                        <?php if ($user['kd_login'] == "22222222220101") : ?>
                            <a class="nav-link" href="<?= base_url('user/dispermades-provinsi/hapussessionkeywordapi'); ?>">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        <?php elseif ($user['kd_login'] == "22222222220201") : ?>
                            <a class="nav-link" href="<?= base_url('user/dukcapil-provinsi/hapussessionkeywordapi'); ?>">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-responsive">

            <?= session()->getFlashdata('message'); ?>

            <?php if (empty($getrole)) : ?>
                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                    <i class="mdi mdi-block-helper label-icon"></i>Data tidak ditemukan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th scope="row">No</th>
                        <th scope="row">Email</th>
                        <th scope="row">Nama Aplikasi</th>
                        <th scope="row">Registrasi</th>
                        <th scope="row" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 1 + (5 * ($start - 1)); ?>
                    <?php foreach ($getrole as $gr) : ?>
                        <tr userid="<?= $gr['id']; ?>">
                            <th style="vertical-align: middle;" scope="row"><?= $start++; ?></th>
                            <td style="vertical-align: middle;"><?= $gr['email']; ?></td>
                            <td style="vertical-align: middle;"><?= $gr['aplication']; ?></td>
                            <td style="vertical-align: middle;"><?= timeAgo($gr['created']); ?> yang lalu</td>
                            <td align="center" style="vertical-align: middle;">
                                <a href="#" class="badge bg-danger" id="sa-parameter">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if ($total_rows > 5) : ?>
                <?= $pager->links('auth_api_key', 'searching_pagination'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->include('sie/layout/user/content-footer') ?>