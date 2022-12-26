<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Students
                        <a href="<?php echo site_url('atdsys/addstudent'); ?>" class="btn btn-primary float-right" style="background-color: #4FFF92; border: 0; color:black">Add Student</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($student as $row) :
                            ?>
                                <tr>
                                    <td><?= $row->adm_no ?></td>
                                    <td><?= $row->student_name ?></td>
                                    <td><?= $row->className ?></td>
                                    <td>
                                    <a id="edit" href="<?php echo site_url('atdsys/editstudent/' . $row->id) ?>" class="btn btn-success">Edit </a>
                                    </td>
                                    <td>
                                    <a id="edit" href="<?php echo site_url('atdsys/deletestudent/' . $row->id) ?>" class="btn btn-danger">Delete </a>
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