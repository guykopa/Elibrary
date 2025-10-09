

<?php require_once APP_ROOT . '/views/includes/user/header.php';?>
<?php require_once APP_ROOT . '/views/includes/user/sidebar.php';?>
<?php require_once APP_ROOT . '/views/includes/user/navbar.php';?>

<?php require_once APP_ROOT . '/views/user/detailLivre/detailLivre.php';?>

<?php require_once APP_ROOT . '/views/includes/user/footer.php';?>
<!-- Vendor js -->


 <!--plugins-->
<script src="<?= URL_ROOT; ?>/public/assets/js/jquery.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/libs/dropify/js/dropify.min.js"></script>

<!-- Init js-->
<script src="<?= URL_ROOT; ?>/public/assets/js/pages/form-wizard.init.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/js/pages/form-fileuploads.init.js"></script>


<!--app JS-->
<script src="<?= URL_ROOT; ?>/public/assets/js/app.js"></script>
<!--<script src="<?= URL_ROOT; ?>/public/assets/js/app.min.js"></script>-->




 <!-- Bootstrap JS -->
<script src="<?= URL_ROOT; ?>/public/assets/js/bootstrap.bundle.min.js"></script>



<!-- table -->
<script src="<?= URL_ROOT; ?>/public/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
	$(document).ready(function() {
		var table = $('#example2').DataTable( {
			lengthChange: false,
			buttons: [ 'copy', 'excel', 'pdf', 'print']
		} );
		
		table.buttons().container()
			.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
	} );
</script>




	</body>

</html>