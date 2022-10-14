<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <?= date("Y"); ?> . SIKAPERDES . DISPERMADESDUKCAPIL Provinsi Jawa Tengah</span>
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
            $('#editemailprovinsi').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dispermades-provinsi/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dispermades-provinsi/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithpprovinsi').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dispermades-provinsi/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dispermades-provinsi/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
        <script>
            $('#editemailprovinsi').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dukcapil-provinsi/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dukcapil-provinsi/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithpprovinsi').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dukcapil-provinsi/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dukcapil-provinsi/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
        <script>
            $('#editemailpemkot').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dukcapil-pemkot/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dukcapil-pemkot/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithppemkot').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dukcapil-pemkot/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dukcapil-pemkot/editprofile'); ?>";
                    }
                })
            });
        </script>
    <?php elseif ($session->get('role_id_sikaperdes') == '5') : ?>
        <script>
            $('#editemailpemkab').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const email = $(this).data('email');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dispermades-pemkab/editemail'); ?>",
                    type: 'post',
                    data: {
                        email: email,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dispermades-pemkab/editprofile'); ?>";
                    }
                })
            });
        </script>
        <script>
            $('#edithppemkab').on('click', function() {
                var csrfName = $('.txt_csrfname_sie').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname_sie').val(); // CSRF hash
                const hp = $(this).data('hp');
                const userid = $(this).data('userid');

                $.ajax({
                    url: "<?= base_url('user/dispermades-pemkab/edithp'); ?>",
                    type: 'post',
                    data: {
                        hp: hp,
                        userid: userid,
                        [csrfName]: csrfHash
                    },
                    success: function() {
                        document.location.href = "<?= base_url('user/dispermades-pemkab/editprofile'); ?>";
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
                        url: "<?= base_url('user/dispermades-provinsi/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                        url: "<?= base_url('user/dukcapil-provinsi/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
                        url: "<?= base_url('user/dukcapil-pemkot/ajaxserverSide_rolemanagement') ?>"
                    <?php elseif ($session->get('role_id_sikaperdes') == '5') : ?>
                        url: "<?= base_url('user/dispermades-pemkab/ajaxserverSide_rolemanagement') ?>"
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
                    <?php if ($session->get('role_id_sikaperdes') == '1' || $session->get('role_id_sikaperdes') == '2') : ?> {
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
                            url: "<?= base_url('user/dispermades-provinsi/ajaxfiltkecamatan') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            url: "<?= base_url('user/dukcapil-provinsi/ajaxfiltkecamatan') ?>"
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
                            url: "<?= base_url('user/dispermades-provinsi/ajaxfiltkeldesa') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '3') : ?>
                            url: "<?= base_url('user/dukcapil-provinsi/ajaxfiltkeldesa') ?>"
                        <?php elseif ($session->get('role_id_sikaperdes') == '4') : ?>
                            url: "<?= base_url('user/dukcapil-pemkot/ajaxfiltkeldesa') ?>"
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

<?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "verifikasi_data") : ?>
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
                    url: "<?= base_url('user/menu-admin/load_data_kawasan') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.tahunfilt = $('#statusfilt').val();
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
                    url: "<?= base_url('user/menu-admin/load_data_kawasan') ?>",
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

<?php elseif ($request->uri->getSegment(2) == "menu-admin" && $request->uri->getSegment(3) == "list_input_data_kawasan") : ?>
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
                    url: "<?= base_url('user/menu-admin/list_datainput_kawasan') ?>",
                    type: 'post',
                    data: {
                        "csrf_test_name": $('input[name=csrf_test_name]').val(),
                    },
                    data: function(data) {
                        data.csrf_test_name = $('input[name=csrf_test_name]').val();
                        data.tahunfilt = $('#statusfilt').val();
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
                    url: "<?= base_url('user/menu-admin/list_datainput_kawasan') ?>",
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

<?php elseif ($request->uri->getSegment(2) == "data-dispermades" && $request->uri->getSegment(3) == "download") : ?>
    <!-- Required datatable js -->
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>

<?php endif; ?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>

</html>