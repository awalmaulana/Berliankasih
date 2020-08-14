<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div  class="panel panel-default thumbnail">
 
            <div class="panel-heading no-print">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="<?php echo base_url("pasien/create") ?>"> <i class="fa fa-plus"></i>  <?php echo display('add_patient') ?> </a>  
                </div>
            </div> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('serial') ?></th>
                            <th><?php echo display('id_no') ?></th>
                            <th><?php echo display('first_name') ?></th>
                            <th><?php echo display('last_name') ?></th>
                           <!--  <th><?php echo display('email') ?></th>
                            <th><?php echo display('phone') ?></th>
                            <th><?php echo display('mobile') ?></th> -->
                            <th><?php echo display('address') ?></th>
                            <th><?php echo display('sex') ?></th>
                            <th><?php echo display('blood_group') ?></th>
                            
                            <th><?php echo display('date_of_birth') ?></th>
                            <th><?php echo display('create_date') ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($patients)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($patients as $patient) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($patient->patient_id); ?></td>
                                    <td><?php echo html_escape($patient->firstname); ?></td>
                                    <td><?php echo html_escape($patient->lastname); ?></td>
                                   <!--  <td><?php echo html_escape($patient->email); ?></td>
                                    <td><?php echo html_escape($patient->phone); ?></td>
                                    <td><?php echo html_escape($patient->mobile); ?></td> -->
                                    <td><?php echo html_escape($patient->address); ?></td>
                                    <td><?php echo html_escape($patient->sex); ?></td>
                                    <td><?php echo html_escape($patient->blood_group); ?></td>
                                    
                                    <td><?php echo html_escape($patient->date_of_birth); ?></td> 
                                    <td><?php echo html_escape($patient->create_date); ?></td>
                                    <td><?php echo ((html_escape($patient->status)==1)?display('active'):display('inactive')); ?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("pasien/profile/$patient->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> 
                                        <a href="<?php echo base_url("pasien/edit/$patient->id") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a> 

                                      <!--   <a href="<?php echo base_url("case_manager/patient/form?pid=$patient->patient_id") ?>" class="btn btn-xs btn-warning" title="Add to Case Manager"><i class="fa fa-plus"></i></a>  -->

                                        <a href="<?php echo base_url("pasien/delete/$patient->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>')"><i class="fa fa-trash"></i></a> 
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>

