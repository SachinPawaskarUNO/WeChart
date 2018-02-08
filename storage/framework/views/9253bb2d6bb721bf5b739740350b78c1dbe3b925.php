<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row" style="padding-top: 0;margin: 0">
        <h3 id="lblAdminHeader" style="text-align: center;padding-top: 0;margin: 0"><img src="logos\LogoAdmin.png" width="4%"> Admin Dashboard <img src="logos\LogoAdmin.png" width="4%"></h3>
    </div>

    <div class="row">
            <div class="col-md-2 col-md-offset-1">   
                <a href="<?php echo e(url('/RemoveEmails')); ?>" class="btn btn-success">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> Remove Emails</a>
            </div>
            <div class="col-md-8">
                <a class="btn btn-success" style="float: right" href=<?php echo e(url('/ConfigureModules')); ?>>
                    <i class="fa fa-cog" aria-hidden="true"></i> Configure Modules</a>
            </div>
    </div>
    <br>
    <!-- Students -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                    <h4 style="margin-top: 0">Students</h4>                
                </div>

                <div class="panel-body" >
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="bg-info">
                            <th>Name</th>
                            <th><i class="fa fa-envelope-o" aria-hidden="true"></i> Email Address</th>
                            <th><i class="fa fa-phone" aria-hidden="true"></i> Contact Number</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <p><?php echo ($student->firstname); ?>  &nbsp;<?php echo ($student->lastname); ?></p></td>
                                    <td><p><?php echo ($student->email); ?></p></td>
                                    <td> <p><?php echo ($student->contactno); ?></p></td>
                                    <td style="text-align: right">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['archiveuser', $student->id],'id' => 'FormDeleteTime','class' =>'form-inline form-delete', 'onsubmit' => 'return ConfirmDelete()']); ?>


                                        <?php echo Form::hidden('case_id', $student->id, ['class' => 'form-control']); ?>


                                        <button id="student_minus_delete" data-id='<?php echo $student->id ;?>' style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-danger btn-sm">
                                            Delete </button>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <a id="addStudentEmails" href="<?php echo e(url('/AddStudentEmails')); ?>" class="btn btn-primary" style="float: right">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Add Student Email Address</a>
                </div>
            </div>
        </div>
    </div>
<br>
      <!-- Instructors -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: grey; padding-bottom: 0">
                    <h4 style="margin-top: 0">Instructors</h4>                
                </div>

                <div class="panel-body" >
                <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="bg-info">
                            <th>Name</th>
                            <th><i class="fa fa-envelope-o" aria-hidden="true"></i> Email Address</th>
                            <th><i class="fa fa-phone" aria-hidden="true"></i> Contact Number</th>
                            <th><i class="fa fa-newspaper-o" aria-hidden="true"></i> Department Name</th>                            
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <p><?php echo ($instructor->firstname); ?>  &nbsp;<?php echo ($instructor->lastname); ?></p></td>
                                    <td><p><?php echo ($instructor->email); ?></p></td>
                                    <td> <p><?php echo ($instructor->contactno); ?></p></td>
                                    <td> <p><?php echo ($instructor->departmentName ); ?></p></td>
                                    <td style="text-align: right">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['archiveuser', $instructor->id],'id' => 'FormDeleteTime','class' =>'form-inline form-delete', 'onsubmit' => 'return ConfirmDelete()']); ?>


                                        <?php echo Form::hidden('case_id', $instructor->id, ['class' => 'form-control']); ?>


                                        <button id="student_minus_delete" data-id='<?php echo $instructor->id ;?>' style="margin:auto;  text-align:center; display:block; width:100%;" class="btn btn-danger btn-sm">
                                            Delete </button>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <a id="addInstructorEmails" href="<?php echo e(url('/AddInstructorEmails')); ?>" class="btn btn-primary" style="float: right">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Add Instructor Email Address</a>
                </div>
              </div>
        </div>
    </div>
  
</div>
<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>