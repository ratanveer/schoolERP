
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> Employee Information <small></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                        <div class="pull-right box-tools">                            
                            <a href="<?php echo site_url('employee/exportformat') ?>">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> <?php echo $this->lang->line('dl_sample_import'); ?></button>
                            </a>
                        </div>
                    </div>
                    <form action="<?php echo site_url('employee/empimport') ?>"  id="employeeform" name="employeeform" method="post" enctype="multipart/form-data">
                        <div class="box-body">
						<?php if ($this->session->flashdata('msg')) { ?> <div class="alert alert-success">  <?php echo $this->session->flashdata('msg') ?> </div> <?php } ?>
                          
                            <div class="row">
                                <!--<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee Category</label>
                                        <select autofocus="" id="emptype" name="emptype" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <option value="teacher">Teacher</option>
											<option value="accountant">Accountant</option>
											<option value="librarian">Librarian</option>
											<option value="peon">Peon</option>
                                        </select>
                                       <span class="text-danger"><?php echo form_error('emptype'); ?></span>
                                    </div></div>-->
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?php echo $this->lang->line('select_csv_file'); ?></label>
                                        <div><input class="filestyle form-control" type='file' name='file' id="file" size='20' />
                                            <span class="text-danger"><?php echo form_error('file'); ?></span></div>
                                    </div></div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Import Employee Data</button>
                        </div>
							
                    </form>
                </div>
                </section>
            </div>
