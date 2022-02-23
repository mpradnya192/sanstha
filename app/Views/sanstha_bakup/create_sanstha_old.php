<form role="form" id="createBid" method="post" action="<?= site_url('sanstha/create_sanstha'); ?>">
						<div class="card-body" style="padding: 0.25rem;">
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;background-color: #FFF"><h4>1. Sanstha Details</h4>
								<div class="row">
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>State <span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_state">
												<option>Please select</option>
												<?php foreach ($state as $skey) {  ?> 
													<option value="<?php echo $skey['st_id']; ?>"><?php echo $skey['st_name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>City<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_city">
												<option>Please select</option>
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
											<input type="text" class="form-control" name="cs_zone" value="" readonly="">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Type<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_type">
												<option>Please select</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Prefix<span class="mandatory"> * </span></label>
											<?php //print_r($pickup);?>
											<select class="form-control" name="cs_prefix">
												<option>Please select</option>
												<?php foreach($prefix as $pkey){ ?>
														<option value="<?php echo $pkey['c_id'];?>"><?php echo $pkey['c_name'];?></option>
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
											<label>Website<span class="mandatory"> * </span></label>
											<input type="text"  name="cs_website" class="form-control" placeholder="wwww.santha.com">	
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Current Status<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_status">
												<option>Please select</option>
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Foundation Year<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_foundation_year">
												<option>Please select</option>
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Year<span class="mandatory"> * </span></label>
											<input type="text" name="cs_years" class="form-control">
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Area of Operation<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_operation_area">
												<option>Please select</option>
												<?php foreach($op_area as $pkey){ ?>
														<option value="<?php echo $pkey['c_id'];?>"><?php echo $pkey['c_name'];?></option>
												<?php }	?>									
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 1<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification1">
												<option>Please select</option>
												<?php foreach($class_1 as $pkey){ ?>
														<option value="<?php echo $pkey['c_id'];?>"><?php echo $pkey['c_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 2<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification2">
												<option>Please select</option>
												<?php foreach($class_2 as $pkey){ ?>
														<option value="<?php echo $pkey['c_id'];?>"><?php echo $pkey['c_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 3<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification3">
												<option>Please select</option>
												<?php foreach($class_3 as $pkey){ ?>
														<option value="<?php echo $pkey['c_id'];?>"><?php echo $pkey['c_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Classification 4<span class="mandatory"> * </span></label>
											<select class="form-control" name="cs_classification4">
												<option>Please select</option>
												<?php foreach($class_4 as $pkey){ ?>
														<option value="<?php echo $pkey['c_id'];?>"><?php echo $pkey['c_name'];?></option>
												<?php }	?>	
											</select>							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Membership Status<span class="mandatory"> * </span></label>
											<input type="text" name="cs_membership_status" class="form-control">						
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Membership Start Date<span class="mandatory"> * </span></label>
											<input type="date" name="cs_membership_start_date" class="form-control">							
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Membership End Date<span class="mandatory"> * </span></label>
											<input type="date" name="cs_membership_end_date" class="form-control">						
										</div>
									</div>
									<div class="col-sm-3">
										<!-- text input -->
										<div class="form-group">
											<label>Other Details<span class="mandatory"> * </span></label>
											<textarea name="cs_desc" class="form-control"></textarea>						
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;margin-top: 1%;background-color: #FFF"><h4>2. Head Office Details</h4>
							<div class="row">
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Head Office Full Address<span class="mandatory"> * </span></label>
										<textarea name="cs_head_off_addr" class="form-control">
										</textarea>										
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Head Office Place<span class="mandatory"> * </span></label>
										<textarea name="cs_head_off_place" class="form-control">
										</textarea>										
									</div>
								</div>

								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Head Office Pincode<span class="mandatory"> * </span></label>
										<input type="text"  name="cs_head_off_pincode" class="form-control">									
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Landline No<span class="mandatory"> * </span></label>
										<input type="text"  name="cs_head_off_landline" class="form-control" placeholder="00123-4567890" pattern="[0-9]{5}-[0-9]{7}" required>								
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Mobile No<span class="mandatory"> * </span></label>
										<input type="text"  name="cs_head_off_mobile" class="form-control" placeholder="9874563210">								
									</div>
								</div>
								<div class="col-sm-3">
									<!-- text input -->
									<div class="form-group">
										<label>Email<span class="mandatory"> * </span></label>
										<input type="email"  name="cs_head_off_email" class="form-control" placeholder="abc@gmail.co">				
									</div>
								</div>
							</div>
							</fieldset>
							<fieldset style="border: 1px solid #d3d3d3;padding: 1.25rem;margin-top: 1%;background-color: #FFF"><h4>3. Other Details</h4>
								<div class="row">					
									<div class="col-sm-3">
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
											<label>Chairman Name<span class="mandatory"> * </span></label>
											<input type="text"  name="csd_chairman_name" class="form-control" placeholder="Name">		
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
							</fieldset>
						</div>
						<!-- /.card-body -->
						<div class="card-footer text-right">
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-primary">Create Sanstha</button>
						</div>
					</form>