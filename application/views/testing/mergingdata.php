<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Classes
                        <a href="<?php echo site_url('atdsys/addclass'); ?>" class="btn btn-primary float-right" style="background-color: #4FFF92; border: 0; color:black">Add class</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Student count</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;
                        foreach ($d_list as $d) : ?>
                         <tr>
                           <!-- <th scope="row"><?= $i++ ?></th> -->
                           <td><?= $d['cid'] ?></td>
                           <td><?= $d['qty'] ?></td>
                         </tr>
                       <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>