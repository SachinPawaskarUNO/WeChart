<?php $__env->startSection('content'); ?>

    <script type="text/javascript">
        function Checkfunc(val){
            var element=document.getElementById('newDepartmentName');
            if(val=='other')
                element.style.display='block';
            else
                element.style.display='none';
        }

    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding-bottom: 0;padding-top: 0">
                        <h3 >Register</h3>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label">E-Mail Address<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block" >
                                        <strong id="emailidalert"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label for="password" class="col-md-4 control-label">Password<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block" >
                                        <strong id="passwordalert"><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
                                <label for="firstname" class="col-md-4 control-label">First Name<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>" required autofocus>

                                    <?php if($errors->has('firstname')): ?>
                                        <span class="help-block" >
                                        <strong id="firstnamealert"><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label">Last Name<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required autofocus>

                                    <?php if($errors->has('lastname')): ?>
                                        <span class="help-block" >
                                        <strong id="lastnamealert"><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('contactno') ? ' has-error' : ''); ?>">
                                <label for="contactno" class="col-md-4 control-label">Contact Number</label>

                                <div class="col-md-6">
                                    <input id="contactno" type="text" class="form-control" name="contactno" value="<?php echo e(old('contactno')); ?>">

                                    <?php if($errors->has('contactno')): ?>
                                        <span class="help-block" >
                                        <strong id="contactnoalert"><?php echo e($errors->first('contactno')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
                                <label for="role" class="col-md-4 control-label">Role<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input type="radio" class="form-check-input inline" name="role" value="Student" id="roleStudent" checked="checked">&nbsp;Student
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input inline" name="role" value="Instructor" id="roleInstructor">&nbsp;Instructor
                                    <?php if($errors->has('role')): ?>
                                        <span class="help-block" id="rolealert">
                                        <strong><?php echo e($errors->first('role')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('departmentName') ? ' has-error' : ''); ?>">
                                <label for="departmentName" class="col-md-4 control-label">Department Name<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <select id="departmentName" class="form-control" name="departmentName" value="<?php echo e(old('departmentName')); ?>" onchange='Checkfunc(this.value);' >
                                        <option value=""> </option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->department_name); ?>">
                                                <?php echo e($department->department_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option value="other">Other</option>


                                    </select>

                                    <input class="form-control focused req" type="text" id="newDepartmentName" name="newDepartmentName" style="display: none"/>

                                    <?php if($errors->has('departmentName')): ?>
                                        <span class="help-block" >
                                        <strong id="departmentNamealert"><?php echo e($errors->first('departmentName')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <p> <strong>Note:</strong> Department name is must for Instructor role only. Students can keep it blank.</p>
                                </div>
                            </div>

                            <hr>
                            <h4> Security Questions </h4>
                            <hr>

                            <div class="form-group<?php echo e($errors->has('security_question1_Id') ? ' has-error' : ''); ?>">
                                <label for="security_question1_Id" class="col-md-4 control-label">Question 1<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <select class="form-control" name="security_question1_Id" value="<?php echo e(old('security_question1_Id')); ?>">
                                        <?php $__currentLoopData = $securityquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($question->security_question_id); ?>">
                                                <?php echo e($question->security_question); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('security_question1_Id')): ?>
                                        <span class="help-block" >
                                        <strong id="securityQuestion1Alert"><?php echo e($errors->first('security_question1_Id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('security_answer1') ? ' has-error' : ''); ?>">
                                <label for="state" class="col-md-4 control-label">Answer<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="security_answer1" type="text" class="form-control" name="security_answer1" value="<?php echo e(old('security_answer1')); ?>">

                                    <?php if($errors->has('security_answer1')): ?>
                                        <span class="help-block" >
                                        <strong id="securityAnswer1Alert"><?php echo e($errors->first('security_answer1')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('security_question2_Id') ? ' has-error' : ''); ?>">
                                <label for="security_question1_Id" class="col-md-4 control-label">Question 2<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <select class="form-control" name="security_question2_Id" value="<?php echo e(old('security_question2_Id')); ?>">
                                        <?php $__currentLoopData = $securityquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($question->security_question_id); ?>">
                                                <?php echo e($question->security_question); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('security_question2_Id')): ?>
                                        <span class="help-block" >
                                        <strong id="securityQuestion2Alert"><?php echo e($errors->first('security_question2_Id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('security_answer2') ? ' has-error' : ''); ?>">
                                <label for="state" class="col-md-4 control-label">Answer<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="security_answer2" type="text" class="form-control" name="security_answer2" value="<?php echo e(old('security_answer2')); ?>">

                                    <?php if($errors->has('security_answer2')): ?>
                                        <span class="help-block" >
                                        <strong id="securityAnswer2Alert"><?php echo e($errors->first('security_answer2')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('security_question3_Id') ? ' has-error' : ''); ?>">
                                <label for="security_question3_Id" class="col-md-4 control-label">Question 3<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <select class="form-control" name="security_question3_Id" value="<?php echo e(old('security_question3_Id')); ?>">
                                        <?php $__currentLoopData = $securityquestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($question->security_question_id); ?>">
                                                <?php echo e($question->security_question); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('security_question3_Id')): ?>
                                        <span class="help-block" >
                                        <strong id="securityQuestion3Alert"><?php echo e($errors->first('security_question3_Id')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group<?php echo e($errors->has('security_answer3') ? ' has-error' : ''); ?>">
                                <label for="state" class="col-md-4 control-label">Answer<span style="color: red;font-size: large">*</span></label>

                                <div class="col-md-6">
                                    <input id="security_answer3" type="text" class="form-control" name="security_answer3" value="<?php echo e(old('security_answer3')); ?>">

                                    <?php if($errors->has('security_answer3')): ?>
                                        <span class="help-block" >
                                    <strong id="securityAnswer3Alert"><?php echo e($errors->first('security_answer3')); ?></strong>
                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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