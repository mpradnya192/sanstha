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
					<form role="form" id="createSanstha" method="post" action="<?= site_url('sanstha/create_sanstha'); ?>">
						<div class="card-body" style="padding: 0.25rem;">
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>1. State Details</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>State <span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_state">
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
												<?php foreach ($cities as $ckey) {  ?>
													<option value="<?= $ckey['ct_id'] ?>"><?= $ckey['ct_name'] ?></option>
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
											<label>Type<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_type">
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
											<label>Prefix<span class="mandatory"> * </span></label>
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
											<input type="text" name="cs_name" class="form-control">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Head Office Full Address<span class="mandatory">  </span></label>
											<textarea name="cs_head_off_addr" class="form-control">
											</textarea>										
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Head Office Place<span class="mandatory">  </span></label>
											<textarea name="cs_head_off_place" class="form-control">
											</textarea>										
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
											<input type="text"  name="cs_head_off_landline" class="form-control" placeholder="00123-4567890" pattern="[0-9]{5}-[0-9]{7}">								
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
								<div class="row text-right">
									<div class="col-sm-12">
										<span class="btn btn-warning btn-sm" id="sansthaDetails">Next</span>
									</div>
								</div>
							</fieldset>
							<fieldset class="hidden" id="sansthaInfo" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>	3. Sanstha Information</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Current Status<span class="mandatory"></span></label>
											<select class="form-control" name="cs_status">
												<option value="">Please select</option>
												<?php foreach ($status as $stat) { ?>
													<option value="<?= $stat['master_id'] ?>"><?= $stat['master_name'] ?></option>
												<?php } ?>
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<?php 
											$d2 = date('Y');
										?>
										<div class="form-group">
											<label>Foundation Year<span class="mandatory"></span></label>
											<select class="form-control" name="cs_foundation_year">
												<option value="">Please select</option>
												<?php for ($i=$d2; $i >= 1900; $i--) { ?>
													<option value="<?= $i; ?>"><?= $i; ?></option>
												<?php } ?>
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Area of Operation<span class="mandatory"></span></label>
											<select class="form-control" name="cs_operation_area">
												<option value="">Please select</option>
												<?php foreach($op_area as $pkey){ ?>
														<option value="<?php echo $pkey['master_id'];?>"><?php echo $pkey['master_name'];?></option>
												<?php }	?>									
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 1<span class="mandatory"></span></label>
											<select class="form-control" name="cs_classification1">
												<option value="">Please select</option>
												<?php foreach($class_1 as $pkey){ ?>
														<option value="<?php echo $pkey['master_id'];?>"><?php echo $pkey['master_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 2<span class="mandatory"></span></label>
											<select class="form-control" name="cs_classification2">
												<option value="">Please select</option>
												<?php foreach($class_2 as $pkey){ ?>
														<option value="<?php echo $pkey['master_id'];?>"><?php echo $pkey['master_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 3<span class="mandatory"></span></label>
											<select class="form-control" name="cs_classification3">
												<option value="">Please select</option>
												<?php foreach($class_3 as $pkey){ ?>
														<option value="<?php echo $pkey['master_id'];?>"><?php echo $pkey['master_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 4<span class="mandatory"></span></label>
											<select class="form-control" name="cs_classification4">
												<option value="">Please select</option>
												<?php foreach($class_4 as $pkey){ ?>
														<option value="<?php echo $pkey['master_id'];?>"><?php echo $pkey['master_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
								</div>
								<div class="row text-right">
									<div class="col-sm-12">
										<span class="btn btn-warning btn-sm" id="sansthaInfomation">Next</span>
									</div>
								</div>
							</fieldset>
							<fieldset class="hidden" id="otherDetails" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>	4. Other Details</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>No. of Branches / Office Units<span class="mandatory"></span></label>
											<input type="number"  name="csd_branch_nos" min="1" class="form-control" placeholder="Branches">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>No. of Extension Counters<span class="mandatory"></span></label>
											<input type="number"  name="csd_estension_counters" class="form-control" min="1" placeholder="Extension counters">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>No. of Members<span class="mandatory"></span></label>
											<input type="number"  name="csd_members_count" class="form-control" min="1" placeholder="No of members">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Annual Turnover<span class="mandatory"></span></label>
											<input type="number"  name="csd_annual_turnover" min="1" class="form-control" placeholder="Annual Turnover">		
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>As On Date<span class="mandatory"></span></label>
											<input type="date" name="as_on_date" class="form-control">
										</div>
									</div>
								</div>
								<div class="row text-right">
									<div class="col-sm-12">
										<span class="btn btn-warning btn-sm" id="sansthaOther">Next</span>
									</div>
								</div>
							</fieldset>
							<fieldset class="hidden" id="managementInfo" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>	5. Management Info</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Chairman Name<span class="mandatory"></span></label>
											<input type="text"  name="csd_chairman_name" class="form-control" placeholder="Name">		
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Chairman Mobile No<span class="mandatory"></span></label>
											<input type="text"  name="csd_chairman_mobile" class="form-control" placeholder="Mobile No">		
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>MD Name<span class="mandatory"></span></label>
											<input type="text"  name="csd_md_name" class="form-control" placeholder="Name">		
										</div>
									</div><div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>MD Mobile No<span class="mandatory"></span></label>
											<input type="text"  name="csd_md_mobile" class="form-control" placeholder="Mobile No">		
										</div>
									</div>
								</div>
								<div class="row text-right">
									<div class="col-sm-12">
										<span class="btn btn-warning btn-sm" id="sansthaManagement">Next</span>
									</div>
								</div>
							</fieldset>
							<fieldset class="hidden" id="membershipDetails" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>	6. Membership Details</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Membership Status<span class="mandatory"></span></label>
											<select name="cs_membership_status" class="form-control">
												<option value="">Please select</option>
												<?php foreach ($membership as $meship) {?>
													<option value="<?= $meship['master_id'] ?>"><?= $meship['master_name'] ?></option>
												<?php } ?>
											</select>						
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Membership Start Date<span class="mandatory"></span></label>
											<input type="date" name="cs_membership_start_date" class="form-control">							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Membership End Date<span class="mandatory"></span></label>
											<input type="date" name="cs_membership_end_date" class="form-control">						
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
