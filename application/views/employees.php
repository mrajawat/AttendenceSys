<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Employees
                        <a href="<?php echo site_url('atdsys/addemp'); ?>" class="btn btn-primary float-right" style="background-color: #4FFF92; border: 0; color:black">Add Employee</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Employee code</th>
                                <th>Employee name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employe as $row) :
                            ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->code ?></td>
                                    <td><?php echo $row->empname ?></td>
                                    <td><?php echo $row->role ?></td>
                                    <td>
                                        <a id="edit" href="<?php echo site_url('atdsys/editemploye/' . $row->id) ?>" class="btn btn-success">Edit </a>
                                    </td>
                                    <td>
                                        <a id="delete" href="<?php echo site_url('atdsys/deleteemploye/' . $row->id) ?>" class="btn btn-danger">delete </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>