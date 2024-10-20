Quick Bulk SMS API Guide:
==================================

API Endpoint URL (HTTPS): https://api.tililtechnologies.co.ke:1112/tililsms.php
API Endpoint for plain HTTP: http://api.tililtechnologies.co.ke/1112/tililsms.php

Below is a sample send sms client ... in PHP:

------------------------------------------------------------------------------------------------------
<?php

$username = "smart";
$password = "smart!123";
$shortcode = "22458";

$mobile = "254724385922";
$message = "This is a test message + = # special characters @ _ -";

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

//for plain HTTP use: http://api.tililtechnologies.co.ke/1112/tililsms.php
$finalURL = "https://api.tililtechnologies.co.ke:1112/tililsms.php?username=" . urlencode($username) . "&password=" . urlencode($password) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";
$res = file_get_contents($finalURL, false, stream_context_create($_options));
echo "Response: $res";
?>
------------------------------------------------------------------------------------------------------

---- for a successfully sent message you get:
123456;Success
where 123456 is the message id. This is the message id to use when querying delivery reports.
==================================

Getting delivery reports:
$finalURL = "https://api.tililtechnologies.co.ke:1112/integradlr.php?username=" . urlencode($username) . "&password=" . urlencode($password) . "&messageId=34900";

where 34900 is the message id returned in sendsms request.
You only expect:
(1). 1009;No dlr
(2). 34900;Success;1;DeliveredToTerminal;2016-11-13 08:47:03;00:00:06

where:
34900                   - message id
Success                  - request status
1                        - dlr status
DeliveredToTerminal    - dlr description
2016-09-27 09:04:54    - delivery time
00:00:06                 - TAT (turn around time)
------------------------------------------------------------------------------------------------------


------------------------------------------------------------------------------------------------------

Online delivery reports:

DLR Sample receive: PHP

<?php

$data_json = file_get_contents('php://input');
$data_array = json_decode($data_json);
if (!$data_array) {
    die("0;error;unsupported data type");
}

$messageId = $data_array->messageId;
$dlrTime = $data_array->dlrTime;
$dlrStatus = $data_array->dlrStatus;
$dlrDesc = $data_array->dlrDesc;
$tat = $data_array->tat;
$network = $data_array->network;

//YOUR BUSINESS LOGIC


//END YOUR BUSINESS LOGIC: if all goes well echo 'OK' otherwise echo 'FAILED' for the system to retry
echo "OK: $messageId | $dlrDesc | $network";