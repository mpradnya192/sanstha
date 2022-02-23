<?= view('home/dash_header'); 
	use App\models\PickupModel;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content-header">
       <div class="container-fluid">
	        <div class="row">
			  	<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Master Details</h3>
						</div>
						<!-- /.card-header -->
						<table class="table table-striped " id="data_table">
							<thead>
								<tr>
									<th>Sr.No</th>
									<th>Name</th>	
									<th>Category</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
					    <tbody>
	                	    <?php if(empty($pickup)) { ?>
	                        <tr><td colspan="6" style="color: red;font-size: large;font-weight: bold;text-align: center;">No Records Found...!!</td></tr>
	                        <?php } else{ $i=0; foreach(array_reverse($pickup) as $key) { ?>
	                   	<tr>
	                  		<td><?php echo ++$i; ?></td>
	                  		<td><?php echo $key['c_name']; ?></td>
	                  		<td>
	                  		<?php if($key['c_type'] == 1){
	                  			echo "Classification 1";
	                  		}elseif ($key['c_type'] == 2) {
	                  			echo "Classification 2";
	                  		}elseif ($key['c_type'] == 3) {
	                  			echo "Classification 3";
	                  		}elseif ($key['c_type'] == 4) {
	                  			echo "Classification 4";
	                  		}elseif ($key['c_type'] == 5) {
	                  			echo "sanstha Status";
	                  		}elseif ($key['c_type'] == 6) {
	                  			echo "Operation area";
	                  		}elseif ($key['c_type'] == 7) {
	                  			echo "name prefix";
	                  		}

	                  		?>       	
                            </td>
                           
	                  		<td style="text-align: center;" data-toggle="modal" data-id="<?php echo $key['c_id'] ?>" data-target="#deleteProduct"><!-- <a href="<?php echo site_url('Master/delete').$key['c_id'];?>"> -->
										<span class="btn btn-icon btn-xs btn-primary"><i class="fa fa-trash-alt" title="Delete"></i></span><!-- </a> -->
							</td>
	                  	</tr>
	                    <?php } }?>
	                    </tbody>
						</table>
					</div>
					<!-- /.card -->
				</div>

				<div class="col-lg-6">
					<!-- general form elements disabled -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">New Master</h3>
						</div>
						<!-- /.card-header -->
						<form role="form" id="no" method="post" action="<?= site_url('master/master_details'); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-md-8">
									    <div class="form-group">
											<label> Name <span class="mandatory"> * </span></label>
											<input type="text" class="form-control" name="c_name">
										</div>
									</div>
								<!-- 	hii -->
								</div>
							
							<div class="row">
			     				<div class="col-md-8">
									<div class="form-group">
										<label>Category<span class="mandatory"> * </span></label>
											<select class="form-control" name="c_type">
											<option value="" disabled="" selected="">Please select category</option>			    <option value="1">
												    Classfication 1</option>
											<option value="2">
													Classfication 2</option>
											<option value="3">
												    Classfication 3</option>
											<option value="4">
												    Classfication 4</option>
											<option value="5">
												    sanstha Status</option>
											<option value="6">
												    operation area</option>
										    <option value="7">
												    name prefix</option>
											</select>
									</div>
								</div>
							</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" id="save_data"class="btn btn-primary">Save</button>	
						</form>
					</div>
					<!-- /.card -->
				</div>
				<div id="deleteProduct" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                            <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('Master/deleteProducts') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this product?</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_id">
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
			</div>
	    </div>		<!-- /.row -->
		<!-- /.container-fluid -->
</section>
</div>
	<!-- /.content -->
<!-- /.content-wrapper -->
<?= view('master/master_footer'); ?>