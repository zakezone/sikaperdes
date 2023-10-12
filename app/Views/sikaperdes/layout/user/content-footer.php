<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <?= date("Y"); ?> . SIKAPERDES . DISPERMADES Provinsi Jawa Tengah</span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
</div>
</div>

<?= $this->include('sikaperdes/layout/user/content-theme') ?>

<script src="<?= base_url('minia/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/node-waves/waves.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/feather-icons/feather.min.js'); ?>"></script>
<script src="<?= base_url('minia/js/pages/pass-addon.init.js'); ?>"></script>
<script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('minia/js/app.js'); ?>"></script>

<script>
    $('#refresh').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });

    $('#refetch').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });

    $('#reload').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });

    $('#recon').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });
</script>

<?php $request = \Config\Services::request(); ?>
<?php $session = \Config\Services::session(); ?>

<?php if ($request->uri->getSegment(3) == "editprofile") : ?>
    <script>
        function previewImgUser() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <script src="<?= base_url('minia/libs/imask/imask.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/form-maskindo.init.js'); ?>"></script>

    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
        <script>
            $('#editemail').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/admin/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/admin/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithp').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/admin/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/admin/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
        <script>
            $('#editemail').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/provinsi/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/provinsi/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithp').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/provinsi/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/provinsi/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
        <script>
            $('#editemail').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/kabupaten/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/kabupaten/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithp').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/kabupaten/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/kabupaten/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
        <script>
            $('#editemail').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/kecamatan/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/kecamatan/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithp').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/kecamatan/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/kecamatan/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '5') : ?>
        <script>
            $('#editemail').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/pemdes/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/pemdes/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithp').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/pemdes/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/pemdes/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php endif; ?>

<?php elseif ($request->uri->getSegment(3) == "role_management") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesSIE.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                "ajax": {
                    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                        url: "<?= base_url('user/admin/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
                        url: "<?= base_url('user/provinsi/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                        url: "<?= base_url('user/kabupaten/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
                        url: "<?= base_url('user/kecamatan/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '5') : ?>
                        url: "<?= base_url('user/pemdes/ajaxserverSide_rolemanagement') ?>"
                    <?php endif; ?>,
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '2') : ?>
                            data.filtkabupaten = $('#filtkabupaten').val();
                            data.filtkecamatan = $('#filtkecamatan').val();
                            data.filtkeldesa = $('#filtkeldesa').val();
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            data.filtkecamatan = $('#filtkecamatan').val();
                            data.filtkeldesa = $('#filtkeldesa').val();
                        <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
                            data.filtkeldesa = $('#filtkeldesa').val();
                        <?php endif; ?>
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [
                    <?php if ($session->get('role_id_sikaperdes') == '1' && $session->get('kd_login_sikaperdes') == '10101010101010') : ?> {
                            searchable: false,
                            orderable: false,
                            targets: [0, 2, 3, 4, 5, 6, 7],
                            className: "text-center",
                        }
                    <?php else : ?> {
                            searchable: false,
                            orderable: false,
                            targets: [0, 2, 3, 4, 5, 6],
                            className: "text-center",
                        }
                    <?php endif; ?>,
                ],
            });
            <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '2') : ?>
                $('#filtkabupaten').select2({
                    placeholder: "Cari Kabupaten",
                })
            <?php endif; ?>
            <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '2' || $session->get('role_id_sikaperdes') == '3') : ?>
                $('#filtkecamatan').select2({
                    placeholder: "Cari Kecamatan",
                    ajax: {
                        <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                            url: "<?= base_url('user/admin/ajaxfiltkecamatan') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
                            url: "<?= base_url('user/provinsi/ajaxfiltkecamatan') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            url: "<?= base_url('user/kabupaten/ajaxfiltkecamatan') ?>"
                        <?php endif; ?>,
                        dataType: 'json',
                        delay: 250,
                        data: function(data) {
                            return {
                                filtkabupaten: $('#filtkabupaten').val(),
                                searchTerm: data.term,
                                [csrfName]: csrfHash
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.data,
                            };
                        },
                    }
                });
            <?php endif; ?>
            <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '2' || $session->get('role_id_sikaperdes') == '3' || $session->get('role_id_sikaperdes') == '4') : ?>
                $('#filtkeldesa').select2({
                    placeholder: "Cari Desa",
                    ajax: {
                        <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                            url: "<?= base_url('user/admin/ajaxfiltkeldesa') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
                            url: "<?= base_url('user/provinsi/ajaxfiltkeldesa') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            url: "<?= base_url('user/kabupaten/ajaxfiltkeldesa') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
                            url: "<?= base_url('user/kecamatan/ajaxfiltkeldesa') ?>"
                        <?php endif; ?>,
                        dataType: 'json',
                        delay: 250,
                        data: function(data) {
                            return {
                                filtkecamatan: $('#filtkecamatan').val(),
                                searchTerm: data.term,
                                [csrfName]: csrfHash
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.data,
                            };
                        },
                    }
                })
            <?php endif; ?>
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "registrasi_api") : ?>
    <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        $(document).on('click', '#sa-parameter', function(e) {
            var id = $(this).parents("tr").attr("userid");

            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak ingin lagi user ini mengakses API SIKAPERDES!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, hapus!',
                    cancelButtonText: 'No, batalkan!',
                    confirmButtonClass: 'btn btn-success mt-2',
                    cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                    buttonsStyling: false
                })
                .then((result) => {
                    if (result.value) {
                        window.location = '<?= base_url('user/' . strtolower($rolak['role_akses']) . '/' . 'hapususerapi') ?>' + '/' + id
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire(
                            'Cancelled',
                            'User API tidak jadi dihapus :)',
                            'error',
                            '#5156be',
                        )
                    }
                })
        });
    </script>

<?php elseif ($request->uri->getSegment(2) == "notifikasi") : ?>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>

<?php elseif ($request->uri->getSegment(3) == "role_edit") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/choices.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesSIE.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/sweetalertsidesa.init.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $(document).on('click', '#roleedit', function(e) {
                document.getElementById("idpermendagri").value = $(this).attr('data-kode');
                document.getElementById("namadesa").value = $(this).attr('data-nama');
                $('.bs-example-modal-lg').modal('hide');
            });
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "role_access") : ?>
    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
        <script>
            $('.admin-sie').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');
                $.ajax({
                    url: "<?= base_url('user/admin/changeaccess'); ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/admin/role_access'); ?>" + "/" + roleId;
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
        <script>
            $('.provinsi-sie').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');
                $.ajax({
                    url: "<?= base_url('user/dispermades-provinsi/changeaccess'); ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dispermades-provinsi/role_access'); ?>" + "/" + roleId;
                    }
                })
            });
        </script>
    <?php endif; ?>

<?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "verifikasi_data" || $request->uri->getSegment(2) == "menu-provinsi" && $request->uri->getSegment(3) == "verifikasi_data") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>
    <script>
        $('#statusfilt').select2({
            placeholder: "Pilih status data",
        })
    </script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                        url: "<?= base_url('user/menu-admin/load_data_kawasan') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
                        url: "<?= base_url('user/menu-provinsi/load_data_kawasan') ?>"
                    <?php endif; ?>,
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.statusfilt = $('#statusfilt').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [0, 2, 3, 4, 5, 6, 7],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        })

        $('#statusfilt').change(function() {
            tampildata();
            // let a = $(this).val();
            // console.log(a);
        });

        function tampildata() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                        url: "<?= base_url('user/menu-admin/load_data_kawasan') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '2') : ?>
                        url: "<?= base_url('user/menu-provinsi/load_data_kawasan') ?>"
                    <?php endif; ?>,
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.statusfilt = $('#statusfilt').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [0, 2, 3, 4, 5, 6, 7],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        }
    </script>

<?php elseif ($request->uri->getSegment(3) == "list_input_data_kawasan") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>
    <script>
        $('#statusfilt').select2({
            placeholder: "Pilih status data",
        })
    </script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                        url: "<?= base_url('user/menu-admin/list_datainput_kawasan') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                        url: "<?= base_url('user/menu-kabupaten/list_datainput_kawasan') ?>"
                    <?php endif; ?>,
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.statusfilt = $('#statusfilt').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [0, 2, 3, 4, 5, 6, 7],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        })

        $('#statusfilt').change(function() {
            tampildata();
            // let a = $(this).val();
            // console.log(a);
        });

        function tampildata() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                        url: "<?= base_url('user/menu-admin/list_datainput_kawasan') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                        url: "<?= base_url('user/menu-kabupaten/list_datainput_kawasan') ?>"
                    <?php endif; ?>,
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.statusfilt = $('#statusfilt').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [0, 2, 3, 4, 5, 6, 7],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        }
    </script>
    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
        <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
        <script>
            $(document).on('click', '#sa-delete', function(e) {
                var kd_kab = $(this).data('kdkab');
                var kd_kawasan = $(this).data('kdkawasan');

                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data Kawasan terpilih akan dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, hapus!',
                        cancelButtonText: 'No, batalkan!',
                        confirmButtonClass: 'btn btn-success mt-2',
                        cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                        buttonsStyling: false
                    })
                    .then((result) => {
                        if (result.value) {
                            window.location = '<?= base_url('user/menu-admin/delete_data_kawasan') ?>' + '/' + kd_kab + '/' + kd_kawasan
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire(
                                'Cancelled',
                                'Data Kawasan tidak jadi dihapus :)',
                                'error',
                                '#5156be',
                            )
                        }
                    })
            });
        </script>
    <?php endif; ?>

    <?php if ($session->get('role_id_sikaperdes') == '3') : ?>
        <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
        <script>
            $(document).on('click', '#sa-delete', function(e) {
                var kd_kab = $(this).data('kdkab');
                var kd_kawasan = $(this).data('kdkawasan');

                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data Kawasan terpilih akan dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, hapus!',
                        cancelButtonText: 'No, batalkan!',
                        confirmButtonClass: 'btn btn-success mt-2',
                        cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                        buttonsStyling: false
                    })
                    .then((result) => {
                        if (result.value) {
                            window.location = '<?= base_url('user/menu-kabupaten/delete_data_kawasan') ?>' + '/' + kd_kab + '/' + kd_kawasan
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire(
                                'Cancelled',
                                'Data Kawasan tidak jadi dihapus :)',
                                'error',
                                '#5156be',
                            )
                        }
                    })
            });
        </script>
    <?php endif; ?>

<?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "daftar_kawasan") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>
    <script>
        $('#filtkabupaten').select2({
            placeholder: "Pilih Kabupaten",
        })
    </script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    url: "<?= base_url('user/menu-admin/ajax_list_daftar_kawasan') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.filtkabupaten = $('#filtkabupaten').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: [3],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        })

        $('#filtkabupaten').change(function() {
            tampildata();
            // let a = $(this).val();
            // console.log(a);
        });

        function tampildata() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    url: "<?= base_url('user/menu-admin/ajax_list_daftar_kawasan') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.filtkabupaten = $('#filtkabupaten').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [3],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        }
    </script>
    <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
        <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
        <script>
            $(document).on('click', '#sa-delete', function(e) {
                var kd_kab = $(this).data('kdkab');
                var kd_kawasan = $(this).data('kdkawasan');

                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data Kawasan terpilih akan dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, hapus!',
                        cancelButtonText: 'No, batalkan!',
                        confirmButtonClass: 'btn btn-success mt-2',
                        cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                        buttonsStyling: false
                    })
                    .then((result) => {
                        if (result.value) {
                            window.location = '<?= base_url('user/menu-admin/delete_daftar_kawasan') ?>' + '/' + kd_kab + '/' + kd_kawasan
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire(
                                'Cancelled',
                                'Data Kawasan tidak jadi dihapus :)',
                                'error',
                                '#5156be',
                            )
                        }
                    })
            });
        </script>
    <?php endif; ?>

<?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "jenis_klasifikasi_list") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>

    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    url: "<?= base_url('user/menu-admin/ajax_list_jenis_klasifikasi') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [2],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        })
    </script>

    <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        $(document).on('click', '#sa-delete', function(e) {
            var id = $(this).data('id');

            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Jenis Klasifikasi terpilih akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, hapus!',
                    cancelButtonText: 'No, batalkan!',
                    confirmButtonClass: 'btn btn-success mt-2',
                    cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                    buttonsStyling: false
                })
                .then((result) => {
                    if (result.value) {
                        window.location = '<?= base_url('user/menu-admin/delete_jenis_klasifikasi') ?>' + '/' + id
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire(
                            'Cancelled',
                            'Jenis Klasifikasi tidak jadi dihapus :)',
                            'error',
                            '#5156be',
                        )
                    }
                })
        });
    </script>

<?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "edit_jenis_klasifikasi") : ?>
    <script>
        $('#editjenisklasifikasi').on('click', function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            var id_data = $(this).data('id');
            const jenis_klasifikasi = $(this).data('jenis_klasifikasi');
            const id = $(this).data('id');

            $.ajax({
                url: '<?= base_url('user/menu-admin/edit_nama_klasifikasi'); ?>',
                type: 'post',
                data: {
                    jenis_klasifikasi: jenis_klasifikasi,
                    id: id,
                    [csrfName]: csrfHash
                },
                success: function() {
                    document.location.href = '<?= base_url('user/menu-admin/edit_jenis_klasifikasi'); ?>' + '/' + id_data;
                }
            })
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "input_data_kawasan" || $request->uri->getSegment(3) == "revisi_review") : ?>
    <!-- choices js -->
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
    <script src="<?= base_url('minia/js/pages/form-advanceddatabumdes.init.js') ?>"></script>
    <!-- select2 -->
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>

    <script>
        function previewImgUser0() {
            const image = document.querySelector('#image0');
            const imgPreview = document.querySelector('.img-preview0');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgUser1() {
            const image = document.querySelector('#image1');
            const imgPreview = document.querySelector('.img-preview1');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgUser2() {
            const image = document.querySelector('#image2');
            const imgPreview = document.querySelector('.img-preview2');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgUser3() {
            const image = document.querySelector('#image3');
            const imgPreview = document.querySelector('.img-preview3');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgUser4() {
            const image = document.querySelector('#image4');
            const imgPreview = document.querySelector('.img-preview4');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgUser5() {
            const image = document.querySelector('#image5');
            const imgPreview = document.querySelector('.img-preview5');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#tahun_pembentukan').select2({
                placeholder: "Tahun Pembentukan",
            })
            <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                $('#filtkabupaten').select2({
                    placeholder: "Cari Kabupaten",
                })
            <?php endif; ?>
            <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '3' || $session->get('role_id_sikaperdes') == '3') : ?>
                $('#filtkecamatan').select2({
                    placeholder: "Cari Kecamatan",
                    ajax: {
                        <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                            url: "<?= base_url('user/menu-admin/ajaxfiltkecamatan') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            url: "<?= base_url('user/menu-kabupaten/ajaxfiltkecamatan') ?>"
                        <?php endif; ?>,
                        dataType: 'json',
                        delay: 250,
                        data: function(data) {
                            return {
                                filtkabupaten: $('#filtkabupaten').val(),
                                searchTerm: data.term,
                                [csrfName]: csrfHash
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.data,
                            };
                        },
                    }
                });
            <?php endif; ?>
            <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '3') : ?>
                $('#filtkeldesa').select2({
                    placeholder: "Cari Desa",
                    ajax: {
                        <?php if ($session->get('role_id_sikaperdes') == '1') : ?>
                            url: "<?= base_url('user/menu-admin/ajaxfiltdesa') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            url: "<?= base_url('user/menu-kabupaten/ajaxfiltdesa') ?>"
                        <?php endif; ?>,
                        dataType: 'json',
                        delay: 250,
                        data: function(data) {
                            return {
                                filtkecamatan: $('#filtkecamatan').val(),
                                searchTerm: data.term,
                                [csrfName]: csrfHash
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.data,
                            };
                        },
                    }
                })
            <?php endif; ?>
        });
    </script>

<?php elseif ($request->uri->getSegment(2) == "data" && $request->uri->getSegment(3) == "kawasan") : ?>
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/select2.js') ?>"></script>
    <script>
        $('#tahunfilt').select2({
            placeholder: "Pilih tahun data",
        })
    </script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    url: "<?= base_url('user/data/load_data_kawasan') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.tahunfilt = $('#tahunfilt').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [0, 2, 3, 4, 5, 6],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        })

        $('#tahunfilt').change(function() {
            tampildata();
            // let a = $(this).val();
            // console.log(a);
        });

        function tampildata() {
            var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
            $('#datatable').DataTable({
                'order': [],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'lengthMenu': [
                    [5, 10, 15],
                    [5, 10, 15]
                ],
                "ajax": {
                    url: "<?= base_url('user/data/load_data_kawasan') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.tahunfilt = $('#tahunfilt').val();
                    },
                    dataSrc: function(response) {
                        $('input[name=csrf_test_name]').val(response.csrf_test_name);
                        return response.data;
                    },
                },
                "columnDefs": [{
                    searchable: false,
                    orderable: true,
                    targets: [0, 2, 3, 4, 5, 6],
                    className: "text-center",
                }],
                bDestroy: true,
            });
        }
    </script>

<?php elseif ($request->uri->getSegment(3) == "dashboard") : ?>
    <script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/highcharts-3d.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/data.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>
    <script>
        Highcharts.setOptions({
            lang: {
                decimalPoint: ',',
                thousandsSep: '.'
            },
            colors: Highcharts.getOptions().colors.map(function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        Highcharts.chart('agregat_tahun_pembentukan_desa', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'BERDASARKAN TAHUN PEMBENTUKAN'
            },
            subtitle: {
                text: 'Agregat Tahunan Total Desa'
            },
            xAxis: {
                categories: [
                    <?php for ($tahun = 2016; $tahun <= date('Y'); $tahun++) : ?>
                        <?= $tahun; ?>,
                    <?php endfor; ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'Total Desa'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total Desa',
                type: 'column',
                data: [<?= $agregat_ds2016 != 0 ? $agregat_ds2016 : 0 ?>, <?= $agregat_ds2017 != 0 ? $agregat_ds2017 : 0 ?>, <?= $agregat_ds2018 != 0 ? $agregat_ds2018 : 0 ?>, <?= $agregat_ds2019 != 0 ? $agregat_ds2019 : 0 ?>, <?= $agregat_ds2020 != 0 ? $agregat_ds2020 : 0 ?>, <?= $agregat_ds2021 != 0 ? $agregat_ds2021 : 0 ?>, <?= $agregat_ds2022 != 0 ? $agregat_ds2022 : 0 ?>, <?= $agregat_ds2023 != 0 ? $agregat_ds2023 : null ?>, <?= $agregat_ds2024 != 0 ? $agregat_ds2024 : null ?>, <?= $agregat_ds2025 != 0 ? $agregat_ds2025 : null ?>],
                // zones: [{
                //     value: 11,
                //     color: '#8a1115'
                // }],
                showInLegend: false,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:,.0f}'
                },
            }]
        });

        Highcharts.chart('agregat_tahun_pembentukan', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'BERDASARKAN TAHUN PEMBENTUKAN'
            },
            subtitle: {
                text: 'Agregat Tahunan Total Kawasan'
            },
            xAxis: {
                categories: [
                    <?php for ($tahun = 2016; $tahun <= date('Y'); $tahun++) : ?>
                        <?= $tahun; ?>,
                    <?php endfor; ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'Total Kawasan'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total Kawasan',
                type: 'column',
                data: [<?= $agregat_kp2016 != 0 ? $agregat_kp2016 : 0 ?>, <?= $agregat_kp2017 != 0 ? $agregat_kp2017 : 0 ?>, <?= $agregat_kp2018 != 0 ? $agregat_kp2018 : 0 ?>, <?= $agregat_kp2019 != 0 ? $agregat_kp2019 : 0 ?>, <?= $agregat_kp2020 != 0 ? $agregat_kp2020 : 0 ?>, <?= $agregat_kp2021 != 0 ? $agregat_kp2021 : 0 ?>, <?= $agregat_kp2022 != 0 ? $agregat_kp2022 : 0 ?>, <?= $agregat_kp2023 != 0 ? $agregat_kp2023 : null ?>, <?= $agregat_kp2024 != 0 ? $agregat_kp2024 : null ?>, <?= $agregat_kp2025 != 0 ? $agregat_kp2025 : null ?>],
                zones: [{
                    value: 25,
                    color: '#8a1115'
                }],
                showInLegend: false,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:,.0f}'
                },
            }]
        });

        Highcharts.chart('regulasi_tk_kawasan', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'BERDASARKAN REGULASI TK KAWASAN'
            },
            subtitle: {
                text: 'Pertahun <?= date('Y'); ?>'
            },
            xAxis: {
                categories: ['SK Lokasi Kawasan', 'SK TKPKP Kawasan', 'PERBUB RPKP'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Total',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 0);
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Sudah',
                color: 'cyan',
                data: [<?= $sk_lokasi_kawasan ?>, <?= $sk_tkpkp_kawasan ?>, <?= $perbup_rpkp ?>],

                showInLegend: true,
            }, {
                name: 'Belum',
                color: 'tomato',
                data: [<?= $sk_lokasi_kawasan_belum ?>, <?= $sk_tkpkp_kawasan_belum ?>, <?= $perbup_rpkp_belum ?>],

                showInLegend: true,
            }]
        });

        Highcharts.chart('regulasi_tk_kabupaten', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'BERDASARKAN REGULASI TK KABUPATEN'
            },
            subtitle: {
                text: 'Pertahun <?= date('Y'); ?>'
            },
            xAxis: {
                categories: ['SK TKPKP Kabupaten', 'PERBUP PKP', 'PERDA PKP'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Total',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 0);
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Sudah',
                data: [<?= $perda_kab_pembangunan ?>, <?= $perbup_pembangunan ?>, <?= $sk_tkpkp_kab_pembangunan ?>],

                showInLegend: true,
            }, {
                name: 'Belum',
                data: [<?= $perda_kab_pembangunan_belum ?>, <?= $perbup_pembangunan_belum ?>, <?= $sk_tkpkp_kab_pembangunan_belum ?>],

                showInLegend: true,
            }]
        });

        Highcharts.chart('klasifikasi_kawasan', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'pie'
            },
            title: {
                text: 'BERDASARKAN TEMA KAWASAN'
            },
            subtitle: {
                text: 'Pertahun <?= date('Y'); ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:,.0f}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y:,.0f}',
                        connectorColor: 'silver'
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                data: [{
                        name: 'PERTANIAN TANAMAN PANGAN',
                        y: <?= $klasifikasi_ptp ?>
                    },
                    {
                        name: 'WISATA',
                        y: <?= $klasifikasi_wisata ?>
                    },
                    {
                        name: 'PERKEBUNAN',
                        y: <?= $klasifikasi_perkebunan ?>
                    },
                    {
                        name: 'PERIKANAN',
                        y: <?= $klasifikasi_perikanan ?>
                    },
                    {
                        name: 'PETERNAKAN',
                        y: <?= $klasifikasi_peternakan ?>
                    },
                    {
                        name: 'INDUSTRI RUMAHAN',
                        y: <?= $klasifikasi_peternakan ?>
                    },
                ]
            }]
        });

        Highcharts.chart('regulasi_tk_kawasan_perkabupaten', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: 'BERDASARKAN JUMLAH KAWASAN PERKABUPATEN'
            },
            subtitle: {
                text: 'Pertahun <?= date('Y'); ?>'
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes']
            },
            yAxis: {
                title: {
                    text: 'Total'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah KP Terverifikasi',
                type: 'column',
                data: [<?= $verif_kp_cilacap ?>, <?= $verif_kp_banyumas ?>, <?= $verif_kp_purbalingga ?>, <?= $verif_kp_banjarnegara ?>, <?= $verif_kp_kebumen ?>, <?= $verif_kp_purworejo ?>, <?= $verif_kp_wonosobo ?>, <?= $verif_kp_magelang ?>, <?= $verif_kp_boyolali ?>, <?= $verif_kp_klaten ?>, <?= $verif_kp_sukoharjo ?>, <?= $verif_kp_wonogiri ?>, <?= $verif_kp_karanganyar ?>, <?= $verif_kp_sragen ?>, <?= $verif_kp_grobogan ?>, <?= $verif_kp_blora ?>, <?= $verif_kp_rembang ?>, <?= $verif_kp_pati ?>, <?= $verif_kp_kudus ?>, <?= $verif_kp_jepara ?>, <?= $verif_kp_demak ?>, <?= $verif_kp_semarang ?>, <?= $verif_kp_temanggung ?>, <?= $verif_kp_kendal ?>, <?= $verif_kp_batang ?>, <?= $verif_kp_pekalongan ?>, <?= $verif_kp_pemalang ?>, <?= $verif_kp_tegal ?>, <?= $verif_kp_brebes ?>],
                showInLegend: true,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
            }, {
                name: 'Jumlah KP',
                color: '#cc9e06',
                type: 'column',
                data: [<?= $kp_cilacap ?>, <?= $kp_banyumas ?>, <?= $kp_purbalingga ?>, <?= $kp_banjarnegara ?>, <?= $kp_kebumen ?>, <?= $kp_purworejo ?>, <?= $kp_wonosobo ?>, <?= $kp_magelang ?>, <?= $kp_boyolali ?>, <?= $kp_klaten ?>, <?= $kp_sukoharjo ?>, <?= $kp_wonogiri ?>, <?= $kp_karanganyar ?>, <?= $kp_sragen ?>, <?= $kp_grobogan ?>, <?= $kp_blora ?>, <?= $kp_rembang ?>, <?= $kp_pati ?>, <?= $kp_kudus ?>, <?= $kp_jepara ?>, <?= $kp_demak ?>, <?= $kp_semarang ?>, <?= $kp_temanggung ?>, <?= $kp_kendal ?>, <?= $kp_batang ?>, <?= $kp_pekalongan ?>, <?= $kp_pemalang ?>, <?= $kp_tegal ?>, <?= $kp_brebes ?>],
                showInLegend: true,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
            }]
        });
    </script>
<?php endif; ?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>

</html>