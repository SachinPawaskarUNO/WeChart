<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class users_patient extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'patient_record_status_id','patient_id','user_id','created_by','updated_by','feedback'
=======
        'patient_record_status_id','patient_id','user_id','created_by','updated_by'
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
    ];
    public function patient() {
        return $this->belongsTo('App\patient', 'patient_id');
    }
    public function users() {
        return $this->belongsTo('App\User');
    }
    public function patient_record_status() {
        return $this->belongsTo('App\patient_record_status');
    }
    protected $table = 'users_patient';
}