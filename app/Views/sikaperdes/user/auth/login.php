<?= $this->include('sikaperdes/layout/user/auth_header') ?>

<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-2 md-5 text-center">
                                <a href="<?= base_url('user/panel'); ?>" class="d-block auth-logo mb-2">
                                    <img src="<?= base_url('img/thumbnail/logosikaperdes.jpeg'); ?>" alt="" height="130">
                                </a>
                            </div>
                            <?= session()->getFlashdata('message'); ?>
                            <?php if (($validation->getError('password')) == "Kesalahan input Password") : ?>
                                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                    <i class="mdi mdi-block-helper label-icon"></i><?= $validation->getError('password') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php elseif (($validation->getError('password')) != null) : ?>
                                <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                    <i class="mdi mdi-alert-outline label-icon"></i><?= $validation->getError('password') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <p class="text-muted mt-2">Sign in untuk melanjutkan ke admin panel.</p>
                                </div>
                                <form class="custom-form mt-2 pt-2" method="POST" action="<?= base_url('user/panel'); ?>">
                                    <?= csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="kd_login" class="form-label">Kode Login</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('kd_login') ? 'is-invalid' : '') ?>" id="kd_login" name="kd_login" placeholder="Masukan Kode Login" value="<?= old('kd_login'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kd_login') ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label">Password</label>
                                            </div>
                                            <!-- <div class="flex-shrink-0">
                                                <div class="">
                                                    <a href="<?= base_url('user/lupa-password'); ?>" class="text-muted">Lupa password?</a>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <label class="form-check-label" for="remember-check">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="signin">Log In</button>
                                    </div>
                                </form>

                                <!-- <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">Belum memiliki akun ? <a href="<?= base_url('user/registrasi'); ?>" class="text-primary fw-semibold"> Registrasi </a> </p>
                                </div> -->
                            </div>
                            <div class="md-5 text-center">
                                <span>Copyright &copy; <?= date("Y"); ?> . SIKAPERDES
                                    <p>DISPERMADES Provinsi Jawa Tengah</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Peraturan Menteri Desa PDTT RI No. 5 Tahun 2016 Tentang Pembangunan Kawasan Perdesaan dan Peraturan Gubernur Jawa Tengah No. 36 Tahun 2016 Tentang Pembangunan Kawasan Perdesaan di Provinsi Jawa Tengah.”
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Dasar Hukum Pembentukan Kawasan Perdesaan
                                                            </h5>
                                                            <p class="mb-0 text-white-50">DISPERMADES PROV JATENG</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Kawasan Perdesaan adalah kawasan yang mempunyai kegiatan utama pertanian, termasuk pengelolaan sumber daya alam dengan susunan fungsi kawasan sebagai tempat permukiman perdesaan, pelayanan jasa pemerintahan, pelayanan sosial, dan kegiatan ekonomi”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Kawasan Perdesaan
                                                            </h5>
                                                            <p class="mb-0 text-white-50">DISPERMADES PROV JATENG</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“SIKaPerdes (Sistem Informasi Kawasan Perdesaan) untuk efektivitas pelayanan publik pengembangan kawasan perdesaan pada Dispermades Provinsi Jawa Tengah”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">SIKaPerdes App
                                                            </h5>
                                                            <p class="mb-0 text-white-50">DISPERMADES PROV JATENG</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Tujuan SIKaPerdes adalah untuk mendorong pengelolaan dan pengembangan pembangunan kawasan perdesaan secara terintegrasi di Jawa Tengah”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Tujuan SIKaPerdes
                                                            </h5>
                                                            <p class="mb-0 text-white-50">DISPERMADES PROV JATENG</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Manfaat SIKaPerdes adalah tersedianya data kawasan perdesaan yang diolah secara digital dan up to date untuk penyusunan rencana pembangunan kawasan perdesaan dalam upaya mempercepat dan meningkatkan kualitas pelayanan , pembangunan dan pemberdayaan mayarakat desa melalui pendekatan pembangunan partisipatif”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        <div class="flex-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Manfaat SIKaPerdes</h5>
                                                            <p class="mb-0 text-white-50">DISPERMADES PROV JATENG
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>

<?= $this->include('sikaperdes/layout/user/auth_footer') ?>