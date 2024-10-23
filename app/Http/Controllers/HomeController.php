<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Request as NewRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\User;
Use Mail;
Use Response;
Use App\Http\Controllers\mailsController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
Use Cache;
use App;
use Session;

class HomeController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->setLocale();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

//user status
    // 1 - active
    // 2 -unpaidfees
    // 3 - passwordexpired

    public function setlocale(){

        $locale = Session::get('userlang');
        App::setLocale($locale);
        // dd($locale);
    }



    public function index(){

      $this->setLocale();
  
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->roleid;
        $status = Auth::user()->status;


        if($user_role == 1 AND $status == 1){

        $incomingchat = DB::table('chats')
        ->where('chattype',1)
        // ->where('recipientuid',Auth::user()->id)
        ->get();

        $assignments = DB::table('assignment')
        ->select(DB::raw('count(*) as assignments'))
        // ->where('enrolled_course',Auth::user()->course)
        // ->where('submitby','>',$to)
        ->get();

        $courses = DB::table('courses')->count();

      $totalpaid = DB::table('feestatement')->sum('amount');

        $students = DB::table('users')
        ->select(DB::raw('count(*) as students'))
        ->where('roleid',3)
        ->get();

        $user = User::All();
            return view('adminviews.dashboard',compact('incomingchat','user','assignments','students','totalpaid','courses'));
        }



        elseif ($user_role == 2 AND $status == 1) {
            $incomingchat = DB::table('chats')
        ->where('chattype',1)
        // ->where('recipientuid',Auth::user()->id)
        ->get();

          $assignments = DB::table('assignment')
        ->select(DB::raw('count(*) as assignments'))
        // ->where('enrolled_course',Auth::user()->course)
        // ->where('submitby','>',$to)
        ->get();

        $students = DB::table('users')
        ->select(DB::raw('count(*) as students'))
        ->where('roleid',3)
        ->get();

        $user = User::all();
            return view('users.lecdashboard',compact('incomingchat','user','assignments','students'));
        }

        elseif($user_role == 3 ){
                if($status == 1){
        $check = DB::table('students')->where('user_id',Auth::user()->id)->first();

        $exp = $check->courseend;
        $today = Carbon::now()->toDateTimeString();

        // if($today < $exp){

        $units = DB::table('course_units')
        ->where('course_id',Auth::user()->course)
        ->get();

         $to = Carbon::now()->toDateTimeString();

        $assignments = DB::table('assignment')
        ->select(DB::raw('count(*) as assignments'))
        ->where('enrolled_course',Auth::user()->course)
        // ->where('submitby','>',$to)
        ->get();

        $notes = DB::table('course_notes')
        ->select(DB::raw('count(*) as notes'))
        ->where('enrolled_course',Auth::user()->course)
        ->get();

        $articles = DB::table('articles')
        ->select(DB::raw('count(*) as articles'))
        ->get();

        $incomingchat = DB::table('chats')
        ->where('chattype',1)
        // ->where('recipientuid',Auth::user()->id)
        ->get();
        $members = DB::table('users')->where('course',Auth::user()->course)->where('roleid',3)->get();
        $memcount = DB::table('users')->where('course',Auth::user()->course)->where('roleid',3)->count();
  //dd($memcount);
        $schedules = DB::table('userschedules')->where('userid',Auth::user()->id)->get();

        $sub = DB::table('submittedassignments')
        ->select(DB::raw('count(*) as counter'))
        ->where('studentid',Auth::user()->id)->get();

        $chats = DB::table('groupchat')
        ->leftjoin('users','users.id','groupchat.sender')
        ->where('groupchat.course',Auth::user()->course)
        ->select('groupchat.*','users.name')
        ->get();

        $chatscount = DB::table('groupchat')->where('course',Auth::user()->course)->count();

        $cou = DB::table('courses')->where('id',Auth::user()->course)->first();
        $cur = $cou->currency;
        $exp = $cou->feespayable;
        $tot = DB::table('feestatement')->where('student',Auth::user()->id)->sum('amount');
        $feebal = DB::table('users')->where('id',Auth::user()->id)->sum('balance');


        if($tot){

             $bal = $exp - $tot;
         }

        else{

            $bal =  $exp;

        }

        if(!$cur){
            $cur = "KSH";
        }
        // dd($cou);
        // dd($sub);
        $user = User::all();

            return view('users.studentdashboard',compact('units','feebal','memcount','sub','assignments','notes','articles','user','incomingchat','cou','bal','cur','schedules','chats','chatscount','members'));
       
        //   }

        //   else{

        //     return view('expirerymessage');
        //   }

        }elseif ($status == 2) {
          return view('accountapproval');
        }else{

            return view('lockedout')->with('errors','Your account has been suspended. Kindly contact Online Resource center to enquire');
        }

    }

        else {

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->roleid;
        $status = Auth::user()->status;


        $incomingchat = DB::table('chats')
        ->where('chattype',1)
        // ->where('recipientuid',Auth::user()->id)
        ->get();

        $assignments = DB::table('assignment')
        ->select(DB::raw('count(*) as assignments'))
        // ->where('enrolled_course',Auth::user()->course)
        // ->where('submitby','>',$to)
        ->get();

        $courses = DB::table('courses')->count();

        $totalpaid = DB::table('feestatement')->sum('amount');
        $balance = DB::table('users')->where('roleid',3)->sum('balance');
        $arr = DB::table('users')->where('roleid',3)->where('balance','>','0.00')->count();

        $students = DB::table('users')
        ->select(DB::raw('count(*) as students'))
        ->where('roleid',3)
        ->get();

        $user = User::All();
            return view('adminviews.accountsdashboard',compact('incomingchat','user','assignments','students','totalpaid','courses','balance','arr'));

        }
     
  }

       public function deletenotes($id){
            
            DB::table('course_notes')->where('id',$id)->delete();

            return redirect()->back()->with('success','You have successfully deleted one course module');
        }

        public function deleteass($id){
            DB::table('assignment')->where('id',$id)->delete();

            return redirect()->back()->with('success','You have successfully deleted one course Assignment');
        }

    public function unittopics(){
        $id = NewRequest::All();

        $topics = DB::table('unittopics')->where('unit_code',$id)->get();

        return $topics;
    }

    public function addfaculties(){
      $this->setLocale();
        $fac = DB::table('faculties')->get();
        $cam = DB::table('campuses')->get();

        return view('adminviews.addfaculties',compact('fac','cam'));

    }

    public function createfaculty(Request $request){

         $data = $request->all();
      
       DB::table('faculties')->insert(array(  
            'faculty_code' => $data['faculty_code'],
            'campus' => $data['campus'],
            'faculty_name' => $data['faculty_name'],
            'description' => $data['description']
        ));

        return redirect()->back();

    }

    public function editfaculty($id){
      $this->setLocale();
        $fac = DB::table('faculties')
        ->where('id',$id)
        ->first();
        $cam = DB::table('campuses')->get();

        return view('adminviews.editfaculties',compact('fac','cam'));
    }

    public function updatefaculty(Request $request,$id){
      $this->setLocale();
    $data = $request->all();
      
       DB::table('faculties')->where('id',$id)->update(array(  
            'faculty_code' => @$data['faculty_code'],
            // 'campus' => @$data['campus'],
            'faculty_name' => @$data['faculty_name'],
            'description' => @$data['description']
        ));

       return redirect()->back()->with('success','Faculty has been successfully Updated');

    }

    public function deletefaculty($id){
      $this->setLocale();
        DB::table('faculties')->where('id',$id)->delete();

        return redirect()->back()->with('success','Faculty has been deleted successfully');
    }

    public function availablecoursescert(){
      $this->setLocale();
         $cou = DB::table('lecturercourses')->where('lecturerid',Auth::user()->id)->get()->toArray();
         $couid = array_column($cou, 'courseid');
         $cl = $couid;

        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5 OR Auth::user()->roleid == 2){
         $courses =  DB::table('courses')
         ->leftjoin('faculties','courses.field_id','faculties.id')
         ->select('courses.*','faculties.faculty_name')
         ->where('courses.field_id',1)
         ->paginate();
        }

        // elseif(Auth::user()->roleid == 2){
        //     foreach($cl as $c)
        //     {

        // $course =  DB::table('courses')
        // ->where('id',$c)
        // ->paginate();

        //  $courses[] = $course;
        //     }
         //dd($courses);
     // }

        return view('adminviews.viewcourses',compact('courses'));
    }

        public function availablecoursesdip(){
          $this->setLocale();
         $cou = DB::table('lecturercourses')->where('lecturerid',Auth::user()->id)->get()->toArray();
         $couid = array_column($cou, 'courseid');
         $cl = $couid;

        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5 OR Auth::user()->roleid == 2){
         $courses =  DB::table('courses')
         ->leftjoin('faculties','courses.field_id','faculties.id')
         ->select('courses.*','faculties.faculty_name')
         ->where('courses.field_id',2)
         ->paginate();
        }

     //    elseif(Auth::user()->roleid == 2){
     //        foreach($cl as $c)
     //        {

     //    $course =  DB::table('courses')
     //    ->where('id',$c)
     //    ->paginate();

     //     $courses[] = $course;
     //        }
     //     //dd($courses);
     // }

        return view('adminviews.viewcourses',compact('courses'));
    }

        public function availablecoursespost(){
          $this->setLocale();
        $cou = DB::table('lecturercourses')->where('lecturerid',Auth::user()->id)->get()->toArray();
         $couid = array_column($cou, 'courseid');
         $cl = $couid;

        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5 OR Auth::user()->roleid == 2){
         $courses =  DB::table('courses')
         ->leftjoin('faculties','courses.field_id','faculties.id')
         ->select('courses.*','faculties.faculty_name')
         ->where('courses.field_id',3)
         ->paginate();
        }

     //    elseif(Auth::user()->roleid == 2){
     //        foreach($cl as $c)
     //        {

     //    $course =  DB::table('courses')
     //    ->where('id',$c)
     //    ->paginate();

     //     $courses[] = $course;
     //        }
     //     //dd($courses);
     // }

        return view('adminviews.viewcourses',compact('courses'));
    }

    public function editcourse($id){
      $this->setLocale();
        $course =  DB::table('courses')->where('id',$id)->first();
            // dd($course);
        return view('adminviews.editcourse',compact('course'));
    }
//pending for completion
    public function updatecourse(Request $request){
      $this->setLocale();
        $data = $request->all();

        $id = $data['id'];
        $modulefile =$request->file('coursebriefs');
        // dd($modulefile);
        $filename = $modulefile->getClientOriginalName();
        $modulefile->move('briefs',$filename);
        $project['coursebriefs']=$filename;

          DB::table('courses')->where('id',$id)->update(array(

            'course_name' => $data['course_name'],
            'campusid' => Auth::user()->campusid,
            'course_code' => $data['course_code'],
            'description' => $data['description'],
            'field_id'=> $data['field_id'],
            'currency' => $data['currency'],
            'course_brief' => @$filename,
            'feespayable' => $data['feespayable'],
            'status' =>$data['status']

           ));

        return redirect()->back()->with('Success','You have successfully updated the course');
    }

    public function deletecourse($id){

        DB::table('courses')->where('id',$id)->delete();

        return redirect()->back();
    }


    public function facultycourses($id){
        $this->setLocale();
         $courses =  DB::table('courses')
         ->where('field_id',$id)
         ->get();
         // dd($courses);

        return view('availablecourses',compact('courses'));
    }

    public function addcourse(){
      $this->setLocale();
      
        $courses =  DB::table('courses')->paginate();
        $campus = DB::table('campuses')->get();

        $fac = DB::table('faculties')->get();

        return view('adminviews.courses',compact('courses','fac','campus'));
    }

    public function createcourse(Request $request){
            $data = $request->all();

        $modulefile =$request->file('coursebriefs');
        // dd($modulefile);
        $filename = $modulefile->getClientOriginalName();
        $modulefile->move('briefs',$filename);
        $project['coursebriefs']=$filename;

            DB::table('courses')->insert(array(
            'course_name' => $data['course_name'],
            'campusid' => $data['campus'],
            'course_code' => $data['course_code'],
            'description' => $data['description'],
            'field_id'=> $data['field_id'],
            'currency' => $data['currency'],
            'feespayable' => $data['feespayable'],
            'course_brief' => @$filename,
            'status' =>$data['status']

           ));

            return redirect()->back();
    }

    public function coursesgrid(){
      $this->setLocale();

        $courses = DB::table('courses')
        ->where('id',Auth::user()->course)
        ->first();

        $units = DB::table('course_units')
        ->where('courseid',Auth::user()->course)
        ->get();

         $target = DB::table('courses')->get();
    
       

        return view('adminviews.coursesgrid',compact('courses','target'));
    }

    public function courseprofile($id){

      $this->setLocale();

        $courses = DB::table('courses')->where('id',$id)->first();
        $units = DB::table('course_units')->where('course_id',$id)->get();
        $students = DB::table('students')
        ->leftjoin('users','users.id','students.user_id')
        ->where('roleid',3)
        ->where('users.course',$id)
        ->get();
// dd($students);
        return view('adminviews.courseprofile',compact('courses','units','students'));

    }

    public function units(Request $request){

      $this->setLocale();

        $data = $request->all();

        DB::table('course_units')->insert(array(
            'course_id' => $data['course_id'],
            'unit_code' => $data['unit_code'],
            'unit_name' => $data['unit_name'],
            'description' => $data['description']
        ));

        return redirect()->back();
    }

    public function viewunits($id){

      $this->setLocale();

        $units = DB::table('course_units')
          ->leftjoin('assignment','assignment.enrolled_course','course_units.course_id')
        ->leftjoin('course_notes','course_notes.enrolled_course','course_units.course_id')
        ->leftjoin('unittopics','unittopics.unit_code','course_units.id')
        ->select('course_units.unit_code',DB::raw('count(course_notes.id) as totalnotes'),DB::raw('count(assignment.id) as totalass'),DB::raw('count(unittopics.id) as totaltopics'))
        ->groupby('course_units.unit_code')
        ->where('course_units.course_id',$id)->paginate();

        return view('adminviews.viewunits',compact('units'));
    }

    public function studentunits(){

      $this->setLocale();

        $units = DB::table('course_units')
        ->leftjoin('assignment','assignment.enrolled_course','course_units.course_id')
        ->leftjoin('course_notes','course_notes.enrolled_course','course_units.course_id')
        ->leftjoin('unittopics','unittopics.unit_code','course_units.id')
        ->select('course_units.unit_code','course_units.unit_name','course_units.id',DB::raw('count(course_notes.id) as totalnotes'),DB::raw('count(assignment.id) as totalass'),DB::raw('count(unittopics.id) as totaltopics'))
        ->groupby('course_units.unit_code','course_units.unit_name','course_units.id')
        ->where('course_units.course_id',Auth::user()->course)
        ->paginate();

        //dd($units);

        return view('adminviews.viewunits',compact('units'));
    }

    public function unitprofile($id){

        $this->setLocale();

         $units = DB::table('courses')->where('id',$id)->first();

        $topics = DB::table('unittopics')->where('unit_code',$id)->paginate();

        $coursenotes = DB::table('course_notes')->where('enrolled_course',$id)->get();

        $assignments = DB::table('assignment')->where('enrolled_course',$id)->get();

        $module = DB::table('modules')->where('unitid',$id)->paginate(4);
       

         return view('adminviews.unitprofile',compact('units','topics','coursenotes','assignments','module'));
    }

    public function deletemodule($id){

        DB::table('modules')->where('id',$id)->delete();

        return redirect()->back();
    }

    //student notes
    public function studentnotes(){
        $this->setLocale();

        $units = DB::table('course_units')
            ->where('course_id', Auth::user()->course)
            ->get();

        $coursedata = DB::table('courses')->where('id', Auth::user()->course)->first();

        $payable = Auth::user()->payable;
        $paid = Auth::user()->paid;

        $payment_percentage = ($paid / $payable) * 100;

        $coursenotes = DB::table('course_notes')->where('enrolled_course', Auth::user()->course)->get();

        $total_notes = count($coursenotes); 
        $threshold_per_note = 100 / $total_notes; 

        foreach ($coursenotes as $key => $note) {
            $unlock_threshold = ($key + 1) * $threshold_per_note;
            if ($payment_percentage >= $unlock_threshold) {
                $note->status = 'unlocked';
            } else {
                $note->status = 'locked';
            }
        }

        $today = Carbon::now()->toDateTimeString();

        return view('adminviews.studentnotes', compact('coursenotes', 'today', 'coursedata'));
    }



    public function notesnavigation(){
      $this->setLocale();
        $filter = NewRequest::All();

        $coursenotes = DB::table('course_notes')->where('enrolled_course',$filter['id'])->get();

        return $coursenotes;
    }

    //student assignments
        public function studentassignments(){
          $this->setLocale();
         $units = DB::table('course_units')
         ->where('course_id',Auth::user()->course)
         ->get();

         return view('adminviews.studentassignments',compact('units'));
    }


    public function assignmentsnavigation(){
      $this->setLocale();
        $filter = NewRequest::All();

        $assignments = DB::table('assignment')
        ->leftjoin('course_units','course_id','assignment.enrolled_course')
        ->select('assignment.*','course_units.unit_name')
        ->where('course_id',Auth::user()->course)
        ->where('enrolled_course',$filter['id'])->get();

        return $assignments;
  
    }
        
    public function viewassignments(Request $request){
        $this->setLocale();
    
        $unitfilter = $request->input('units');
        $today = Carbon::now()->toDateTimeString();
    
        // Get the user's total payable and paid amount
        $payable = Auth::user()->payable;
        $paid = Auth::user()->paid;
    
        // Calculate the payment percentage
        $payment_percentage = ($paid / $payable) * 100;
    
        // Get the course units
        $units = DB::table('course_units')->where('course_id', Auth::user()->course)->get();
    
        // Get the assignments
        $assignments = DB::table('assignment')
            ->select('assignment.*')
            ->where('enrolled_course', Auth::user()->course)
            ->paginate(12);
    
        // Add locked/unlocked status based on payment percentage
        foreach ($assignments as $key => $assignment) {
            // Unlock the assignment based on payment progress
            $unlockThreshold = ($key + 1) * (100 / count($assignments)); // Dynamically calculate thresholds for unlocking
            if ($payment_percentage >= $unlockThreshold) {
                $assignment->status = 'unlocked';
            } else {
                $assignment->status = 'locked';
            }
        }
        
        return view('adminviews.viewassignments', compact('assignments', 'today', 'units'));
    }
    

    //download status
    public function downloadstatus(Request $request,$id){
        $download = DB::table('submittedassignments')->where('id',$id)->update(array(
            'status' => 1
        ));

        return redirect()->back();
    }

    public function viewsubmissions(Request $request){
      $this->setLocale();
        $filterobj = DB::table('assignment')->get();
        $filtercourse = DB::table('courses')->get();
        $faculties = DB::table('faculties')->get();
        $lecarray = [1,2,3];

        $course = $request->input('course');
        $assi = $request->input('assignment');
        if (!$course AND !$assi){
        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5){
        $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        // ->where('users.campusid',Auth::user()->course)
        ->paginate(10);
        // dd($assignments);
    }


    elseif(Auth::user()->roleid == 2){

         $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        // ->wherein('users.campusid',$lecarray)
        ->paginate(10);
        // dd($assignments);
    }
    }

    elseif ($assi){
        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5){
        $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        ->where('submittedassignments.id',$assi)
        ->paginate(10);
    }

    elseif (Auth::user()->roleid == 2) {
        $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        ->where('submittedassignments.id',$assi)
        ->where('course',Auth::user()->course)
        // ->wherein('users.campusid',$lecarray)
        ->paginate(10);
    }
    }

     elseif ($course){
        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 5){
        $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        ->where('course',$course)
        ->paginate(10);
      }

      elseif(Auth::user()->roleid == 2){
        $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        ->where('course',$course)
        // ->wherein('users.campusid',$lecarray)
        ->paginate(10);
      }
    }

    elseif ($assi AND $course) {
        $assignments = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        ->where('course',$course)
        ->where('submittedassignments.id',$assi)
        ->paginate(10);
    }
        return view('adminviews.viewsubmissions',compact('assignments','filterobj','filtercourse','faculties'));
    
    }

    public function assdet($id){
        $assub = DB::table('submittedassignments')
        ->join('assignment','assignment.id','submittedassignments.assignmentid')
        ->leftjoin('users','users.id','submittedassignments.studentid')
        // ->leftjoin('course_units','course_id','users.course')     
        ->select('submittedassignments.*','assignment.submitby','users.name')
        ->where('submittedassignments.id',$id)
        ->first();
        return Response::json($assub);
    }

    public function submittedassignments(){
      $this->setLocale();

        $sub = DB::table('submittedassignments')->where('studentid',Auth::user()->id)->get();

        return view('adminviews.submittedass',compact('sub'));
    }

    public function submitassignments($id){
      $this->setLocale();
        $assignments = DB::table('assignment')
        ->where('id',$id)
        ->first();

        $checkifsubmitted = DB::table('submittedassignments')
        ->where('studentid',Auth::user()->id)
        ->where('assignmentid',$id)
        ->first();



        $othersubmissions = DB::table('submittedassignments')->where('studentid',Auth::user()->id)->get();
        // dd($othersubmissions);
        return view('adminviews.submitassignments',compact('assignments','othersubmissions','checkifsubmitted'));
    }

    public function createassignment(Request $request){
        $data = $request->all();

            $file=$request->file('assignment');

            $assname=$file->getClientOriginalName();
            $assname = Auth::user()->id.'_'.$assname;
            $file->move('assi',$assname);
            $project['assignment']=$assname;

        DB::table('submittedassignments')->insert(array(
            'studentid' => Auth::user()->id,
            'assignmentid' =>$data['assignmentid'],
            'submissionname' => $data['submisionname'],
            'status' => 0,
            'assfile' => $assname
        ));

        return redirect()->back()->with('message','Assignment Successfully Uploaded');

    }

    public function updatesubmission(Request $request){
        $data = $request->all();

        $id = $data['id'];

            $file=$request->file('assignment');
            $assname=$file->getClientOriginalName();
            $file->move('assi',$assname);
            $project['assignment']=$assname;

        DB::table('submittedassignments')
        ->where('studentid',Auth::user()->id)
        ->where('assignmentid',$id)
        ->update(array(
             'submissionname' => $data['submisionname'],
             'assfile' => $assname
        ));

        return redirect()->back()->with('success','Assignment Submission has been successfully modified');
    }

    public function grading(Request $request){
        $data = NewRequest::All();
        $id = $data['recordID'];

        // dd($id);
        $rfile =$request->file('revertfile');
        // dd($modulefile);
        $filename = $rfile->getClientOriginalName();
        $rfile->move('reverts',$filename);
        $project['modulefiles']=$filename;

        DB::table('submittedassignments')->where('id',$id)->update(array(
            'grade' => $data['grade'],
            'revertfile' => $filename
        ));

        return redirect()->back();
    }

    public function editgrade(Request $request){
        $data = NewRequest::All();
        // dd($data);
        $id = $data['recordID'];

        $rfile =$request->file('revertfile');
        // dd($modulefile);
        $filename = $rfile->getClientOriginalName();
        $filenames = "UPD".$filename;
        $rfile->move('reverts',$filenames);
        $project['modulefiles']=$filename;
        // dd($rfile);
         DB::table('submittedassignments')->where('id',$id)->update(array(
            'revertfile' => $filenames,
            'grade' => $data['grade']
           
        ));

        return redirect()->back()->with('success','Grade has been successfully modified');
    }

    public function createmodules(Request $request){
        $data = $request->all();

        $modulefile =$request->file('modulefiles');
        // dd($modulefile);
        $filename = $modulefile->getClientOriginalName();
        $modulefile->move('modules',$filename);
        $project['modulefiles']=$filename;

        DB::table('modules')->insert(array(
            'unitid' => $data['unitid'],
            'name' => $data['modulename'],
            'modulefile' => $filename,
            'details' => $data['details'],
            'downloadend' => $data['downloadend']
        ));

        return redirect()->back();
    }

    public function managenotes(Request $request){
      $this->setLocale();
        $course = $request->input('course');
        if(Auth::user()->role_id == 1){
        $notes = DB::table('course_notes')->get();
         }

        elseif(Auth::user()->role_id == 2 OR Auth::user()->role_id == 3){
        $notes = DB::table('course_notes')
        ->where('course',Auth::user()->course)
        ->get();
         }

         return view('notes');
    }





    // public function ccoursesubdiv(Request $request,$id){

    //     $data = $request->all();

    //    DB::table('courses_subdiv')->insert(array(
    //         'title' => $data['title'],
    //         'duration' => $data['duration'],
    //         'courseid' => $id,

    //    ));

    //    return redirect()->back();
    // }

    public function createtopics(Request $request,$id){

        $topics = $request->all();

        DB::table('unittopics')->insert(array(
         'topic_code' => $topics['topic_code'],
         'topic_name' => $topics['topic_name'],
         'description' => $topics['description'],
         'unit_code' => $id,


        ));

         return redirect()->back();

    }

    public function uploadnotes(Request $request,$id){
        $data = $request->all();

        $file=$request->file('notes');

        // if($request->hasFile('notes'))
        // {

        //     echo "yebo";
            
        // foreach ($file as $files) {
            $imageName=$file->getClientOriginalName();
            $file->move('coursenotes',$imageName);
            $project['notes']=$imageName;

          DB::table('course_notes')->insert(array(
            'enrolled_course' => $id,
            'topic_id' => $data['topic_id'],
            'notes' => $imageName

        ));

     //     }
     // }
        
        return redirect()->back();
  
    }

    public function uploadassignment(Request $request,$id){
        $data = $request->all();

        $file=$request->file('notes');

            $imageName=$file->getClientOriginalName();
            $file->move('assignments',$imageName);
            $project['notes']=$imageName;

          DB::table('assignment')->insert(array(
            'enrolled_course' => $id,
            // 'unit_id' => $data['unit_id'];
            'topics_id' => $data['topic_id'],
            'uploadassignment' => $imageName,
            'submitby' => $data['dateline']

        ));

        return redirect()->back();
  
    }

        public function createfield(Request $request){
            $data = $request -> all();

            DB::table('filed_levels')->insert(array(

                'level_name' => $data['level_name']
            ));

            return redirect()->back();
        }

        public function createstudyfields(Request $request){
            $data = $request->all();

            DB::table('study_fields')->insert(array(

                'field_name' => $data['field_name'],
                'field_code' => $data['field_code'],
                'field_level' => $data['field_level'],
                'faculty_id' => $data['faculty_id']
            ));
        }

        public function videocourses(){
          $this->setLocale();

            return view('videocourses');
        }


//articles

        public function createarticle(){

            return view('adminviews.createarticles');
        }

        public function postarticle(Request $request){

            $data = $request->all();
            DB::table('articles')->insert(array(
                'title' => $data['title'],
                'type' => $data['type'],
                'tags' => $data['tags'],
                'details' => $data['details'],
                'category' => $data['category'],
                'created_by' => auth::user()->id,
                'views' => 0,
                'likes' => 0,
                'comments' => 0

            ));

            // return view('adminviews.articles');
            return redirect()->back();
        }

        public function articledetails($id){
          $this->setLocale();
            DB::table('articles')->where('id',$id)->increment('views',1);

            $details = DB::table('articles')
            ->where('id',$id)
            ->first();

            $comment = DB::table('articlecomments')
            ->leftjoin('users','users.id','articlecomments.userid')
            ->where('articlecomments.articleid',$id)
            ->get();

           

            return view('adminviews.articledetails',compact('details','comment'));
        }
        public function removearticle($id){

            DB::table('articles')->where('id',$id)->delete();

            return redirect()->back();
        }

        public function likearticle($id){

            DB::table('articles')->where('id',$id)->increment('likes',1);

            return redirect()->back();
        }

        public function viewarticles(){
            $article = DB::table('articles')->paginate(12);

            return view('adminviews.viewarticles',compact('article'));
        }

        public function addcomment(Request $request){
                $data = $request->all();
            DB::table('articlecomments')->insert(array(
                'articleid' => $data['articleid'],
                'userid' => Auth::user()->id,
                'comment' => $data['comment']

            ));

            DB::table('articles')->where('id',$data['articleid'])->increment('comments',1);

            return redirect()->back();
        }

//users registration
    public function adduser(){
        $this->setLocale();
        $accounts = DB::table('user_accounts')
        ->get();

        $roles = DB::table('roles')
        ->get();

        $users = DB::table('users')
        ->get();

        $course = DB::table('courses')->get();

        $faculties = DB::table('faculties')->get();
   
        $campuses = DB::table('campuses')->get();

        return view('adminviews.adduser',compact('accounts','roles','users','course','faculties','campuses'));
    }
    //mailing function
      public function mail($id,$subject,$email,$mailpath)
        { 
    
            $row=array();

            $user = User::find($id)->toArray();
            Mail::send($mailpath,$user, function($message) use ($user,$email,$subject) {
                $message->to($email);
                $message->subject($subject);
                });

          return redirect()->back();
    
        }
//add student
     public function addstudent(){
      $this->setLocale();
        $accounts = DB::table('user_accounts')
        ->get();

        $roles = DB::table('roles')
        ->get();

        $users = DB::table('users')
        ->get();

        $faculties = DB::table('faculties')->get();
   
        $campuses = DB::table('campuses')->get();
        $course = DB::table('courses')->get();

        return view('adminviews.addstudent',compact('accounts','roles','users','course','faculties','campuses'));
    }



      public function createstudent(Request $request){
        $user = $request->all();
        $pass = "123456";
        // $courses = $request->input('courses');
        $password = 123456;

        $checkemail = DB::table('users')->where('email',$user['email'])->first();

        // dd($en);
       if(!$checkemail){

       $id = DB::table('users')->insertGetId(array(
            'name' => $user['name'],
            'email' => $user['email'],
            'mobile' => $user['mobile'],
            'campusid' => $user['campusid'],
            // 'course' => $courses[0],
            'payable' => $user['payable'],
            'balance' => $user['payable'],
            'course' => $user['stdcourse'],
            'roleid' => 3,
            'status' => 2,   //pending admin approval
            // 'password'=> bcrypt($password)
            'password' => bcrypt('123456')

            ));

        DB::table('students')->insert(array(
            'user_id' => $id,
            'phone_number' => $user['mobile'],
            'residence' => $user['residence'],
            'occupation' => $user['occupation'],
            // 'course' => $courses[0],
            'course' => $user['stdcourse'],
            'coursestart' => $user['commencement'],
            'courseend' => $user['completion'],
            'feespaid' => 0

        ));

          $email = $user['email'];
          $name = $user['name'];

          // $credentials = ['email'=> $email, 'name' => $name, 'password'=>$password];

            // Mail::send('emails.registrationemail',$credentials, function ($msg) {
                 //$data = NewRequest::All();
                 //$msg->to($data['email']);
                 //$msg->from('admin@onlineresourcecenter.nl', 'Online Resource Center');
                // $msg->subject('Welcome to Online Resource Center');
             //});

         $courses = DB::table('courses')->where('id',$user['stdcourse'])->first();
         $course_name = $courses->course_name;

          $cred = ['name' => $name,'course_name' => $course_name];

            Mail::send('emails.adminnotification',$cred, function ($msg) {
                $data = NewRequest::All();
                $msg->to(['capacityafricainstitute@gmail.com','jawiwy@gmail.com']);
                ////$msg->to(['jawizjay@gmail.com']);
                $msg->from('academics@onlineresourcecenter.nl', 'Online Resource Center');
                $msg->subject('New Student Enrolled');

            });

        // $course_name = DB::table('courses')->where('id',$user['stdcourse'])->first();
        // $course_name = $course_name->course_name;

        //   $client = new \GuzzleHttp\Client();

        //   $request = $client->get('http://decasys.co.ke/mailer/sendmail.php?name='.$user['name'].'&email='.$user['email'].'&course='.$course_name.'&date='.$user['commencement']);

        //   $response = $request->getBody();

    }

    else{

        return redirect()->back()->with('errors','This email has been taken. Please use another one');
    }



  

        return redirect()->back();
    }
 public function edituser($id){

  $this->setLocale();
        $user = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin('students','students.user_id','users.id')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name','students.residence','students.occupation','students.coursestart','students.courseend','students.feespaid','courses.field_id','campuses.id as campid','courses.id as course_id')
        ->where('users.id',$id)
        ->first();

        $campuses = DB::table('campuses')->get();
        $faculties = DB::table('faculties')->get();
        $faculty = DB::table('faculties')->where('id',$user->field_id)->first();
        $courses = DB::table('courses')->get();


    return view('adminviews.edituser',compact('user','campuses','faculties','faculty','courses'));

}

 public function deactivateaccount($id){
    DB::table('users')->where('id',$id)->update(array(
        'status' => 0
    ));

    $user = DB::table('users')->where('id',$id)->first();
    $name= $user->name;
    $email = $user->email;
    $cred = ['name' => $name,'email' => $user->email];

            Mail::send('emails.accountdeactivation',$cred, function ($msg) use ($email) {
                $data = NewRequest::All();
                $msg->to($email);
                $msg->from('admin@onlineresourcecenter.nl', 'Online Resource Center');
                $msg->subject('Account Deactivation');
            });


    return redirect()->back()->with('success','You have successfully deactivated the account');

 }

 public function activateaccount($id){

        DB::table('users')->where('id',$id)->update(array(
        'status' => 1
    ));

    $user = DB::table('users')->where('id',$id)->first();
    $name= $user->name;
    $email = $user->email;
    $cred = ['name' => $name,'email' => $user->email];

            Mail::send('emails.accountactivation',$cred, function ($msg) use ($email) {
                $data = NewRequest::All();
                $msg->to($email);
                $msg->from('admin@onlineresourcecenter.nl', 'Online Resource Center');
                $msg->subject('Account Activation');
            });

    return redirect()->back()->with('success','You have successfully Activated the account');

 }

public function updatestudent(Request $request){

    $user = $request->all();
    $id = $user['userid'];

    $student = DB::table('users')->where('id',$id)->first();

    $payable = $student->payable;

     if($payable > $user['payable']){
        $liquidative = $payable - $user['payable'];
    
        DB::table('users')->where('id',$id)->decrement('balance',$liquidative);
            // dd($liquidative);
    }

    else{
        $liquidative = $user['payable']-$payable;

        DB::table('users')->where('id',$id)->increment('balance',$liquidative);
         // dd($liquidative);
    }

    // dd($user);


    DB::table('users')->where('id',$id)->update(array(
            'name' => $user['name'],
            'email' => $user['email'],
            'mobile' => $user['mobile'],
            'campusid' => @$user['campusid'],
            // 'course' => $courses[0],
            'course' => @$user['stdcourse'],
            // 'roleid' => 3,
            // 'password'=> bcrypt($password)
            // 'password' => bcrypt('123456')
            'payable' => $user['payable']

            ));
       

        DB::table('students')->where('user_id',$id)->update(array(
            // 'user_id' => $id,
            'phone_number' => $user['mobile'],
            'residence' => $user['residence'],
            'occupation' => $user['occupation'],
            // 'course' => $courses[0],
            'course' => $user['stdcourse'],
            'coursestart' => $user['commencement'],
            'courseend' => $user['completion']
            // 'feespaid' => $user['feespaid']

        ));



 

    // var_dump($payable);

    return redirect()->back();
}

//delete a user from the system.. Not a soft delete
    public function deletestudent($id){
        DB::table('users')->where('id',$id)->delete();

        return redirect()->back();
    }

    public function createuser(Request $request){
        $user = $request->all();
        $courses = $request->input('courses');
       $password = "123456";
        // dd($courses);
       $id = DB::table('users')->insertGetId(array(
            'name' => $user['name'],
            'email' => $user['email'],
            'campusid' =>$user['campusid'],
            'mobile' => $user['mobile'],
            'course' => $user['faculty'],
            'roleid' => $user['roleid'],
            'password'=> bcrypt($password)
            ));

       foreach ($courses as $key => $value) {
           DB::table('lecturercourses')->insert(array(
            'lecturerid' => $id,
            'courseid' => $value
           ));
       }

        // $mailpath = "registration";
        // $subject = "Online Resource Center Registration";
        // $email= $user['email'];
        // $mailsend =self::mail($id,$subject,$email,$mailpath);
      
        // $mailsend -> mail($id,$subject,$email,$mailpath);


        return redirect()->back();
    }

    public function addadmin(){

      $this->setLocale();
        $accounts = DB::table('user_accounts')
        ->get();

        $roles = DB::table('roles')
        ->get();

        $users = DB::table('users')
        ->get();

        $faculties = DB::table('faculties')->get();
   
        $campuses = DB::table('campuses')->get();
        $course = DB::table('courses')->get();

        return view('adminviews.addadmins',compact('accounts','roles','users','course','faculties','campuses'));
    }

    public function createadmin(Request $request){
      $this->setLocale();
         $user = $request->all();
        $pass = "123456";
        // $courses = $request->input('courses');

       $id = DB::table('users')->insertGetId(array(
            'name' => $user['name'],
            'email' => $user['email'],
            'mobile' => $user['mobile'],
            'campusid' => $user['campusid'],
            'course' => 0,
            'roleid' => 3,
            'password'=> bcrypt($pass)

            ));

        // $mailpath = "registration";
        // $subject = "Online Resource Center Registration";
        // $mailsend =self::mail($id,$subject,$email,$mailpath);
        // $email= $user['email'];
        // $mailsend -> mail($id,$subject,$email,$mailpath);

        return redirect()->back();


       return redirect()->back();
    }



    public function manageadmin(){
      $this->setLocale();
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->where('role_id',1)
        ->get();

        return view('adminviews.manageusers',compact('users'));
    }

    public function manageusers(Request $request){
      $this->setLocale();
        $campus = @$request->input('campus');
        $faculty = @$request->input('faculty');
        $course = @$request->input('course');
        $studentname = @$request->input('student');
        $regdate = @$request->input('regdate');

        $faculties = DB::table('faculties')->get();
        $courses = DB::table('courses')->get();
        $campuses = DB::table('campuses')->get();

    if(!$studentname){

      if($regdate){

        $users = DB::table('users')
        ->leftjoin ('students','students.user_id','users.id')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->wheredate('students.created_at','>=',$regdate)
        ->where('completion',1)
        ->paginate();

      }

      else{


    if(!$campus AND !$faculty AND !$course){
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('completion',1)
        ->paginate();

        // dd($users);
    }

    elseif ($course AND !$campus AND !$faculty) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('course',$course)
        ->where('completion',1)
        ->paginate();
    }

       elseif ($campus AND !$faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('users.campusid',$campus)
        ->where('completion',1)
        ->paginate();
    }

       elseif ($faculty AND !$campus AND !$course ) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
        ->where('completion',1)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
         ->where('completion',1)
          // ->where('users.course',$course)
        ->paginate();
    }


       elseif ($campus AND !$faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        // ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
          ->where('completion',1)
        ->paginate();
    }


       elseif (!$campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         // ->where('users.campusid',$campus)
          ->where('users.course',$course)
          ->where('completion',1)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
         ->where('completion',1)
          // ->where('users.course',$course)
        ->paginate();
    }

       elseif ($campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
          ->where('completion',1)
        ->paginate();
    }
  }
  }

  else{

        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('users.name','like', '%'.$studentname.'%')
        ->where('completion',1)
         
        ->paginate();
  }

    // dd($users);
          
        return view('adminviews.students',compact('users','campuses','faculties','courses'));
    }



        public function graduatestudents(Request $request){
      $this->setLocale();
        $campus = @$request->input('campus');
        $faculty = @$request->input('faculty');
        $course = @$request->input('course');
        $studentname = @$request->input('student');
        $regdate = @$request->input('regdate');

        $faculties = DB::table('faculties')->get();
        $courses = DB::table('courses')->get();
        $campuses = DB::table('campuses')->get();

    if(!$studentname){

      if($regdate){

        $users = DB::table('users')
        ->leftjoin ('students','students.user_id','users.id')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->wheredate('students.created_at','>=',$regdate)
        ->where('completion',2)
        ->paginate();

      }

      else{

    if(!$campus AND !$faculty AND !$course){
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('completion',2)
        ->paginate();

        // dd($users);
    }

    elseif ($course AND !$campus AND !$faculty) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('course',$course)
        ->where('completion',2)
        ->paginate();
    }

       elseif ($campus AND !$faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('users.campusid',$campus)
        ->where('completion',2)
        ->paginate();
    }

       elseif ($faculty AND !$campus AND !$course ) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
        ->where('completion',2)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
         ->where('completion',2)
          // ->where('users.course',$course)
        ->paginate();
    }


       elseif ($campus AND !$faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        // ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
          ->where('completion',2)
        ->paginate();
    }


       elseif (!$campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         // ->where('users.campusid',$campus)
          ->where('users.course',$course)
          ->where('completion',2)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
         ->where('completion',2)
          // ->where('users.course',$course)
        ->paginate();
    }

       elseif ($campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
          ->where('completion',2)
        ->paginate();
    }
  }
  }

  else{

        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('users.name','like', '%'.$studentname.'%')
        ->where('completion',2)
         
        ->paginate();
  }

    // dd($users);
          
        return view('adminviews.graduatestudents',compact('users','campuses','faculties','courses'));
    }


    public function ajaxManageUsers(Request $request)
{
    $this->setLocale();
    $campus = $request->input('campus');
    $faculty = $request->input('faculty');
    $course = $request->input('course');
    $studentname = $request->input('student');
    $regdate = $request->input('regdate');

    $query = DB::table('users')
        ->leftJoin('students', 'students.user_id', 'users.id')
        ->leftJoin('roles', 'role_id', 'roleid')
        ->leftJoin('courses', 'courses.id', 'users.course')
        ->leftJoin('campuses', 'campuses.id', 'users.campusid')
        ->select('users.*', 'campuses.campusname', 'courses.course_name')
        ->where('roleid', 3)
        ->where('completion', 1);

    // Apply filters based on request
    if ($studentname) {
        $query->where('users.name', 'like', '%' . $studentname . '%');
    }

    if ($regdate) {
        $query->whereDate('students.created_at', '>=', $regdate);
    }

    if ($campus) {
        $query->where('users.campusid', $campus);
    }

    if ($faculty) {
        $query->where('courses.field_id', $faculty);
    }

    if ($course) {
        $query->where('users.course', $course);
    }

    // Handle pagination
    $users = $query->paginate($request->input('length', 10));
    
    // Format the data for DataTables
    return response()->json([
        'draw' => intval($request->input('draw')),
        'recordsTotal' => $users->total(),
        'recordsFiltered' => $users->total(),
        'data' => $users->items(),
    ]);
}



    public function getlist(){

       $data = NewRequest::All();
       $id = $data['id'];

      $courses = DB::table('courses')->where('field_id',$id)->get();

      return Response::json($courses);
    }

    // public function exportdata(Request $request){
    //     dd($request->all());
    //     $response = new StreamedResponse(function(){
    //         // Open output stream
    //         $handle = fopen('php://output', 'w');

    //         // Add CSV headers
    //         fputcsv($handle, [
    //             'name',
    //             'mobile',
    //             'email',
    //             'balance',
    //             'Campus',
    //             'Course Enrolled'
    //         ]);

    //         // Get all users
    //         $users = DB::table('users')
    //                 ->leftjoin('courses','courses.id','users.course')
    //                 ->leftjoin('campuses','campuses.id','users.campusid')
    //                 ->where('roleid',3)
    //                 ->where('completion',1)
    //                 // ->select('users.name','users.mobile','users.mobile','campuses.campusname','courses.course_name','users.created_at')
    //                 ->get();
    //         foreach ($users as $user) {
    //             // Add a new row with data
    //             fputcsv($handle, [
    //                 $user->name,
    //                 $user->mobile,
    //                 $user->email,
    //                 $user->balance,
    //                 $user->campusname,
    //                 $user->course_name
    //             ]);
    //         }

    //         // Close the output stream
    //         fclose($handle);
    //     }, 200, [
    //             'Content-Type' => 'text/csv',
    //             'Content-Disposition' => 'attachment; filename="export.csv"',
    //         ]);

    //     return $response;
    //     return redirect()->back();
    
    // }

    public function exportdata(Request $request){

        $campus = $request->input('campus');
        $faculty = $request->input('faculty');
        $course = $request->input('course');
        $studentname = $request->input('student');
        $regdate = $request->input('regdate');
        $completion = $request->input('completion');

        // dd($completion);


        $response = new StreamedResponse(function() use ($campus, $faculty, $course, $studentname, $regdate, $completion) {
            $handle = fopen('php://output', 'w');
        // dd($completion);

            // Add CSV headers
            fputcsv($handle, ['name', 'mobile', 'email', 'balance', 'Campus', 'Course Enrolled']);

            // Build the query with filtering logic
            $query = DB::table('users')
                ->leftjoin('courses', 'courses.id', 'users.course')
                ->leftjoin('campuses', 'campuses.id', 'users.campusid')
                ->select('users.name', 'users.mobile', 'users.email', 'users.balance', 'campuses.campusname', 'courses.course_name')
                ->where('roleid', 3);

            // Apply filters based on the request
            if ($campus) {
                $query->where('users.campusid', $campus);
            }
            if ($faculty) {
                $query->where('courses.field_id', $faculty);
            }
            if ($course) {
                $query->where('users.course', $course);
            }
            if ($studentname) {
                $query->where('users.name', 'like', '%' . $studentname . '%');
            }
            if ($regdate) {
                $query->wheredate('users.created_at', '>=', $regdate);
            }
            if ($completion) {
                $query->where('users.completion', $completion);
            }

            // Fetch filtered users
            $users = $query->get();

            // Write filtered data to CSV
            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->name,
                    $user->mobile,
                    $user->email,
                    $user->balance,
                    $user->campusname,
                    $user->course_name
                ]);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="export.csv"',
        ]);

        return $response;
    }



     public function studentfees(Request $request){
      $this->setLocale();
        $campus = @$request->input('campus');
        $faculty = @$request->input('faculty');
        $course = @$request->input('course');
        $studentname = @$request->input('student');

        $faculties = DB::table('faculties')->get();
        $courses = DB::table('courses')->get();
        $campuses = DB::table('campuses')->get();

  if(!$studentname){

    if(!$campus AND !$faculty AND !$course){
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->paginate();

        // dd($users);
    }

    elseif ($course AND !$campus AND !$faculty) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('course',$course)
        ->paginate();
    }

       elseif ($campus AND !$faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('users.campusid',$campus)
        ->paginate();
    }

       elseif ($faculty AND !$campus AND !$course ) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          // ->where('users.course',$course)
        ->paginate();
    }


       elseif ($campus AND !$faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        // ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
        ->paginate();
    }


       elseif (!$campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         // ->where('users.campusid',$campus)
          ->where('users.course',$course)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          // ->where('users.course',$course)
        ->paginate();
    }

       elseif ($campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
        ->paginate();
    }
  }

  else{

        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('users.name','like', '%'.$studentname.'%')
        ->paginate();

        // dd($users);
  }

    // dd($users);
          
        return view('adminviews.studentfees',compact('users','campuses','faculties','courses'));
    }

    public function studentstatements(Request $request){
      $this->setLocale();
        $campus = @$request->input('campus');
        $faculty = @$request->input('faculty');
        $course = @$request->input('course');
        $studentname = @$request->input('student');

        $faculties = DB::table('faculties')->get();
        $courses = DB::table('courses')->get();
        $campuses = DB::table('campuses')->get();

  if(!$studentname){

    if(!$campus AND !$faculty AND !$course){
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->paginate();

        // dd($users);
    }

    elseif ($course AND !$campus AND !$faculty) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('course',$course)
        ->paginate();
    }

       elseif ($campus AND !$faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('users.campusid',$campus)
        ->paginate();
    }

       elseif ($faculty AND !$campus AND !$course ) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          // ->where('users.course',$course)
        ->paginate();
    }


       elseif ($campus AND !$faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        // ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
        ->paginate();
    }


       elseif (!$campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         // ->where('users.campusid',$campus)
          ->where('users.course',$course)
        ->paginate();
    }


       elseif ($campus AND $faculty AND !$course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          // ->where('users.course',$course)
        ->paginate();
    }

       elseif ($campus AND $faculty AND $course) {
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('courses.field_id',$faculty)
         ->where('users.campusid',$campus)
          ->where('users.course',$course)
        ->paginate();
    }
  }

  else{

        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')

        ->where('roleid',3)
        ->where('users.name','like', '%'.$studentname.'%')
        ->paginate();

        // dd($users);
  }

    // dd($users);
          
        return view('adminviews.studentstatements',compact('users','campuses','faculties','courses'));
    }

    //     public function exportdata(){
    //     $response = new StreamedResponse(function(){
    //         // Open output stream
    //         $handle = fopen('php://output', 'w');

    //         // Add CSV headers
    //         fputcsv($handle, [
    //             'name',
    //             'mobile',
    //             'email',
    //             'balance',
    //             'Campus',
    //             'Course Enrolled'
    //         ]);

    //         // Get all users
    //         $users = DB::table('users')
    //                 ->leftjoin('courses','courses.id','users.course')
    //                 ->leftjoin('campuses','campuses.id','users.campusid')
    //                 ->where('roleid',3)
    //                 // ->select('users.name','users.mobile','users.mobile','campuses.campusname','courses.course_name','users.created_at')
    //         ->get();
    //         foreach ($users as $user) {
    //             // Add a new row with data
    //             fputcsv($handle, [
    //                 $user->name,
    //                 $user->mobile,
    //                 $user->email,
    //                 $user->balance,
    //                 $user->campusname,
    //                 $user->course_name
    //             ]);
    //         }

    //         // Close the output stream
    //         fclose($handle);
    //     }, 200, [
    //             'Content-Type' => 'text/csv',
    //             'Content-Disposition' => 'attachment; filename="export.csv"',
    //         ]);

    //     return $response;
    //     return redirect()->back();
    
    // }


    public function managelec(){

      $this->setLocale();
        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->where('roleid',2)
        ->get();

        return view('adminviews.manageusers',compact('users'));
    }

    public function deleteuser($id){

        $user = DB::table('users')
        ->where('id',$id)
        ->delete();
    }

    public function updateprofile($id){
      $this->setLocale();
         $user = DB::table('users')
        ->leftjoin ('students','students.user_id','users.id')
        ->leftjoin('courses','courses.id','students.course')
        ->select('users.*','students.residence','students.occupation','students.coursestart','students.courseend','courses.course_name')
        ->where ('users.id',$id)
        ->first();

         $docs = DB::table('documents')->where('student',$id)->get();
        // dd($user);
        return view('adminviews.userprofile',compact('user','docs'));
    }

    public function graduatestudent($id){

      DB::table('users')->where('id',$id)->update(array(
          'completion' => 2
      ));

       return redirect()->back();
    }

   public function suspendstudent($id){

      DB::table('users')->where('id',$id)->update(array(
          'status' => 4
      ));

      return redirect()->back();
    }

    //upload transcripts and certificates
    public function uploaddocuments($id){
      $student = $id;

      $docs = DB::table('documents')->where('student',$student)->get();

      return view('adminviews.uploaddocuments',compact('student','docs'));
    }

    public function posttrascripts(Request $request,$id){
      $data = $request->all();
      // dd($data);


        $modulefile =$request->file('filename');
        // dd($modulefile);
        $filename = $modulefile->getClientOriginalName();
        $modulefile->move('studentdocuments',$filename);
        $project['filename']=$filename;

      $student = DB::table('users')->where('id',$id)->first();
      $name = $student->name;

      DB::table('documents')->insert(array(
        'student' => $id,
        'type' => $data['type'],
        'name' => $data['name'],
        'filename' => $name.'_'.$filename,
        
      ));

      return redirect()->back();
    }

    public function deletedocument($id){

      DB::table('documents')->where('id',$id)->delete();

      return redirect()->back();
    }

    public function createupdate(Request $request,$id){
      $this->setLocale();
        $user = $request->all();

        DB::table('users')->where('id',$id)->insert(array(
            'name' => $user['name'],
            'email' => $user['email'],
            'mobile' => $user['mobile'],
            'groupid' => $user['groupid'],
            'roleid' => $user['groupid'],
            'password'=> bcrypt($user['password'])
            ));

         $users = DB::table('users')
        ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->get();

        return view('manageusers',compact('users'));
    }




//dashboard analysis charts
    public function onetimechart(){
///onetime clients
         $chart = DB::table('tblclients')
        ->join('tblclienttypes','tblclienttypes.id','tblclients.client_type')
        ->select(DB::RAW('count(tblclients.id) as clients'),DB::raw('MONTH(tblclients.created_at) as month'))
        ->groupby('month')
        ->where('client_type',2)
        ->orderby('month','asc')
        ->get()->toArray();
///contract clients
         $charts = DB::table('tblclients')
        ->join('tblclienttypes','tblclienttypes.id','tblclients.client_type')
        ->select(DB::RAW('count(tblclients.id) as client'),DB::raw('MONTH(tblclients.created_at) as month'))
        ->groupby('month')
        ->where('client_type',1)
        ->orderby('month','asc')
        ->get()->toArray();
//get months
        $month = DB::table('tblclients')
        ->select(DB::raw('monthname(created_at) as month'),DB::raw('MONTH(created_at) as monthvalue'))
        ->orderby('monthvalue','asc')
        ->distinct()
        ->get()->toArray();

        $chart = array_column($chart, 'clients');
        $charts = array_column($charts, 'client');
        $month = array_column($month, 'month');




        // dd($charts);
     return Response::json(array('charts'=>$charts,'chart'=>$chart,'month'=>$month));
    }

  public function contractchart(){
         $charts = DB::table('tblclients')
        ->join('tblclienttypes','tblclienttypes.id','tblclients.client_type')
        ->select(DB::RAW('count(tblclients.id) as client'),DB::raw('MONTHNAME(tblclients.created_at) as month'))
        ->groupby('month')
        ->where('client_type',1)
        ->orderby('month','asc')
        ->get();

        // dd($chart);
       return $charts;
    }

    public function clientschart(){
        if(Auth::user()->role_id == 4 OR Auth::user()->role_id == 6){
        $piechart = DB::table('tblclients')
        ->join('tblclienttypes','tblclienttypes.id','tblclients.client_type')
        ->select(DB::RAW('count(tblclients.id) as clients'),'tblclienttypes.type')
        ->groupby('tblclienttypes.type')
        ->get();
    }

        elseif (Auth::user()->role_id == 1) {
        $piechart = DB::table('tblclients')
        ->join('tblclienttypes','tblclienttypes.id','tblclients.client_type')
        ->select(DB::RAW('count(tblclients.id) as clients'),'tblclienttypes.type')
        ->groupby('tblclienttypes.type')
        ->where('tblclients.sales_id_rep',Auth::user()->id)
        ->get();
        }

        elseif (Auth::user()->role_id == 4) {
        $piechart = DB::table('tblclients')
        ->join('tblclienttypes','tblclienttypes.id','tblclients.client_type')
        ->select(DB::RAW('count(tblclients.id) as clients'),'tblclienttypes.type')
        ->groupby('tblclienttypes.type')
        ->where('tblclients.regionId',Auth::user()->regionId)
        ->get();
        }

         // dd($piechart);

        return ($piechart);
    }

    public function jobchart(){
        $jobschart = DB::table('tbljobs')
        ->select(DB::RAW('count(tbljobs.id) as jobs'),DB::RAW('MONTH(tbljobs.created_at) as month'))
        ->groupby('month')
        ->orderby('month','asc')
        ->get();
        // dd($jobschart);
        return ($jobschart);
    }

    public function raiseticket(){

        $tickets = DB::table('tickets')->where('userid',Auth::user()->id)->get();

        return view('support',compact('tickets'));
    }

    public function postticket(Request $request){
        $data = $request->all();

        DB::table('tickets')->insert(array(
            'userid' => Auth::user()->id,
            'type' => $data['type'],
            'description' => $data['enquiry'],
            'status' => "Pending",
        ));

        return redirect()->back()->with('success','Your Enquiry has been raised and we will get back to you as soon as possible');

    }

    public function viewtickets(){
        $this->setLocale();
         $tickets = DB::table('tickets')
         ->leftjoin('users','users.id','tickets.userid')
         ->select('tickets.*','users.name','users.mobile','users.email')
         ->orderby('tickets.created_at','desc')
         ->paginate();

         return view('viewtickets',compact('tickets'));


    }

    public function viewhistory($id){
      $this->setLocale();
         $tickets = DB::table('tickets')
         ->leftjoin('users','users.id','tickets.userid')
         ->select('tickets.*','users.name','users.mobile','users.email')
         ->where('users.id',$id)
         ->paginate();

         $ticket = DB::table('tickets')->where('userid',$id)->orderby('created_at','desc')->first();
         $lastticket = $ticket->id;
         $ticketuser = $ticket->userid;

         // dd($tickets);

         return view('tickethistory',compact('tickets','lastticket','ticketuser'));
    }

    public function replyticket($id){
      $this->setLocale();
        $ticket = DB::table('tickets')
        ->leftjoin('users','users.id','tickets.userid')
         ->select('tickets.*','users.name','users.mobile','users.email')
         ->where('tickets.id',$id)->first();
        $tickets = DB::table('tickets')->where('userid',$ticket->userid)->get();

        // dd($ticket);

        return view('replytickets',compact('ticket','tickets'));
    }

    public function postreply(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $tickets = DB::table('tickets')->where('id',$id)->first();

         if($tickets->description AND !$tickets->reply){

        DB::table('tickets')->where('id',$id)->update(array(

            'reply' => $data['reply'],
            'status' => "Received",
            'replied_by' => Auth::user()->id

        ));

    }
        else{

        DB::table('tickets')->insert(array(
            'userid' => @$data['ticketuser'],
            'type' => 1,
            'description' => "ORC Support Ticket post",
            'status' => "Received",
            'reply' => $data['reply'],
            'replied_by' => Auth::user()->id
        ));

        }



        return redirect()->back()->with('success','you have successfully replied to the ticket.');

    }

    public function viewreply($id){
      $this->setLocale();

        $ticket = DB::table('tickets')
        ->leftjoin('users','users.id','tickets.userid')
         ->select('tickets.*','users.name','users.mobile','users.email')
         ->where('tickets.id',$id)->first();

         return view('viewreplies',compact('ticket'));
    }

    public function getnot(){

        $not = DB::table('tbl_notifications')->orderby('created_at','desc')->get();

        return $not;
    }

            public function adminnotifications(){
              $this->setLocale();

           $notification = DB::table('tbl_notifications')->get();

            return view('adminviews.notifications',compact('notification'));

        }

        public function createnotification(Request $request){
            $data = $request->all();

            DB::table('tbl_notifications')->insert(array(
                'created_by' => Auth::user()->id,
                'notification' => $data['notification']

            ));

            return redirect()->back();
        }

        public function deletenotification($id){

            DB::table('tbl_notifications')->where('id',$id)->delete();

            return redirect()->back()->with('Success','You have deleted one transaction successfully');
        }

        //fee payment summarry

        public function institutesummarry(Request $request){

            $data = $request()->all();
            $start = $data['start'];
            $end = $data['end'];

            if(!$start AND !$end){

            DB::table('users')
            ->where('role_id',3)
            ->select(DB::raw('sum(amount) as amount'))
            ->groupby('faculty')
            ->get();
        }

        else{
            
             DB::table('users')
            ->where('role_id',3)
            ->select(DB::raw('sum(amount) as amount'))
            ->groupby('faculty')
            ->whereBetween(DB::raw('date(created_at)'),[$start,$end])
            ->get();

        }

        }

        public function facultysummarry(){


        }

        public function coursesummarry(){

        }

        public function viewresults($id){


          $results = DB::table('submittedassignments')
                      ->leftjoin('assignment','assignment.id','assignmentid')
                      ->leftjoin('users','users.id','submittedassignments.studentid')
                      ->select('users.name','assignment.uploadassignment','submissionname','grade')
                      ->where('users.id',$id)
                      ->get();


                  // dd($results);

                  return view('adminviews.viewresults',compact('results'));
        }


      public function admissionsapprovals(Request $request){

         $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('completion',1)
        ->where('users.status', 2)
        ->get();

        return view('superadmin.admissionsapproval',compact('users'));

      }

      public function approvestudent($id){

          DB::table('users')->where('id',$id)->update(array(
          'status' => 1
      ));

          $user = DB::table('users')->where('id',$id)->first();
          $name= $user->name;
          $email = $user->email;
          $cred = ['name' => $name,'email' => $user->email];

           # Mail::send('emails.accountapproval',$cred, function ($msg) use ($email) {
            #    $data = NewRequest::All();
             #   $msg->to($email);
              #  $msg->from('admin@onlineresourcecenter.nl', 'Online Resource Center');
               # $msg->subject('Account Approval');
           # });

          return redirect()->back();
        }

      public function deactivatedstudents(){

        $users = DB::table('users')
        // ->leftjoin ('user_accounts','acc_id','groupid')
        ->leftjoin ('roles','role_id','roleid')
        ->leftjoin('courses','courses.id','users.course')
        ->leftjoin('campuses','campuses.id','users.campusid')
        ->select('users.*','campuses.campusname','courses.course_name')
        ->where('roleid',3)
        ->where('completion',1)
        ->where('users.status', 0)
        ->orderby('users.created_at','desc')
        ->get();

         return view('superadmin.manageaccounts',compact('users'));

      }

    public function  paymentsapproval(Request $request){
        $student = @$request->input('student');
        $startdate = @$request->input('startdate');
        $enddate = @$request->input('enddate');

     if(!$student){
        if(!$enddate AND !$startdate){
         $payments = DB::table('feestatement')
            ->join('users','users.id','feestatement.student')
            ->join('users as emp','emp.id','feestatement.receiver')
            ->select('users.name','emp.name as empname','users.email','feestatement.*')
            ->where('feestatement.status',1)
            ->orderby('feestatement.created_at','desc')
            ->paginate();

            }

        else{

            $payments = DB::table('feestatement')
            ->join('users','users.id','feestatement.student')
            ->join('users as emp','emp.id','feestatement.receiver')
            ->select('users.name','emp.name as empname','users.email','feestatement.*')
            ->orderby('feestatement.created_at','desc')
            ->where('feestatement.status',1)
            ->wherebetween(DB::raw('date(feestatement.created_at)'),[$startdate,$enddate])
            ->paginate();
        }
    }

        else{

         $payments = DB::table('feestatement')
            ->join('users','users.id','feestatement.student')
            ->join('users as emp','emp.id','feestatement.receiver')
            ->select('users.name','emp.name as empname','users.email','feestatement.*')
            ->orderby('feestatement.created_at','desc')
            ->where('feestatement.status',1)
            ->where('users.name','like', '%'.$student.'%')
            ->paginate();
        }


            return view('superadmin.feespaid',compact('payments'));
    }

    public function approvepayment($id){

            DB::table('feestatement')->where('id',$id)->update(array(

                'status' => 2   //payment has been confirmed
            ));

            return redirect()->back();
    }

    public function deletepayment($id){

            $payment = DB::table('feestatement')->where('id',$id)->first();

            DB::table('users')->where('id',$payment->student)->increment('balance',$payment->amount);

            DB::table('users')->where('id',$payment->student)->decrement('paid',$payment->amount);

            DB::table('feestatement')->where('id',$id)->delete();


            return redirect()->back();

    }


}
