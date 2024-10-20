<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
Use Response;
use AfricasTalkingGateway;
use OAuth;
use Request as NewRequest;
use Session;
use App;
// use Response;

class SettingsController extends Controller
{

     public function locale(Request $request){
      $value = $request->input('lang');
      Session::put('userlang', $value);

        $response = array(
          'status' => 'success',
          // 'msg' => $request->message,
      );

      return response()->json($response);
    }

    public function setlanguage(Request $request){

      $value = $request->input('lang');
      // dd($value);
      Session::put('userlang', $value);
      // $test = Session::get('userlang');
      // dd($test);

        return redirect()->back();

    }

      public function setlocale(){

        $locale = Session::get('userlang');
        App::setLocale($locale);
        // dd($locale);
    }


    public function index(){

        return view('blank');
    }

    public function resetpassadmin()
    {
        $this->setLocale();
        return view('users.resetpass');
    }

	public function viewvideo($id){
	 $videofile = DB::table('libraryreference')->where('id',$id)->first();
	
	 return Response::json($videofile);
	}

//reset user password
    public function resetpassword(Request $request){
        $reset = $request->all();
        $secret = $request->input('currentpass');
            $current = DB::table('users')->where('id',Auth::user()->id)->first();
            $password = $current->password;
            $pass = Hash::make('secret');
            // dd($pass);
            if (Hash::check($secret, $password))
                {
                    DB::table('users')->where('id',Auth::user()->id)->update(array(
                  'password' =>bcrypt($reset['newpassword'])
                    ));

                    return redirect()->route('login'); 
                }

            else {
                   return redirect()->back()->with('message','Your current password do not match,please try again');
            }


        //     

        // return redirect()->route('login');
    }

    public function updatestudentpass($id){
        $data = NewRequest::All();
        $newpass = $data['password'];

         DB::table('users')->where('id',$id)->update(array(

                  'password' =>bcrypt($newpass)

                ));

        return redirect()->back()->with('Success','Password successfully reset as'.$newpass);
    }

    public function geolocations(){
        $geolocation = DB::table('tblgeolocations')
        ->leftjoin('users','users.id','tblgeolocations.userId')
        ->get();

        return response::json($geolocation);
    }

    public function googleapi(){
        require 'quickstart.php';

        return redirect()->back();
    }

      public function news(){
        $this->setLocale();
        return view('news');
    }

    public function videolecture(){
        $this->setLocale();
        return view('adminviews.videolecture');
    }

     public function sendMessage($from,$question,$to){
                require_once('AfricasTalkingGateway.php');
                // Specify your login credentials
                    $username   = "jawiwy";
                    $apikey     = "67a28d66b1f1fca6a6a592d5593c9d8bc31ddb5ce0ddd3e4a30be269ff5f23e9";
     
                $recipients = $from;
           
                $message    = $question;
                // Create a new instance of our awesome gateway class
                $gateway    = new AfricasTalkingGateway($username, $apikey);
                // NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
               // ************************************************************************************
                        //     ****SANDBOX****
                $gateway    = new AfricasTalkingGateway($username, $apikey);

                try 
                { 
                  // Thats it, hit send and we'll take care of the rest. 
                      $results = $gateway->sendMessage($recipients, $message);                    
                            
                  foreach($results as $result) {
                    DB::table('outbox')->insert(array(
                    'user_id'=>6,
                    'shortcode'=>$to,
                    'recipient'=>$from,
                    'message'=>$message,
                    'gatewaymessageid'=>$result->messageId,
                    'status'=>'pending'
                        ));
                    // status is either "Success" or "error message"
                    echo "Messages have been Sent";
          
   
                DB::table('outbox')->where('gatewaymessageid',$result->messageId)->update(array(
                        'status'=>$result->status,
                        'cost'=>$result->cost,
                        'number'=>$result->number,
                        ));
                  }
                }
                catch ( AfricasTalkingGatewayException $e )
                {
                  echo "Encountered an error while sending: ".$e->getMessage();
                }
    }



      public function index_sms(Request $request){
        $session_rec = $request -> session() -> get('saved_numbers',[]);
        $session_group = $request ->session() -> get('saved_groups',[]);

        $groups = DB::table('contact_groups')
        ->get();

        return view('adminviews.sendbulk',compact('session_rec','groups','session_group'));
    }

   public function addnumbers(Request $request){
        $session_rec = $request -> session() -> get('saved_numbers',[]);
        $session_group = $request ->session() -> get('saved_groups',[]);

        // $groups = $request -> input('groups');
        $numbers = $request -> input('recipient');
        // dd($numbers);
//add group numbers to the session if group not selected
           $grp = DB::table('contacts')->where('groupid',$request->input('groupid'))
                ->get();

                // dd($grp);

        if($numbers){

            $session_rec[]=$numbers;
        }

        else{
                
          foreach($grp as $group){

                $session_group[] = $group;
                
          }
          // dd($session_group);
            
        }
        $request->session()->put('saved_groups',$session_group);
        $request->session()->put('saved_numbers',$session_rec);
        // dd($session_rec);
        return redirect()->back();
    }

    public function sendbulk(Request $request){
        $session_rec = $request -> session() -> get('saved_numbers',[]);
        $session_group = $request ->session() -> get('saved_groups',[]);

    

        $sms=$request->all();
        $shortCode = $request->input('shortcode');
        $msg = $request ->input('message');
        $question = $msg;
        
        if(!empty($session_rec)){
        foreach($session_rec as $recipient){
          $phoneNumber = $recipient;
          $from = $recipient;
          $question = $msg;
          // $to = 'CAPACITYAFRICA';
                $mobile = $recipient;
                $message = $msg;
                $to = $shortCode;
                // self::sendTilil($mobile, $message, $shortcode);
               self::sendMessage($from,$question,$to);
                // self::createOutbox($shortCode,$phoneNumber,$msg);
           }
          }
          if(!empty($session_group)){

           foreach($session_group as $recipientgroups){
            $phoneNumber = $recipientgroups->mobile;
            $mobile = $recipientgroups->mobile;
            $from = $mobile;
            $message = $msg;
            $question = $msg;
            // $to = 'CAPACITYAFRICA';
            $to = $shortCode;
            // self::sendTilil($mobile , $message , $shortcode);
            self::sendMessage($from,$question,$to);
            // self::createOutbox($shortCode,$phoneNumber,$msg);
            

           }
       }
           // dd($res);
           $request->session()->forget('saved_numbers',$session_rec);
           $request->session()->forget('saved_groups',$session_group);
           return redirect()->back();


    }

    //insert outbox messages
    public function createOutbox($shortCode,$phoneNumber,$msg){
        // self::actionGetDlr($smsId, $myTime = '', $lastSend = '');

        $outboxMsg = DB::table('outbox')->insert(array(
                    'user_id'=>Auth::user()->id,
                    'shortcode'=>$shortCode,
                    'recipient'=>$phoneNumber,
                    'message'=>$msg,
                    'gatewaymessageid'=>1,
                    // $messageId,
                    // 'status'=>$dlrStatus,
                    // 'dlr_description'=>$dlrDesc,
                    'clientcost'=>1,
                    'cost'=>0.8,
                    'credit_id'=>1,
                    // 'number'=>$tat

                    ));
        return($outboxMsg);
    }

    public function outbox(Request $request){
        $outbox = DB::table('outbox')
        ->orderby('created_at','desc')
        ->paginate();

        return view('adminviews.outbox',compact('outbox'));
    }

    private function sendTilil($mobile, $message, $shortcode, $username = 'itdolls', $password = 'myitdolls') {
        //settings
        $_options = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
            'http' => array(
                'timeout' => 60, //60 Seconds
            ),
        );

        $finalURL = "http://104.199.107.165/1112/tililsms.php?username=" . urlencode($username) . "&password=" . urlencode($password) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";
        $res = file_get_contents($finalURL, false, stream_context_create($_options));
        return $res;
    }

    public function chatview(){

        $users = DB::table('users')->get();

        return view('users.chatview',compact('users'));
    }

    public function messagestrans(){
        $data = NewRequest::All();
        $id = $data['id'];

        $chats = DB::table('chats')->where('recipientuid',$id)->get();

        return $chats;
    }


    public function createchat(){
        $data = NewRequest::All();
        DB::table('chats')->insert(array(
            'chattype' => 2,
            'senderuid' => Auth::user()->id,
            'message' => $data['message'],
            'recipientuid' => $data['id']
        ));
    }


    public function addschedule($id){

        $this->setLocale();
        
        $schedules = DB::table('userschedules')->where('userid',$id)->get();
        $student = $id;

        return view('schedules',compact('schedules','student'));
    }


    public function createschedule(Request $request){

        $data = $request->all();
        $id = $data['studentid'];

        DB::table('userschedules')->insert(array(

            'type' => $data['type'],
            'userid' => $id,
            'start' => $data['start'],
            // 'end' => $data['end'],
            'description' => $data['description'],
            'createdby' => Auth::user()->id

        ));


        return redirect()->back()->with('success','User Schedules has been successfully created');
    }

    public function deleteschedule($id){

        DB::table('userschedules')->where('id',$id)->delete();

        return redirect()->back();
    }

    //groupchats
    public function groupchat(Request $request){

        $data = $request->all();

        DB::table('groupchat')->insert(array(

            'course' => Auth::user()->course,
            'sender' => Auth::user()->id,
            'message' => $data['message']

       
        ));
             return redirect()->back();

    }

}
