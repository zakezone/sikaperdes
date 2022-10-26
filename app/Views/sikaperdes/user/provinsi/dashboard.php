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

        <div class="section-title text-center">
            <h3 style="text-transform: uppercase;">INFORMASI KAWASAN PERDESAAN</h3>
        </div>
        <div class="row">
            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="klasifikasi_kawasan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="agregat_tahun_pembentukan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="regulasi_tk_kawasan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="regulasi_tk_kabupaten"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-12 col-lg-12 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="regulasi_tk_kawasan_perkabupaten"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('sikaperdes/layout/user/content-footer') ?>