<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Class
                    <a href="<?php echo site_url('atdsys/totalclasses'); ?>" class="btn btn-danger float-right">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="formcontainer">
                        <form class="addemp" method="POST" action="<?php echo site_url('atdsys/updateclass/'.$class->id) ?>">
                            <div class="form-froup">
                                <label for="empcode">Add class</label>
                                <input type="text" name="class" class="form-control" value="<?= $class->className ?>" required>
                                <small><?php echo form_error('class'); ?></small>
                                <br>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>