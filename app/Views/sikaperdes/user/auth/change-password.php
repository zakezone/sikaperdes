<?= $this->include('sie/layout/user/auth_header') ?>

<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="<?= base_url('user/panel'); ?>" class="d-block auth-logo mb-2">
                                    <img src="<?= base_url('img/thumbnail/logojatengB.png'); ?>" alt="" height="80">
                                </a>
                                <h6>SIPOLAHTA</h6>
                                <h6>DISPERMADESDUKCAPIL PROV JATENG</h6>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Reset Password</h5>
                                    <p class="text-muted mt-2">Input kembali password anda.</p>
                                </div>
                                <form class="needs-validation custom-form mt-4 pt-2" method="POST" action="<?= base_url('user/ganti-password'); ?>">
                                    <?= csrf_field(); ?>

                                    <div class="mb-3">
                                        <label for="password1" class="form-label">Password</label>
                                        <input type="password" class="form-control <?= ($validation->hasError('password1') ? 'is-invalid' : '') ?>" id="password1" name="password1" placeholder="Masukan password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password1') ?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password2" class="form-label">Verifikasi password</label>
                                        <input type="password" class="form-control <?= ($validation->hasError('password2') ? 'is-invalid' : '') ?>" id="password2" name="password2" placeholder="Masukan password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password2') ?>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-5">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="gantipas">Register</button>
                                    </div>
                                </form>

                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <span>Copyright &copy; <?= date("Y"); ?> . SIPOLAHTA
                                    <p>Dispermadesdukcapil Provinsi Jawa Tengah</p>
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

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, sed accusantium aliquam animi, voluptates autem minus provident magni nobis, esse corrupti eaque porro rem veritatis quasi maiores aspernatur. Ex, repellat.”
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Carousel 1
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Title 1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, sed accusantium aliquam animi, voluptates autem minus provident magni nobis, esse corrupti eaque porro rem veritatis quasi maiores aspernatur. Ex, repellat.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Carousel 2
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Title 2</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur iusto quam, nemo rem, dolorum ab pariatur rerum voluptatem, vel impedit quos nulla delectus recusandae harum eveniet reiciendis sed accusamus distinctio?”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Carousel 3
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Title 3</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt molestias nesciunt voluptatem minima quidem esse voluptatibus ab non atque cupiditate rerum sunt doloremque illum voluptatum delectus culpa, placeat autem sequi!”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Carousel 4
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Title 4</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum omnis aliquid molestias, nobis placeat sit illum neque consequuntur beatae dolorum minima officia officiis saepe delectus cum a debitis, optio assumenda!”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" class="avatar-md img-fluid rounded-circle">
                                                        <div class="flex-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Carousel 5</h5>
                                                            <p class="mb-0 text-white-50">Title 5
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

<?= $this->include('sie/layout/user/auth_footer') ?>