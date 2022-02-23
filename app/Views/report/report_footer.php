<!-- Main Footer -->
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
<script src="<?= base_url();?>/public/frontEnd/vendor/jquery/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/public/dist/js/adminlte.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="<?php echo  base_url();?>/public/frontEnd/vendor/validate/jquery.validate.min.js"></script>
<script src="<?php echo  base_url();?>/public/frontEnd/vendor/validate/additional-methods.min.js"></script>
<script src="<?php echo  base_url();?>/public/dist/js/bootstrap-multiselect.js"></script>

<!--  Query-builder -->
<script src="<?= base_url(); ?>/public/dist/js/query-builder.standalone.min.js"></script>

<script type="text/javascript">
	$(window).on('load',function() {
    $(".loader").fadeOut("slow");
  });

  $(document).ready(function () {
    <?php if(isset($success)): ?>
      toastr.success("<?php echo $success; ?>");
    <?php endif; ?>
    <?php if(isset($info)): ?>
      toastr.info("<?php echo $info; ?>");
    <?php endif; ?>
    <?php if(isset($error)): ?>
      toastr.error("<?php echo $error; ?>");
    <?php endif; ?>

    $(document).on('change',"select[name='cs_state']",function(){
      var chkVal=$(this).val(); //alert("chkVal"+chkVal);
      $.post('<?= site_url('Sanstha/getRegion') ?>',{chkVal}, function(regionInfo){
        console.log(regionInfo);
        $('input[name="cs_zone"]').val(regionInfo[0]['zone_name']);
      },'JSON'); 
        
      $.post('<?= site_url('Sanstha/getCity') ?>',{chkVal}, function(cityInfo){
        console.log(cityInfo);
        $('select[name="cs_city"]').empty();
        $("select[name='cs_city']").append('<option value="">Please select</option>');
        $.each(cityInfo,function(p,q){           
            $("select[name='cs_city']").append('<option value="'+q.dist_id+'">'+q.dist_name+'</option>');            
        });       
      },'JSON');      
    });

    $(document).on('change',"select[name='state']",function(){
      var state = $(this).val();
      $.post('<?= site_url('Sanstha/getCity') ?>',{chkVal:state}, function(cityInfo){
        $('select[name="district"]').empty();
        $("select[name='district']").append('<option value="">Please select</option>');
        $.each(cityInfo,function(p,q){           
            $("select[name='district']").append('<option value="'+q.dist_id+'">'+q.dist_name+'</option>');            
        });       
      },'JSON'); 
    });

    $(document).on('change',"select[name='cs_filter_state']",function(){
      var chkVal=$(this).val(); 
        
      $.post('<?= site_url('Sanstha/getCity') ?>',{chkVal}, function(cityInfo){
        // console.log(cityInfo);
        $('select[name="cs_filter_city"]').empty();
        $("select[name='cs_filter_city']").append('<option value="">Please select</option>');
        $.each(cityInfo,function(p,q){           
            $("select[name='cs_filter_city']").append('<option value="'+q.dist_id+'">'+q.dist_name+'</option>');            
        });       
      },'JSON');     
    });
    
    $(document).on('change',"select[name='cs_filter_state_comp']",function(){
      var chkVal=$(this).val(); 
        
      $.post('<?= site_url('Sanstha/getCity') ?>',{chkVal}, function(cityInfo){
        // console.log(cityInfo);
        $('select[name="cs_filter_city_comp"]').empty();
        $("select[name='cs_filter_city_comp']").append('<option value="">Please select</option>');
        $.each(cityInfo,function(p,q){           
            $("select[name='cs_filter_city_comp']").append('<option value="'+q.dist_id+'">'+q.dist_name+'</option>');            
        });       
      },'JSON');     
    });

    $(document).on('change',"select[name='sector']",function(){
      var sector = $(this).val();
      $.post('<?= site_url('Sanstha/getSubSector') ?>',{sector}, function(subSector){
        $('select[name="sub_sector"]').empty();
        $("select[name='sub_sector']").append('<option value="">Please select</option>');
        $.each(subSector,function(p,q){           
            $("select[name='sub_sector']").append('<option value="'+q.ss_id+'">'+q.ss_name+'</option>');            
        });       
      },'JSON'); 
    });

    $(document).on('change',"#from_year",function(){
      var from_year = $(this).val(); //alert(from_year);
      const todaysDate = new Date();
      const currentYear = todaysDate.getFullYear();
      //alert(currentYear);
      //var i= currentYear +parseInt(1);
      $("select[name='to_year']").empty();
      for(i=parseInt(from_year);i <=currentYear;i++)
      {
        $("select[name='to_year']").append('<option value="'+i+'">'+i+'</option>');  
      }
    });

     $('#example-getting-started').multiselect({
            enableHTML:true
        });


 });  

  
</script>
</body>
</html>
