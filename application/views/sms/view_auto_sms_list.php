<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('sms/sms_report_controller/auto_sms_list', array('method'=>'get')); ?>
                    <div class="form-inline">
                        <div class="col-md-3">
                            <input type="text" name="start_date" placeholder="<?php echo display('start_date');?>" class="form-control datepicker" value="<?php echo html_escape($search->start_date); ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="end_date" placeholder="<?php echo display('end_date');?>" class="form-control datepicker" value="<?php echo html_escape($search->end_date); ?>">
                        </div>

                        <div class="col-md-2">
                            <input type="submit" value="<?php echo display('filter');?>" class="btn btn-primary">
                        </div>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

 
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="sms">
                    <thead>
                       <tr>
                            <th><?php echo display('reciver');?></th>
                            <th width="150"><?php echo display('date');?></th>
                            <th><?php echo display('message');?></th>
                        </tr>
                    </thead>

                    <tbody>
                     <?php foreach($auto_sms as $value){?>
                        <tr>
                            <td><?php echo html_escape($value->phone_no);?></td>
                            <td><?php echo html_escape($value->delivery_date_time);?></td>
                            <td><?php echo html_escape($value->message);?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><?php echo html_escape($links); ?></td>
                        </tr>
                    </tfoot>
                </table> 
            </div>
        </div>
    </div>           
</div>           



