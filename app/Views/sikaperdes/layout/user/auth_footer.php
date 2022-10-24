<script src="<?= base_url('minia/libs/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/node-waves/waves.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/feather-icons/feather.min.js'); ?>"></script>
<script src="<?= base_url('minia/js/pages/pass-addon.init.js'); ?>"></script>
<!-- pace js -->
<script src="<?= base_url('minia/libs/pace-js/pace.min.js'); ?>"></script>

<?php $request = \Config\Services::request(); ?>
<?php if ($request->uri->getSegment(1) == "registrasi") : ?>
    <!-- choices js -->
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>

    <!-- form mask -->
    <script src="<?= base_url('minia/libs/imask/imask.min.js'); ?>"></script>

    <!-- init js -->
    <script src="<?= base_url('minia/js/pages/form-maskindo.init.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/form-advanced-dsonline.init.js') ?>"></script>
<?php endif; ?>
</body>

</html>