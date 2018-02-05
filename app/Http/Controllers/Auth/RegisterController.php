<?php

namespace App\Http\Controllers\Auth;

use App\User;
<<<<<<< HEAD
use App\security_question_users;
use App\security_question;
use App\department;
=======
use App\Security;
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
use App\Rules\EmailExists;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //Overwriting post login method
    protected function redirectTo()
    {
        if (Auth::check())
        {
            $email=Auth::user()->email;
            $role = DB::table('users')->where('email',$email)->value('role');
            
            if($role == 'Student')
                return '/StudentHome';
            if($role == 'Admin')
                return '/home';
            if($role == 'Instructor')
                return '/InstructorHome';
        }

        // return '/login';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        //Fetching 
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
         $messages = ['different' => 'You have selected same security question twice. Please try again with three distinct security questions.'];

<<<<<<< HEAD
        if($data['departmentName']=='other') {
            return Validator::make($data, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new EmailExists($data['role'])],
                'password' => 'required|string|min:6|confirmed',
                'contactno' => 'nullable|max:255',
                // 'role' => 'required',
                'departmentName' => 'max:255|required_if:role,Instructor',
                'newDepartmentName' => 'max:255|required_if:role,Instructor',
                'security_question1_Id' => 'required|different:security_question2_Id',
                'security_answer1' => 'required|max:255',
                'security_question2_Id' => 'required|different:security_question3_Id',
                'security_answer2' => 'required|max:255',
                'security_question3_Id' => 'required|different:security_question1_Id',
                'security_answer3' => 'required|max:255',
            ], $messages);
        }else {
            return Validator::make($data, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new EmailExists($data['role'])],
                'password' => 'required|string|min:6|confirmed',
                'contactno' => 'nullable|max:255',
                // 'role' => 'required',
                'departmentName' => 'max:255|required_if:role,Instructor',
                'security_question1_Id' => 'required|different:security_question2_Id',
                'security_answer1' => 'required|max:255',
                'security_question2_Id' => 'required|different:security_question3_Id',
                'security_answer2' => 'required|max:255',
                'security_question3_Id' => 'required|different:security_question1_Id',
                'security_answer3' => 'required|max:255',
            ], $messages);
        }
=======
         return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => ['required','string','email','max:255','unique:users',new EmailExists($data['role'])],
            'password' => 'required|string|min:6|confirmed',
            'contactno' => 'nullable|max:255',
            // 'role' => 'required',
            'departmentName' => 'max:255|required_if:role,Instructor',
            'security_question1_Id' => 'required|different:security_question2_Id',
            'security_answer1' => 'required|max:255',
            'security_question2_Id' => 'required|different:security_question3_Id',
            'security_answer2' => 'required|max:255',
            'security_question3_Id' => 'required|different:security_question1_Id',
            'security_answer3' => 'required|max:255',
        ],$messages);
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
<<<<<<< HEAD

        if ($data['departmentName']=='other')
        {
            $dept_name=$data['newDepartmentName'];
            if($dept_name!=""){
                $department = new department();
                $department['department_name'] = $dept_name;
                $department['created_by'] = 1;
                $department['updated_by'] = 1;
                $department->save();}
        }
        else{
            $dept_name=$data['departmentName'];
        }

        if($dept_name!=""){
            $depid = department::where('department_name',$dept_name)->value('department_id');}
        $user = new User();
        $user['firstname'] = $data['firstname'];
        $user['lastname'] = $data['lastname'];
        $user['email'] = strtolower($data['email']);
        $user['password'] = bcrypt($data['password']);
        $user['contactno'] = $data['contactno'];
        $user['role'] = $data['role'];
        if($dept_name!=""){
            $user['department_id'] = $depid;}
        $user->save();
        $userid = User::where('email',strtolower($data['email']))->value('id');
        $security_question_users = new security_question_users();
        $security_question_users['security_question_id'] = $data['security_question1_Id'];
        $security_question_users['user_id'] = $userid;
        $security_question_users['security_question_answer'] = strtolower($data['security_answer1']);
        $security_question_users->save();
        $security_question_users = new security_question_users();
        $security_question_users['security_question_id'] = $data['security_question2_Id'];
        $security_question_users['user_id'] = $userid;
        $security_question_users['security_question_answer'] = strtolower($data['security_answer2']);
        $security_question_users->save();
        $security_question_users = new security_question_users();
        $security_question_users['security_question_id'] = $data['security_question3_Id'];
        $security_question_users['user_id'] = $userid;
        $security_question_users['security_question_answer'] = strtolower($data['security_answer3']);
        $security_question_users->save();
        return $user;
=======
            return User::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => strtolower($data['email']),
                'password' => bcrypt($data['password']),
                'contactno' => $data['contactno'],
                'role' => $data['role'],
                'departmentName' =>$data['departmentName'],
                'security_question1_Id' => $data['security_question1_Id'],
                'security_answer1' => strtolower($data['security_answer1']),
                'security_question2_Id' => $data['security_question2_Id'],
                'security_answer2' => strtolower($data['security_answer2']),
                'security_question3_Id' => $data['security_question3_Id'],
                'security_answer3' => strtolower($data['security_answer3']),
            ]);
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
        
    }

    //Overriding register form method to fetch security questions and load dropdowns
    public function showregistrationform()
    {
<<<<<<< HEAD
        $securityquestions = DB::table('security_question')->select('security_question_id','security_question')->get();
        $departments = DB::table('department')->get();
        return view('auth.register', ['securityquestions' => $securityquestions],['departments' => $departments]);
=======
        $securityquestions = DB::table('security')->select('id','security_question')->get();
        return view('auth.register', ['securityquestions' => $securityquestions]);
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
    }
}
