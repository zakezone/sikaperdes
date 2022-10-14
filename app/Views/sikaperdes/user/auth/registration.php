<?= $this->include('sie/layout/user/auth_header') ?>

<!-- <body data-layout="horizontal"> -->
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
                                    <h5 class="mb-0">Registrasi Akun</h5>
                                    <p class="text-muted mt-2">Daftarkan Akun Panel SIPOLAHTA Anda.</p>
                                </div>
                                <form class="needs-validation custom-form mt-4 pt-2" method="POST" action="<?= base_url('user/registrasi'); ?>">
                                    <?= csrf_field(); ?>

                                    <div class="mb-3">
                                        <label for="choices-single-no-sorting" class="form-label col-form-label">Kabupaten/Kota ampuan</label>
                                        <select class="form-control" name="kab_kota_ampuan" id="choices-multiple-remove-button" value="<?= old('kab_kota_ampuan'); ?>">
                                            <option value="Administrator" <?= old('kab_kota_ampuan') == "Administrator" ? 'selected' : ''; ?>>Admin Provinsi</option>
                                            <option value="Banjarnegara" <?= old('kab_kota_ampuan') == "Banjarnegara" ? 'selected' : ''; ?>>Banjarnegara</option>
                                            <option value="Banyumas" <?= old('kab_kota_ampuan') == "Banyumas" ? 'selected' : ''; ?>>Banyumas</option>
                                            <option value="Batang" <?= old('kab_kota_ampuan') == "Batang" ? 'selected' : ''; ?>>Batang</option>
                                            <option value="Blora" <?= old('kab_kota_ampuan') == "Blora" ? 'selected' : ''; ?>>Blora</option>
                                            <option value="Boyolali" <?= old('kab_kota_ampuan') == "Boyolali" ? 'selected' : ''; ?>>Boyolali</option>
                                            <option value="Brebes" <?= old('kab_kota_ampuan') == "Brebes" ? 'selected' : ''; ?>>Brebes</option>
                                            <option value="Cilacap" <?= old('kab_kota_ampuan') == "Cilacap" ? 'selected' : ''; ?>>Cilacap</option>
                                            <option value="Demak" <?= old('kab_kota_ampuan') == "Demak" ? 'selected' : ''; ?>>Demak</option>
                                            <option value="Purwodadi" <?= old('kab_kota_ampuan') == "Purwodadi" ? 'selected' : ''; ?>>Purwodadi</option>
                                            <option value="Jepara" <?= old('kab_kota_ampuan') == "Jepara" ? 'selected' : ''; ?>>Jepara</option>
                                            <option value="Karanganyar" <?= old('kab_kota_ampuan') == "Karanganyar" ? 'selected' : ''; ?>>Karanganyar</option>
                                            <option value="Kebumen" <?= old('kab_kota_ampuan') == "Kebumen" ? 'selected' : ''; ?>>Kebumen</option>
                                            <option value="Kendal" <?= old('kab_kota_ampuan') == "Kendal" ? 'selected' : ''; ?>>Kendal</option>
                                            <option value="Klaten" <?= old('kab_kota_ampuan') == "Klaten" ? 'selected' : ''; ?>>Klaten</option>
                                            <option value="Kudus" <?= old('kab_kota_ampuan') == "Kudus" ? 'selected' : ''; ?>>Kudus</option>
                                            <option value="Magelang" <?= old('kab_kota_ampuan') == "Magelang" ? 'selected' : ''; ?>>Magelang</option>
                                            <option value="Pati" <?= old('kab_kota_ampuan') == "Pati" ? 'selected' : ''; ?>>Pati</option>
                                            <option value="Pekalongan" <?= old('kab_kota_ampuan') == "Pekalongan" ? 'selected' : ''; ?>>Pekalongan</option>
                                            <option value="Pemalang" <?= old('kab_kota_ampuan') == "Pemalang" ? 'selected' : ''; ?>>Pemalang</option>
                                            <option value="Purbalingga" <?= old('kab_kota_ampuan') == "Purbalingga" ? 'selected' : ''; ?>>Purbalingga</option>
                                            <option value="Purworejo" <?= old('kab_kota_ampuan') == "Purworejo" ? 'selected' : ''; ?>>Purworejo</option>
                                            <option value="Rembang" <?= old('kab_kota_ampuan') == "Rembang" ? 'selected' : ''; ?>>Rembang</option>
                                            <option value="Semarang" <?= old('kab_kota_ampuan') == "Semarang" ? 'selected' : ''; ?>>Semarang</option>
                                            <option value="Sragen" <?= old('kab_kota_ampuan') == "Sragen" ? 'selected' : ''; ?>>Sragen</option>
                                            <option value="Sukoharjo" <?= old('kab_kota_ampuan') == "Sukoharjo" ? 'selected' : ''; ?>>Sukoharjo</option>
                                            <option value="Slawi" <?= old('kab_kota_ampuan') == "Slawi" ? 'selected' : ''; ?>>Slawi</option>
                                            <option value="Temanggung" <?= old('kab_kota_ampuan') == "Temanggung" ? 'selected' : ''; ?>>Temanggung</option>
                                            <option value="Wonogiri" <?= old('kab_kota_ampuan') == "Wonogiri" ? 'selected' : ''; ?>>Wonogiri</option>
                                            <option value="Wonosobo" <?= old('kab_kota_ampuan') == "Wonosobo" ? 'selected' : ''; ?>>Wonosobo</option>
                                            <option value="Kota Magelang" <?= old('kab_kota_ampuan') == "Kota Magelang" ? 'selected' : ''; ?>><b>Kota Magelang</b></option>
                                            <option value="Kota Pekalongan" <?= old('kab_kota_ampuan') == "Kota Pekalongan" ? 'selected' : ''; ?>>Kota Pekalongan</option>
                                            <option value="Kota Salatiga" <?= old('kab_kota_ampuan') == "Kota Salatiga" ? 'selected' : ''; ?>>Kota Salatiga</option>
                                            <option value="Kota Semarang" <?= old('kab_kota_ampuan') == "Kota Semarang" ? 'selected' : ''; ?>>Kota Semarang</option>
                                            <option value="Kota Surakata" <?= old('kab_kota_ampuan') == "Kota Surakata" ? 'selected' : ''; ?>>Kota Surakata</option>
                                            <option value="Kota Tegal" <?= old('kab_kota_ampuan') == "Kota Tegal" ? 'selected' : ''; ?>>Kota Tegal</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <div>
                                            <label class="form-label">Tingkat Instansi</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input <?= ($validation->hasError('tk_instansi') ? 'is-invalid' : '') ?>" type="radio" name="tk_instansi" id="formRadios3" value="PROVINSI" <?= old('tk_instansi') == "PROVINSI" ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="formRadios3">PEMPROV</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input <?= ($validation->hasError('tk_instansi') ? 'is-invalid' : '') ?>" type="radio" name="tk_instansi" id="formRadios4" value="PEMKOT" <?= old('tk_instansi') == "PEMKOT" ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="formRadios4">PEMKOT</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input <?= ($validation->hasError('tk_instansi') ? 'is-invalid' : '') ?>" type="radio" name="tk_instansi" id="formRadios5" value="PEMKAB" <?= old('tk_instansi') == "PEMKAB" ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="formRadios5">PEMKAB</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input <?= ($validation->hasError('tk_instansi') ? 'is-invalid' : '') ?>" type="radio" name="tk_instansi" id="formRadios6" value="KECAMATAN" <?= old('tk_instansi') == "KECAMATAN" ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="formRadios6">KECAMATAN</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input <?= ($validation->hasError('tk_instansi') ? 'is-invalid' : '') ?>" type="radio" name="tk_instansi" id="formRadios7" value="KELURAHAN" <?= old('tk_instansi') == "KELURAHAN" ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="formRadios7">KELURAHAN</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input <?= ($validation->hasError('tk_instansi') ? 'is-invalid' : '') ?>" type="radio" name="tk_instansi" id="formRadios8" value="PEMDES" <?= old('tk_instansi') == "PEMDES" ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="formRadios8">PEMDES</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nip" class="form-label">Nip</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nip') ? 'is-invalid' : '') ?>" id="nip" name="nip" placeholder="Masukan NIP" value="<?= old('nip'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nip') ?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : '') ?>" id="nama" name="nama" placeholder="Masukan nama lengkap" value="<?= old('nama'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama') ?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" id="email" name="email" placeholder="Masukan email" value="<?= old('email'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="hp" class="form-label">Nomor HP (terhubung whatsapp)</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('hp') ? 'is-invalid' : '') ?>" id="phone-mask" name="hp" placeholder="Contoh: 85234567890 (tanpa angka 0 didepan)" value="<?= old('hp'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('hp') ?>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>" id="password" name="password" placeholder="Masukan password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-5">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="regis">Register</button>
                                    </div>
                                </form>

                                <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">Sudah memiliki akun ? <a href="<?= base_url('user/panel'); ?>" class="text-primary fw-semibold"> Login </a> </p>
                                </div>
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