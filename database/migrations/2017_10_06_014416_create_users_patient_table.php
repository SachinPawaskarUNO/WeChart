<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_patient', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('users_patient_id')->unsigned();
            $table->integer('patient_record_status_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('feedback')->nullable();
=======
            $table->integer('patient_record_status_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('user_id')->unsigned();
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();

          //  $table->primary(['patient_id', 'user_id']);
            $table->rememberToken();
            $table->timestamps();
        });

        //Adding foreign key constraint with patient_record_status table
        Schema::table('users_patient', function (Blueprint $table) {
            $table->foreign('patient_record_status_id')->references('patient_record_status_id')->on('patient_record_status');
        });

        //Adding foreign key constraint with patient table
        Schema::table('users_patient', function (Blueprint $table) {
            $table->foreign('patient_id')->references('patient_id')->on('patient');
        });

        //This will be changed once the new data model is in place.
        //Adding foreign key constraint with users table
        Schema::table('users_patient', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_patient');
    }
}
