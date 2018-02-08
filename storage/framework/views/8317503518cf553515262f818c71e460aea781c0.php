<?php $__env->startSection('documentation_panel'); ?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
            <h4 style="margin-top: 0">Orders</h4>
        </div>
        <form class="form-horizontal" method="POST" action="<?php echo e(route('post_orders')); ?>" id="orders_form">
            <?php echo e(csrf_field()); ?>

            <input id="module_id" name="module_id" type="hidden" value="<?php echo e($patient->module_id); ?>">
            <input id="patient_id" name="patient_id" type="hidden" value="<?php echo e($patient->patient_id); ?>">
            <input type=hidden id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>List of labs</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><p><?php echo e($lab->value); ?></p></td>
                                    <td style="text-align: right">
                                        <a href="<?php echo e(route( 'delete_lab_order', ['active_record_id' => $lab->active_record_id])); ?>"
                                           class="btn btn-danger confirmation" id="delete">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </a>
                                      </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>List of Images</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><p><?php echo e($image->value); ?></p></td>
                                    <td style="text-align: right">
                                        <a href="<?php echo e(route( 'delete_image_order', ['active_record_id' => $image->active_record_id])); ?>"
                                           class="btn btn-danger confirmation" id="delete">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </a>
                                     </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>List of procedures</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $procedures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><p><?php echo e($procedure->value); ?></p></td>
                                    <td style="text-align: right">
                                        <a href="<?php echo e(route( 'delete_procedure_order', ['active_record_id' => $procedure->active_record_id])); ?>"
                                           class="btn btn-danger confirmation" id="delete">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="width: ">
                <div class="row">
                    <!-- Search For labs -->
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="orders_labs"> Labs:</label>
                            </div>
                            <div class="col-md-12">
                                <select id="search_labs_orders" class="js-example-basic-multiple js-states form-control" name="search_labs_orders[]" multiple></select>
                            </div>
                        </div>
                    </div>
                    <!-- Search For Imaging -->
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="orders_imaging"> Imaging:</label>
                            </div>
                            <div class="col-md-12">
                                <select id="search_labs_imaging" class="js-example-basic-multiple js-states form-control" name="search_labs_imaging[]" multiple></select>
                            </div>
                        </div>
                    </div>
                    <!-- Search for procedure -->
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="orders_procedure"> Procedure:</label>
                            </div>
                            <div class="col-md-12">
                                <select id="search_labs_procedure" class="js-example-basic-multiple js-states form-control" name="search_labs_procedure[]" multiple></select>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <!-- Comment box -->
                <div class="row">
                    <div class="col-md-12">
                        <label for="Comment"> Comments:</label>
                        <br>
                        <?php if(!count($comment_order)>0): ?>
                            <textarea rows="4" id="orders_comment" name="orders_comment" style="width: 100%;display: block" ></textarea>
                        <?php else: ?>
                            <textarea rows="4" id="orders_comment" name="orders_comment" style="width: 100%;display: block"><?php echo e($comment_order[0]->value); ?></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-md-6 ">
                        <button type="reset" id="btn_clear_orders_comment" class="btn btn-success" style="float: left">
                            <i class="fa fa-refresh" aria-hidden="true"></i> Reset Orders
                        </button>
                    </div>
                        <div class="col-md-6">
                            <button type="submit" id="btn_save_orders" class="btn btn-primary" style="float: right">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Save Orders
                            </button>
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#search_labs_orders').select2({
        placeholder: "Choose labs...",
        minimumInputLength: 2,
        ajax: {
            url: '<?php echo e(route('orders_labs_find')); ?>',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: false
        }
    });

    $('#search_labs_imaging').select2({
        placeholder: "Choose images...",
        minimumInputLength: 2,
        ajax: {
            url: '<?php echo e(route('orders_imaging_find')); ?>',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: false
        }
    });

    $('#search_labs_procedure').select2({
        placeholder: "Choose procedure...",
        minimumInputLength: 2,
        ajax: {
            url: '<?php echo e(route('orders_procedure_find')); ?>',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: false
        }
    });

    $(document).ready(function(){
        var inputsChanged = false;
        $('#orders_form').change(function() {
            inputsChanged = true;
        });

        function unloadPage(){
            if(inputsChanged){
                return "Do you want to leave this page?. Changes you made may not be saved.";
            }
        }

        $("#btn_save_orders").click(function(){
            inputsChanged = false;
        });

        window.onbeforeunload = unloadPage;

        $('#btn_clear_orders_comment').click( function()
        {
            $('#orders_comment').val('');
            $('#search_labs_imaging').empty().trigger('change');
            $('#search_labs_orders').empty().trigger('change');
            $('#search_labs_procedure').empty().trigger('change');
            inputsChanged = false;
        } );
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('patient.active_record', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>