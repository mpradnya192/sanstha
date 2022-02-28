<?= view('home/dash_header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<!-- <h1>General Form</h1> -->
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
						<li class="breadcrumb-item active">Create Sanstha</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row" id="import_profiles">
				<div class="col-md-12">
					<!-- general form elements disabled -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Create Sanstha</h3>
						</div>
					</div>
					<form role="form" id="createSanstha" method="post" action="<?= site_url('cosanstha/create_sanstha/'.service('uri')->getSegment(3).''); ?>">
						<div class="card-body" style="padding: 0.25rem;">
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>1. State Details</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>State <span class="mandatory"> * </span></label>
											<input type="text" class="form-control hidden" name="cs_state" value="<?= service('uri')->getSegment(3); ?>">
											<select class="form-control" name="cs_state" disabled>
												<option value="">Please select</option>
												<?php foreach ($state as $skey) {  ?> 
													<option value="<?php echo $skey['st_id']; ?>" <?php if($skey['st_id'] == service('uri')->getSegment(3)){ echo "selected"; } ?>><?php echo $skey['st_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>District<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_city">
												<option value="">Please select</option>
												<?php foreach ($district as $ckey) {  ?>
													<option value="<?= $ckey['dist_id'] ?>"><?= $ckey['dist_name'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Taluka<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_taluka">
												<option value="">Please select</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Zone<span class="mandatory">  </span></label>
											<input type="text" class="form-control" name="cs_zone" value="<?= $region[0]['zone_name']; ?>" readonly="">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Sector<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_sector">
												<option value="">Please select</option>
												<?php foreach($sector as $sec){ ?>
													<option value="<?= $sec['sector_id']; ?>"><?= $sec['sector_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Sub Sector</label>
											<select class="form-control" name="cs_subsector">
												<option value="">Please select</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>2. Sanstha Details</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Prefix</label>
											<?php //print_r($pickup);?>
											<select class="form-control" name="cs_prefix">
												<option value="">Please select</option>
												<?php foreach($prefix as $pkey){ ?>
														<option value="<?php echo $pkey['master_id'];?>"><?php echo $pkey['master_name'];?></option>
												<?php }	?>
												
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Name<span class="mandatory"> * </span></label>
											<!-- <input type="text" name="cs_name" class="form-control"> -->
										<textarea class="form-control" name="cs_name" id="" rows="2"></textarea>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Head Office Full Address<span class="mandatory">  </span></label>
											<textarea class="form-control" name="cs_head_off_addr" id="" rows="2"></textarea>									
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Head Office Place<span class="mandatory">  </span></label>
											<textarea class="form-control" id="" name="cs_head_off_place" rows="2"></textarea>									
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Head Office Pincode<span class="mandatory">  </span></label>
											<input type="text"  name="cs_head_off_pincode" class="form-control">									
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Landline No<span class="mandatory"></span></label>
											<input type="text"  name="cs_head_off_landline" class="form-control">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Mobile No<span class="mandatory"></span></label>
											<input type="text"  name="cs_head_off_mobile" class="form-control" placeholder="9874563210">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Email<span class="mandatory"></span></label>
											<input type="email"  name="cs_head_off_email" class="form-control" placeholder="abc@gmail.co">				
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Website<span class="mandatory"></span></label>
											<input type="text"  name="cs_website" class="form-control" placeholder="wwww.santha.com">	
										</div>
									</div>
								</div>								
							</fieldset>							
						</div>
						<!-- /.card-body -->
						<div class="card-footer text-right">
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-primary">Create Sanstha</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>

</div>

<?= view('sanstha/sanstha_footer'); ?>
