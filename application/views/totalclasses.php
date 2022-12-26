<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Class with students
                        <a href="<?php echo site_url('atdsys/addclass'); ?>" class="btn btn-primary float-right" style="background-color: #4FFF92; border: 0; color:black">Add class</a>
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Student count</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1;
                            foreach ($d_list as $ro) : ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?= $ro->className ?></td>
                                    <td><?= $ro->qty ?></td>
                                    <td>
                                        <a id="edit" href="<?php echo site_url('atdsys/editclass/' . $ro->className) ?> " class="btn btn-success">Edit </a>
                                    </td>
                                    <td>
                                        <a id="delete" href="<?php echo site_url('atdsys/deleteclass/' . $ro->className) ?> " class="btn btn-danger">delete </a>
                                    </td>
                                    <?php $i++ ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>