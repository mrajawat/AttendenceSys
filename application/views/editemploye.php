<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Employees
                        <a href="<?php echo site_url('atdsys/employees'); ?>" class="btn btn-danger float-right">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="formcontainer">
                        <form class="addemp" method="POST" action="<?php echo site_url('atdsys/updateemp/' . $employe->id) ?>">
                            <div class="form-froup">
                                <label for="empcode">Employee code</label>
                                <input type="text" name="empcode" class="form-control" value="<?= $employe->code ?>" readonly=true>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="Name">Employee Name</label>
                                <input type="text" name="empname" class="form-control" value="<?= $employe->empname ?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="" class="form-control">
                                    <option value="<?= $employe->role ?>"><?= $employe->role ?></option>
                                    <option value="teacher">teacher</option>
                                    <option value="admin">Admin</option>
                                </select>
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