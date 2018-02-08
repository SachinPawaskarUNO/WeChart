<?php $__env->startSection('content'); ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <div class="container">
        <div class="row" style="padding-top: 0; margin: 0">
            <h3 align = "center">Active Modules</h3>
        </div>

        <div class="row">
            <div class="col-md-2">
                <a href="<?php echo e(url('/home')); ?>" class="btn btn-success" >
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    Back to Dashboard</a>
            </div>
            <div class="col-md-2 col-md-offset-8">
                    <a href="#" title="" class="btn btn-primary" id="add-record" style="float: right">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add new Module</a>
            </div>
        </div>
        <br>
        <br>
        <div class="row" style="overflow-x: scroll;width: 1200px">
            <table class="table-responsive table-striped" border="2" id="main_table">
                <thead >
                    <tr>
                        <td style="background-color:#5DADE2;">
                            <h5 style="width: 150px;margin-left: 1%;margin-right: 1%">
                                <h4 style="color: #000000">Module <i class="fa fa-arrows-v" aria-hidden="true"></i>/Navigations <i class="fa fa-arrows-h" aria-hidden="true"></i></h4>
                            </h5>
                        </td>
                        <td style="background-color:#5DADE2;" align="middle">
                            <h5 style="width: 150px;color: #000000"><b>Demographics</b></h5>
                        </td>
                        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($nav->navigation_id == '2' || $nav->navigation_id == '9' || $nav->navigation_id == '20'): ?>
                                <td  style="background-color:#5DADE2;color: #000000"  align="middle">
                                    <h5 style="padding-left: 1%;padding-right: 1%;width: 100px"><b><?php echo e($nav->navigation_name); ?></b></h5>
                                </td>
                            <?php else: ?>
                                <?php if($nav->parent_id != NULL): ?>
                                    <td  style="background-color:#5DADE2; color: #000000; border: none">

                                    </td>
                                <?php else: ?>
                                    <td  style="background-color:#5DADE2; color: #000000"  align="middle">
                                        <h5 style="padding-left: 1%;padding-right: 1%;width: 100px"><b><?php echo e($nav->navigation_name); ?></b></h5>
                                    </td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#5DADE2; color: #000000">
                        </td>

                        <td style="background-color:#5DADE2; color: #000000" align="middle">
                        </td>

                        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($nav->parent_id != NULL): ?>
                                <td  style="background-color:#5DADE2; color: #000000"  align="middle">
                                    <h5 style="padding-left: 1%;padding-right: 1%;width: 120px">
                                    <b><?php echo e($nav->navigation_name); ?></b>
                                    </h5>
                                </td>
                            <?php else: ?>
                                <td  style="background-color:#5DADE2; color: #000000"  align="middle">
                                    <h5 style="padding-left: 1%;padding-right: 1%;width: 100px">
                                    </h5>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody style="overflow-x: scroll">
                <?php if($mods->isEmpty()): ?>
                    <tr id="onetimedisplay">
                        <td colspan="5" height="100" style="border: none; background-color:#F5F8FA">
                            <b>There are no active modules.<br> Please click the "Add Module" button to add module.</b>
                        </td>
                    </tr>
                <?php else: ?>
                <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="overflow-x: scroll">
                        <td align="middle">
                            <?php echo e($mod->module_name); ?>

                        </td>
                        <td align="middle">
                            <input type="checkbox" checked onclick="return false">
                        </td>
                        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td align="middle">
                                <?php $check = 0; ?>
                                <?php $__currentLoopData = $navs_mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($nm->module_id == $mod->module_id && $nm->navigation_id == $nav->navigation_id && $nm->visible ==1): ?>
                                        <?php $check = 1; ?>
                                        <?php break; ?>;
                                    <?php else: ?>
                                        <?php $check = 0; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($check == 1): ?>
                                    <input type="checkbox" class="form-check-input inline" checked="checked" onclick="return false" >
                                <?php else: ?>
                                    <input type="checkbox" class="form-check-input inline" onclick="return false">
                                <?php endif; ?>
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <td>
                            <?php echo e(Form::open(array('method' => 'post', 'route' => array('deletemodule', $mod->module_id)))); ?>

                                <div class="form-group">
                                    <button name="delbutton" class="btn btn-danger btn-delete">Delete</button>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>

        <?php echo e(Form::open(array('method' => 'post', 'route' => array('submitmodule')))); ?>

        <div class="row" id="childTable" style="overflow-x: scroll;width: 1200px">
        <table border="2" >
            <tr>
                <td style="background-color:#5DADE2;">
                    <h5 style="width: 150px;margin-left: 1%;margin-right: 1%">
                        <b>Module/Navigations</b>
                    </h5>
                </td>
                <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($nav->navigation_id == '2' || $nav->navigation_id == '9' || $nav->navigation_id == '20'): ?>
                        <td  style="background-color:#5DADE2;"  align="middle">
                            <h5 style="padding-left: 1%;padding-right: 1%;width: 100px"><b><?php echo e($nav->navigation_name); ?>- All</b></h5>
                        </td>
                    <?php else: ?>
                        <?php if($nav->parent_id != NULL): ?>
                            <td  style="background-color:#5DADE2;border: none">

                            </td>
                        <?php else: ?>
                            <td  style="background-color:#5DADE2;"  align="middle">
                                <h5 style="padding-left: 1%;padding-right: 1%;width: 100px"><b><?php echo e($nav->navigation_name); ?></b></h5>
                            </td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td>
                </td>
            </tr>
            <tr>
                <td style="background-color:#5DADE2;">
                </td>
                <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($nav->parent_id != NULL): ?>
                        <td  style="background-color:#5DADE2;"  align="middle">
                            <h5 style="padding-left: 1%;padding-right: 1%;width: 120px">
                                <b><?php echo e($nav->navigation_name); ?></b>
                            </h5>
                        </td>
                    <?php else: ?>
                        <td  style="background-color:#5DADE2;"  align="middle">
                            <h5 style="padding-left: 1%;padding-right: 1%;width: 100px">
                            </h5>
                        </td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td>
                </td>
            </tr>
            <tr>
               <td align="middle">
                   <input type="text" name="modulename" required id="new_module_name" placeholder="Module name">
                   <?php if($errors->has('modulename')): ?>
                       <span class="help-block" >
                                        <strong id="module_alert"><?php echo e($errors->first('modulename')); ?></strong>
                       </span>
                   <?php endif; ?>
               </td>
               <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <td align="middle">
                        
                       <?php if($nav->navigation_id == 34): ?>
                            <input type="checkbox" id=34 name="navs[]" value=34 checked onclick="return false">
                       <?php else: ?>
                            <input type="checkbox" id=<?php echo e($nav->navigation_id); ?> name="navs[]" value=<?php echo e($nav->navigation_id); ?>>
                       <?php endif; ?>
                   </td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <td>
                   <button name="submitbutton" class="btn btn-success btn-submit" id="add_new_module">Add</button>
               </td>
            </tr>
        </table>

            <br>
            <a href="#" title="" class="btn btn-primary" id="cancel_add_module" style="float: left">
                Cancel</a>
            <br>

        </div>
        <?php echo e(Form::close()); ?>

    </div>
<br>
    <script>
        $(document).ready(function(){
            $("#new_module_name").keyup(function() {
                if($(this).val() != '') {
                    $('#add_new_module').prop('disabled', false);
                }
            });

            $('#childTable').hide();

            $("#add-record").click(function(){
                $('#onetimedisplay').hide();
                $('#add_new_module').prop('disabled', true);
                $('#childTable').show();
                $("#add-record").hide();
            });

            $("#cancel_add_module").click(function(){
                $('#childTable').hide();
                $("#add-record").show();

                for (var i = 1; i < 34; i++) {
                    $('#'+i).prop('checked', false);
                }
                $('#new_module_name').val('');
                $('#add_new_module').prop('disabled', true);
            });

            // Selecting medical history selects all children
            $('#2').click(function () {
                for (var i = 3; i < 7; i++) {
                    $('#'+i).prop('checked', true);
                }
            });

            $('#3').click(function () {
                $('#2').prop('checked',false);
            });
            $('#4').click(function () {
                $('#2').prop('checked',false);
            });
            $('#5').click(function () {
                $('#2').prop('checked',false);
            });
            $('#6').click(function () {
                $('#2').prop('checked',false);
            });


            // Selecting ROS selects all children
            $('#9').click(function () {
                for (var i = 10; i < 20; i++) {
                    $('#'+i).prop('checked', true);
                }
            });

            $('#10').click(function () {
                $('#9').prop('checked',false);
            });
            $('#11').click(function () {
                $('#9').prop('checked',false);
            });
            $('#12').click(function () {
                $('#9').prop('checked',false);
            });
            $('#13').click(function () {
                $('#9').prop('checked',false);
            });
            $('#14').click(function () {
                $('#9').prop('checked',false);
            });
            $('#15').click(function () {
                $('#9').prop('checked',false);
            });
            $('#16').click(function () {
                $('#9').prop('checked',false);
            });
            $('#17').click(function () {
                $('#9').prop('checked',false);
            });
            $('#18').click(function () {
                $('#9').prop('checked',false);
            });
            $('#19').click(function () {
                $('#9').prop('checked',false);
            });


            // Selecting PE selects all children
            $('#20').click(function () {
                for (var i = 21; i < 31; i++) {
                    $('#'+i).prop('checked', true);
                }
            });

            $('#21').click(function () {
                $('#20').prop('checked',false);
            });
            $('#22').click(function () {
                $('#20').prop('checked',false);
            });
            $('#23').click(function () {
                $('#20').prop('checked',false);
            });
            $('#24').click(function () {
                $('#20').prop('checked',false);
            });
            $('#25').click(function () {
                $('#20').prop('checked',false);
            });
            $('#26').click(function () {
                $('#20').prop('checked',false);
            });
            $('#27').click(function () {
                $('#20').prop('checked',false);
            });
            $('#28').click(function () {
                $('#20').prop('checked',false);
            });
            $('#29').click(function () {
                $('#20').prop('checked',false);
            });
            $('#30').click(function () {
                $('#20').prop('checked',false);
            });


        });
    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>