
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> Employee Information <small></small></h1>
    </section>
    <section class="content">
        <div class="row">
            
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('profile'); ?></a></li>
                        
                        <!--<li class="pull-right"><a href="<?php echo site_url("student/delete/" . $student['id']) ?>" class="text-red" onclick="return confirm('Are you sure you want to delete this Student? All related data can not be recovered!');"><i class="fa fa-trash"></i> <?php echo $this->lang->line('delete'); ?> <?php echo $this->lang->line('student'); ?></a></li>-->
                       <!-- <li class="pull-right">
                            <a href="#"  class="schedule_modal text-green" data-toggle="tooltip" title="<?php echo $this->lang->line('login_detail'); ?>"><i class="fa fa-key"></i>
                                <?php echo $this->lang->line('login_details'); ?>
                            </a>
                        </li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="tshadow mb25 bozero">
                                <div class="table-responsive around10 pt0">
                                    <table class="table table-hover table-striped tmb0">
                                        <tbody> 																		
                                            <tr>
                                                <td class="col-md-4"><strong>Employee Type :</strong></td>
												<td><?php echo $employee['emptype']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Employee Name :</strong></td>
												<td><?php echo $employee['name']; ?></td>
                                                
                                            </tr>
											
                                            <tr>
                                                <td><strong>Employee Code : </strong></td>
											
                                                <td><?php echo $employee['employee_code']; ?></td>
                                            </tr>
										
                                            <tr>
                                                <td><strong><?php echo $this->lang->line('date_of_birth'); ?></strong></td>
                                                <td><?php echo $employee['birthday']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Gender :</strong></td>
                                                <td><?php echo $employee['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Religion :</strong></td>
                                                <td><?php echo $employee['religion']; ?></td>
                                            </tr>
											<tr>
                                                <td><strong>Cast :</strong></td>
                                                <td><?php echo $employee['cast']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Blood Group :</strong></td>
                                                <td><?php echo $employee['blood_group']; ?></td>
                                            </tr>
											<tr>
                                            <td  class="col-md-4"><strong>Present Address :</strong></td>
                                            <td  class="col-md-5"><?php echo $employee['present_address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Permanent Address :</strong></td>
                                            <td><?php echo $employee['permanent_address']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Subject :</strong></td>
                                           <td><?php echo $employee['subject']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Father Name :</strong></td>
                                            <td><?php echo $employee['father_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Father Mobile Number :</strong></td>
                                            <td><?php echo $employee['father_mobile_number']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Teacher Email :</strong></td>
                                            <td><?php echo $employee['teacher_email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone :</strong></td>
                                            <td><?php echo $employee['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong></td>
                                            <td><?php echo $employee['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Password :</strong></td>
                                            <td><?php echo $employee['password']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Academic Year :</strong></td>
                                            <td><?php echo $employee['academic_year']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Department :</strong></td>
                                            <td><?php echo $employee['department']; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
            </div>
    </section>
</div>