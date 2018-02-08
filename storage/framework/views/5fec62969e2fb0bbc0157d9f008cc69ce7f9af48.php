<?php $__env->startSection('content'); ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <div class="container">
    <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="row col-md-8">
                <a href="<?php echo e(url('/home')); ?>" class="btn btn-success" style="float: left">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Back to Dashboard</a>
            </div>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading" style="backgroundd-color: lightblue">
                        <h4>Add Student Email Address</h4>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('AddStudentEmails')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php for($i = 0; $i < $counter ; $i++): ?>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label">Enter E-Mail Address:</label>

                                        <div class="col-md-6">
                                            <input id="email[]" type="email" class="form-control" name="email[]" required>

                                            <?php if($errors->has('email')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <?php if($counter != '1'): ?>
                                 <div class="col-md-4" style="float:right">
                                    <a type="button" href="<?php echo e(url('RemoveStudentEmails')); ?>">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i> Remove row
                                    </a>
                                </div>
                                <?php endif; ?>

                                <div class="col-md-4" style="float:right">
                                    <a type="button" href="<?php echo e(url('AddMoreStudentEmails')); ?>">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
                                    </a>
                                </div>
                                <br>
                                <br>

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
             <!-- After user submits request -->
             
                 <?php if($Error == 'Email Present'): ?>
                     <div class="alert alert-danger alert-dismissable">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <?php if($counter == '1'): ?>
                             Error! This email address is already present in the database.
                         <?php endif; ?>
                         <?php if($counter > '1'): ?>
                             Success! Either of your entered email addresses is already present in the database.
                         <?php endif; ?>
                     </div>
                 <?php endif; ?>

                
                 <?php if($Error == 'No'): ?>
                 <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <?php if($counter == '1'): ?>
                        Success! Email address is saved in the database.
                     <?php endif; ?>
                     <?php if($counter == '2'): ?>
                         Success! Both the Email addresses are saved in the database.
                     <?php endif; ?>
                     <?php if($counter > '2'): ?>
                         Success! All <?php echo e($counter); ?> Email addresses are saved in the database.
                     <?php endif; ?>
                 </div>
                 <?php endif; ?>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>