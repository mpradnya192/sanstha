<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use \App\Models\HomeModel;
use \App\Models\UserModel;
use \App\Models\RegionModel;
use \App\Models\statesModel;
use \App\Models\CitiesModel;
use \App\Models\SansthaModel;
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
							<h3 class="card-title">Sanstha Details</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
							<div class="row " style="margin: 0px;">   
								<form role="form" action="<?= site_url('Report/sanstha_report_search') ?>" method="post" style="width:100%">
									<div class="row" style="margin:0;">
										<div class="col-sm-2">
											<label class="control-label">State</label>
											<select class="form-control" name="state"> 
												<option value="">Please Select State</option>
												<?php foreach ($state as $key) {?>
												<option value="<?= $key['st_id'] ?>"><?= $key['st_name'] ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-sm-2">
											<label class="control-label">District</label>
											<select class="form-control" name="district"> 
												<option value="">Please Select District</option>
												<option value=""></option>
											</select>
										</div>
										<div class="col-sm-2">
											<label class="control-label">Taluka</label>
											<select class="form-control" name="taluka"> 
												<option value="">Please Select Taluka</option>
												<option value=""></option>
											</select>
										</div>
										<div class="col-sm-2">
											<label class="control-label">Sector</label>
											<select class="form-control" name="sector"> 
												<option value="">Please Select Sector</option>
												<?php foreach ($sector as $sec) {?>
													<option value="<?= $sec['sector_id'] ?>"><?= $sec['sector_name'] ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-sm-2">
											<label class="control-label">Sub Sector</label>
											<select class="form-control" name="sub_sector"> 
												<option value="">Please Select Sub Sector</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label class="control-label">Sanstha</label>
											<select class="form-control" name="sanstha"> 
												<option value="">Please Select Sanstha</option>
												<?php foreach ($sanstha as $sans) {?>
													<option value="<?= $sans['cs_id'] ?>"><?= $sans['cs_name'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<br>
									<div class="row">
										
									</div>
										<div class="col-sm-12" style="text-align:left;">
											<br>
											<button type="submit" class="btn" style="border-color: #30b977;background-color:#30b977;">Search</button>
											<!-- <span class="btn  add_row" style="border-color: #30b977;background-color:#30b977; " id="add_row">Add Rule</span> -->
											<span style="border-color:#f9d62c;background-color:#f9d62c;" class="btn" id="delete_row">Reset</span>
										</div>								
									</div>
									<div class="row ">

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
											<!-- <th style="text-align: center;">Actions</th> -->
										</tr>					
									</thead>
									<tbody>
										<?php if(empty($sanstha)) { ?>
											<tr><td colspan="5" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
										<?php } else{ $i=0; foreach(array_reverse($sanstha) as $skey) { 
												$sanstha_details = '';
											?>
											<tr>
												<td><?php echo ++$i; ?></td>
												<td><?php echo $skey['cs_prefix'].' '.$skey['cs_name']; ?></td>
												<td><?php echo $skey['cs_head_off_addr']; ?></td>
												<td><?php //echo $i++; ?></td>
												<td><?php //echo $i++; ?></td>
												<!-- <td></td> -->
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