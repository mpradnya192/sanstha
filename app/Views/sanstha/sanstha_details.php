<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use \App\Models\HomeModel;
use \App\Models\UserModel;
use \App\Models\RegionModel;
use \App\Models\statesModel;
use \App\Models\CitiesModel;
use \App\Models\SansthaModel;
use \App\Models\PickupModel;
use \App\Models\SectorModel;
use \App\Models\SubsectorModel;
use \App\Models\SansthaBranchesModel;

?>

<?= view('home/dash_header'); ?>
<style type="text/css">
.field_value{
  color: #000;
  font-size: larger;
  font-weight: 600;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-4">
                   <h3 class="card-title">View Listing <?php if(service('uri')->getSegment(3) != ''){
                      $sansthaState = (new statesModel())->where(array('st_id'=>service('uri')->getSegment(3)))->findAll();
                      echo "( ".$sansthaState[0]['st_name']." )";
                    }
                  ?></h3>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="input-group input-group-sm">            
                        <!-- text input -->
                        <div class="form-group">
                          <input type="text" name="" class="form-control" placeholder="General Search">
                        </div>
                        <!-- text input -->
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-sm"></i></button>
                        </div>
                      </div>                   
                    </div>
                    <div class="col-sm-4">
                    <?php if(service('uri')->getSegment(3) != ''){ ?>
                        <a href="<?= site_url('cosanstha/create_sanstha/'.service('uri')->getSegment(3).'') ?>"><span class="btn btn-primary"> <i class="fas fa-plus fa-sm"></i> Sanstha </span></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>        
            </div>
            <div class="card-body">
                <!-- <div class="row"> -->
                    <div class="row">
                      <div class="col-sm-12">
                        <form role="form" id="createSanstha" method="post" action="<?php if(!empty(service('uri')->getSegment(3))) { echo site_url('cosanstha/sanstha_details/'.service('uri')->getSegment(3).''); }else{ echo site_url('cosanstha/sanstha_details'); } ?>">
                          <div class="row">
                            <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>State <span class="mandatory"> * </span></label>
                                <select class="form-control" name="cs_filter_state" <?php if(service('uri')->getSegment(3) != ''){ echo "disabled"; } ?>>
                                  <option value="">Please select</option>
                                  <?php foreach ($state as $skey) {  ?> 
                                    <option value="<?php echo $skey['st_id']; ?>" <?php if($skey['st_id'] == $state_data){ echo "selected"; } ?>><?php echo $skey['st_name']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>District<span class="mandatory"> * </span></label>
                                <select class="form-control" name="cs_filter_district">
                                  <option value="">Please select</option>
                                  <?php if($state_data != '') {foreach ($district as $ckey) {  ?>
                                    <option value="<?= $ckey['dist_id'] ?>" <?php if($ckey['dist_id'] == $district_data){ echo "selected"; } ?>><?= $ckey['dist_name'] ?></option>
                                  <?php } }?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Taluka<span class="mandatory"> * </span></label>
                                <select class="form-control" name="cs_filter_taluka">
                                  <option value="">Please select</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-3" style="padding-top: 2.5%;">
                              <!-- text input -->
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                <!-- </div> -->
                <div class="row">
                  <div class="col-sm-6 text-left"> <?php echo $pager->links(); ?></div>
                  <div class="col-sm-6 text-right"> <span class="btn btn-primary"><i class="fa fa-file-pdf fa-sm" title="Export To pdf"></i></span></span>   </div>
                </div>
               
              	<table class="table table-responsive table-head-fixed text-nowrap table-striped table-bordered" id="sanstha_data">
	                <thead>
	                  <tr>
	                    <th style="width: 1%;text-align: center;">Sr.No</th>
	                    <th style="text-align:center;">Name</th>
	                    <th style="text-align: center;">Head Office Address</th>
	                    <th style="text-align: center;">Sector</th>
	                    <th style="text-align: center;">Turnover[Lacks]</th>
                      <th style="text-align: center;">Actions</th>
	                  </tr>					
	                </thead>
	                <tbody>
	                	<?php if(empty($sanstha)) { ?>
	                    <tr><td colspan="6" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
	                    <?php } else{ $i=0; foreach($sanstha as $skey) { 
                        $prefix = (new PickupModel())->where(array('master_isDelete'=>0,'master_id'=>$skey['cs_prefix']))->findAll();
                        $sector=(new SectorModel())->where('sector_id',$skey['cs_sector'])->findAll();
		                    $subsector=(new SubsectorModel())->where('ss_isDelete = 0 AND ss_sector_id = '.$skey['cs_subsector'].'')->findAll();
		                    $branch=(new SansthaBranchesModel())->where('sb_sanstha_id = '.$skey['cs_id'].'')->findAll();
                      ?>
	                  	<tr>
	                  		<td><?php echo ++$i; ?></td>
	                  		<td><?php echo $prefix[0]['master_name'].' '.$skey['cs_name']; ?></td>
	                  		<td><?php echo $skey['cs_head_off_addr']; ?></td>
	                  		<td><?php echo $ector[0]['sector_name'].' - '.$subsector[0]['ss_name'] ?></td>
	                  		<td><?php echo $branch[0]['sb_annual_turnover']; ?></td>
                        <td>
                          <a href="<?php echo site_url('cosanstha/view_sanstha/'.$skey['cs_id']) ?>"><span style="align-items: center;padding:.20rem .40rem;" class="btn btn-warning btn-xs"><i class="fa fa-eye" title="view sanstha"></i></span></a>&nbsp;
                          <?php if(service('uri')->getSegment(3) != ''){ ?>	                	
                            <a href="<?php echo site_url('cosanstha/update_sanstha/'.$skey['cs_id']) ?>"><span style="align-items: center;padding:.20rem .40rem;"class="btn btn-warning btn-xs"><i class="fa fa-edit" title="Update sanstha"></i></span></a> &nbsp;
                            <span style="text-align: center;" data-toggle="modal" data-id="<?php echo $skey['cs_id'] ?>"data-target="#deleteSanstha"><span class="btn btn-xs btn-primary" style="padding:.20rem .40rem;"><i class="fa fa-trash-alt" title="Delete"></i></span></span>    
                        <?php } ?>
                        </td>
                      </tr>
	                  <?php } }?>
	                </tbody>
	              </table>
                
               <?php echo $pager->links(); ?>
              </div>              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
         
          <div id="deleteSanstha" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
              <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('Sanstha/sansthaDeleteRe') ?>" style="position: relative;z-index: 10000;">
                <div class="modal-content">
                  <div class="modal-body">
                    <h4 class="modal-title">Are you sure you want to delete this sanstha?</h4>
                    <div class="form-group">
                      <input type="text" class="form-control hidden" name="cs_id" >
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color: #1AB394; color:white;" >Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
         <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
  <!-- /.control-sidebar -->
<?= view('sanstha/sanstha_footer'); ?>