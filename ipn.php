<?php
// You can get that info by accessing you account at Merchand Services -> IPN Settings -> Generate New Shared Secret
define("IPN_SHARED_KEY","74db120f0a8e5646ef5a30154e9f6deb");

$rawPostedData = file_get_contents('php://input');

// Extracting Field=Value Pairs
$i = strpos($rawPostedData, "&key=");
$fieldValuePairsData = substr($rawPostedData, 0, $i);

// Calculating Key (Notification Signature)
$calculatedKey = md5($fieldValuePairsData . IPN_SHARED_KEY);

// Verifying Notification Key (Signature)
$isValid = $_POST["key"] == $calculatedKey ? true : false;

if(!$isValid)
{
    //Invalid POST request, we are closing the script execution.
    die;
}

// These are all the details provided in the POST variables from paxum
$buyer_email = $_POST["buyer_email"];
$buyer_username = $_POST["buyer_username"];
$buyer_name = $_POST["buyer_name"];
$buyer_id = $_POST["buyer_id"];
$buyer_status = $_POST["buyer_status"];

$resend = $_POST["resend"];
$test = $_POST["test"];

$transaction_id = $_POST["transaction_id"];
$transaction_amount = $_POST["transaction_amount"];
$transaction_status = $_POST["transaction_status"];
$transaction_description = $_POST["transaction_description"];
$transaction_item_id = $_POST["transaction_item_id"];
$transaction_item_name = $_POST["transaction_item_name"];
$transaction_exchange_rate = $_POST["transaction_exchange_rate"];
$transaction_currency = $_POST["transaction_currency"];
$transaction_date = $_POST["transaction_date"];
$transaction_type = $_POST["transaction_type"];
$transaction_quantity = $_POST["transaction_quantity"];

$reference = $_POST["reference"];

if($transaction_status == "done") {
    // Transaction is complete, do whatever you want with the given information
}else{
    // Transaction is not complete, do whatever you want with the given information
}
