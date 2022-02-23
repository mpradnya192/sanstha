<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		<!-- Anything you want -->
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2021-2022 <a href="https://nimble-esolutions.com/">Nimble e-Solutions</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url(); ?>/public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>/public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?= base_url(); ?>/public/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
		$(window).on('load',function() {
      	$(".loader").fadeOut("slow");
  	});	
	$(document).ready(function () {
	   	$('#no').validate({
			rules: {
				c_name: {
					required: true
				},
				c_type: {
					required: true
				},
			}

	      });

	$('#deleteProduct').on('show.bs.modal', function(e) {
        var c_id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[name="c_id"]').val(c_id);
        alert(c_id);
    });
});
</script>
</body>
</html>
