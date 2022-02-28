<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use \App\Models\statesModel;
use \App\Models\SansthaModel;
?>
<?= view('home/dash_header'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">Top Navigation</li>
              </ol> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <?php if(session()->get('role_id') == '1' || session()->get('role_id') == '2'){ ?>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div style="background-color: #921919;color:white;"class="small-box">
                <div class="inner">  
                  <?php  $sanstha = (new SansthaModel())->where(array('cs_isDelete'=>0))->findAll(); ?>           
                  <p>All India</p>
                  <p><center><?= count($sanstha);?></center></p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?= site_url('cosanstha/sanstha_details/'); ?>" class="small-box-footer"> Operate <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php } foreach ($sanstha_state as $key) { 
              $stateSanstha = (new statesModel())->where(array('st_id'=>$key['cs_state']))->findAll();
              $sansthaByState = (new SansthaModel())->where(array('cs_isDelete'=>0,'cs_state'=>$key['cs_state']))->findAll();
            ?>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div style="background-color: #ffc917;" class="small-box">
                <div class="inner">               
                  <p><?php echo ucfirst(strtolower($stateSanstha[0]['st_name'])); ?></p>
                  <p><center><?= count($sansthaByState);?></center></p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?= site_url('cosanstha/sanstha_details/'.$key['cs_state'].''); ?>" class="small-box-footer"> Operate <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php } ?>           


            <?php //} ?>
            <!-- ./col -->
           
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
    <?= view('home/dash_footer'); ?>