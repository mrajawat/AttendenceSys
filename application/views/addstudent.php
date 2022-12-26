<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add Student
                        <a href="<?php echo site_url('atdsys/students'); ?>" class="btn btn-danger float-right"><i class="fa fa-backward"></i></a>
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="formcontainer">
                        <form class="addemp" method="POST" action="<?php echo site_url('atdsys/addstddetails') ?>">
                            <div class="form-froup">
                                <label for="empcode">Admission Number</label>
                                <input type="text" name="admno" class="form-control" value="<?= $student->adm_no + 1 ?>">
                                <small><?php echo form_error('Admno'); ?></small>
                                <p id="error"> <?php echo $this->session->flashdata("error"); ?></p>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="Name">Student Name</label>
                                <input type="text" name="stdname" class="form-control" value="">
                                <small><?php echo form_error('stdname'); ?></small><br>
                            </div>
                            <div class="form-group">
                                <label for="role">Class</label>
                                <select name="class" id="" class="form-control">
                                    <?php foreach ($class as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->className ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>