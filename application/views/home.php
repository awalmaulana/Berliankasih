<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo (!empty($notify->total_patient) ? html_escape($notify->total_patient) : 0) ?></h3>
                <p><?php echo display('patient') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-wheelchair"></i>
            </div>
                <a href="<?php echo base_url('patient');?>" class="small-box-footer"><?php echo display('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
               
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo (!empty($notify->total_app) ? html_escape($notify->total_app) : 0) ?></h3>
                <p><?php echo display('appointment') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-list-alt"></i>
            </div>
                <a href="<?php echo base_url('appointment');?>" class="small-box-footer"><?php echo display('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?php echo (!empty($notify->total_doctor) ? html_escape($notify->total_doctor) : 0) ?></h3>
                <p><?php echo display('doctor') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-user-md"></i>
            </div>
                <a href="<?php echo base_url('doctor');?>" class="small-box-footer"><?php echo display('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
         <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo (!empty($notify->total_representative) ? html_escape($notify->total_representative) : 0) ?></h3>
                <p><?php echo display('representative') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
                <a href="<?php echo base_url('human_resources/employee/index/representative');?>" class="small-box-footer"><?php echo display('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Line Chart -->
    <div class="col-sm-12 col-md-8">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('account').' '.display('information');?></h4>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="accLineChart" height="140"></canvas>
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
                <div class="panel-title">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                             <h4><?php echo display('percentage')?></h4>
                        </div>
                         <div class="col-sm-12 col-md-6">
                            <input type="text" id="month" name="month" class="form-control monthPicker " value="<?php echo date('Y-m')?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <canvas id="pieChart" height="310"></canvas>
            </div>
        </div>
    </div>
</div>
 
<div class="row">
    <!-- Total Product Sales area --> 
    <div class="col-lg-8">
        <div class="panel panel-default" id="js-timer">
            <div class="panel-body">
                <div class="widget-title">
                    <h3><?php echo display('total_progress')?></h3>
                    <span><?php echo display('last_year_status') ?></span>
                </div>
                <canvas id="lineChart" height="170"></canvas>
            </div> <!-- /.panel-body -->
        </div>
    </div>

    <!-- Message area -->
    <div class="col-lg-4">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <h3><?php echo display('noticeboard') ?></h3>
                <span><?php echo display('latest_noticeboard') ?></span>
            </div>
            <div class="panel-body"> 
                <div class="message_inner">
                    <?php if (!empty($notices)) {  ?>
                        <?php foreach ($notices as $notice) {  ?>
                        <a href="<?php echo base_url("enquiry/view/$notice->id") ?>">
                            <div class="inbox-item">
                                <strong class="inbox-item-author"><?php echo html_escape($notice->title); ?></strong>
                                <span class="inbox-item-date"></span>
                                <p class="inbox-item-text"><?php echo html_escape(character_limiter(strip_tags($notice->description),70)); ?></p>
                            </div>
                        </a>
                        <?php } ?>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
    <!-- /.row --> 
</div> <!-- /.row -->
<script src="<?php echo base_url('assets/js/admin/home.js') ?>" type="text/javascript"></script>
 