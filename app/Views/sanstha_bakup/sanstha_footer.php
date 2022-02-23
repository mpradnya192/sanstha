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
      var chkVal=$(this).val();

      $.post('<?= site_url('Sanstha/getRegion') ?>',{chkVal}, function(regionInfo){
        // console.log(regionInfo);
        $('input[name="cs_zone"]').val(regionInfo[0]['zone_name']);
      },'JSON'); 
        
      $.post('<?= site_url('Sanstha/getCity') ?>',{chkVal}, function(cityInfo){
        // console.log(cityInfo);
        $('select[name="cs_city"]').empty();
        $("select[name='cs_city']").append('<option value="">Please select</option>');
        $.each(cityInfo,function(p,q){           
            $("select[name='cs_city']").append('<option value="'+q.ct_id+'">'+q.ct_name+'</option>');            
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
            $("select[name='cs_filter_city']").append('<option value="'+q.ct_id+'">'+q.ct_name+'</option>');            
        });       
      },'JSON');     
    });

    $('#deleteSanstha').on('show.bs.modal', function(e) {
      var cs_id = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('input[name="cs_id"]').val(cs_id);
      alert(cs_id);
    });

    $(document).on('change',"input[name='csd_chairman_name'],input[name='csd_chairman_mobile'],input[name='csd_md_name'],input[name='csd_md_mobile']",function(){
      var chairman_name = $("input[name='csd_chairman_name']").val();
      var chairman_mobile = $("input[name='csd_chairman_mobile']").val();
      var chairman_md = $("input[name='csd_md_name']").val();
      var chairman_md_mobile = $("input[name='csd_md_mobile']").val();
      if(chairman_name != '' || chairman_mobile != '' || chairman_md != '' || chairman_md_mobile != ''){
        if(chairman_name == ''){
          $("input[name='csd_chairman_name']").rules("add", 
          {
              required: true
          })
        }else{

        }
        if(chairman_mobile == ''){
          $("input[name='csd_chairman_mobile']").rules("add", 
          {
              required: true
          })
        }
        if(chairman_md == ''){
          $("input[name='csd_md_name']").rules("add", 
          {
              required: true
          })
        }
        if(chairman_md_mobile == ''){
          $("input[name='csd_md_mobile']").rules("add", 
          {
              required: true
          })
        }
      }else{
        $("input[name='csd_md_mobile']").rules("remove",'required');
        $("input[name='csd_md_name']").rules("remove",'required');
        $("input[name='csd_md_name']").removeClass("error");
        $("input[name='csd_chairman_mobile']").rules("remove",'required');
        $("input[name='csd_chairman_name']").rules("remove",'required');
        $("input[name='csd_chairman_name']").removeClass("error");
      }
    });

    $(document).on('change',"input[name='csd_branch_nos'],input[name='csd_estension_counters'],input[name='csd_members_count'],input[name='csd_annual_turnover'],input[name='as_on_date']",function(){
      var branch_number = $("input[name='csd_branch_nos']").val();
      var extensio_counter = $("input[name='csd_estension_counters']").val();
      var member_count = $("input[name='csd_members_count']").val();
      var annual_turnover = $("input[name='csd_annual_turnover']").val();
      var as_date = $("input[name='as_on_date']").val();
      if(branch_number != '' || extensio_counter != '' || member_count != '' || annual_turnover != '' || as_date != ''){
        if(branch_number == ''){
          $("input[name='csd_branch_nos']").rules("add", 
          {
              required: true
          })
        }
        if(extensio_counter == ''){
          $("input[name='csd_estension_counters']").rules("add", 
          {
              required: true
          })
        }
        if(member_count == ''){
          $("input[name='csd_members_count']").rules("add", 
          {
              required: true
          })
        }
        if(annual_turnover == ''){
          $("input[name='csd_annual_turnover']").rules("add", 
          {
              required: true
          })
        }
        if(as_date == ''){
          $("input[name='as_on_date']").rules("add", 
          {
              required: true
          })
        }
      }else{
        $("input[name='csd_branch_nos']").rules("remove",'required');
        $("input[name='csd_estension_counters']").rules("remove",'required');
        $("input[name='csd_members_count']").rules("remove",'required');
        $("input[name='csd_annual_turnover']").rules("remove",'required');
        $("input[name='as_on_date']").rules("remove",'required');
      }
    });

    $(document).on('change',"select[name='cs_status'],select[name='cs_foundation_year'],select[name='cs_operation_area'],select[name='cs_classification1'],select[name='cs_classification2'],select[name='cs_classification3'],select[name='cs_classification4']",function(){
      var cs_status = $("select[name='cs_status']").val();
      var foundation_year = $("select[name='cs_foundation_year']").val();
      var operation_area = $("select[name='cs_operation_area']").val();
      var classification_one = $("select[name='cs_classification1']").val();
      var classification_two = $("select[name='cs_classification2']").val();
      var classification_three = $("select[name='cs_classification3']").val();
      var classification_four = $("select[name='cs_classification4']").val();
      if(cs_status != '' || foundation_year != '' || operation_area != '' || (classification_one != '' && classification_two != '' && classification_three != '' && classification_four != '')){
        if(cs_status == ''){
          $("select[name='cs_status']").rules("add", 
          {
              required: true
          })
        }else{
          $("select[name='cs_status']").rules("remove",'required');
        }
        if(foundation_year == ''){
          $("select[name='cs_foundation_year']").rules("add", 
          {
              required: true
          })
        }else{
          $("select[name='cs_foundation_year']").rules("remove",'required');
        }
        if(operation_area == ''){
          $("select[name='cs_operation_area']").rules("add", 
          {
              required: true
          })
        }else{
          $("select[name='cs_operation_area']").rules("remove",'required');
        }
        if(classification_one == '' && classification_two == '' && classification_three == '' && classification_four == ''){
          $("select[name='cs_classification1']").rules("add", 
          {
              required: true,
              messages: {
                required: "Select at least one classification"
              }
          })
        }else{
          $("select[name='cs_classification1']").rules("remove",'required');
          $("select[name='cs_classification1']").removeClass("error");
        }   
      }else{
        $("select[name='cs_status']").rules("remove",'required');
        $("select[name='cs_foundation_year']").rules("remove",'required');
        $("select[name='cs_operation_area']").rules("remove",'required');
        $("select[name='cs_classification1']").rules("remove",'required');
      }
    });

    $(document).on('change',"select[name='cs_membership_status'],input[name='cs_membership_start_date'],input[name='cs_membership_end_date']",function(){
      var membership = $("select[name='cs_membership_status']").val();
      var startDate = $("input[name='cs_membership_start_date']").val();
      var endDate = $("input[name='cs_membership_end_date']").val();
      if(membership != '' || (startDate != '' && endDate != '')){
        if(membership == ''){
          $("select[name='cs_membership_status']").rules("add", 
          {
              required: true
          })
        }else{
          $("select[name='cs_membership_status']").rules("remove",'required');
        }
        if((membership == '45' || membership == '44') && (startDate == '' || endDate == '')){
          if(startDate == ''){
            $("input[name='cs_membership_start_date']").rules("add", 
            {
                required: true
            })
          }else{
            $("input[name='cs_membership_start_date']").rules("remove",'required');
          }
          if(endDate == ''){
            $("input[name='cs_membership_end_date']").rules("add", 
            {
                required: true
            })
          }else{
            $("input[name='cs_membership_end_date']").rules("remove",'required');
          }
        }
      }
    });

    $(document).on('click','#sansthaDetails',function(){
      $('#sansthaInfo').removeClass('hidden');
      $('#sansthaDetails').addClass('hidden');
    });
    $(document).on('click','#sansthaInfomation',function(){
      $('#otherDetails').removeClass('hidden');
      $('#sansthaInfomation').addClass('hidden');
    });
    $(document).on('click','#sansthaOther',function(){
      $('#managementInfo').removeClass('hidden');
      $('#sansthaOther').addClass('hidden');
    });
    $(document).on('click','#sansthaManagement',function(){
      $('#membershipDetails').removeClass('hidden');
      $('#sansthaManagement').addClass('hidden');
    });

    $('#createSanstha').validate({
      rules:{
          cs_state:{
              required: true
          },
          cs_city:{
              required:true
          },
          // cs_taluka:{
          //     required:true
          // },
          // cs_type:{
          //     required:true
          // },
          cs_prefix:{
              required:true
          },
          cs_name:{
              required:true
          },
          cs_zone:{
              required:true
          },
          csd_chairman_mobile:{
              digits:true,
              maxlength:10,
              minlength:10
          },
          csd_md_mobile:{
              digits:true,
              maxlength:10,
              minlength:10
          }
      },
      messages:{
          
      }
    });
});   
</script>
</body>
</html>
