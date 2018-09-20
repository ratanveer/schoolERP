<div class="content-wrapper">  
    <section class="content-header">
        <h1>
             <i class="fa fa-users"></i> Employee Information <small></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="pull-right box-tools" style="position: absolute;right: 14px;top: 13px;">
                        <a href="<?php echo site_url('employee/empimport') ?>">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Import Employee</button>
                        </a>
                    </div>
                    <form id="form1" action="<?php echo site_url('employee/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="tshadow mb25 bozero">    

                                <h4 class="pagetitleh2">Add Employee</h4>


                                <div class="around10">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>  
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                        <label for="emptype">Employee Category</label>
                                        <select autofocus="" id="emptype" name="emptype" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                                    foreach ($employeeTypeList as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php if (set_value('emptype') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                       <span class="text-danger"><?php echo form_error('emptype'); ?></span>
                                    </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" name="name" placeholder="" type="text" class="form-control"  value="set_value('name');" />
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="employee_code">Employee Code</label>
                                                <input id="employee_code" name="employee_code" placeholder="" type="text" class="form-control"  value="<?php echo set_value('employee_code'); ?>" />
                                                <span class="text-danger"><?php echo form_error('employee_code'); ?></span>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('date_of_birth'); ?></label>
                                                <input id="birthday" name="birthday" placeholder="" type="text" class="form-control"  value="<?php echo set_value('birthday'); ?>" readonly="readonly"/>
                                                <span class="text-danger"><?php echo form_error('birthday'); ?></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
									<div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputFile"> <?php echo $this->lang->line('gender'); ?></label>
                                                <select class="form-control" name="gender">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php
                                                    foreach ($genderList as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php if (set_value('gender') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                            </div>
                                        </div>
										
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="religion">Religion</label>
                                                <input id="religion" name="religion" placeholder="" type="text" class="form-control"  value="<?php echo set_value('religion'); ?>" />
                                                <span class="text-danger"><?php echo form_error('religion'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cast">Cast</label>
                                                <input id="cast" name="cast" placeholder="" type="text" class="form-control"  value="<?php echo set_value('cast'); ?>" />
                                                <span class="text-danger"><?php echo form_error('cast'); ?></span>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <select autofocus="" id="blood_group" name="blood_group" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
											<?php
                                                    foreach ($bloodgroupList as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key; ?>" <?php if (set_value('blood_group') == $key) echo "selected"; ?>><?php echo $value; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                           
                                        </select>
                                       <span class="text-danger"><?php echo form_error('blood_group'); ?></span>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="present_address">Present Address</label>
                                                <textarea id="present_address" name="present_address" placeholder="" class="form-control" rows="2"></textarea>
                                                <span class="text-danger"><?php echo form_error('present_address'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="permanent_address">Permanent Address</label>
                                                <textarea id="permanent_address" name="permanent_address" placeholder="" class="form-control" rows="2"></textarea>
                                                <span class="text-danger"><?php echo form_error('permanent_address'); ?></span>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row">
									<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input id="subject" name="subject" placeholder="" type="text" class="form-control"  value="<?php echo set_value('subject'); ?>" />
                                                <span class="text-danger"><?php echo form_error('subject'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input id="father_name" name="father_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('father_name'); ?>" />
                                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
                                            </div>
                                        </div>   
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="father_mobile_number">Father Mobile Number</label>
                                                <input id="father_mobile_number" name="father_mobile_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('father_mobile_number'); ?>" />
                                                <span class="text-danger"><?php echo form_error('father_mobile_number'); ?></span>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
									<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="teacher_email">Teacher Email</label>
                                                <input id="teacher_email" name="teacher_email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('teacher_email'); ?>" />
                                                <span class="text-danger"><?php echo form_error('teacher_email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input id="phone" name="phone" placeholder="" type="text" class="form-control"  value="<?php echo set_value('phone'); ?>" />
                                                <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" name="email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('email'); ?>" />
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" name="password" placeholder="" type="password" class="form-control"  value="<?php echo set_value('password'); ?>" />
                                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="academic_year">Academic Year</label>
                                                <input id="academic_year" name="academic_year" placeholder="" type="text" class="form-control"  value="<?php echo set_value('academic_year'); ?>" />
                                                <span class="text-danger"><?php echo form_error('academic_year'); ?></span>
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input id="department" name="department" placeholder="" type="text" class="form-control"  value="<?php echo set_value('department'); ?>" />
                                                <span class="text-danger"><?php echo form_error('department'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                                    

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                    </form>
                </div>               
            </div>
        </div> 
</div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
       
        $('#birthday').datepicker({
            format: date_format,
            autoclose: true
        });
    });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>    