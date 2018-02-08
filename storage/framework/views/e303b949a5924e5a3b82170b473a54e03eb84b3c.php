<?php $__env->startSection('Maincontent'); ?>
    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    
    <div class="container-fluid" style="margin-top: 0;padding-top: 0;padding-left: 1%;">
        <div class="row" style="border: solid;padding-top: 0;border-top:0;">
            
            <div class="col-md-2" style="float: left;padding-left: 0;padding-right: 0">
                <ul class="list-group" style="cursor: pointer">
                    <li class="list-group-item">
                        
                        <a
                                id="Demographics_tab"
                                href="<?php echo e(URL::route('Demographics', $patient->patient_id)); ?>"
                        >
                            <b>Demographics</b>
                        </a>
                    </li>

                    <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($nav[0]->parent_id === NULL): ?>
                            <li class="list-group-item">
                                <a id="<?php echo e($nav[0]->navigation_name); ?>_tab" href="<?php echo e(URL::route($nav[0]->navigation_name, $patient->patient_id)); ?>">
                                    <b><?php echo e($nav[0]->navigation_name); ?></b>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="list-group-item" style="padding-left: 20%">
                                <a id="<?php echo e($nav[0]->navigation_name); ?>_tab" href="<?php echo e(URL::route($nav[0]->navigation_name.$nav[0]->parent_id, $patient->patient_id)); ?>">
                                    <b><?php echo e($nav[0]->navigation_name); ?></b>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <li class="list-group-item">
                        <?php if(!((count($disposition)> 0) && $status_id === 1)): ?>
                            <a class="btn btn-default" id="submit-button" style="margin:auto; text-align:center; display:block; width:100%;" title = "Disposition should be saved inorder to submit a patient." disabled>
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</a>
                        <?php else: ?>
                            <a href="<?php echo e(URL::route('AssignInstructor', $patient->patient_id)); ?>" class="btn btn-primary" id="submit-button" style="margin:auto; text-align:center; display:block; width:100%;" title = "You need to assign instructor for final submission of patient.">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>

            
            <div class="col-md-6" style="padding-left: 0;margin-left: 0;padding-right: 0;margin-right: 0">
                <?php echo $__env->yieldContent('documentation_panel'); ?>
            </div>

            

            <div class="col-md-4" style="float: right;border: thin solid grey; height: auto; padding: 0; border-radius: 5px;" id="guidance_panel">

                <!-- Guidance Panel -->

                <div style="background-color: lightpink; display: flex; border-radius: 5px;">
                    <h4>&nbsp;Guidance Panel</h4>
                </div>
                <br>
                <div class="container-fluid">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#main">Main</a></li>
                        <li><a data-toggle="pill" href="#ddx">DDx</a></li>
                        <li><a data-toggle="pill" href="#av">A/V</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="main" class="tab-pane fade in active">
                            <?php echo $__env->make('patient.guidancepanel_main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div id="ddx" class="tab-pane fade">
                            <?php echo $__env->make('patient.guidancepanel_ddx', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div id="av" class="tab-pane fade">
                            <?php echo $__env->make('patient.guidancepanel_av', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>

                <!-- Guidance Panel -->

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('patient.vital_signs_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>