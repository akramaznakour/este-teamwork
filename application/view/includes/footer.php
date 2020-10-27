<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<footer class="footer"> © 2018 All rights reserved.</footer>
<!-- End footer -->
</div>
<!-- End Wrapper -->
<script>
    var url = "<?php echo URL; ?>";
    var project_id = "<?php echo $project->id; ?>";
    var user_id = "<?php echo $user->ID; ?>";
</script>


<?php if (isset($_GET['url']) && substr($_GET['url'], 0, 13) == 'projects/show') {
    require APP . 'view/includes/jsgantt.php';
} ?>