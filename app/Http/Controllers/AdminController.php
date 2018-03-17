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
        $Error = '';
        $ErrorPresent='';
        $mailpre='';
        $mailsaved='';
        return view('admin/addStudentEmails', compact('Error','counter','ErrorPresent','mailpre','mailsaved'));
    }
    public function postStudentEmails(Request $request)
    {
        try {
            $counter = count($request['email']);
            $mailsaved= array();
            $mailpre= array();
            $ErrorPresent='';
            $Error='';
            //Removing Duplicates
            $request['email'] = array_unique($request['email']);
            for ($i = 0; $i < $counter ; ++$i)
            {
                $studentEmails = EmailidRole::where('email',$request['email'][$i])->where('role',"Student")->pluck('email');
                $registered_emails = User::where('email',$request['email'][$i])->pluck('email');
                if($studentEmails->count()==1||$registered_emails->count()==1)
                {
                    $ErrorPresent = 'Email Present';
                    array_push($mailpre, ['emailpresent' => $request['email'][$i]]);
                }
                else
                {
                    $EmailIdRole = new EmailidRole;
                    $EmailIdRole['email'] = strtolower($request['email'][$i]);
                    $EmailIdRole['role'] = 'Student';
                    $EmailIdRole->save();
                    $Error = 'No';
                    array_push($mailsaved, ['emailsaved' => $request['email'][$i]]);



                }

            }
            //echo $mailsaved;
            //print_r($mailsaved);
            return view('admin/addStudentEmails',compact('Error','counter','ErrorPresent','mailpre','mailsaved'));
        }
        catch (\Exception $e)
        {
            //Checking if its UNIQUE constraint violation. This is one of the worst code I have ever written
            // in my life
            if(in_array('23505',$e->errorInfo)) {
                $ErrorPresent = 'Instructor Present';
                return view('admin/addStudentEmails',compact('Error','counter','ErrorPresent','mailpre','mailsaved'));
            }
            return view ('errors/503');
        }
    }

    public function getInstructorEmails()
    {
        $counter = 1;
        $Error = '';
        $ErrorPresent='';
        $mailpre='';
        $mailsaved='';
        return view('admin/addInstructorEmails', compact('Error','counter','ErrorPresent','mailpre','mailsaved'));
    }
    public function postInstructorEmails(Request $request)
    {
        try {
            $counter = count($request['email']);
            $mailsaved= array();
            $mailpre= array();
            $ErrorPresent='';
            $Error='';
            //Removing Duplicates
            $request['email'] = array_unique($request['email']);
            for ($i = 0; $i < $counter; $i++)
            {
                $instructorEmails = EmailidRole::where('email',$request['email'][$i])->where('role',"Instructor")->pluck('email');
                $registered_emails = User::where('email',$request['email'][$i])->pluck('email');
                if($instructorEmails->count()==1||$registered_emails->count()==1)
                {
                    $ErrorPresent = 'Email Present';
                    array_push($mailpre, ['emailpresent' => $request['email'][$i]]);
                }
                else {
                    $EmailIdRole = new EmailidRole;
                    $EmailIdRole['email'] = strtolower($request['email'][$i]);
                    $EmailIdRole['role'] = 'Instructor';
                    $EmailIdRole->save();
                    $Error = 'No';
                    array_push($mailsaved, ['emailsaved' => $request['email'][$i]]);
                }
            }

            return view('admin/addInstructorEmails',compact('Error','counter','ErrorPresent','mailpre','mailsaved'));
        }
        catch (\Exception $e)
        {
            //Checking if its UNIQUE constraint violation. This is one of the worst code I have ever written
            // in my life
            if(in_array('23505',$e->errorInfo)) {
                $ErrorPresent = 'Student Present';
                return view('admin/addInstructorEmails',compact('Error','counter','ErrorPresent','mailpre','mailsaved'));
            }
            return view ('errors/503');
        }
    }

    public function getAudios(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            Log::info("here iam");
            Log::info($request['search']);
            $counter = 1;
            session()->put('counter', 1);
            $Error = '';
            $error='';
            $search = $request['search'];
            $audios = audio_lookup_value::where('audio_lookup_value_tag', 'ilike', '%'.$search.'%')
                ->orderBy('audio_lookup_value_tag')
                ->paginate(10);
            $exists=audio_lookup_value::where('archived','true')->pluck('audio_lookup_value_id');
            $count_exists = $exists->count();
            $exists_tag=audio_lookup_value::where('archived','true')->pluck('audio_lookup_value_tag');
            $exists_link=audio_lookup_value::where('archived','true')->pluck('audio_lookup_value_link');
            $changed=audio_lookup_value::where('updated_by',1)->pluck('audio_lookup_value_id');
            $count_added = $changed->count();
            $added_tag=audio_lookup_value::where('updated_by',1)->pluck('audio_lookup_value_tag');
            $added_link=audio_lookup_value::where('updated_by',1)->pluck('audio_lookup_value_link');
            if(($exists->count())>0)
            {
                $Error='Exists';
                for($i=0; $i<($exists->count()); $i++)
                {
                    audio_lookup_value::where('audio_lookup_value_id',$exists[$i])->update(['archived' => 'false']);
                }
            }
            if(($changed->count()))
            {
                $error='Does not Exist';
                for($i=0; $i<($changed->count()); $i++)
                {
                    audio_lookup_value::where('audio_lookup_value_id',$changed[$i])->update(['updated_by' => null]);
                }
            }
            return view('admin/addAudios',compact('error','counter','count_exists','Error','exists_tag','count_added','added_tag','audios','exists_link','added_link'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function postAudios(Request $request)
    {
        $counter = count($request['link']);
        for ($i = 0; $i < $counter; $i++) {
            $exist_tag = audio_lookup_value::where('audio_lookup_value_tag', $request['tag'][$i])->pluck('audio_lookup_value_tag');
            $exist_link = audio_lookup_value::where('audio_lookup_value_link', $request['link'][$i])->pluck('audio_lookup_value_link');
            if (($exist_tag->count()) > 0) {
                DB::table('audio_lookup_value')->where('audio_lookup_value_tag', $request['tag'][$i])->update(['archived' => 'true']);
            } elseif (($exist_link->count()) > 0) {
                DB::table('audio_lookup_value')->where('audio_lookup_value_link', $request['link'][$i])->update(['archived' => 'true']);
            } else {
                if($request['tag'][$i]!=null && $request['link'][$i]!=null) {
                    $audio_lookup_value = new audio_lookup_value;
                    $audio_lookup_value['audio_lookup_value_tag'] = $request['tag'][$i];
                    $audio_lookup_value['audio_lookup_value_link'] = $request['link'][$i];
                    $audio_lookup_value['archived'] = false;
                    $audio_lookup_value['created_by'] = 1;
                    $audio_lookup_value['updated_by'] = 1;
                    $audio_lookup_value->save();
                }
            }
        }
        return redirect()->route('AddAudio');
    }
    public function addAudios(Request $request)
    {
        $counter = session()->get('counter');
        $counter = $counter + 1;
        session()->put('counter', $counter);
        $error = '';
        $Error = '';
        $search = $request['search'];
        $audios = audio_lookup_value::where('audio_lookup_value_tag', 'ilike', '%'.$search.'%')
            ->orderBy('audio_lookup_value_tag')
            ->paginate(10);
        return view('admin/addAudios',compact('error','counter','Error','audios'));
    }
    public function removeAudios(Request $request)
    {
        $counter = session()->get('counter');
        $counter = $counter - 1;
        session()->put('counter', $counter);
        $error = '';
        $Error = '';
        $search = $request['search'];
        $audios = audio_lookup_value::where('audio_lookup_value_tag', 'ilike', '%'.$search.'%')
            ->orderBy('audio_lookup_value_tag')
            ->paginate(10);
        return view('admin/addAudios',compact('error','counter','Error','audios'));
    }
    public function getVideos(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            $counter = 1;
            $error = '';
            session()->put('counter', 1);
            $Error = '';
            $search = $request['search'];
            $videos = video_lookup_value::where('video_lookup_value_tag', 'ilike', '%'.$search.'%')
                ->orderBy('video_lookup_value_tag')
                ->paginate(10);
            $exists=video_lookup_value::where('archived','true')->pluck('video_lookup_value_id');
            $count_exists = $exists->count();
            $exists_tag=video_lookup_value::where('archived','true')->pluck('video_lookup_value_tag');
            $exists_link=video_lookup_value::where('archived','true')->pluck('video_lookup_value_link');
            $changed=video_lookup_value::where('updated_by',1)->pluck('video_lookup_value_id');
            $count_added = $changed->count();
            $added_tag=video_lookup_value::where('updated_by',1)->pluck('video_lookup_value_tag');
            $added_link=video_lookup_value::where('updated_by',1)->pluck('video_lookup_value_link');
            if(($exists->count())>0)
            {
                $Error='Exists';
                for($i=0; $i<($exists->count()); $i++)
                {
                    DB::table('video_lookup_value')->where('video_lookup_value_id',$exists[$i])->update(['archived' => 'false']);
                }
            }
            if(($changed->count()))
            {
                $error='Does not Exist';
                for($i=0; $i<($changed->count()); $i++)
                {
                    video_lookup_value::where('video_lookup_value_id',$changed[$i])->update(['updated_by' => null]);
                }
            }
            return view('admin/addVideos',compact('error','counter','Error','count_exists','exists_tag','count_added','added_tag','videos','exists_link','added_link'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function postVideos(Request $request)
    {
        $counter = count($request['link']);
        for ($i = 0; $i < $counter; $i++) {
            $exist_tag = video_lookup_value::where('video_lookup_value_tag', $request['tag'][$i])->pluck('video_lookup_value_tag');
            $exist_link = video_lookup_value::where('video_lookup_value_link', $request['link'][$i])->pluck('video_lookup_value_link');
            if (($exist_tag->count()) > 0) {
                DB::table('video_lookup_value')->where('video_lookup_value_tag', $request['tag'][$i])->update(['archived' => 'true']);
            } elseif (($exist_link->count()) > 0) {
                DB::table('video_lookup_value')->where('video_lookup_value_link', $request['link'][$i])->update(['archived' => 'true']);
            } else {
                if($request['tag'][$i]!=null && $request['link'][$i]!=null) {
                    $video_lookup_value = new video_lookup_value;
                    $video_lookup_value['video_lookup_value_tag'] = $request['tag'][$i];
                    $video_lookup_value['video_lookup_value_link'] = $request['link'][$i];
                    $video_lookup_value['archived'] = false;
                    $video_lookup_value['created_by'] = 1;
                    $video_lookup_value['updated_by'] = 1;
                    $video_lookup_value->save();
                }
            }
        }
        return redirect()->route('AddVideo');
    }
    public function addVideos(Request $request)
    {
        $counter = session()->get('counter');
        $counter = $counter + 1;
        session()->put('counter', $counter);
        $error = '';
        $Error = '';
        $search = $request['search'];
        $videos = video_lookup_value::where('video_lookup_value_tag', 'ilike', '%'.$search.'%')
            ->orderBy('video_lookup_value_tag')
            ->paginate(10);
        return view('admin/addVideos',compact('error','counter','Error','videos'));
    }
    public function removeVideos(Request $request)
    {
        $counter = session()->get('counter');
        $counter = $counter - 1;
        session()->put('counter', $counter);
        $error = '';
        $Error = '';
        $search = $request['search'];
        $videos = video_lookup_value::where('video_lookup_value_tag', 'ilike', '%'.$search.'%')
            ->orderBy('video_lookup_value_tag')
            ->paginate(10);
        return view('admin/addVideos',compact('error','counter','Error','videos'));
    }
    public function getImages(Request $request)
    {
        $role='';
        if(Auth::check()) {
            $role = Auth::user()->role;
        }
        if($role == 'Admin') {
            $counter = 1;
            session()->put('counter', 1);
            $Error = '';
            $error='';
            $search = $request['search'];
            $images = image_lookup_value::where('image_lookup_value_tag', 'ilike', '%'.$search.'%')
                ->orderBy('image_lookup_value_tag')
                ->paginate(10);
            $exists=image_lookup_value::where('archived','true')->pluck('image_lookup_value_id');
            $count_exists = $exists->count();
            $exists_tag=image_lookup_value::where('archived','true')->pluck('image_lookup_value_tag');
            $exists_link=image_lookup_value::where('archived','true')->pluck('image_lookup_value_link');
            $changed=image_lookup_value::where('updated_by',1)->pluck('image_lookup_value_id');
            $count_added = $changed->count();
            $added_tag=image_lookup_value::where('updated_by',1)->pluck('image_lookup_value_tag');
            $added_link=image_lookup_value::where('updated_by',1)->pluck('image_lookup_value_link');
            if(($exists->count())>0)
            {
                $Error='Exists';
                for($i=0; $i<($exists->count()); $i++)
                {
                    DB::table('image_lookup_value')->where('image_lookup_value_id',$exists[$i])->update(['archived' => 'false']);
                }
            }
            if(($changed->count()))
            {
                $error='Does not Exist';
                for($i=0; $i<($changed->count()); $i++)
                {
                    image_lookup_value::where('image_lookup_value_id',$changed[$i])->update(['updated_by' => null]);
                }
            }
            return view('admin/addImages',compact('error','counter','Error','count_exists','exists_tag','count_added','added_tag','images','exists_link','added_link'));
        }
        else
        {
            return view('auth/not_authorized');
        }
    }
    public function postImages(Request $request)
    {
        $counter = count($request['link']);
        for ($i = 0; $i < $counter; $i++) {
            $exist_tag = image_lookup_value::where('image_lookup_value_tag', $request['tag'][$i])->pluck('image_lookup_value_tag');
            $exist_link = image_lookup_value::where('image_lookup_value_link', $request['link'][$i])->pluck('image_lookup_value_link');
            if (($exist_tag->count()) > 0) {
                DB::table('image_lookup_value')->where('image_lookup_value_tag', $request['tag'][$i])->update(['archived' => 'true']);
            } elseif (($exist_link->count()) > 0) {
                DB::table('image_lookup_value')->where('image_lookup_value_link', $request['link'][$i])->update(['archived' => 'true']);
            } else {
                if($request['tag'][$i]!=null && $request['link'][$i]!=null) {
                    $image_lookup_value = new image_lookup_value;
                    $image_lookup_value['image_lookup_value_tag'] = $request['tag'][$i];
                    $image_lookup_value['image_lookup_value_link'] = $request['link'][$i];
                    $image_lookup_value['archived'] = false;
                    $image_lookup_value['created_by'] = 1;
                    $image_lookup_value['updated_by'] = 1;
                    $image_lookup_value->save();
                }
            }
        }
        return redirect()->route('AddImage');
    }
    public function addImages(Request $request)
    {
        $counter = session()->get('counter');
        $counter = $counter + 1;
        session()->put('counter', $counter);
        $error = '';
        $Error = '';
        $search = $request['search'];
        $images = image_lookup_value::where('image_lookup_value_tag', 'ilike', '%'.$search.'%')
            ->orderBy('image_lookup_value_tag')
            ->paginate(10);
        return view('admin/addImages',compact('error','counter','Error','images'));
    }
    public function removeImages(Request $request)
    {
        $counter = session()->get('counter');
        $counter = $counter - 1;
        session()->put('counter', $counter);
        $error = '';
        $Error = '';
        $search = $request['search'];
        $images = image_lookup_value::where('image_lookup_value_tag', 'ilike', '%'.$search.'%')
            ->orderBy('image_lookup_value_tag')
            ->paginate(10);
        return view('admin/addImages',compact('error','counter','Error','images'));
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
        $navs = navigation::where('navigation_id','<>','35')->get();
        $mods = module::where('archived', false)->get();
        $navs_mods = module_navigation::where('visible', true)->where('navigation_id','<>','35')->get();
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
                    ['module_id' => $var, 'navigation_id' => $navid, 
                    'display_order' => $navid, 'visible' => true ]);
            }
            module_navigation::where('visible', true)->where('display_order','15')->where('module_id',$var)->update(['navigation_id' => '19']);
            module_navigation::where('visible', true)->where('display_order','16')->where('module_id',$var)->update(['navigation_id' => '15']);
            module_navigation::where('visible', true)->where('display_order','17')->where('module_id',$var)->update(['navigation_id' => '16']);
            module_navigation::where('visible', true)->where('display_order','18')->where('module_id',$var)->update(['navigation_id' => '17']);
            module_navigation::where('visible', true)->where('display_order','19')->where('module_id',$var)->update(['navigation_id' => '18']);
            module_navigation::where('visible', true)->where('display_order','26')->where('module_id',$var)->update(['navigation_id' => '30']);
            module_navigation::where('visible', true)->where('display_order','27')->where('module_id',$var)->update(['navigation_id' => '26']);
            module_navigation::where('visible', true)->where('display_order','28')->where('module_id',$var)->update(['navigation_id' => '27']);
            module_navigation::where('visible', true)->where('display_order','29')->where('module_id',$var)->update(['navigation_id' => '28']);
            module_navigation::where('visible', true)->where('display_order','30')->where('module_id',$var)->update(['navigation_id' => '29']);


            $navs = navigation::where('navigation_id','<>','35')->get();
            $mods = module::where('archived', false)->get();
            $navs_mods = module_navigation::where('visible', true)->where('navigation_id','<>','35')->get();
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
        $navs_mods = module_navigation::where('visible', true)->where('navigation_id','<>','35')->get();
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
    public function delete_audio($id)
    {
        $audio = audio_lookup_value::find($id);
        $audio->delete();
        return redirect()->back();
    }
    public function delete_video($id)
    {
        $video = video_lookup_value::find($id);
        $video->delete();
        return redirect()->back();
    }
    public function delete_image($id)
    {
        $image = image_lookup_value::find($id);
        $image->delete();
        return redirect()->back();
    }

    public function audio_refresh()
    {
        $audios = audio_lookup_value::where('created_by',1)
            ->orderBy('audio_lookup_value_tag')
            ->paginate(10);
        return view("admin/audio_table",compact('audios'));
    }

    public function video_refresh()
    {
        $videos = video_lookup_value::where('created_by',1)
            ->orderBy('video_lookup_value_tag')
            ->paginate(10);
        return view("admin/video_table",compact('videos'));
    }

    public function image_refresh()
    {
        $images = image_lookup_value::where('created_by',1)
            ->orderBy('image_lookup_value_tag')
            ->paginate(10);
        return view("admin/image_table",compact('images'));
    }

}