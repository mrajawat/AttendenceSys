<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add Class
                        <a href="<?php echo site_url('atdsys/totalclasses'); ?>" class="btn btn-danger float-right">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="formcontainer">
                        <form class="addemp" method="POST" action="<?php echo site_url('atdsys/addstdclass') ?>">
                            <div class="form-froup">
                                <label for="empcode">Add class</label>
                                <input type="text" name="class" class="form-control" value="" required>
                                <small><?php echo form_error('class'); ?></small>
                                <br>
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