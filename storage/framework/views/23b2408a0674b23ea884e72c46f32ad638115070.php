<?php $__env->startSection('documentation_panel'); ?>


<div class="row" style="padding-left: 0;padding-right: 0;margin-right: 0;margin-left: 0">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: lightblue; padding-bottom: 0">
                <h4 style="margin-top: 0">Demographics</h4>
            </div>

            <div class="panel-body" >
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="form-horizontal" method="POST" action="<?php echo e(url('Demographics')); ?>" id="demographics_form">
                    <?php echo e(csrf_field()); ?>

                    <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                    <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td>
                            <p>Name :</p>
                        </td>
                        <td>
                            <label><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Visit Date :</p>
                        </td>
                        <td>
                            <label><?php echo e($patient->visit_date); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Sex<span style="color: red;font-size: large">*</span> :</p></td>
                        <td>
                            <?php if($patient->gender == "Male"): ?>
                                  <input name="gender" type="radio" value="Male" checked>&nbsp;Male
                               &nbsp;&nbsp; <input name="gender" type="radio" value="Female">&nbsp;Female
                            <?php else: ?>
                                  <input name="gender" type="radio" value="Male" >&nbsp;Male
                                &nbsp;&nbsp;<input name="gender" type="radio" value="Female" checked>&nbsp;Female
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Room Number<span style="color: red;font-size: large">*</span> :</p></td>
                        <td><input type="text" name="room_number" value="<?php echo e($patient->room_number); ?>" required></td>
                    </tr>
                    <tr>
                        <td><p>Age<span style="color: red;font-size: large">*</span> :</p></td>
                        <td><input type="text" name="age" value="<?php echo e($patient->age); ?>" required></td>
                    </tr>
                </table>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="reset" id="btn_clear_demographics" class="btn btn-success" style="float: left">
                                <i class="fa fa-refresh" aria-hidden="true"></i> Reset Demographics
                            </button>
                        </div>
                        <div class="col-md-6" >
                          <button type="submit" id="btn_save_demographics" class="btn btn-primary" style="float: right">
                              <i class="fa fa-floppy-o" aria-hidden="true"></i> Update Demographics
                          </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var inputsChanged = false;
        $('#demographics_form').change(function() {
            inputsChanged = true;
        });

        function unloadPage(){
            if(inputsChanged){
                return "Do you want to leave this page?. Changes you made may not be saved.";
            }
        }

        $("#btn_save_demographics").click(function(){
            inputsChanged = false;
        });

        window.onbeforeunload = unloadPage;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('patient.active_record', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>