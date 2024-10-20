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
use Session;
use App;

class dashboardController extends Controller
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

       public function setlocale(){

        $locale = Session::get('userlang');
        App::setLocale($locale);
    }

    public function incomingchats() {

    	$incomingchat = DB::table('chats')
    	->where('chattype',1)
    	// ->where('recipientuid',Auth::user()->id)
    	->get();

    	return $incomingchat;
    }

    public function outgoingchat(Request $request){
    	// $data = NewRequest::All();
        $data = $request->all();
    	$outgoingchat = DB::table('chats')->insert(array(
    		'chattype' => 1,
    		'senderuid' => Auth::user()->id,
    		'message' => $data['message'],
    		'recipientuid' => $data['recipientuid'],

    	));
    		return redirect()->back();

    }
    public function regcampus(){
         $this->setLocale();

        $campus = DB::table('campuses')->get();

        return view('adminviews.registercampus',compact('campus'));

    }

    Public function postcampus(Request $request){

        $data = $request->all();

        DB::table('campuses')->insert(array(

            'campusname' => $data['campusname'],
            'location' => $data['location'],
            'address' => $data['address']

        ));

        return redirect()->back();
    }

    public function editcampus($id){

        $campus = DB::table('campuses')->where('id',$id)->first();

        return view('adminviews.editcampus',compact('campus'));
    }

    public function updatecampus(Request $request,$id){
        $data = $request->all();

        DB::table('campuses')->where('id',$id)->update(array(

            'campusname' => $data['campusname'],
            'location' => $data['location'],
            'address' => $data['address']

        ));

        return redirect()->back()->with('success','Campus has been edited successfully');
    }

    public function deletecampus($id){

        DB::table('campuses')->where('id',$id)->delete();

        return redirect()->back()->with('success','One Campus has been deleted from the system successfully');
    }

    public function libraryreference(){
         $this->setLocale();
        $target = DB::table('courses')->get();

        return view('adminviews.libraryreference',compact('target'));
    }

    public function createreference(Request $request){

        $data = $request->all();
        $courses = $data['targetcourse'];

        $rfile =$request->file('referencefile');
        // dd($modulefile);
        $filename = $rfile->getClientOriginalName();
        $rfile->move('references',$filename);
        $project['modulefiles']=$filename;

    foreach ($courses as $key => $value) {

        DB::table('libraryreference')->insert(array(
            'referencetype' => $data['referencetype'],
            'targetcourse' => $value,
            'created_by' => Auth::user()->id,
            'reference_name' => $data['reference_name'],
            'details' =>$filename,
            'referencelink' => "null"

        ));
    }

        return redirect()->back();
    }

    public function viewreferences(Request $request){
         $this->setLocale();
    if(Auth::user()->roleid == 1){
         $target = DB::table('courses')->get();
         $targ = $request->input('target');
         $type = $request->input('type');

    if(!$targ AND !$type){
        $ref = DB::table('libraryreference')->get();
    }
    elseif ($targ) {
        $ref = DB::table('libraryreference')->where('targetcourse',$targ)->get();
    }

    elseif($type){
        $ref = DB::table('libraryreference')->where('referencetype',$type)->get();
    }

    elseif ($targ AND $type) {
        $ref = DB::table('libraryreference')->where('targetcourse',$targ)->where('referencetype',$type)->get();
    }

     }

     else{
        $target = DB::table('courses')->get();
         $targ = Auth::user()->course;
         // $targ = $request->input('target');
         $type = $request->input('type');

    if(!$type){

        $ref = DB::table('libraryreference')->where('targetcourse',$targ)->get();
    }

    else{

        $ref = DB::table('libraryreference')->where('referencetype',$type)->where('targetcourse',$targ)->get();
    }

   
     }

        return view('adminviews.viewreferences',compact('ref','target'));
    }

    public function deletereference($id){
        DB::table('libraryreference')->where('id',$id)->delete();

	return redirect()->back();
    }

    public function pastpapers(){
         $target = DB::table('courses')->get();

        return view('adminviews.pastpapers',compact('target'));
    }

    public function uploadpapers(Request $request){
        $data = $request->all();
        $paperfile = $request->file('videofile');

        $filename = $paperfile->getClientOriginalName();
        $paperfile->move('pastpapers',$filename);

        DB::table('pastpapers')->insert(array(
            'pastpapername' => $data['papername'],
            'uploadedby' => Auth::user()->id,
            'paperfile' => $filename,
            'targetgroup' => $data['targetgroup']

        ));

        return redirect()->back()->with('success','Past paper has been successfully uploaded');
    }

    public function viewpapers(Request $request){
         $this->setLocale();
        $target = DB::table('courses')->get();
        $papers = DB::table('pastpapers')->get();
        $units = DB::table('course_units')
        // ->where('course_id',Auth::user()->course)
        ->get();

        return view('adminviews.viewpapers',compact('papers','target','units'));
    }

    public function videos(){
         $this->setLocale();
        $target = DB::table('courses')->get();
        return view('adminviews.lecturevideos',compact('target'));
    }

    public function uploadvideos(Request $request){
        $data = $request->all();
        $videofile = $request->file('paperupload');

        $filename = $videofile->getClientOriginalName();
        $videofile->move('videolectures',$filename);

        DB::table('videolectures')->insert(array(
            'videoname' => $data['videoname'],
            'details' => $data['details'],
            'addedby' => Auth::user()->id,
            'targetgroup' => $data['targetgroup'],
            'videofile' => $filename

        ));

    return redirect()->back()->with('success','Video has been successfully uploaded');
    }

    public function viewvideos(Request $request){
         $this->setLocale();

        $target = DB::table('courses')->get();
       
        $units = DB::table('course_units')
        // ->where('course_id',Auth::user()->course)
        ->get();

         $videos = DB::table('videolectures')->get();

        return view('adminviews.viewvideos',compact('videos','target','units'));
    }
    public function feestructure(){
         $cou = DB::table('lecturercourses')->where('lecturerid',Auth::user()->id)->get()->toArray();
         $couid = array_column($cou, 'courseid');
         $cl = $couid;

        if(Auth::user()->roleid == 1 OR Auth::user()->roleid == 4){
         $courses =  DB::table('courses')
         ->leftjoin('faculties','courses.field_id','faculties.id')
         ->select('courses.*','faculties.faculty_name')
         ->where('courses.field_id',1)
         ->paginate();
        }

        return view('adminviews.structurecourses',compact('courses'));
    }


    //financials
    public function generatefeestructure(Request $request,$id){
         $this->setLocale();
        $session_fees = $request->session()->get('saved_items',[]);
         $course = DB::table('courses')->get();
         $itemstemp = DB::table('itemstemp')->get();
         $courses = $id;
         // dd($itemstemp);


        return view('adminviews.feestructure',compact('session_fees','itemstemp','course','courses'));
    }

    public function additems(Request $request){
        $session_fees = $request->session()->get('saved_items',[]);

        $feedata = $request->all();
        // dd($feedata);

        //dd($feedata);

        if($feedata){
        $session_fees [] = $feedata;

        DB::table('itemstemp')->insert(array(
            'course' => $feedata['course'],
            'itemname' => $feedata['itemname'],
            'amount' => $feedata['amount']
        )); 
      }

       else{
        
    }

        $request->session()->put('saved_items',$session_fees);

        return redirect()->back();
    }

    public function generatestructure(Request $request){
        $session_fees = $request->session()->get('saved_items',[]);
        $data = $request->all();

       // dd($data);

     $id = DB::table('feestructures')->insertGetId(array(
            'course' => $data['course'],
            'duration' => $data['duration'],
            'amount' => $data['totalamount'],
            'generatedby' => Auth::user()->id
        ));

        
     $item = $data['itemname'];
     $amt = $data['amount'];

     $count = 0;

     foreach ($item as $value) {



         DB::table('feestructureitems')->insert(array(

            'structureid' => $id,
            'itemname' => $value,
            'amount' => $amt[$count]
         ));

         $count ++;
     }

        DB::table('itemstemp')->truncate();


        $request->session()->forget('saved_items',$session_fees);

        return redirect()->back();
    }


    public function viewstructure(Request $request){
         $this->setLocale();

        $target = DB::table('courses')->get();
        // $units = DB::table('course_units')->get();
        $structure = DB::table('feestructures')
        ->leftjoin('feestructureitems','feestructureitems.structureid','feestructures.id')
        ->where('structureid',6)
        ->get();

        // dd($structure);

        return view('adminviews.viewstructure',compact('structure','target'));
    }

    // public function studentemails(Request $request)
    public function receivefees($id){
         $this->setLocale();
        $student = DB::table('users')->where('id',$id)->first();
            // dd(Auth::user()->course);
        $expected = DB::table('courses')->where('id',$student->course)->first();
        if(!$expected){

             $expectedfee = 0;
       }
       else{

             $expectedfee = $expected->feespayable;
       }

       $studentid = $id;

        $statement = DB::table('feestatement')->where('student',$id)->get();

        return view('adminviews.receivefees',compact('student','statement','expectedfee','studentid'));
    }

    public function enterfee(Request $request,$id){
        $data = $request->all();
        $student = DB::table('users')->where('id',$id)->first();
        $expectedfee = DB::table('feestructures')->where('course',$student->course)->first();
        $statement = DB::table('feestatement')->where('student',$id)->get();
        $checktranscode = DB::table('feestatement')->where('transcode',$data['transcode'])->first();
       
        // dd($expectedfee);
        if(!$checktranscode){
              DB::table('feestatement')->insert(array(
            'receiver' => Auth::user()->id,
            'student' => $id,
            'means' => $data['means'],
            'transcode' => $data['transcode'],
            'paydate' => $data['date'],
            'amount' => $data['amount']
            // 'balance' => $balance
        ));

        //get the cumulative fee balance
        $totalfee = DB::table('feestatement')->where('student',$id)->sum('amount');

        DB::table('users')->where('id',$id)->increment('paid',$data['amount']);
        DB::table('users')->where('id',$id)->decrement('balance',$data['amount']);

        // DB::table('fees_credit')->insert(array(
        //     'user_id' => $id,
        //     'amount' => $data['amount'],
        //     'credit_by' => Auth::user()->id
        // ));


        return redirect()->back()->with('success','Student fees has successfully been updated');
        }

        else{

            return redirect()->back()->with('errors','The transaction code has alredy been captured in the system. Double entry is not allowed');
       
        }

      

    }

    public function viewpayments(Request $request){
        $student = @$request->input('student');
        $startdate = @$request->input('startdate');
        $enddate = @$request->input('enddate');

     if(!$student){
        if(!$enddate AND !$startdate){
         $payments = DB::table('feestatement')
            ->join('users','users.id','feestatement.student')
            ->orderby('feestatement.created_at','desc')
            ->paginate();

        }

        else{

            $payments = DB::table('feestatement')
            ->join('users','users.id','feestatement.student')
            ->orderby('feestatement.created_at','desc')
            ->wherebetween(DB::raw('date(feestatement.created_at)'),[$startdate,$enddate])
            ->paginate();
        }
    }

        else{

         $payments = DB::table('feestatement')
            ->join('users','users.id','feestatement.student')
            ->orderby('feestatement.created_at','desc')
            ->where('users.name','like', '%'.$student.'%')
            ->paginate();
        }

            // dd($payments);

            return view('adminviews.viewpayments',compact('payments'));
    }

        public function viewbalances(Request $request){
        $student = @$request->input('student');

    if($student){
      $balances = DB::table('users')
            ->where('balance','!=', 0.00)
            ->where('users.name','like', '%'.$student.'%')
            ->paginate();
        }

        else{

        $balances = DB::table('users')
            ->where('balance','!=', 0.00)
            ->paginate();
        }

            // dd($balances);

            return view('adminviews.viewbalances',compact('balances'));
    }

    public function campuspayments(Request $request){

            $payments = DB::table('users')
            ->leftjoin('feestatement','users.id','feestatement.student')
            ->leftjoin('campuses','campuses.id','users.campusid')
            // ->orderby('feestatement.created_at','desc')
            ->where('users.roleid',3)
            ->select('campuses.id','campuses.campusname',DB::raw('sum(users.paid) as total'))
            ->groupby('campuses.id','campuses.campusname')
            ->get();

            // dd($payments);

            $balances = DB::table('users')
            ->leftjoin('campuses','campuses.id','users.campusid')
            // ->orderby('feestatement.created_at','desc')
            ->select('campuses.id','campuses.campusname',DB::raw('sum(users.balance) as total'))
            ->where('users.roleid',3)
            ->groupby('campuses.id','campuses.campusname')
            ->get();

            // dd($balances);

            return view('adminviews.reports.campuspayments',compact('payments','balances'));

        

    }

        public function facultypayments(Request $request){

            $payments = DB::table('users')
            // ->leftjoin('feestatement','users.id','feestatement.student')
            // ->leftjoin('campuses','campuses.id','users.campusid')
             ->leftjoin('courses','courses.id','users.course')
              ->leftjoin('faculties','faculties.id','courses.field_id')
            // ->orderby('feestatement.created_at','desc')
            ->where('users.roleid',3)
            ->select('faculties.id','faculties.faculty_name',DB::raw('sum(users.paid) as total'))
            ->groupby('faculties.id','faculties.faculty_name')
            ->get();

            // dd($payments);

            $balances = DB::table('users')
            // ->leftjoin('feestatement','users.id','feestatement.student')
            // ->leftjoin('campuses','campuses.id','users.campusid')
             ->leftjoin('courses','courses.id','users.course')
              ->leftjoin('faculties','faculties.id','courses.field_id')
            // ->orderby('feestatement.created_at','desc')
            ->where('users.roleid',3)
            ->select('faculties.id','faculties.faculty_name',DB::raw('sum(users.balance) as total'))
            ->groupby('faculties.id','faculties.faculty_name')
            ->get();

            // dd($balances);

            return view('adminviews.reports.facultypayments',compact('payments','balances'));

        

    }

    public function studentstatement($id){
         $this->setLocale();
           $student = DB::table('users')->where('id',$id)->first();
            // dd(Auth::user()->course);
        $expectedfee = DB::table('feestructures')->where('course',$student->course)->first();

        // dd($expectedfee);
        $balance = DB::table('users')->where('id',$id)->first();
        $balance = $balance->balance;

        $amount = DB::table('users')->where('id',$id)->first();

        // dd($amount);
        $amount = $amount->paid;

        $statement = DB::table('feestatement')->where('student',$id)->get();
                // dd($statement);
        return view('users.feestatement',compact('statement','student','expectedfee','balance','amount'));

    }

    //change avatar
    public function changeavatar(Request $request,$id){
         $data = $request->all();

         $file=$request->file('avatar');
           // dd($file);
            $imageName=$file->getClientOriginalName();

          
            $file->move('avatars',$imageName);
            $project['notes']=$imageName;

            DB::table('users')->where('id',$id)->update(array(
                'avatar' => $imageName
            ));

            return redirect()->back();
    }

    // ajax function

    public function getcourses(){

        $data = NewRequest::All();
        $id = $data['id'];

       $cou = DB::table('courses')->where('field_id',$id)->get();

       return $cou;
    }
}
