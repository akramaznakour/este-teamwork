<!-- All Jquery -->
<script src="<?php echo URL; ?>js/lib/jquery/jquery.min.js"></script>

<script src="<?php echo URL; ?>js/bootstrap.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo URL; ?>js/jquery.slimscroll.js"></script>


<!--stickey kit -->
<script src="<?php echo URL; ?>js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

<!--Custom JavaScript -->
<script src="<?php echo URL; ?>js/custom.min.js"></script>

<script src="<?php echo URL; ?>js/application.js"></script>

<!--Menu sidebar -->
<script src="<?php echo URL; ?>js/sidebarmenu.js"></script>

<?php if (isset($_GET['url']) && substr($_GET['url'], 0, 13) == 'projects/show') { ?>
    <script src="<?php echo URL; ?>js/formTab.js"></script>
    <script src="<?php echo URL; ?>js/chat.js "></script>
    <script src="<?php echo URL; ?>js/recherche.js "></script>
<?php } ?>

</body>

</html>