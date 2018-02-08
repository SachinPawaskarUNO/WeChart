<?php $__env->startSection('content'); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<div class="container">
<br>
    <div class="row">
         <div class="col-md-2">
                <a href="<?php echo e(url('/StudentHome')); ?>" class="btn btn-success" style="float: left">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Back to Dashboard</a>
         </div>
    </div>    
    <br>
    <div class="row">
         <div class="col-md-10">
                     <div class="panel panel-default">
                        <div class="panel-heading" style="backgroundd-color: lightblue">
                                <h4>Add New Patient</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="<?php echo e(url('add_patient')); ?>">
                                <?php echo e(csrf_field()); ?>

                                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                                            <label for="gender" class="col-md-4 control-label">Sex<span style="color: red;font-size: large">*</span></label>

                                            <div class="col-md-6">
                                                <input type="radio" class="form-check-input inline" name="gender" value="Male" id="genderMale" >&nbsp;Male
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" class="form-check-input inline" name="gender" value="Female" id="genderFemale">&nbsp;Female
                                                <?php if($errors->has('gender')): ?>
                                                    <span class="help-block">
                                                    <strong><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('module_id') ? ' has-error' : ''); ?>">
                                            <label for="module_id" class="col-md-4 control-label">Module<span style="color: red;font-size: large">*</span></label>

                                            <div class="col-md-6">
                                                <select class="form-control" name="module_id" value="<?php echo e(old('module_id')); ?>">
                                                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($module->module_id); ?>">
                                                            <?php echo e($module->module_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php if($errors->has('module_id')): ?>
                                                    <span class="help-block">
                                                    <strong><?php echo e($errors->first('module_id')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('room_number') ? ' has-error' : ''); ?>">
                                            <label for="room_number" class="col-md-4 control-label">Room Number<span style="color: red;font-size: large">*</span></label>
                                            <div class="col-md-6">
                                                <input id="room_number" type="text" class="form-control" name="room_number" value="<?php echo e(old('room_number')); ?>" required>
                                                <?php if($errors->has('room_number')): ?>
                                                    <span class="help-block">
                                                            <strong><?php echo e($errors->first('room_number')); ?></strong>
                                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('age') ? ' has-error' : ''); ?>">
                                            <label for="age" class="col-md-4 control-label">Age<span style="color: red;font-size: large">*</span></label>
                                            <div class="col-md-6">
                                                <input id="age" type="text" class="form-control" name="age" value="<?php echo e(old('age')); ?>" required>
                                                <?php if($errors->has('age')): ?>
                                                    <span class="help-block">
                                                    <strong><?php echo e($errors->first('age')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group<?php echo e($errors->has('visit_date') ? ' has-error' : ''); ?>">
                                            <label for="height" class="col-md-4 control-label">Visit Date<span style="color: red;font-size: large">*</span></label>

                                            <div class="col-md-6">
                                                <input id="visit_date" type="date" class="form-control" name="visit_date" value="<?php echo e(old('visit_date')); ?>"  required>
                                                <?php if($errors->has('visit_date')): ?>
                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('visit_date')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                        <input type=hidden name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save
                                                </button>
                                            </div>
                                        </div>
                            </form>
                        </div>

                    </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>