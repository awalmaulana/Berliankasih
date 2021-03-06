<div class="row">

    <div class="col-sm-12" id="PrintMe">
        <div  class="panel panel-info"> 
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <dl class="dl-horizontal">
                            <dt><?php echo display('doctor') ?></dt> <dd><?php echo html_escape("$appointment->firstname $appointment->lastname");?></dd>
                            <dt><?php echo display('department') ?></dt> <dd><?php echo html_escape($appointment->department) ?></dd>
                            <dt><?php echo display('education_degree') ?></dt> <dd><?php echo html_escape(strip_tags($appointment->degree)) ?></dd>
                            <dt><?php echo display('available_days') ?></dt> <dd><?php echo html_escape($appointment->available_days) ?></dd>
                            <dt><?php echo display('schedule_time') ?></dt> <dd><?php echo html_escape("$appointment->start_time - $appointment->end_time"); ?></dd>
                        </dl>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <dl class="dl-horizontal">
                            <dt><?php echo display('serial_no') ?></dt> <dd>#<?php echo html_escape(($appointment->serial_no<=9)?"0$appointment->serial_no":$appointment->serial_no )?></dd>
                            <dt><?php echo display('appointment_date') ?></dt> <dd><?php echo html_escape($appointment->date) ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="panel-body">  
                <div class="row">
                    <div class="col-sm-12" align="center">  
                        <h1><?php echo display('appointment_information') ?></h1>
                    <br>
                    </div>

                    <div class="col-sm-3" align="center"> 
                        <img alt="Picture" src="<?php echo (!empty($appointment->picture)?base_url(html_escape($appointment->picture)):base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive img-hw-200">
                        <h3><?php echo html_escape("$appointment->pfirstname $appointment->plastname ") ?></h3>
                    </div>

                    <div class="col-sm-9"> 
                        <dl class="dl-horizontal">
                            <dt><?php echo display('appointment_id') ?></dt><dd><?php echo html_escape($appointment->appointment_id) ?></dd>
                            <dt><?php echo display('full_name') ?></dt><dd><?php echo html_escape("$appointment->pfirstname $appointment->plastname "); ?></dd>
                            <dt><?php echo display('patient_id') ?></dt><dd><?php echo html_escape($appointment->patient_id) ?></dd> 
                            <dt><?php echo display('date_of_birth') ?></dt><dd><?php echo html_escape(date('d M Y',strtotime($appointment->date_of_birth))) ?></dd> 
                            <dt><?php echo display('age') ?></dt><dd><?php echo html_escape(date_diff(date_create($appointment->date_of_birth), date_create('now'))->y); ?> Years</dd> 
                            <dt><?php echo display('sex') ?></dt><dd><?php echo html_escape($appointment->sex); ?></dd> 
                            <dt><?php echo display('mobile') ?></dt><dd><?php echo html_escape($appointment->mobile) ?></dd> 
                            <dt><?php echo display('problem') ?></dt><dd><?php echo html_escape($appointment->problem) ?></dd> 
                        </dl> 
                    </div>
                </div>  

            </div> 

            <div class="panel-footer">
                <div class="text-center">
                    <strong><?php echo html_escape($this->session->userdata('title')) ?></strong>
                    <p class="text-center"><?php echo html_escape($this->session->userdata('address')) ?></p>
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-12">
         <div class="btn-group">
            <button type="button" onclick="printContent('PrintMe')" class="btn btn-danger" ><i class="fa fa-print"></i></button> 
        </div>
    </div>


</div>
