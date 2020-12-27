<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shyplite_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();

		$this->timestamp = time();
		$this->appID = 1301;
	    $this->key = '+1jJRixyQu4=';
	    $this->secret = 'F6X4lvaQoPND/ckrn8JE1Ul/b0cregUJbdIgaRRBV5TDq0JyDFqsRKPPKU2Rn+QLY1yQgjjpaf4QLRlup1OkNg==';


	    $sign = "key:". $this->key ."id:". $this->appID. ":timestamp:". $this->timestamp;
	   	$this->authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $this->secret, true)));
	    $this->ch = curl_init();

	    $this->header = array(
	        "x-appid: $this->appID",
	        "x-timestamp: $this->timestamp",
	        "Authorization: $this->authtoken"
	    );
	}


	function authenticatShyplite() {
	    $email =  "chetna.pandey21@gmail.com";
	    $password =  "omaxe@261";


	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'F6X4lvaQoPND/ckrn8JE1Ul/b0cregUJbdIgaRRBV5TDq0JyDFqsRKPPKU2Rn+QLY1yQgjjpaf4QLRlup1OkNg==';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $header = array(
	        "x-appid: $appID",
	        "x-timestamp: $timestamp",
	        "Authorization: $authtoken"
	    );

	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/login');
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "emailID=$email&password=$password");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec($ch);
	    var_dump($server_output);
	    exit;
	    curl_close($ch);
	    return $server_output;
	}


	function set_order($data_order = array()) {

	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $data_json = json_encode($data_order);

	    $header = array(
	        "x-appid: $appID",
	        "x-sellerid:8079",
	        "x-timestamp: $timestamp",
	        "Authorization: $authtoken",
	        "Content-Type: application/json",
	        "Content-Length: ".strlen($data_json)
	    );

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/order');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response  = curl_exec($ch);
	    //var_dump($response);
	    //exit;
	    curl_close($ch);
	    return $response;
	}


	function getShipmentSlip($order_id="") {
	   	$timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $header = array(
	        "x-appid: $appID",
	        "x-timestamp: $timestamp",
	        "x-sellerid:8079",
	        "Authorization: $authtoken"
	    );

	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getSlip?orderID='.urlencode($order_id));
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec($ch);
	    // var_dump($server_output);
	    // exit;
	    curl_close($ch);
	    return $server_output;
	}
	

	function track($tracking_id="") {
	   	$timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $header = array(
	        "x-appid: $appID",
	        "x-timestamp: $timestamp",
	        "x-sellerid:8079",
	        "Authorization: $authtoken"
	    );

	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/track/'.$tracking_id);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec($ch);
	    //var_dump($server_output);
	    //exit;
	    curl_close($ch);
	    return $server_output;
	}


	function cancel_order() {
	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $data = array( 
	        "orders"=> ["Demo1234"]
	    );

	    $data_json = json_encode($data);

	    $header = array(
	        "x-appid: $appID",
	        "x-sellerid:8079",
	        "x-timestamp: $timestamp",
	        "Authorization: $authtoken",
	        "Content-Type: application/json",
	        "Content-Length: ".strlen($data_json)
	    );

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/ordercancel');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response  = curl_exec($ch);
	    var_dump($response);
	    exit;
	    curl_close($ch);
		return $response;
	}


	function get_manifest() {
	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $header = array(
	        "x-appid: $appID",
	        "x-timestamp: $timestamp",
	        "x-sellerid:8079",
	        "Authorization: $authtoken"
	    );

	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getManifestPDF/2941');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec($ch);
	    var_dump($server_output);
	    exit;
	    curl_close($ch);
	    return $server_output;
	}


	function serviciability() {
	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $header = array(
	        "x-appid: $appID",
	        "x-timestamp: $timestamp",
	        "x-sellerid:8079",
	        "Authorization: $authtoken"
	    );

	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getserviceability/110062/208019');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec($ch);
	    var_dump($server_output);
	    exit;
	    curl_close($ch);
	    return $server_output;
	}


	function price_calculator() {
	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $data = array( 
	                "sourcePin"=> "110062",
	                "destinationPin"=> "208019",
	                "orderType"=> 2,
	                "modeType"=> 1,
	                "length"=> 1,
	                "width"=> 1,
	                "height"=> 1,
	                "weight"=> 0.5,
	                "invoiceValue"=> 2
	            );

	    $data_json = json_encode($data);

	    $header = array(
	        "x-appid: $appID",
	        "x-sellerid:8079",
	        "x-timestamp: $timestamp",
	        "Authorization: $authtoken",
	        "Content-Type: application/json",
	        "Content-Length: ".strlen($data_json)
	    );

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/calculateprice');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response  = curl_exec($ch);
	    var_dump($response);
	    exit;
	    curl_close($ch);
	    return $response;
	}

	function ndr() {
	    $timestamp = time();
	    $appID = 1301;
	    $key = '+1jJRixyQu4=';
	    $secret = 'e80acfeec13eea2459c244e0dec9a428d0bd851b1af1255a697ccaf29e19a5cc';

	    $sign = "key:". $key ."id:". $appID. ":timestamp:". $timestamp;
	    $authtoken = rawurlencode(base64_encode(hash_hmac('sha256', $sign, $secret, true)));
	    $ch = curl_init();

	    $header = array(
	        "x-appid: $appID",
	        "x-timestamp: $timestamp",
	        "x-sellerid:8079",
	        "Authorization: $authtoken"
	    );

	    curl_setopt($ch, CURLOPT_URL, 'https://api.shyplite.com/getndr?start=2017-01-01&end=2017-01-31');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $server_output = curl_exec($ch);
	    var_dump($server_output);
	    exit;
	    curl_close($ch);
	    return $server_output;
	}


}