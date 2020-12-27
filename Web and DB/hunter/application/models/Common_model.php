<?php  if (!defined('BASEPATH'))  exit('No direct script access allowed');
class Common_Model extends CI_Model
{
	public $data=array();
	function __construct()
	{
		parent::__construct();		
	}
	public function getData($tablename='', $where = array(), $field = array(),$order=array(),$limit=array(),$count='0')
	{
		if(!empty($field))
		{
			$this->db->select($field);
		}else{
			$this->db->select('*');
		}
		$this->db->from($tablename);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		if($order)
		{
			$this->db->order_by($order['field'],$order['by']);
		}
		if(isset($limit['limit']) && isset($limit['offset']))
		{
			$this->db->limit($limit['limit'],$limit['offset']);
		}

		if(isset($limit['limit']) && !isset($limit['offset']))
		{
			$this->db->limit($limit['limit']);
		}
		$query = $this->db->get();
		if($count==0){
			$result = $query->result_array();
		}else{
			$result = $query->num_rows();
		}
		if($result)
		{
			$query->free_result();
			return $result;
		}else{
			return false;
		}
	}
	
	public function getsData($tablename='', $where = array(), $field = array(),$order=array(),$limit=array(),$count='0')
	{
		if(!empty($field))
		{
			$this->db->select($field);
		}else{
			$this->db->select('*');
		}
		$this->db->from($tablename);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		if($order)
		{
			$this->db->order_by($order[0],$order[1]);
		}
		if(isset($limit['limit']) && isset($limit['offset']))
		{
			$this->db->limit($limit['limit'],$limit['offset']);
		}

		if(isset($limit['limit']) && !isset($limit['offset']))
		{
			$this->db->limit($limit['limit']);
		}
		$query = $this->db->get();
		if($count==0){
			$result = $query->result_array();
		}else{
			$result = $query->num_rows();
		}
		if($result)
		{
			$query->free_result();
			return $result[0];
		}else{
			return false;
		}
	}
	public function updateData($tablename='',$data=array(),$where=array())
	{
		return $this->db->update($tablename, $data, $where);
	}
	
	function getField($tablename,$post)
	{
		$content = array();
		$result = $this->db->list_fields($tablename);
		foreach($result as $field)
		{
			$data[] = $field;
		}
		foreach ($post as $key => $value) {
			if(in_array($key, $data))
			{
				$content[$key] = $value;
			}
		}
		return $content;
	}
	public function insertData($tablename='',$data=array())
	{
		return $this->db->insert($tablename, $data);
	}
	public function where_in($colname='',$in='')
	{
		if(isset($colname) && isset($in))
		{
		 $this->db->where_in($colname ,$in);
		  return $this;
		}
	}
	public function jsonEncode($data=array())
	{
		header('Content-type:"application/json; charset=utf-8"');
		return json_encode($data);
	}
	public function deletedata($tablename='',$where=''){
		if(!empty($tablename) && !empty($where)):
			$this->db->where($where);
			$this->db->delete($tablename);
		else: return "Invalid Input Provided";
		endif;
	}
	
	public function sendMail($message='',$email='',$subject='')

	{

		$this->email->from("ankit.d100@gmail.com",'Suchetas Rum Collection');

		$this->email->to($email);

		$this->email->subject($subject);

		$this->email->message($message);

		//$this->emails->bcc("vinod.starwebindia@yahoo.com");

		if($this->email->send())

		{

			return true;

		}else{

			return false;

		}

	}


	public function getDropDowns($dropdowns=array())
	{
		foreach ($dropdowns as $key => $value) {
			$data[$value] = $this->getData($value);
		}
		return $data;
	}

    public function getCount($table,$limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);
        $result = count($query->result());
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;   
    }

    public function getNumRecord($table,$where="",$groupby="",$like="")
	{
		if(!empty($where))
		{
			$this->db->where($where);
		}
		if(!empty($like))
		{
			$this->db->like($like[0],$like[1],$like[2]);
		}
		if(!empty($groupby))
		{
			$this->db->group_by($groupby);
		}
		$query = $this->db
							->from($table)
							->get();
							
		return $query->num_rows();
	}

    public function mailer($message,$to,$subject)
    {
    	require_once(APPPATH.'/third_party/PHPMailer-master/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "starwebindia.sandeep@gmail.com";  // user email address
        $mail->Password   = "star@123"; 

		$mail->Body = $message;
		$receiver = $to;

		$mail->AddAddress($receiver, "Receiver");
        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }


	public function getMaxId($table='',$max='') {

		$query = $this->db->query("SELECT max(".$max.") as ".$max." FROM ".$table)->result_array();
		//echo $this->db->last_query();die;//SELECT max(partnerid) FROM `partner`
		if($query[0][$max]){
			$id = (int) ($query[0][$max]+1);
		}else{
			$id = 1;
		}
		return $id;
	}


	public function getMaxCountId($table='',$max='',$where=array()) {

		$this->db->select("count(".$max.") as ".$max);
		$this->db->from($table);
		if($where){
			$this->db->where($where);
		}
		$query = $this->db->get()->result_array();
		//$query = $this->db->query("SELECT max(".$max.") as ".$max." FROM ".$table)->result_array();
		//echo $this->db->last_query();die;//SELECT max(partnerid) FROM `partner`
		if($query[0][$max]){
			$id = (int) ($query[0][$max]+1);
		}else{
			$id = 1;
		}
		return $id;
	}

	public function getKeywordArray($keyword)
	{
		$commonWords = $this->config->item("commonWords");
		//$keyword = "we are specialized in,supplying&medical%items@and!ambulance vehicle and consumables also uniform and tactical items";
		$keyword = preg_replace('/\b('.implode('|',$commonWords).')\b/','',$keyword);
		$keyword = preg_replace('/[^A-Za-z0-9\-]/', '-',trim($keyword));
		$keyword = reduce_multiples($keyword,"-");
		$karray = array_unique(array_map('strtolower',explode("-", url_title($keyword))));
		return $karray;
	}


	public function getCategories()
	{
		$result = '';
		$cat = $this->getData("category",array('show'=>1));
		//print_r($cat);
		if($cat){
			$result = $this->buildTree($cat);//die;
		}
		return $result; 
	}

	function buildTree($items) {

	    $childs = array();

	    foreach($items as &$item) $childs[$item['parent']][] = &$item;
	    unset($item);

	    foreach($items as &$item) if (isset($childs[$item['c_id']]))
	            $item['childs'] = $childs[$item['c_id']];
	        // echo "<pre>";
        	// print_r($childs); die;
        	if(isset($childs[0])){
    			return $childs[0];
    		}else{
    			return false;
    		}
	}

	public function sendMessage($message='',$mobile_no='')
	{
		$encodedMessage=trim(str_replace(' ', '%20', $message));
		$file1="http://103.247.98.91/API/SendMsg.aspx?uname=User_name&pass=9E89T3wT&send=Irajweb&dest=".$mobile_no."&msg=".$encodedMessage."&priority=1";
        $fh1 = fopen($file1, 'r');
        $contents1 = fread($fh1, 1024);
        $contents1=trim($contents1);
        return TRUE;
	}


	public function sendNotification($post=array())
	{
        $to=(isset($post['Token']))?$post['Token']:"/topics/SuchetasNews";		

		$arrNot = array(

		    "body" => $post['messageText'],

		    "ProductObject" => isset($post['product'])?$post['product']:"",

		    "OfferImage" => (isset($post['OfferImage']) && $post['OfferImage']!="")?$post['OfferImage']:"",

		    "Title" => isset($post['Title'])?$post['Title']:"",

		    "ProductId" => isset($post['ProductId'])?$post['ProductId']:"-1",

		    "CategoryId" => isset($post['category'])?$post['category']:"-1",

        	"SubCategoryID" => isset($post['subcategory'])?$post['subcategory']:"-1",

		);
		$fields = array(
		    'to' => $to,
		    'data' => $arrNot,
		);

		$url = 'https://android.googleapis.com/gcm/send';

		$headers = array(
		    'Authorization: key=AIzaSyAQZnNyhMWyyvjD2cfOrzmCrJMeEiPQIhE',

		    'Content-Type: application/json'

		);

		// Open connection

		$ch = curl_init();

		// Set the url, number of POST vars, POST data

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		$res = curl_exec($ch);

		curl_close($ch);

		return $res;

	}

	public function sendNewNotification($tockenid='',$post=array())
	{
		//echo "<pre>";
		$registrationIds = array_column($tockenid, 'token_id');
		//print_r($registrationIds); die;
		
		$msg = array
		(
			'body' 	=> $post['messageText'],

			"ProductObject" => isset($post['product'])?$post['product']:"",

		    "OfferImage" => (isset($post['OfferImage']) && $post['OfferImage']!="")?$post['OfferImage']:"",

		    "Title" => isset($post['Title'])?$post['Title']:"",

		    "ProductId" => isset($post['ProductId'])?$post['ProductId']:"-1",

		);
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);
		 
		$headers = array
		(
			'Authorization: key=AIzaSyAQZnNyhMWyyvjD2cfOrzmCrJMeEiPQIhE',
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result;
	}

}