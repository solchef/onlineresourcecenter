<?php

namespace App\Http\Controllers;


use App\Message;
use Illuminate\Http\Request;
Use Auth;
use App\Events\MessageSent;
use DB;
use Mail;
use App\User;
use Session;

class ChatsController extends Controller
{


public function index()
{
  return view('chat');
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return Message::with('user')->get();


}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */

 public function setlocale(){

        $locale = Session::get('userlang');
        //App::setLocale($locale);
    }

public function sendMessage(Request $request)
{

  $user = Auth::user();
  // dd($request);
  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}



public function courses($id){
  $this->setLocale();
  
	$courses = DB::table('courses')->where('field_id',$id)->paginate(9);

	$cat = DB::table('faculties')->where('id',$id)->first();

	return view('courses',compact('courses','cat'));
}

	public function sendemail(Request $request){

		$users = DB::table('mailusers')->where('id','>',128)->get();

		foreach($users as $usr){
			$password = str_random(6);

			// DB::table('mailusers')->where('id',$usr->id)->update(array(
				 
 		// 		'password'=> bcrypt($password)
			// ));

   //        $email = $usr->email;
   //        $name = $usr->name;

          // $user = User::find($usr->id)->toArray();
          // dd($user);
          // dd($user->email);

          $credentials = ['password'=>$password];

            Mail::send('emails.newmail',$credentials,  function ($msg) use ($usr,$request) {
                // $data = NewRequest::All();
                // $msg->to('nkibunei@gmail.com');
                $msg->to($usr->email);
                $msg->from('Info@investinkenya.eu', 'Invest In Kenya');
                $msg->subject(' AGRIBUSINESS, TRADE AND INVESTMENT MISSION TO NETHERLANDS FROM 17TH TO 22ND SEPTEMBER');
                $path1ToFile = "Registration form.pdf";
                $path2ToFile = "Trade  mission brochure.pdf";
                $path3ToFile = "trade mission Cover  letter.pdf";
                $path4ToFile = "Trade Mission FLIER (2).pdf";
                $msg->attach(public_path($path1ToFile));
                $msg->attach(public_path($path2ToFile));
                $msg->attach(public_path($path3ToFile));
                $msg->attach(public_path($path4ToFile));

                 DB::table('success')->insert(array(
                  'email' => $usr->email
            ));
            });

           
        }

        echo "Emails successfully sent";

	}

  public function uploadcsvrecipients(Request $request){

        // $reccsv = $request->file('csvrec');
        // dd($reccsv);

        // if(!$reccsv){

        //     return redirect()->back()->with('errors','Invalid File Name');
        // }
        // {
        // $recipientsfile=$reccsv->getClientOriginalName();
        // $reccsv->move('recipients',$recipientsfile);
        // //$project['chemicalimage']=$schedulefilename;
        // $productfile = $request->file($reccsv);

    if (($handle = fopen ( public_path () . '/Netherlands.csv', 'r' )) !== FALSE) {

        $flag = true;
        while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
            // dd($data);
            if($flag) { $flag = false; continue; }

            try {


                    DB::table('mailusers')->insert(array(
                    'email' => $data[0]
             
                ));

             
            }

             catch (Exception $e)
            {
                 fclose ( $handle );
                return redirect()->back();
            }
        }
       
      }
        echo "success";
      }
    


}
