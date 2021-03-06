<div class="row">
    <!--  form area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print row">
                <div class="btn-group col-md-4 col-xs-12"> 
                    <a class="btn btn-primary" href="<?php echo base_url("insurance/limit_approval/index") ?>"> <i class="fa fa-list"></i>  <?php echo display('limit_approval_list') ?> </a>  
                </div>
                <h2 class="col-md-8 col-xs-12 text-success"><?php echo display('insurance_limit_approval') ?></h2>
            </div> 

            <div class="panel-body panel-form">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <?php echo form_open_multipart('insurance/limit_approval/form') ?>
                            <div class="form-group row">
                                <label for="patient_id" class="col-xs-3 col-form-label"><?php echo display('patient_id') ?> <i class="text-danger"> *</i></label>
                                <div class="col-xs-9">
                                    <input name="patient_id" type="text" class="form-control" id="patient_id" placeholder="<?php echo display('patient_id') ?>" value="<?php echo html_escape($approval->patient_id) ?>" autocomplete="off">
                                <span></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="room_no" class="col-xs-3 col-form-label"><?php echo display('room_no') ?> <i class="text-danger"> </i></label>
                                <div class="col-xs-9">
                                    <input name="room_no" type="text" class="form-control" id="room_no" placeholder="<?php echo display('room_no') ?>" value="<?php echo html_escape($approval->room_no); ?>" >
                                </div>
                            </div>

 
                            <div class="form-group row">
                                <label for="disease_details" class="col-xs-3 col-form-label"><?php echo display('disease_details') ?></label>
                                <div class="col-xs-9" id="disease_details">
                                    <div class="row" class="insc-mb-10">
                                        <div class="col-xs-4">
                                            <input name="disease_name[]" type="text" class="form-control"  placeholder="<?php echo display('disease_name') ?>" value="" >
                                        </div>
                                        <div class="col-xs-4">
                                            <textarea rows="1" name="disease_details[]" class="form-control"  placeholder="<?php echo display('disease_details') ?>"></textarea>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn  btn-info add-disease">+</button>
                                                <button type="button" class="btn  btn-danger remove-disease">-</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="consultant_id" class="col-xs-3 col-form-label"><?php echo display('consultant_name') ?> <i class="text-danger"> *</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('consultant_id', $consultant_list, html_escape($approval->consultant_id), array('id'=>'consultant_id', 'class'=>'form-control')) ?>
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="policy_name" class="col-xs-3 col-form-label"><?php echo display('policy_name') ?></label>
                                <div class="col-xs-9">
                                    <input name="policy_name" type="text" class="form-control" id="policy_name" placeholder="<?php echo display('policy_name') ?>" value="<?php echo html_escape($approval->policy_name) ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="policy_no" class="col-xs-3 col-form-label"><?php echo display('policy_no') ?></label>
                                <div class="col-xs-9">
                                    <input name="policy_no" type="text" class="form-control" id="policy_no" placeholder="<?php echo display('policy_no') ?>" value="<?php echo html_escape($approval->policy_no) ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="policy_holder_name" class="col-xs-3 col-form-label"><?php echo display('policy_holder_name') ?></label>
                                <div class="col-xs-9">
                                    <input name="policy_holder_name" type="text" class="form-control" id="policy_holder_name" placeholder="<?php echo display('policy_holder_name') ?>" value="<?php echo html_escape($approval->policy_holder_name) ?>" >
                                </div>
                            </div>
 
                            <div class="form-group row">
                                <label for="insurance_id" class="col-xs-3 col-form-label"><?php echo display('insurance_name') ?> <i class="text-danger"> *</i></label>
                                <div class="col-xs-9">
                                    <?php echo form_dropdown('insurance_id', $insurance_list, html_escape($approval->insurance_id), array('id'=>'insurance_id', 'class'=>'form-control')) ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="approval_breakup" class="col-xs-3 col-form-label"><?php echo display('approval_breakup') ?></label>
                                <div class="col-xs-9" id="approval_breakup">
                                    <div class="row" class="insc-mb-10">
                                        <div class="col-xs-4">
                                            <input name="breakup_name[]" type="text" class="form-control"  placeholder="<?php echo display('disease_name') ?>" value="" >
                                        </div>
                                        <div class="col-xs-4">
                                            <input name="breakup_charge[]" type="number" class="form-control"  placeholder="<?php echo display('disease_charge') ?>" value="" >
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="btn-group">
                                                <button type="button" class="btn  btn-info add-breakup">+</button>
                                                <button type="button" class="btn  btn-danger remove-breakup">-</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
  
                            <div class="form-group row">
                                <label for="total" class="col-xs-3 col-form-label"><?php echo display('total') ?></label>
                                <div class="col-xs-9">
                                    <input name="total" type="number" class="form-control" id="total" placeholder="<?php echo display('total') ?>" value="<?php echo html_escape($approval->total) ?>" >
                                </div>
                            </div> 
 
                            <div class="form-group row">
                                <label class="col-sm-3"><?php echo display('status') ?> <i class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <div class="form-check">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" <?php echo  html_escape(set_radio('status', '1', TRUE)); ?> ><?php echo display('active') ?>
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" <?php echo  html_escape(set_radio('status', '0')); ?> ><?php echo display('inactive') ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close() ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/admin/insurance/limit_approval.js?v=2') ?>" type="text/javascript"></script>