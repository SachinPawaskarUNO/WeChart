<?php $__env->startSection('content'); ?>
    
    <!--This is a container for vital signs header -->
    <div class="container-fluid">
        <div class="row" >
            <div class="panel-heading" style="padding-left: 0">
                <a href="<?php echo e(url('/StudentHome')); ?>" class="btn btn-success" style="float: left">
                    <i id="back_to_dashboard" class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    Back to Dashboard
                </a>
                <h3 id="patient_active_record" align="center" style="margin-top: 0;"><b>Patient Active Record</b></h3>
            </div>
            <div class="panel-body" style="margin-bottom: 0;padding-bottom: 0;background-color: #FFFAF0;margin-top: 0;padding-top: 0">
                <table class="table" style=" margin-top: 0;padding-top: 0;margin-bottom: 0;padding-bottom: 0">
                    <!--This is the first row in the vital signs panel -->
                    <tr style="padding-top: 0;padding-bottom: 0%; border-style: hidden">
                        <td style="padding-top: 0;padding-bottom: 0%">
                            <p id="name_label" style="align-self: center"><strong>Name:</strong>
                            <?php echo e($vital_signs_header->name); ?>

                            </p>
                        </td>
                        <td style="padding-top: 0;padding-bottom: 0%">
                            <p id="age_label"><strong>Age: </strong>
                            <?php echo e($vital_signs_header->age); ?>

                            </p>
                        </td>
                        <td style="padding-top: 0;padding-bottom: 0%">
                            <p id="sex_label"><strong>Sex: </strong>
                            <?php echo e($vital_signs_header->gender); ?>

                            </p>
                        </td>
                        <td style="padding-top: 0;padding-bottom: 0%">
                            <p id="room_number_label"> <strong>Room No: </strong>
                                <?php echo e($vital_signs_header->room_number); ?></p>
                        </td>
                        <td style="padding-top: 0%;padding-bottom: 0%">
                            <p id="visit_date_label"><strong>Visit Date: </strong>
                            <?php echo e($vital_signs_header->visit_date); ?></p>
                        </td>
                        <td style="padding-top: 0;padding-bottom: 0%">
                            <p id="RR_label" style="align-self: center"><strong>Respiratory Rate (RR):</strong>
                                <?php if(count($vital_signs_header->respiratory_rate) > 0): ?>
                                    <?php echo e($vital_signs_header->respiratory_rate[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>

                    </tr>
                    <!--This is the second row in the vital signs panel -->
                    <tr style="padding-top: 0;padding-bottom: 0%; border-style: hidden">
                        <td style="padding-top: 0%;padding-bottom: 0%">
                            <p id="temperature_label"><strong>Temperature: </strong>
                                <?php if(count($vital_signs_header->temperature) > 0): ?>
                                    <?php echo e($vital_signs_header->temperature[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                        <td style="padding-top: 0%;padding-bottom: 0%">
                            <p id="oxygen_saturation_label"><strong>O<sub>2</sub> Sat: </strong>
                                <?php if(count($vital_signs_header->oxygen_saturation) > 0): ?>
                                    <?php echo e($vital_signs_header->oxygen_saturation[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                        <td style="padding-top: 0;padding-bottom: 0%">
                            <p id="bp_systolic_label" style="align-self: center"><strong>Blood Pressure (BP) Systolic: </strong>
                                <?php if(count($vital_signs_header->BP_systolic) > 0): ?>
                                    <?php echo e($vital_signs_header->BP_systolic[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                        <td style="padding-top: 0%;padding-bottom: 0%">
                            <p id="bp_diastolic_label"><strong>Blood Pressure (BP) Diastolic: </strong>
                                <?php if(count($vital_signs_header->BP_diastolic) > 0): ?>
                                    <?php echo e($vital_signs_header->BP_diastolic[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                        <td style="padding-top: 0%;padding-bottom: 0%">
                            <p id="hr_label"><strong>Heart Rate (HR): </strong>
                                <?php if(count($vital_signs_header->heart_rate) > 0): ?>
                                    <?php echo e($vital_signs_header->heart_rate[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                        <td style="padding-top: 0%;padding-bottom: 0%">
                            <p id="pain_label"><strong>Pain (0/10):  </strong>
                                <?php if(count($vital_signs_header->pain) > 0): ?>
                                    <?php echo e($vital_signs_header->pain[0]); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row" style="padding-bottom: 0;margin-bottom: 0">
            <?php echo $__env->yieldContent('Maincontent'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>