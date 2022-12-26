<div class="container right-container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add Attendence
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <!-- <div class="formcontainer"> -->
                    <form class="addemp" method="POST" action="<?php echo site_url('atdsys/fetch_students') ?>">
                        <div class="form-group">
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
                                        <input type="date" name="tarik" class="form-control" value="<?php echo date('Y-m-d') ?>" disabled>
                                        <small><?php ?></small>
                                        <p id="error"></p>
                                    </div>
                                    <div class="col md-4 form-group">
                                        <input type="submit" name="show" class="btn btn-primary" value="Show">
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
                        <form class="addattendence" method="POST" action="<?php echo site_url('atdsys/addAttendence') ?>">
                            <table class="table table-bordered">
                                <?php if (array_key_exists('show', $_POST)) {
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
                                        foreach ($student as $row) :

                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><input type="hidden" name="admno[]" value="<?php echo $row->adm_no ?>"><?php echo $row->adm_no ?></td>
                                                <td><input type="hidden" name="name[]" value="<?php echo  $row->student_name ?>"><?php echo  $row->student_name ?></td>
                                                <td><input type="hidden" name="class[]" value="<?php echo  $row->className ?>"><?php echo  $row->className ?>
                                                    <input type="hidden" name="classid[]" value="<?php echo  $row->id ?>">
                                                </td>

                                                <td><select name="status[]" id="">
                                                        <option value="">select</option>
                                                        <option value="0">absent</option>
                                                        <option value="1">present</option>
                                                    </select></td>

                                            </tr>
                                            <?php $i++ ?>
                                        <?php
                                        endforeach;
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="col md-4 form-group">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Add">
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>