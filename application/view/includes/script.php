<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo URL; ?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<![endif]-->
<script src="<?php echo URL; ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo URL; ?>assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="<?php echo URL; ?>assets/js/form-wizards.demo.min.js"></script>
<script src="<?php echo URL; ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function () {
        App.init();
        FormWizard.init();
    });
</script>


<?php if (isset($_GET['url']) && substr($_GET['url'], 0, 13) == 'projects/show') { ?>
    <script src="<?php echo URL; ?>js/recherche.js "></script>
    <script src="<?php echo URL; ?>js/chat.js"></script>

<?php } ?>

<script src="<?php echo URL; ?>js/Application.js"></script>

</body>
</html>
