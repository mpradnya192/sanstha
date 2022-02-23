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
use \App\Models\SansthaDetailsModel;

// site_url('report/generate_report');
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
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Sanstha Report - Foundation Yearwise</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
							<div class="row " style="margin: 0px;">   
								<form role="form" action="<?= site_url('report/rpt_by_foundation_year') ?>" method="post" style="width:100%">
									<div class="row" style="margin:0;">
										<div class="col-sm-2">
											<?php 
												$d2 = date('Y');
											?>
											<div class="form-group">
												<label>From Year<span class="mandatory"></span></label>
												<select class="form-control" name="from_year" required="" id="from_year">
													<option value="">Please select</option>
													<?php for ($i=$d2; $i >= 1900; $i--) { if($from_year == $i) { ?>
														<option selected="" value="<?= $i; ?>"><?= $i; ?></option>
													<?php }else{ ?>
														<option value="<?= $i; ?>"><?= $i; ?></option>
													<?php } }?>
												</select>							
											</div>
										</div>
										<div class="col-sm-2">
											<?php 
												$d2 = date('Y');
											?>
											<div class="form-group">
												<label>To Year<span class="mandatory"></span></label>
												<select class="form-control" name="to_year">
													<option value="">Please select</option>
													<?php if($to_year){ ?>
														<option selected="" value="<?= $to_year; ?>"><?= $to_year; ?></option>
													<?php } ?>

												</select>							
											</div>
										</div>
										<div class="col-sm-2" style="margin-top:2.5%">
											<button type="submit" class="btn" style="border-color: #30b977;background-color:#30b977;">Search</button>
											<span style="border-color:#f9d62c;background-color:#f9d62c;" class="btn" id="delete_row">Reset</span>
										</div>
										
									</div>					
								</form>
							</div>
							<br>
							<div class="row" style="margin-left: 1%;margin-right: 1%;">
								<table class="table table-responsive table-head-fixed text-nowrap table-striped table-bordered">
									<thead>
										<tr>
											<th style="width: 1%;text-align: center;">#</th>
											<th style="text-align:center;">Sanstha Name</th>
											<th style="text-align: center;">Head Office Address</th>
											<th style="text-align: center;">Chairman Details</th>
											<th style="text-align: center;">Contact Details</th>
											<th style="text-align: center;">Foundation Year</th>
										</tr>					
									</thead>
									<tbody>
										<?php if(empty($sanstha)) { ?>
											<tr><td colspan="6" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
										<?php } else{ $i=0; foreach(array_reverse($sanstha) as $skey) { 
												//$sanstha_details = $
											?>
											<tr>
												<td><?php echo ++$i; ?></td>
												<td><?php 
						                        $prefix=(new PickupModel())->where('master_id',$skey['cs_prefix'])->findAll();
						                      
						                        if(!empty($prefix)){ echo $prefix[0]['master_name'].' '.$skey['cs_name']; } else{ echo $skey['cs_name']; } ?></td>
												<td><?php echo $skey['cs_head_off_addr']; ?></td>
												<td><?php  
												$chairman=(new SansthaDetailsModel())->where(array('csd_sanstha_id'=>$skey['cs_id'],'csd_isDelete'=>0))->findAll(); 
												if($chairman){
													echo  $chairman[0]['csd_chairman_name'].'<br>'.$chairman[0]['csd_chairman_mobile'];
												}
												?></td>
												<td><?php //echo $i++; ?></td>
												<td><?php echo $skey['cs_foundation_year']; ?></td>
											</tr>
										<?php } }?>
									</tbody>
								</table>
							</div>

						</div>              
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
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
	<?= view('report/report_footer'); ?>