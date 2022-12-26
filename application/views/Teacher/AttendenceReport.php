<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>View Attendence
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <!-- <div class="formcontainer"> -->
                    <form class="addemp" method="POST" action="<?php echo site_url('atdsys/fetch_attendence') ?>">
                        <div class="form-froup">
                            <fieldset>
                                <legend>Selection options</legend>
                                <div class="row">
                                    <div class="col md-4 form-group">
                                        <select name="class" id="" class="form-control">
                                            <?php foreach ($class as $row) :
                                            ?>
                                                <option value="<?= $row->id ?>"><?= $row->className ?></option>
                                            <?php endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col md-4">
                                        <input type="date" name="date" class="form-control" value="">
                                        <small><?php ?></small>
                                        <p id="error"></p>
                                    </div>
                                    <div class="col md-4 form-group">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Show">
                                    </div>
                                </div>
                            </fieldset>

                            <br>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
                <!-- take attendence card -->
                <div class="row">
                    <div class="card-body">
                        <form class="addattendence" method="POST" action="">
                            <table class="table table-bordered">
                                <?php if (array_key_exists('submit', $_POST)) {
                                ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Admno</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($atten as $row) :

                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><input type="hidden" name="admno[]" value="<?php echo $row->Admno ?>"><?php echo $row->Admno ?></td>
                                                <td><input type="hidden" name="name[]" value="<?php echo  $row->student_name ?>"><?php echo  $row->student_name ?></td>
                                                <td><input type="hidden" name="class[]" value=" "><?php foreach($class as $r):if($r->id == $row->class_id){echo $r->className;} endforeach;?></td>
                                                <td><input type="hidden" name="status[]" value="<?php echo  $row->Status ?>"><?php if($row->Status == 0){echo "Absent";}else{echo "Present";} ?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php
                                        endforeach;
                                        ?>


                                    </tbody>
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>