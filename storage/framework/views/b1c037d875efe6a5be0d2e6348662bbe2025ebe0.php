<?php $__env->startSection('documentation_panel'); ?>
    <?php if(in_array("23", $navIds)): ?>
        
        <div class="col-md-6" id="eyes">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Eyes</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Eyes')); ?>" id="Eyes_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $eyes_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eyes_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($eyes_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$eyes_symptoms[]"
                                                                value="<?php echo e($eyes_symptom->value); ?>"
                                                                id="<?php echo e($eyes_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$eyes_symptoms[]"
                                                                value="<?php echo e($eyes_symptom->value); ?>"
                                                                id="<?php echo e($eyes_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($eyes_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($eyes_comment)>0): ?>
                                        <textarea rows="4" id="eyes_comment" name="eyes_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="eyes_comment" name="eyes_comment" style="width: 100%;display: block"><?php echo e($eyes_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_eyes" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Eyes
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_eyes" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Eyes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <?php endif; ?>
    <?php if(in_array("25", $navIds)): ?>
        
        <div class="col-md-6" id="cardiovascular">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Cardiovascular</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Cardiovascular')); ?>" id="Cardiovascular_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $cardiovascular_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cardiovascular_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($cardiovascular_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$cardiovascular_symptoms[]"
                                                                value="<?php echo e($cardiovascular_symptom->value); ?>"
                                                                id="<?php echo e($cardiovascular_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$cardiovascular_symptoms[]"
                                                                value="<?php echo e($cardiovascular_symptom->value); ?>"
                                                                id="<?php echo e($cardiovascular_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($cardiovascular_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($cardiovascular_comment)>0): ?>
                                        <textarea rows="4" id="cardiovascular_comment" name="cardiovascular_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="cardiovascular_comment" name="cardiovascular_comment" style="width: 100%;display: block"><?php echo e($cardiovascular_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_cardiovascular" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Cardiovascular
                                    </button>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_cardiovascular" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Cardiovascular
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <?php endif; ?>
    <?php if(in_array("27", $navIds)): ?>
        
        <div class="col-md-6" id="integumentary">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Integumentary</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Integumentary')); ?>" id="Integumentary_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $integumentary_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $integumentary_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($integumentary_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$integumentary_symptoms[]"
                                                                value="<?php echo e($integumentary_symptom->value); ?>"
                                                                id="<?php echo e($integumentary_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$integumentary_symptoms[]"
                                                                value="<?php echo e($integumentary_symptom->value); ?>"
                                                                id="<?php echo e($integumentary_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($integumentary_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($integumentary_comment)>0): ?>
                                        <textarea rows="4" id="integumentary_comment" name="integumentary_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="integumentary_comment" name="integumentary_comment" style="width: 100%;display: block"><?php echo e($integumentary_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_integumentary" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Integumentary
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_integumentary" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Integumentary
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <hr>
    <?php endif; ?>
    <?php if(in_array("29", $navIds)): ?>
        
        <div class="col-md-6" id="psychological">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Psychological</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Psychological')); ?>" id="Psychological_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $psychological_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $psychological_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($psychological_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$psychological_symptoms[]"
                                                                value="<?php echo e($psychological_symptom->value); ?>"
                                                                id="<?php echo e($psychological_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$psychological_symptoms[]"
                                                                value="<?php echo e($psychological_symptom->value); ?>"
                                                                id="<?php echo e($psychological_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($psychological_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($psychological_comment)>0): ?>
                                        <textarea rows="4" id="psychological_comment" name="psychological_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="psychological_comment" name="psychological_comment" style="width: 100%;display: block"><?php echo e($psychological_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_psychological" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Psychological
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_psychological" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Psychological
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array("24", $navIds)): ?>
        
        <div class="col-md-6" id="respiratory">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Respiratory</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Respiratory')); ?>" id="Respiratory_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $respiratory_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $respiratory_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($respiratory_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$respiratory_symptoms[]"
                                                                value="<?php echo e($respiratory_symptom->value); ?>"
                                                                id="<?php echo e($respiratory_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$respiratory_symptoms[]"
                                                                value="<?php echo e($respiratory_symptom->value); ?>"
                                                                id="<?php echo e($respiratory_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($respiratory_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($respiratory_comment)>0): ?>
                                        <textarea rows="4" id="respiratory_comment" name="respiratory_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="respiratory_comment" name="respiratory_comment" style="width: 100%;display: block"><?php echo e($respiratory_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_respiratory" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Respiratory
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_respiratory" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Respiratory
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <?php endif; ?>
    <?php if(in_array("26", $navIds)): ?>
        
        <div class="col-md-6" id="musculoskeletal">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Musculoskeletal</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Musculoskeletal')); ?>" id="Musculoskeletal_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $musculoskeletal_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $musculoskeletal_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($musculoskeletal_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$musculoskeletal_symptoms[]"
                                                                value="<?php echo e($musculoskeletal_symptom->value); ?>"
                                                                id="<?php echo e($musculoskeletal_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$musculoskeletal_symptoms[]"
                                                                value="<?php echo e($musculoskeletal_symptom->value); ?>"
                                                                id="<?php echo e($musculoskeletal_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($musculoskeletal_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($musculoskeletal_comment)>0): ?>
                                        <textarea rows="4" id="musculoskeletal_comment" name="musculoskeletal_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="musculoskeletal_comment" name="musculoskeletal_comment" style="width: 100%;display: block"><?php echo e($musculoskeletal_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_musculoskeletal" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Musculoskeletal
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_musculoskeletal" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Musculoskeletal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <?php endif; ?>
    <?php if(in_array("28", $navIds)): ?>
        
        <div class="col-md-6" id="neurological">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Neurological</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Neurological')); ?>" id="Neurological_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $neurological_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $neurological_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($neurological_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$neurological_symptoms[]"
                                                                value="<?php echo e($neurological_symptom->value); ?>"
                                                                id="<?php echo e($neurological_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$neurological_symptoms[]"
                                                                value="<?php echo e($neurological_symptom->value); ?>"
                                                                id="<?php echo e($neurological_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($neurological_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($neurological_comment)>0): ?>
                                        <textarea rows="4" id="neurological_comment" name="neurological_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="neurological_comment" name="neurological_comment" style="width: 100%;display: block"><?php echo e($neurological_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" id="btn_clear_neurological" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Neurological
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" >
                                    <button type="submit" id="btn_save_neurological" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Neurological
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <hr>
    <?php endif; ?>
    <?php if(in_array("30", $navIds)): ?>
        
        <div class="col-md-6"  id="gastrointestinal">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Gastrointestinal</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Gastrointestinal')); ?>" id="Gastrointestinal_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $gastrointestinal_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gastrointestinal_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($gastrointestinal_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$gastrointestinal_symptoms[]"
                                                                value="<?php echo e($gastrointestinal_symptom->value); ?>"
                                                                id="<?php echo e($gastrointestinal_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$gastrointestinal_symptoms[]"
                                                                value="<?php echo e($gastrointestinal_symptom->value); ?>"
                                                                id="<?php echo e($gastrointestinal_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($gastrointestinal_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($gastrointestinal_comment)>0): ?>
                                        <textarea rows="4" id="gastrointestinal_comment" name="gastrointestinal_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="gastrointestinal_comment" name="gastrointestinal_comment" style="width: 100%;display: block"><?php echo e($gastrointestinal_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="reset" id="btn_clear_gastrointestinal" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Gastrointestinal
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5" >
                                    <button type="submit" id="btn_save_gastrointestinal" class="btn btn-primary" style="float: right">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Gastrointestinal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array("22", $navIds)): ?>
        
        <div class="col-md-6" id="hent">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- HENT</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('HENT')); ?>" id="HENT_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $HENT_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HENT_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($HENT_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$HENT_symptoms[]"
                                                                value="<?php echo e($HENT_symptom->value); ?>"
                                                                id="<?php echo e($HENT_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$HENT_symptoms[]"
                                                                value="<?php echo e($HENT_symptom->value); ?>"
                                                                id="<?php echo e($HENT_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($HENT_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($HENT_comment)>0): ?>
                                        <textarea rows="4" id="HENT_comment" name="HENT_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="HENT_comment" name="HENT_comment" style="width: 100%;display: block"><?php echo e($HENT_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="reset" id="btn_clear_HENT" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset HENT
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5" >
                                    <button type="submit" id="btn_save_HENT" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save HENT
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <?php endif; ?>
    <?php if(in_array("21", $navIds)): ?>
        

        <div class="col-md-6" id="constitutional">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
                    <h4 style="margin-top: 0">Physical Exam- Constitutional</h4>
                </div>
                <div class="panel-body">
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('Constitutional')); ?>" id="Constitutional_form">
                        <?php echo e(csrf_field()); ?>

                        <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
                        <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
                        <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                        <?php $__currentLoopData = $constitutional_symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $constitutional_symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($constitutional_symptom->is_saved): ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$constitutional_symptoms[]"
                                                                value="<?php echo e($constitutional_symptom->value); ?>"
                                                                id="<?php echo e($constitutional_symptom->value); ?>" checked>
                                                    <?php else: ?>
                                                        <input
                                                                type="checkbox"
                                                                name="$constitutional_symptoms[]"
                                                                value="<?php echo e($constitutional_symptom->value); ?>"
                                                                id="<?php echo e($constitutional_symptom->value); ?>">

                                                    <?php endif; ?>
                                                    <?php echo e($constitutional_symptom->value); ?>

                                                    <br>
                                                    <br>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Comment box -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Comment"> Comments:</label>
                                    <br>
                                    <?php if(!count($constitutional_comment)>0): ?>
                                        <textarea rows="4" id="constitutional_comment" name="constitutional_comment" style="width: 100%;display: block"></textarea>
                                    <?php else: ?>
                                        <textarea rows="4" id="constitutional_comment" name="constitutional_comment" style="width: 100%;display: block"><?php echo e($constitutional_comment[0]); ?></textarea>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="reset" id="btn_clear_constitutional" class="btn btn-success" style="float: left">
                                        <i class="fa fa-refresh" aria-hidden="true"></i> Reset Constitutional
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5" >
                                    <button type="submit" id="btn_save_constitutional" class="btn btn-primary" style="float: left">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Constitutional
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    <?php endif; ?>









    <script>
         $(document).ready(function(){
             var inputsChanged_Constitutional_form = false;
             var inputsChanged_HENT_form = false;
             var inputsChanged_Eyes_form = false;
             var inputsChanged_Respiratory_form = false;
             var inputsChanged_Cardiovascular_form = false;
             var inputsChanged_Musculoskeletal_form = false;
             var inputsChanged_Integumentary_form = false;
             var inputsChanged_Neurological_form = false;
             var inputsChanged_Psychological_form = false;

             $('#Constitutional_form').change(function() {
                 inputsChanged_Constitutional_form = true;
             });
             $('#HENT_form').change(function() {
                 inputsChanged_HENT_form = true;
             });
             $('#Eyes_form').change(function() {
                 inputsChanged_Eyes_form = true;
             });
             $('#Respiratory_form').change(function() {
                 inputsChanged_Respiratory_form = true;
             });
             $('#Cardiovascular_form').change(function() {
                 inputsChanged_Cardiovascular_form = true;
             });
             $('#Musculoskeletal_form').change(function() {
                 inputsChanged_Musculoskeletal_form = true;
             });
             $('#Integumentary_form').change(function() {
                 inputsChanged_Integumentary_form = true;
             });
             $('#Neurological_form').change(function() {
                 inputsChanged_Neurological_form = true;
             });
             $('#Psychological_form').change(function() {
                 inputsChanged_Psychological_form = true;
             });

             function unloadPage(){
                 if(inputsChanged_Psychological_form || inputsChanged_Constitutional_form || inputsChanged_HENT_form ||inputsChanged_Eyes_form || inputsChanged_Respiratory_form || inputsChanged_Cardiovascular_form || inputsChanged_Musculoskeletal_form || inputsChanged_Integumentary_form || inputsChanged_Neurological_form){
                     return "Do you want to leave this page?. Changes you made may not be saved.";
                 }
             }
             $("#btn_save_constitutional").click(function(){
                 inputsChanged_Constitutional_form = false;
             });
             $("#btn_save_HENT").click(function(){
                 inputsChanged_HENT_form = false;
             });
             $("#btn_save_eyes").click(function(){
                 inputsChanged_Eyes_form = false;
             });
             $("#btn_save_respiratory").click(function(){
                 inputsChanged_Respiratory_form = false;
             });
             $("#btn_save_cardiovascular").click(function(){
                 inputsChanged_Cardiovascular_form = false;
             });
             $("#btn_save_musculoskeletal").click(function(){
                 inputsChanged_Musculoskeletal_form = false;
             });
             $("#btn_save_integumentary").click(function(){
                 inputsChanged_Integumentary_form = false;
             });
             $("#btn_save_neurological").click(function(){
                 inputsChanged_Neurological_form = false;
             });
             $("#btn_save_psychological").click(function(){
                 inputsChanged_Psychological_form = false;
             });

             // Reset buttons
             $("#btn_clear_constitutional").click(function(){
                 inputsChanged_Constitutional_form = false;
             });
             $("#btn_clear_HENT").click(function(){
                 inputsChanged_HENT_form = false;
             });
             $("#btn_clear_eyes").click(function(){
                 inputsChanged_Eyes_form = false;
             });
             $("#btn_clear_respiratory").click(function(){
                 inputsChanged_Respiratory_form = false;
             });
             $("#btn_clear_cardiovascular").click(function(){
                 inputsChanged_Cardiovascular_form = false;
             });
             $("#btn_clear_musculoskeletal").click(function(){
                 inputsChanged_Musculoskeletal_form = false;
             });
             $("#btn_clear_integumentary").click(function(){
                 inputsChanged_Integumentary_form = false;
             });
             $("#btn_clear_neurological").click(function(){
                 inputsChanged_Neurological_form = false;
             });
             $("#btn_clear_psychological").click(function(){
                 inputsChanged_Psychological_form = false;
             });

             window.onbeforeunload = unloadPage;
         });
     </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('patient.active_record', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>