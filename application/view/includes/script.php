<script>
    var url = "<?php echo URL; ?>";
    var project_id = "<?php echo $project->id; ?>";
    var user_id = "<?php echo $user->id; ?>";
</script>


<?php if ( true) {
    require APP . 'view/includes/jsgantt.php';
} ?>


<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo URL; ?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo URL; ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo URL; ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function () {
        App.init();
        FormWizard.init();
    });
</script>


<?php if (true) { ?>
    <!-- ================== BEGIN PAGE projects/show ================== --><?php if (true) { ?>
        <link href="<?php echo URL; ?>assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet"/>
        <script src="<?php echo URL; ?>assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
        <script src="<?php echo URL; ?>assets/js/form-wizards.demo.min.js"></script>
        <script src="<?php echo URL; ?>assets/js/recherche.js "></script>
        <script src="<?php echo URL; ?>assets/js/task.js"></script><?php } ?>
    <script src="<?php echo URL; ?>assets/js/chat.js"></script>
    <!-- ================== END PAGE projects/show ================== -->
<?php } ?>


</body>
</html>
