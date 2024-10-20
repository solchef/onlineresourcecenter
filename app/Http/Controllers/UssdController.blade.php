<?php
/* PCEA USSD PROGRAM by ITDOLL/James
 */
// header('Content-type: text/plain');

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use AfricasTalkingGateway;
use OAuth;
use DB;
Use ussdcredentials;
class ussdController extends Controller
{
 

// pcea($conn, $phoneNumber, $session_Id, $text, $serviceId, $prodId, $spId);
public function index(Request $request)
{

$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

// $sessionId   = $_POST["sessionId"];
// $serviceCode = $_POST["serviceCode"];
// $phoneNumber = $_POST["phoneNumber"];
// $text        = $_POST["text"];


$response ='';
$text = trim($text);
$text_explode = explode("*", $text);
$level = 0;
$level = count($text_explode);

if( $level == 0 or $level == 1 ){
    // dd($text_explode);
        self::mainmenu();
}


//second level response logic
elseif ($level == 2) {
    # code...
    // dd($text_explode); 
             if ( $text_explode[1] == "1" ) {
                 self::accountmenu();
         }

            else if ( $text_explode[1] == "2" ) {
                // Business logic for first level response
                 self::sermonsmenu();          
         }

             else if( $text_explode[1] == "3" ) {
                self::announcementsmenu();
  
        }

            elseif ( $text_explode[1] == "4" ) {
                self::projectsmenu();
            }

            elseif ( $text_explode[1] == "5" ) {
                self::songsmenu();
            }

            elseif ( $text_explode[1] == "6" ) {
               self::biblequotes();
            }

            elseif ( $text_explode[1] == "7" ) {
                self::prayerrequests();
            }

 }
//third level logic
//explore the member account details
 elseif ($level == 3 ) {
     if ( $text_explode[1] == "1" ) {
            # code...
      
        if( $text_explode[2] == "1" ) {
 
         self::accountinfo($request); //member account information
        }
  
        else if ( $text_explode[2] == "2" ) {
  
        self::memberno($request); //member number enquiry

        }

        elseif ( $text_explode[2] == "3" ) {
        self::tithecontributions($request); //member tithe contributions 
        }
    }
//explore the sermons items
 elseif ( $text_explode[1] == "2" ) {
        
        if( $text_explode[2] == "1" ) {
         self::sundaysermons($request); 
    }
 }
  

}

//level 4 menu items
elseif ( $level == 4 ) {
    
}

// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;

// DONE!!   
        }
 //mainmenu items

 public function mainmenu(){
        $response  = "CON Welcome to USSD Learning \n";
        $response  .= "1. My Account Details \n";
        $response  .= "2. Sermons \n";
        $response  .= "3. Announcements \n";
        $response  .= "4. Projects \n";
        $response  .= "5. Songs \n";
        $response  .= "6. Bible quotes \n"; 
        $response  .= "7. Prayer requests";

        header('Content-type: text/plain');
        echo $response;

 }

//level 1 meu items
public function sermonsmenu(){
            $response = '';
            $response .= "CON Please select the type of sermon \n";
            $response .= "1. Sunday sermons. \n";
            $response .= "2. Youths meeting sermons. \n";
            $response .= "3. Kesha Sermons. \n";
            $response .= "4. Leaders sermons. \n";
            $response .= "0. Go back\n";
            $response .= "00. Main menu";
            // break;

            
             header('Content-type: text/plain');
             echo $response;
        }
//sunday menu items methods
    public function sundaysermons(Request $request){
            $response = '';
            $response .= "CON Latest sunday sermons are: \n";
            $response .= "1. The lord is my shepherd";

            header('Content-type: text/plain');
            echo $response;
    }

//account menu navigation
 public function accountmenu(){
        $response  = "CON My Account details \n";
        $response .= "1. My Account Info \n";
        $response .= "2. My Member No \n";
        $response .= "3. My sermons contributions.";

        header('Content-type: text/plain');
        echo $response;
 }

 //account menu details

    public function accountinfo(Request $request){
        //query for the member details from the database
        $phoneNumber = $_POST["phoneNumber"];

            $member = DB::table('users')
            ->leftjoin('districts','districts.district','users.district')
            ->where('mobile',$phoneNumber)
            ->first();
            $response = "CON $member->name , Your details are: \n";
            $response .= "Member No: $member->member_id \n";
            $response .= "Email: $member->email \n";
            $response .= "District: $member->districtname \n ";
            $response .= "0. Go back";

            header('Content-type: text/plain');
            echo $response;

        }
    public function memberno(Request $request){
        //query for the member church no 
        $phoneNumber = $_POST["phoneNumber"];
            $response ='';
            $member = DB::table('users')
            ->where('mobile',$phoneNumber)
            ->first();
            $response = "CON $member->name , Your member no is: \n";
            $response .= "Member No: $member->member_id \n";
          
            $response .= "0. Go back";

            header('Content-type: text/plain');
            echo $response;

        }

    public function tithecontributions(Request $request){
        //query for the member tithe contributions 
        $phoneNumber = $_POST["phoneNumber"];
            $respone = '';
            $member = DB::table('users')
            ->leftjoin('tithe','tithe.memberid','users.id')
            ->orderby('tithe.created_at','desc')      
            ->where('users.mobile',$phoneNumber)
            ->take(5)
            ->get();
// dd($member);
           
            $i =1;
             $response = "CON Your Previous tithe contributions are: \n";
            $output = '';
            foreach ($member as $value) {
                $output .= "$i  : $value->amount  on $value->created_at \n ";
                $i++;
            }
            $response .=$output;
            $response .= "0. Go back";

            header('Content-type: text/plain');
            echo $response;

        }




 public function announcementsmenu(){
        $response = "CON PLease select the announcement category: \n";
        $response .= "1. Weekly meetings \n";
        $response .= "2. Youth meetings \n";
        $response .= "3. Keshas \n";
        $response .= "4. Bible study sessions \n";
        $response .= "5. Morning Glory";

        header('Content-type: text/plain');
        echo $response;
 }

 public function projectsmenu(){
        $response = "CON PLease select the announcement category: \n";
        $response .= "1. Constructions Projects \n";
        $response .= "2. Help the needy \n";
        $response .= "3. Childrens Projects \n";
        $response .= "4. Compleated Projects \n";
        $response .= "5. Pending projects";

        header('Content-type: text/plain');
        echo $response;
 }

 public function songsmenu(){
        $response = "CON PLease select the announcement category: \n";
        $response .= "1. Latest uploads \n";
        $response .= "2. Most downloaded \n";
        $response .= "3. Most favorite \n";
        $response .= "4. Select top musicians \n";
        $response .= "5. Your download list";

        header('Content-type: text/plain');
        echo $response;
 }

 public function biblequotes(){
        $response = "CON PLease select the announcement category: \n";
        $response .= "1. Latest quotes \n";
        $response .= "2. Post a quote \n";
        $response .= "3. Pastor quotes \n";
        $response .= "0. Go back";

        header('Content-type: text/plain');
        echo $response;
 }

 public function prayerrequests(){
        $response = "CON PLease write your prayer request: \n";
        $response .= "0. Go back \n";
        $response .= "00. Main menu ";  

        header('Content-type: text/plain');
        echo $response;
 }



}


//ussd process notes
//football predictions
//show member sermons and send sermon notes as message on sermon selected as message to phone
//show account insformation and update if neccessarry
//show a list of latest announcements
//show a list of current projects
//show a list of songs and direct one to download page.... ##payments to paybill may apply if song has to be paid for

