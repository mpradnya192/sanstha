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
						<li class="breadcrumb-item active">Update Sanstha</li>
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
							<h3 class="card-title">Update Sanstha</h3>
						</div>
					</div>
					<form role="form" id="createSanstha" method="post" action="<?= site_url('sanstha/sansthaUpdateSave'); ?>">
						<div class="card-body" style="padding: 0.25rem;">
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>1. State Details</h4><hr>
								<div class="row">
									<div class="col-sm-3">
										<input type="hidden" name="cs_id" class="form-control" value="<?php echo $sanstha_data[0]['cs_id'];?>">
										<!-- text input -->
										<div class="form-group">
											<label>State <span class="mandatory"> * </span></label>
											<input type="text" class="form-control hidden" name="cs_state" value="<?= $sanstha_data[0]['cs_state']; ?>">
											<select class="form-control" name="cs_state" disabled>
												<option>Please select</option>
												<?php foreach ($state as $skey) { ?>
					                            <option value="<?php echo $skey['st_id'] ?>" <?php if($sanstha_data[0]['cs_state'] == $skey['st_id']){ echo "selected"; } ?>><?php echo $skey['st_name'] ?></option>
					                              <?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>District<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_district">
												<option>Please select</option>
												<?php foreach ($district as $ckey) {?>               
					                            	<option value="<?php echo $ckey['dist_id'] ?>" <?php if($sanstha_data[0]['cs_district'] == $ckey['dist_id']){ echo "selected"; } ?>><?php echo $ckey['dist_name'] ?></option>
					                            <?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Taluka<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_taluka">
											<option>Please select</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Zone<span class="mandatory">  </span></label>
											<input type="text" class="form-control" name="cs_zone" value="<?php echo $sanstha_data[0]['cs_zone'];?>" readonly="">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Sector<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_sector">
												<option value="">Please select</option>
												<?php foreach($sector as $sec){ ?>
													<option value="<?= $sec['sector_id']; ?>" <?php if ($sec['sector_id'] == $sanstha_data[0]['cs_sector']) { echo "Selected";
													} ?>><?= $sec['sector_name']; ?></option>
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
												<?php foreach($subsector as $sbs){ ?>
													<option value="<?= $sbs['ss_id']; ?>" <?php if ($sbs['ss_id'] == $sanstha_data[0]['cs_subsector']) { echo "Selected";
													} ?>><?= $sbs['ss_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>2. Sanstha Details</h4><hr>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Prefix<span class="mandatory"> * </span></label>
											<?php //print_r($pickup);?>
											<select class="form-control" name="cs_prefix">
												<option>Please select</option>
												<?php foreach ($prefix as $pkey) {?>
					                                <option value="<?php echo $pkey['master_id'] ?>" <?php if($sanstha_data[0]['cs_prefix'] == $pkey['master_id']){ echo "selected"; } ?>><?php echo $pkey['master_name'] ?></option>
					                            <?php } ?> 
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Name<span class="mandatory"> * </span></label>
											<input type="text" name="cs_name" class="form-control" value="<?php echo $sanstha_data[0]['cs_name'];?>">
											<!-- <input type="hidden" name="cs_id" class="form-control" value="<?php echo $sanstha_data[0]['cs_id'];?>"> -->
										</div>
									</div>
									<div class="col-sm-3">
									<!-- text input -->
									    <div class="form-group">
										    <label>Head Office Full Address<span class="mandatory"> * </span></label>
										    <textarea class="form-control" name="cs_head_off_addr" id="" rows="2"><?php echo $sanstha_data[0]['cs_head_off_addr'];?></textarea>					
									    </div>
								    </div>
								    <div class="col-sm-3">
									<!-- text input -->
									    <div class="form-group">
										    <label>Head Office Place<span class="mandatory"> * </span></label>
										    <textarea class="form-control" id="" name="cs_head_off_place" rows="2"><?php echo $sanstha_data[0]['cs_head_off_place']?></textarea>						
									    </div>
								    </div>

								    <div class="col-sm-3">
									<!-- text input -->
									    <div class="form-group">
										    <label>Head Office Pincode<span class="mandatory"> * </span></label>
										    <input type="text"  name="cs_head_off_pincode" class="form-control"  value="<?php echo $sanstha_data[0]['cs_head_off_pincode']?>">
										</div>
								    </div>
								    <div class="col-sm-3">
									<!-- text input -->
									    <div class="form-group">
										    <label>Landline No<span class="mandatory"> * </span></label>
										    <input type="text"  name="cs_head_off_landline" class="form-control" placeholder="00123-4567890"  value="<?php echo $sanstha_data[0]['cs_head_off_landline']?>">
										</div>
								    </div>
								    <div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Mobile No<span class="mandatory"> * </span></label>
										<input type="text"  name="cs_head_off_mobile" class="form-control" placeholder="9874563210"  value="<?php echo $sanstha_data[0]['cs_head_off_mobile']?>">								
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Email<span class="mandatory"> * </span></label>
										<input type="email"  name="cs_head_off_email" class="form-control" placeholder="abc@gmail.co" value="<?php echo $sanstha_data[0]['cs_head_off_email']?>">				
									</div>
								</div>
								<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Website<span class="mandatory"> * </span></label>
											<input type="text"  name="cs_website" class="form-control" placeholder="wwww.santha.com" value="<?php echo $sanstha_data[0]['cs_website']?>">	
										</div>
									</div>
								</div>
								<div class="row text-right">
									<div class="col-sm-12">
										<span class="btn btn-warning btn-sm" id="sansthaDetails">Next</span>
									</div>
								</div>
							</fieldset>
							<fieldset class="hidden" id="sansthaInfo" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>3. Sanstha Information<span style="color:red;font-size: 14px">  **Either fill complete information else keep empty..</span></h4>

								<hr>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Current Status<span class="mandatory"></span></label>
											<select class="form-control" name="cs_status">
												<option value="">Please select</option>
												<?php foreach ($status as $stat) { if($stat['master_id'] == $sanstha_data[0]['cs_status']) { ?>
													<option selected="" value="<?= $stat['master_id'] ?>"><?= $stat['master_name'] ?></option>
												<?php }else { ?>
													<option value="<?= $stat['master_id'] ?>"><?= $stat['master_name'] ?></option>
												<?php } } ?>
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
												<?php for ($i=$d2; $i >= 1900; $i--) { if($i== $sanstha_data[0]['cs_foundation_year']){ ?>
													<option selected="" value="<?= $i; ?>"><?= $i; ?></option>
												<?php }else{ ?>
													<option value="<?= $i; ?>"><?= $i; ?></option>
												<?php } } ?>
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Area of Operation<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_operation_area">
												<option value="">Please select</option>
												 <?php foreach ($op_area as $opkey) {
					                              if($sanstha_data[0]['cs_operation_area'] == $opkey['master_id']){?>
					                                <option value="<?php echo $opkey['master_id'] ?>" selected><?php echo $opkey['master_name'] ?></option>
					                              <?php }else{ ?>
					                                <option value="<?php echo $opkey['master_id'] ?>"><?php echo $opkey['master_name'] ?></option>
					                              <?php } }?>	 			
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 1<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification1">
												<option value="">Please select</option>
													<?php foreach ($class_1 as $pkey) {
					                              if($sanstha_data[0]['cs_classification1'] == $pkey['master_id']){?>
					                                <option value="<?php echo $pkey['master_id'] ?>" selected><?php echo $pkey['master_name'] ?></option>
					                              <?php }else{ ?>
					                                <option value="<?php echo $pkey['master_id'] ?>"><?php echo $pkey['master_name'] ?></option>
					                              <?php } }?>	 	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 2<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification2">
												<option value="">Please select</option>
												
												<?php foreach ($class_2 as $pkey) {
					                              if($sanstha_data[0]['cs_classification2'] == $pkey['master_id']){?>
					                                <option value="<?php echo $pkey['master_id'] ?>" selected><?php echo $pkey['master_name'] ?></option>
					                                <?php }else{ ?>
					                                <option value="<?php echo $pkey['master_id'] ?>"><?php echo $pkey['master_name'] ?></option>
					                              <?php } }?>
											</select>			
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 3<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification3">
												<option value="">Please select</option>
												<?php foreach ($class_3 as $pkey) {
					                              if($sanstha_data[0]['cs_classification3'] == $pkey['master_id']){?>
					                                <option value="<?php echo $pkey['master_id'] ?>" selected><?php echo $pkey['master_name'] ?></option>
					                              <?php }else{ ?>
					                                <option value="<?php echo $pkey['master_id'] ?>"><?php echo $pkey['master_name'] ?></option>
					                              <?php } }?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 4<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification4">
												<option value="">Please select</option>
												
												<?php foreach ($class_4 as $pkey) {
					                              if($sanstha_data[0]['cs_classification4'] == $pkey['master_id']){?>
					                                <option value="<?php echo $pkey['master_id'] ?>" selected><?php echo $pkey['master_name'] ?></option>
					                              <?php }else{ ?>
					                                <option value="<?php echo $pkey['master_id'] ?>"><?php echo $pkey['master_name'] ?></option>
					                              <?php } }?>
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
							<fieldset class="hidden" id="otherDetails" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>4. Other Details<span style="color:red;font-size: 14px">  **Either fill complete information else keep empty..</span></h4>
								<div class="row <?php if(empty($sanstha_branches)){echo 'hidden';} ?>">
									<div class="col-md-12">
									<table class="table table-bordered">
										<thead>
						                  <tr>
						                    <th style="width: 1%;text-align: center; color:black;">No.</th>
						                    <th style="text-align:center;color:black;">No. of Branches / Office Units</th>
						                    <th style="text-align: center;color:black;">No. of Extension Counters </th>
						                    <th style="text-align: center;color:black;">No. of Members</th>
						                    <th style="text-align: center;color:black;">Annual Turnover</th>
						                    <th style="text-align: center;color:black;">As On Date</th>
						                  </tr>					
						                </thead>
						                 <tbody>
						                	<?php if(empty($sanstha_branches)) { ?>
						                    <tr><td colspan="6" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
						                  <?php } else{ $i=0; foreach(array_reverse($sanstha_branches) as $sdkey) { ?>
						                  	<tr>
						                  		<td><?php echo ++$i; ?></td>
						                  		<td style="text-align: center;"><?php echo $sdkey['sb_branch_nos']; ?></td>
						                  		<td style="text-align: center";><?php echo $sdkey['sb_estension_counters']; ?></td>
						                  		<td style="text-align: center";><?php echo $sdkey['sb_members_count']; ?></td>
						                  		<td style="text-align: center";><?php echo $sdkey['sb_annual_turnover']; ?></td>
						                  		<td><?php echo date('Y-m-d',strtotime($sdkey['sb_createdOn'])); ?> </td>
						                  	</tr>
						                  <?php if ($i == 5) {   break;  }} } ?>
						                </tbody>
									</table>
								</div>
								</div><hr>
								<div class="row">
									<div class="col-sm-3">
										<input type="hidden" name="csd_id" class="form-control" value="<?php echo $sanstha_details[0]['csd_id'];?>">			
										<!-- text input -->
										<div class="form-group">
											<label>No. of Branches / Office Units<span class="mandatory"> * </span></label>
											<input type="number"  name="csd_branch_nos" class="form-control" placeholder="Branches">	
															
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>No. of Extension Counters<span class="mandatory"> * </span></label>
											<input type="number"  name="csd_estension_counters" class="form-control" placeholder="Extension counters">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>No. of Members<span class="mandatory"> * </span></label>
											<input type="number"  name="csd_members_count" class="form-control" placeholder="No of members">								
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Annual Turnover<span class="mandatory"> * </span></label>
											<input type="number"  name="csd_annual_turnover" class="form-control" placeholder="Annual Turnover">		
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>As On Date<span class="mandatory"> * </span></label>
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
							<fieldset class="hidden" id="managementInfo" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>5. Management Info<span style="color:red;font-size: 14px">  **Either fill complete information else keep empty..</span></h4>								
								<div class="row <?php if(empty($sanstha_details)){echo 'hidden';} ?>">
								<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
					                  <tr>
					                    <th style="width: 1%;text-align: center; color:black;">No.</th>
					                    <th style="text-align:center;color:black;">Chairman Name</th>
					                    <th style="text-align: center;color:black;">Chairman Mobile No </th>
					                    <th style="text-align: center;color:black;">MD Name </th>
					                    <th style="text-align: center;color:black;">MD Mobile No</th>
					                  </tr>					
					                </thead>
					                <tbody>
					                	<?php if(empty($sanstha_details)) { ?>
					                    <tr><td colspan="6" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
					                  <?php } else{ $i=0; foreach(array_reverse($sanstha_details) as $sdkey) { ?>
					                  	<tr>
					                  		<td><?php echo ++$i; ?></td>
					                  		<td style="text-align: center;"><?php echo $sdkey['csd_chairman_name']; ?></td>
					                  		<td style="text-align: center";><?php echo $sdkey['csd_chairman_mobile']; ?></td>
					                  		<td style="text-align: center";><?php echo $sdkey['csd_md_name']; ?></td>
					                  		<td style="text-align: center";><?php echo $sdkey['csd_md_mobile']; ?></td>
					                  	</tr>
					                  <?php if ($i == 5) {   break;  }} } ?>
					                </tbody>
								</table>
							</div>
							</div>
							<hr>
							<div class="row">
									<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Chairman Name<span class="mandatory"> * </span></label>
										<input type="text" name="csd_chairman_name" class="form-control" placeholder="Name">		
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Chairman Mobile No<span class="mandatory"> * </span></label>
										<input type="text"  name="csd_chairman_mobile" class="form-control" placeholder="Mobile No">		
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>MD Name<span class="mandatory"> * </span></label>
										<input type="text"  name="csd_md_name" class="form-control" placeholder="Name">		
									</div>
								</div><div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>MD Mobile No<span class="mandatory"> * </span></label>
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
						<fieldset class="hidden" id="membershipDetails" style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>6. Sahakar Bharati Membership Details<span style="color:red;font-size: 14px">  **Either fill complete information else keep empty..</span></h4><hr>
								
							<div class="row <?php if(empty($sanstha_mem)){echo 'hidden';} ?>">
								<div class="col-md-12">
								<table class="table table-bordered">
									<thead>
					                  <tr>
					                    <th style="width: 1%;text-align: center; color:black;">No.</th>
					                    <th style="text-align:center;color:black;">Membershio</th>
					                    <th style="text-align: center;color:black;">From date </th>
					                    <th style="text-align: center;color:black;">To date </th>
					                  </tr>					
					                </thead>
					                <tbody>
					                	<?php if(empty($sanstha_mem)) { ?>
					                    <tr><td colspan="4" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
					                  <?php } else{ $i=0; foreach(array_reverse($sanstha_mem) as $sdkey) { ?>
					                  	<tr>
					                  		<td><?php echo ++$i; ?></td>
					                  		<td style="text-align: center;"><?php echo $sdkey['mem_membership_status']; ?></td>
					                  		<td style="text-align: center";><?php echo date('d M Y', strtotime($sdkey['mem_start_date'])); ?></td>
					                  		<td style="text-align: center";><?php echo date('d M Y', strtotime($sdkey['mem_end_date'])); ?></td>
					                  	</tr>
					                 <?php if ($i == 5) {   break;  }} } ?>
					                </tbody>
								</table>
							</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Membership Status<span class="mandatory"> * </span></label>	
										<select name="cs_membership_status" class="form-control">		
										    <option value="">Please Select</option>
											<option value="Live">Live</option>
											<option value="Expired" >Expired</option>
											<option value="Pending">Pending</option>	
										</select>					
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Membership Start Date<span class="mandatory"> * </span></label>
										<input type="date" name="cs_membership_start_date" class="form-control" value="">							
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Membership End Date<span class="mandatory"> * </span></label>
										<input type="date" name="cs_membership_end_date" class="form-control" value="">						
									</div>
								</div>
							</div>
						</fieldset>
						</div>
						<!-- /.card-body -->
						<div class="card-footer text-right">
							<button type="save" class="btn btn-primary">Update</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>

</div>

<?= view('sanstha/sanstha_footer'); ?>
