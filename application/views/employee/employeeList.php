<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> Employee Information<small></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
		<div class="col-md-12">              
                <div class="box box-primary" id="tachelist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Employee List</h3>
                    </div>
					  
                    <div class="box-body">
					<?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>
									<?php echo $this->customlib->getCSRF(); ?>
                        <div class="mailbox-controls">
                        </div>
                        <div class="table-responsive mailbox-messages">
						<div class="download_label"><?php echo $this->lang->line('teacher_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
								
                                    <tr>
										<th>Employee Type</th>
                                        <th>Employee Name</th>
										<th>Employee Code</th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th class="text-right no-print"><?php echo $this->lang->line('action'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($employeelist as $employee) {
                                        ?>
                                        <tr>
											<td class="mailbox-name"> <?php echo $employee['emptype'] ?></td>
                                            <td class="mailbox-name"> <?php echo $employee['name'] ?></td>
											<td class="mailbox-name"> <?php echo $employee['employee_code'] ?></td>
                                            <td class="mailbox-name"> <?php echo $employee['email'] ?></td>    
                                            <td class="mailbox-name"> <?php echo $employee['phone'] ?></td>
                                            <td class="mailbox-date pull-right no-print">
                                                <a href="<?php echo base_url(); ?>employee/show/<?php echo $employee['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('show'); ?>" >
                                                    <i class="fa fa-reorder"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>employee/edit/<?php echo $employee['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>employee/delete/<?php echo $employee['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('Are you sure you want to delete this item?')";>
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $count++;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="mailbox-controls">
                        </div>
                    </div>
                </div>
            </div> 
		
		
		
		</div>
		</section>
		</div>