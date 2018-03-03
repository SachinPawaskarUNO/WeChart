<?php
namespace App\Http\Controllers;
use App\audio_lookup_value;
use App\image_lookup_value;
use App\User;
use App\video_lookup_value;
use Illuminate\Http\Request;
use App\EmailidRole;
use App\navigation;
use App\module;
use App\module_navigation;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Only Admin can access Admin Dashboard
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            //Fetching all students and instructors for display on admin landing page
            $students = User::where('role','Student')
                ->where('archived','=','0')
                ->get();
            $instructors = User::where('role','Instructor')
                ->where('archived','=','0')
                ->get();
            return view('admin/home', compact('students','instructors'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function getStudentEmails()
    {
        $counter = 1;
        session()->put('counter', 1);
        $Error = '';
        return view('admin/addStudentEmails', compact('Error','counter'));
    }
    public function postStudentEmails(Request $request)
    {
        try {
            $counter = session()->get('counter');
            //Removing Duplicates
            $request['email'] = array_unique($request['email']);
            for ($i = 0; $i < count($request['email']) ; ++$i)
            {
                $EmailIdRole = new EmailidRole;
                $EmailIdRole['email'] = strtolower($request['email'][$i]);
                $EmailIdRole['role'] = 'Student';
                $EmailIdRole->save();
            }
            $Error = 'No';
            return view('admin/addStudentEmails',compact('Error','counter'));
        }
        catch (\Exception $e)
        {
            //Checking if its UNIQUE constraint violation. This is one of the worst code I have ever written
            // in my life
            if(in_array('23505',$e->errorInfo)) {
                $Error = 'Email Present';
                return view('admin/addStudentEmails',compact('Error','counter'));
            }
            return view ('errors/503');
        }
    }
    public function addStudentEmails()
    {
        $counter = session()->get('counter');
        $counter = $counter + 1;
        session()->put('counter', $counter);
        $Error = '';
        return view('admin/addStudentEmails',compact('Error','counter'));
    }
    public function removeStudentEmails()
    {
        $counter = session()->get('counter');
        $counter = $counter - 1;
        session()->put('counter', $counter);
        $Error = '';
        return view('admin/addStudentEmails',compact('Error','counter'));
    }
    public function getInstructorEmails()
    {
        $counter = 1;
        session()->put('counter', 1);
        $Error = '';
        return view('admin/addInstructorEmails', compact('Error','counter'));
    }
    public function postInstructorEmails(Request $request)
    {
        try {
            $counter = session()->get('counter');
            //Removing Duplicates
            $request['email'] = array_unique($request['email']);
            for ($i = 0; $i < $counter; $i++)
            {
                $EmailIdRole = new EmailidRole;
                $EmailIdRole['email'] = strtolower($request['email'][$i]);
                $EmailIdRole['role'] = 'Instructor';
                $EmailIdRole->save();
            }
            $counter = session()->get('counter');
            $Error = 'No';
            return view('admin/addInstructorEmails',compact('Error','counter'));
        }
        catch (\Exception $e)
        {
            //Checking if its UNIQUE constraint violation. This is one of the worst code I have ever written
            // in my life
            if(in_array('23505',$e->errorInfo)) {
                $Error = 'Email Present';
                return view('admin/addInstructorEmails',compact('Error','counter'));
            }
            return view ('errors/503');
        }
    }
    public function getAudios()
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            $exists=audio_lookup_value::where('archived','true')->pluck('audio_lookup_value_id');
            if(($exists->count())>0)
            {
                $error='Exists';
                DB::table('audio_lookup_value')->where('audio_lookup_value_id',$exists)->update(['archived' => 'false']);

            }
            else{
                $error='Does not Exist';
            }
            return view('admin/addAudios',compact('error'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function postAudios(Request $request)
    {
        $exist_tag=audio_lookup_value::where('audio_lookup_value_tag',$request['tag'])->pluck('audio_lookup_value_tag');
        $exist_link=audio_lookup_value::where('audio_lookup_value_link',$request['link'])->pluck('audio_lookup_value_link');
        if(($exist_tag->count())>0) {
            DB::table('audio_lookup_value')->where('audio_lookup_value_tag',$request['tag'])->update(['archived' => 'true']);
        }
        elseif(($exist_link->count())>0) {
            DB::table('audio_lookup_value')->where('audio_lookup_value_link',$request['link'])->update(['archived' => 'true']);
        }else {
            $audio_lookup_value = new audio_lookup_value;
            $audio_lookup_value['audio_lookup_value_tag'] = $request['tag'];
            $audio_lookup_value['audio_lookup_value_link'] = $request['link'];
            $audio_lookup_value['archived'] = false;
            $audio_lookup_value['created_by'] = 1;
            $audio_lookup_value->save();
        }
        return redirect()->route('AddAudio');
    }
    
    public function getVideos()
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            $exists=video_lookup_value::where('archived','true')->pluck('video_lookup_value_id');
            if(($exists->count())>0)
            {
                $error='Exists';
                DB::table('video_lookup_value')->where('video_lookup_value_id',$exists)->update(['archived' => 'false']);

            }
            else{
                $error='Does not Exist';
            }
            return view('admin/addVideos',compact('error'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function postVideos(Request $request)
    {
        $exist_tag=video_lookup_value::where('video_lookup_value_tag',$request['tag'])->pluck('video_lookup_value_tag');
        $exist_link=video_lookup_value::where('video_lookup_value_link',$request['link'])->pluck('video_lookup_value_link');
        if(($exist_tag->count())>0) {
            DB::table('video_lookup_value')->where('video_lookup_value_tag',$request['tag'])->update(['archived' => 'true']);
        }
        elseif(($exist_link->count())>0) {
            DB::table('video_lookup_value')->where('video_lookup_value_link',$request['link'])->update(['archived' => 'true']);
        }else {
            $video_lookup_value = new video_lookup_value;
            $video_lookup_value['video_lookup_value_tag'] = $request['tag'];
            $video_lookup_value['video_lookup_value_link'] = $request['link'];
            $video_lookup_value['archived'] = false;
            $video_lookup_value['created_by'] = 1;
            $video_lookup_value->save();
        }
        return redirect()->route('AddVideo');
    }
    public function getImages()
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            $exists=image_lookup_value::where('archived','true')->pluck('image_lookup_value_id');
            if(($exists->count())>0)
            {
                $error='Exists';
                DB::table('image_lookup_value')->where('image_lookup_value_id',$exists)->update(['archived' => 'false']);

            }
            else{
                $error='Does not Exist';
            }
            return view('admin/addImages',compact('error'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function postImages(Request $request)
    {
        $exist_tag=image_lookup_value::where('image_lookup_value_tag',$request['tag'])->pluck('image_lookup_value_tag');
        $exist_link=image_lookup_value::where('image_lookup_value_link',$request['link'])->pluck('image_lookup_value_link');
        if(($exist_tag->count())>0) {
            DB::table('image_lookup_value')->where('image_lookup_value_tag',$request['tag'])->update(['archived' => 'true']);
        }
        elseif(($exist_link->count())>0) {
            DB::table('image_lookup_value')->where('image_lookup_value_link',$request['link'])->update(['archived' => 'true']);
        }else {
            $image_lookup_value = new image_lookup_value;
            $image_lookup_value['image_lookup_value_tag'] = $request['tag'];
            $image_lookup_value['image_lookup_value_link'] = $request['link'];
            $image_lookup_value['archived'] = false;
            $image_lookup_value['created_by'] = 1;
            $image_lookup_value->save();
        }
        return redirect()->route('AddImage');
    }
    public function addInstructorEmails()
    {
        $counter = session()->get('counter');
        $counter = $counter + 1;
        session()->put('counter', $counter);
        $Error = '';
        return view('admin/addInstructorEmails',compact('Error','counter'));
    }
    public function removeInstructorEmails()
    {
        $counter = session()->get('counter');
        $counter = $counter - 1;
        session()->put('counter', $counter);
        $Error = '';
        return view('admin/addInstructorEmails',compact('Error','counter'));
    }
    public function get_remove_emails()
    {
        $studentEmails = EmailidRole::where('role','Student')->pluck('email');
        $studentEmails = str_replace(['['], '', $studentEmails);
        $studentEmails = str_replace(['"'], '', $studentEmails);
        $studentEmails = str_replace(['"'], '', $studentEmails);
        $studentEmails = str_replace([']'], '', $studentEmails);
        $studentEmails = explode(",", $studentEmails);
        $registered_student_emails = User::where('role','Student')->pluck('email');
        $registered_student_emails = str_replace(['['], '', $registered_student_emails);
        $registered_student_emails = str_replace(['"'], '', $registered_student_emails);
        $registered_student_emails = str_replace(['"'], '', $registered_student_emails);
        $registered_student_emails = str_replace([']'], '', $registered_student_emails);
        $registered_student_emails = explode(",", $registered_student_emails);
        $studentEmails = array_diff($studentEmails,$registered_student_emails);
        $studentDetails = array();
        foreach($studentEmails as $studentEmail)
        {
            $studentDetail = EmailidRole::where('email',$studentEmail)->get();
            array_push($studentDetails,$studentDetail);
        }
        $instructorEmails = EmailidRole::where('role','Instructor')->pluck('email');
        $instructorEmails = str_replace(['['], '', $instructorEmails);
        $instructorEmails = str_replace(['"'], '', $instructorEmails);
        $instructorEmails = str_replace(['"'], '', $instructorEmails);
        $instructorEmails = str_replace([']'], '', $instructorEmails);
        $instructorEmails = explode(",", $instructorEmails);
        $registered_instructor_emails = User::where('role','Instructor')->pluck('email');
        $registered_instructor_emails = str_replace(['['], '', $registered_instructor_emails);
        $registered_instructor_emails = str_replace(['"'], '', $registered_instructor_emails);
        $registered_instructor_emails = str_replace(['"'], '', $registered_instructor_emails);
        $registered_instructor_emails = str_replace([']'], '', $registered_instructor_emails);
        $registered_instructor_emails = explode(",", $registered_instructor_emails);
        $instructorEmails = array_diff($instructorEmails,$registered_instructor_emails);
        $instructorDetails = array();
        foreach($instructorEmails as $instructorEmail)
        {
            $instructorDetail = EmailidRole::where('email',$instructorEmail)->get();
            array_push($instructorDetails,$instructorDetail);
        }
        return view('admin/remove_emails', compact('studentDetails','instructorDetails'));
    }
    public function getConfigureModules()
    {
        $navs = navigation::all();
        $mods = module::where('archived', false)->get();
        $navs_mods = module_navigation::where('visible', true)->get();
        return view('admin/configureModules', compact ('navs', 'mods', 'navs_mods'));
    }


    public function submitmodule(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            $messages = ['required' => 'Module name is mandatory.'];
            //Validating input data
            $this->validate($request, [
                'modulename' => 'required',
            ], $messages);
            $module = new module;
            $module->module_name = $request->input('modulename');
            $module->archived = false;
            $module->save();
            $var = $module->module_id;
            $navs = $request->input('navs');
            //if any child selected, parent shoul get auto selected.
            for ($i = 3; $i < 7; $i++) {
                if (in_array("$i", $navs)) {
                    array_push($navs, '2');
                    break;
                }
            }
            for ($i = 10; $i < 20; $i++) {
                if (in_array("$i", $navs)) {
                    array_push($navs, '9');
                    break;
                }
            }
            for ($i = 21; $i < 31; $i++) {
                if (in_array("$i", $navs)) {
                    array_push($navs, '20');
                    break;
                }
            }
            $navs = array_unique($navs);
            foreach ($navs as $navid) {
                DB::table('modules_navigations')->insert(
                    ['module_id' => $var, 'navigation_id' => $navid, 'visible' => true]);
            }
            $navs = navigation::all();
            $mods = module::where('archived', false)->get();
            $navs_mods = module_navigation::where('visible', true)->get();
            return view('admin/configureModules', compact('navs', 'mods', 'navs_mods'));
        }
        else
        {
            $error_message= "You are not authorized to view this page.";
            return view('errors/error',compact('error_message'));
        }
    }
    public function deletemodule($modid)
    {
        module::where('module_id',$modid)->update(['archived' => true]);
        $navs = navigation::all();
        $mods = module::where('archived', false)->get();
        $navs_mods = module_navigation::where('visible', true)->get();
        return view('admin/configureModules', compact ('navs', 'mods', 'navs_mods'));
    }
    public function delete_email($id)
    {
        $email = EmailidRole::find($id);
        $email->delete();
        return redirect('RemoveEmails')->with('success','Email has been deleted');
    }
    public function archive_user($id)
    {
        User::where('id',$id)
            ->update(['archived'=> 1]);
        $email = User::where('id',$id)->pluck('email');
        return redirect('/home')->with('success','Email has been  deleted');
    }
/*    public function getaudios()
    {
        $counter = 1;
        session()->put('counter', 1);
        return view('admin/audiovideoimages', compact('counter'));
    }*/


}