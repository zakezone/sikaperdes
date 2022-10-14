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

        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
</div>

<?= $this->include('sie/layout/user/content-footer') ?>