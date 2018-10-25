<?php

  function get_mobileno($mobileno)
  {
    return preg_replace("/^[^0-9]*(88)?0/", "", $mobileno);
  }

  function ascii2hex($ascii)
  {
    $hex = '';
    $len = strlen($ascii);
    for ($i = 0; $i < $len; $i++) {
      $hex .= strtoupper(dechex(ord($ascii{$i})));
    }
    return $hex;
  }

  function get_op($mobileno)
  {
    $mobileno = preg_replace("/^[^0-9]*(88)?0/", "", $mobileno);
    if (strncmp($mobileno, '11', 2) == 0) {
      $op = 'citycell';
    } else if (strncmp($mobileno, '15', 2) == 0) {
      $op = 'teletalk';
    } else if (strncmp($mobileno, '16', 2) == 0) {
      $op = 'warid';
    } else if (strncmp($mobileno, '17', 2) == 0) {
      $op = 'gp';
    } else if (strncmp($mobileno, '18', 2) == 0) {
      $op = 'aktel';
    } else if (strncmp($mobileno, '19', 2) == 0) {
      $op = 'blink';
    } else {
      return false;
    }
    return $op;
  }

  function helper_hex_encode_title_body($title, $body)
  {
    $head='0605040b8423f0';
    $data_wrap='DC0601AE02056A0045C60C03';
    $encode_url= ascii2hex($body);
    $ending_wrap = '000103' . ascii2hex($title) . '000101';
    return $head . $data_wrap . $encode_url . $ending_wrap;
  }

  function helper_hex_encode($msg)
  {
    return ascii2hex($msg);
  }

  function helper_login($op)
  {
    $conn = false;
    $ops = array(
      'gp' => array(
	  'user' => 'gpftp',
	  'pass' => 'gp96ftp',
	  'db' => '//103.4.145.96/ltechgp'
      ),
      'robi' => array(
	  'user' => 'robiusrftp',
	  'pass' => 'robi99ftp',
	  'db' => '//103.4.145.99/ltech'
      ),
        'blink' => array(
        'user' => 'blinkftp',
        'pass' => 'blink85ftp',
        'db' => '//103.4.145.85/ltechrobi2'
      ),
	'txt' => array(
	'user' => 'aktel',
	'pass' => 'aktel321',
	'db' => '//txt.inforev-ng.com/txt'
      ),
      'teletalk' => array(
	'user' => 'teleuser',
	'pass' => 'tpass',
	'db' => '//monster.inforev-ng.com/teledb'
      ),
      
      'local' => array(
    'user' => 'hr',
    'pass' => 'hr',
    'db' => 'localhost/XE'
      )  ,
    'airtel' => array(
    'user' => 'airtelftp',
    'pass' => 'airtel786',
    'db' => '103.4.145.97/LTECHAIR'
      )
);

    if (array_key_exists($op, $ops)) {
      $opinfo = $ops[$op];
      $user = $opinfo['user'];
      $pass = $opinfo['pass'];
      $db = $opinfo['db'];
      $conn = oci_connect($user, $pass, $db);
    }

    return $conn;
  }

  /* msg_type:
   * 4 = text
   * 3 = wap push
   */
  function helper_send_sms($op, $conn, $mobileno, $msg, $msg_type=4, $shortcode=2233)
  {
    $mobileno = preg_replace("/^[^0-9]*(88)?0/", "", $mobileno);
    $queries = array(
      'gp' => "insert into mt_outbox(oid,mobileno,body,msg_type,send_port) values(mtoutbox_seq.nextval,$mobileno,'$msg',$msg_type,$shortcode)",
      'aktel' => "insert into tbl_outbox(mobileno,body,send_port) values($mobileno,'$msg',$shortcode)",
      'blink' => "insert into tbl_outbox(mobileno,body,shortcode) values($mobileno,'$msg',$shortcode)",
      'teletalk' => "insert into tbl_outbox(mobileno,body,msg_type,send_port) values($mobileno,'$msg',$shortcode)"
    );
    $qry = $queries[$op];
    $stid = oci_parse($conn, $qry);
    if (!$stid) {
      echo 'Error parsing query';
      return false;
    }
    $res = oci_execute($stid); /* default mode is commit_on_success */
    oci_free_statement($stid);
    return $res;
  }

  function helper_send_text_sms($op, $conn, $mobileno, $msg, $shortcode)
  {
    return helper_send_sms($op, $conn, $mobileno, $msg, 4, $shortcode);
  }

  function helper_send_wappush_sms($op, $conn, $mobileno, $msg, $shortcode)
  {
    return helper_send_sms($op, $conn, $mobileno, $msg, 3, $shortcode);
  }

  /* ringtone type = picture type */
  function helper_send_ringtone_sms($op, $conn, $mobileno, $msg, $shortcode)
  {
    return helper_send_sms($op, $conn, $mobileno, $msg, 1, $shortcode);
  }

  /* ringtone type = picture type */
  function helper_send_picture_sms($op, $conn, $mobileno, $msg, $shortcode)
  {
    return helper_send_sms($op, $conn, $mobileno, $msg, 1, $shortcode);
  }

  function helper_build_wappush($title, $body)
  {
    return helper_hex_encode_title_body($title, $body);
  }

  function helper_exec_select_query($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid);
    $nrows = oci_fetch_all($stid, $results);
    oci_free_statement($stid);
    if ($nrows <= 0) {
      return false;
    }
    return $results;
  }

  /* returns all rows in an array */
  function helper_select_query($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid);
    if (!$res) {
      return false;
    }
    $nrows = oci_fetch_all($stid, $results);
    oci_free_statement($stid);
    if ($nrows <= 0) {
      return false;
    }
    return $results;
  }
   function helper_select_all($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid);
    if (!$res) {
      return false;
    }
    $nrows = oci_fetch_all($stid, $results);
    oci_free_statement($stid);
    if ($nrows <= 0) {
      return false;
    }
    return array($nrows,$results);
  }

  function helper_exec_update_query($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid); /* commits on success */
    //oci_commit($conn);
    oci_free_statement($stid);
    return $res;
  }

  function helper_update_query($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid); /* commits on success */
    oci_commit($conn);
    oci_free_statement($stid);
    return $res;
  }

function helper_delete_query($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid); /* commits on success */
    //oci_commit($conn);
    oci_free_statement($stid);
    return $res;
  }
function helper_insert_query($conn, $query)
  {
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid); /* commits on success */
    //oci_commit($conn);
    oci_free_statement($stid);
    return $res;
  }

function helper_error($conn,$mobileno, $msg)
  {
  	output($conn,$mobileno,$msg);
 	helper_logout($conn);
    return true;
  }

  
  function helper_logout($conn)
  {
    oci_close($conn);
//    ocilogoff($conn);
    return true;
  }
function send_alert($conn,$mobileno,$msg)
{
	$coutrycode=substr($mobileno ,0 ,2);
	$coutrycode3=substr($mobileno ,0 ,3);
 
 	$length=strlen($msg);
	
	list($trimmed_text,$trimmed_text2)=trim_text($msg, $length, $ellipses = true, $strip_html = true);

	if(!strcmp("88",$coutrycode)){
	$shortcode='28280058';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text=preg_replace("/2828/", "5636363", $trimmed_text);
	$shortcode='5636363';
	}
	if(!strcmp("233",$coutrycode3)) {
	$trimmed_text=preg_replace("/2828/", "1919", $trimmed_text);
	$shortcode='1919';
	}
	if(!strcmp("234",$coutrycode3)) {
	$trimmed_text=preg_replace("/2828/", "32047", $trimmed_text);
	$shortcode='32047';
	}


	log_outgoing($conn,$mobileno,$trimmed_text,$shortcode);		
		
	$pushquery="insert into push_txt_outbox(logid,mobileno,body, dtime,shortcode) values( push_txt_outbox_seq.NEXTVAL,$mobileno,'$trimmed_text',sysdate,$shortcode)"; 
	$post = helper_insert_query($conn, $pushquery);
	
	return true;
}

function send_alert_old($conn,$mobileno,$msg)
{
	$coutrycode=substr($mobileno ,0 ,2);
	$coutrycode3=substr($mobileno ,0 ,3);
 
 	$length=strlen($msg);
	
	list($trimmed_text,$trimmed_text2)=trim_text($msg, $length, $ellipses = true, $strip_html = true);
	//echo $trimmed_text;
	//log_outgoing($conn,$mobileno,$trimmed_text,$shortcode='28280058');
	$trimmed_text=rawurlencode($trimmed_text);
	if(!strcmp("88",$coutrycode)){
	$posturl="http://ghost.inforev-ng.com/aktelchat/sendsms.php?port=28280058&msisdn=$mobileno&msg=$trimmed_text";
	$shortcode='28280058';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text=preg_replace("/2828/", "5636363", $trimmed_text);
	$posturl="http://203.115.112.5/sendsms/?msisdn=$mobileno&msg=$trimmed_text&provider=$pass";	
	$shortcode='5636363';
	}

	
	$fd = fopen ($posturl, "r");
	//echo $posturl;
	$reponse = fread($fd, 8196);
	
	$trimmed_text=rawurldecode($trimmed_text);
       log_outgoing($conn,$mobileno,$trimmed_text,$shortcode);
	
	if(strlen($trimmed_text2) >1){	
	//echo $trimmed_text2;
	
	$trimmed_text2=rawurlencode($trimmed_text2);
	if(!strcmp("88",$coutrycode)){
	$posturl2="http://ghost.inforev-ng.com/aktelchat/sendsms.php?port=28280058&msisdn=$mobileno&msg=$trimmed_text2";
	$shortcode='28280058';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text2=preg_replace("/2828/", "5636363", $trimmed_text2);
	$posturl2="http://203.115.112.5/sendsms/?msisdn=$mobileno&msg=$trimmed_text2&provider=$pass";	
	$shortcode='5636363';
	}

	$fd = fopen ($posturl2, "r");
	//echo $posturl;
	$reponse2 = fread($fd, 8196);
	
	$trimmed_text2=rawurldecode($trimmed_text2);
	log_outgoing($conn,$mobileno,$trimmed_text2,$shortcode);
	} 
	return true;
}

function send_message_in_room($conn,$mobileno,$msg,$myregid,$r_regid,$r_mobileno)
  {
  //  $mobileno = preg_replace("/^[^0-9]*(88)?0/", "", $mobileno);
  //  $op = get_op($mobileno);
	if(!strcmp($mobileno,$r_mobileno)) {
	output($conn,$mobileno,$msg);
	} else{
	output_mt($conn,$r_mobileno,$msg);
	}
	
	$query_prev="select * from mchat_transaction where action=7 and regid_reciever=$r_regid and mobileno_reciever=$r_mobileno and status=0 order by logid desc";
	list($nrow,$res)=helper_select_all($conn, $query_prev);
		 if($res){
				 $logid = $res['LOGID'][0];
				 $update_trans_log="update mchat_transaction set status=1 where logid=$logid"; 
				 $updates_log=helper_update_query($conn,$update_trans_log);
		 }				 
			$query_trans="insert into mchat_transaction(logid,action,regid_originator,mobileno_originator,regid_reciever,mobileno_reciever,mdate,status) values(mchat_transaction_seq.NEXTVAL,7,$myregid,$mobileno,$r_regid ,$r_mobileno, sysdate,0)"; 
			$trans_msg = helper_insert_query($conn, $query_trans);		
	
    return $trans_msg;
  }

function output_mt($conn,$mobileno,$msg)
	{
	$coutrycode=substr($mobileno ,0 ,2);
	$coutrycode3=substr($mobileno ,0 ,3);		
	$pass="Inforev123Pass";  //PASS for INDIA

 	$length=strlen($msg);
	
	list($trimmed_text,$trimmed_text2)=trim_text($msg, $length, $ellipses = true, $strip_html = true);
	//echo $trimmed_text;
	
	//$trimmed_text=rawurlencode($trimmed_text);
	if(!strcmp("88",$coutrycode)){
	$shortcode='2828';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text=preg_replace("/2828/", "5636363", $trimmed_text);
	$shortcode='5636363';
	}
	if(!strcmp("233",$coutrycode3)) {
	$trimmed_text=preg_replace("/2828/", "1919", $trimmed_text);
	$shortcode='1919';
	}
	if(!strcmp("234",$coutrycode3)) {
	$trimmed_text=preg_replace("/2828/", "32047", $trimmed_text);
	$shortcode='32047';
	}

    log_outgoing($conn,$mobileno,$trimmed_text,$shortcode);
	
	$pushquery="insert into push_txt_outbox(logid,mobileno,body, dtime,shortcode) values( push_txt_outbox_seq.NEXTVAL,$mobileno,'$trimmed_text',sysdate,$shortcode)"; 
	$post = helper_insert_query($conn, $pushquery);

	return true;
	}
	
function output($conn,$mobileno,$msg)
	{
	
	$coutrycode=substr($mobileno ,0 ,2);
	$pass="Inforev123Pass";  //PASS for INDIA
	//$put_msg="insert into tbl_outbox(mobileno,body) values($mobileno,'$msg')";
	//$outbox=helper_insert_query($conn, $put_msg);
	//return $outbox;
	$length=strlen($msg);
	
	list($trimmed_text,$trimmed_text2)=trim_text($msg, $length, $ellipses = true, $strip_html = true);
		
	echo $trimmed_text;
	log_outgoing($conn,$mobileno,$trimmed_text,$shortcode='2828');
	if(strlen($trimmed_text2) >1){
	//echo $trimmed_text2	;
	$trimmed_text2=rawurlencode($trimmed_text2);
	if(!strcmp("88",$coutrycode)){
	$posturl2="http://ghost.inforev-ng.com/aktelchat/sendsms.php?port=2828&msisdn=$mobileno&msg=$trimmed_text2";
	$shortcode='2828';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text2=preg_replace("/2828/", "5636363", $trimmed_text2);
	$posturl2="http://203.115.112.5/sendsms/?msisdn=$mobileno&msg=$trimmed_text2&provider=$pass";	
	$shortcode='5636363';
	}
 
	
	$fd = fopen ($posturl2, "r");
	//echo $posturl;
	$reponse = fread($fd, 8196);
	//echo $reponse;
	
	$trimmed_text2=rawurldecode($trimmed_text2);
	log_outgoing($conn,$mobileno,$trimmed_text2,$shortcode);
	}
	return true;	
	}
function output_mt_old($conn,$mobileno,$msg)
	{
	$coutrycode=substr($mobileno ,0 ,2);	
	$pass="Inforev123Pass";  //PASS for INDIA

 	$length=strlen($msg);
	
	list($trimmed_text,$trimmed_text2)=trim_text($msg, $length, $ellipses = true, $strip_html = true);
	//echo $trimmed_text;
	
	$trimmed_text=rawurlencode($trimmed_text);
	if(!strcmp("88",$coutrycode)){
//	$posturl="http://ghost.inforev-ng.com/aktelchat/sendsms.php?port=2828&msisdn=$mobileno&msg=$trimmed_text";
	$shortcode='2828';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text=preg_replace("/2828/", "5636363", $trimmed_text);
//	$posturl="http://203.115.112.5/sendsms/?msisdn=$mobileno&msg=$trimmed_text&provider=$pass";	
	$shortcode='5636363';
	}
	if(!strcmp("23",$coutrycode)) {
	$trimmed_text=preg_replace("/2828/", "1919", $trimmed_text);
//	$posturl="http://txt.inforev-ng.com/txtghana/sendsms.php?port=1919&msisdn=$mobileno&msg=$trimmed_text";	
	$shortcode='1919';
	}
    //echo $posturl2;
	
	$fd = fopen ($posturl, "r");
	//echo $posturl;
	$reponse = fread($fd, 8196);
	$trimmed_text=rawurldecode($trimmed_text);
    log_outgoing($conn,$mobileno,$trimmed_text,$shortcode);
	$query="insert into push_txt_outbox(logid,mobileno,body, dtime,shortcode) values( push_txt_outbox_seq.NEXTVAL,$mobileno,'$msg',sysdate,$shortcode)"; 
	$post = helper_insert_query($conn, $query);
	
	if(strlen($trimmed_text2) >1){	
	//echo $trimmed_text2;
	
	$trimmed_text2=rawurlencode($trimmed_text2);
	if(!strcmp("88",$coutrycode)){
	$posturl2="http://ghost.inforev-ng.com/aktelchat/sendsms.php?port=2828&msisdn=$mobileno&msg=$trimmed_text2";
	$shortcode='2828';
	}
	if(!strcmp("91",$coutrycode)) {
	$trimmed_text2=preg_replace("/2828/", "5636363", $trimmed_text2);
	$posturl2="http://203.115.112.5/sendsms/?msisdn=$mobileno&msg=$trimmed_text2&provider=$pass";	
	$shortcode='5636363';
	}
	if(!strcmp("23",$coutrycode)) {
	$trimmed_text2=preg_replace("/2828/", "1919", $trimmed_text2);
	$posturl2="http://txt.inforev-ng.com/txtghana/sendsms.php?port=1919&msisdn=$mobileno&msg=$trimmed_text2";	
	$shortcode='1919';
	}

	
	$fd = fopen ($posturl2, "r");
	//echo $posturl;
	$reponse2 = fread($fd, 8196);
	
	$trimmed_text2=rawurldecode($trimmed_text2);
	log_outgoing($conn,$mobileno,$trimmed_text2,$shortcode);
	}
	return true;
	}	
	
function trim_text($input, $length, $ellipses = true, $strip_html = true) 
{
	//strip tags, if desired
	if ($strip_html) {
		$input = strip_tags($input);
	}
 
	//no need to trim, already shorter than trim length
	if (strlen($input) <= $length) {
		return array ($input,0);
	}
 
	//find last space within length
	$last_space = strrpos(substr($input, 0, $length), ' ');
	$trimmed_text = substr($input, 0, $last_space);
	$trimmed_text2 = substr($input, $last_space);
  echo $trimmed_text;
  echo $trimmed_text2;
	//add ellipses (...)
	if ($ellipses) {
		$trimmed_text .= '...';
	}
 
	return array ($trimmed_text,$trimmed_text2);
}

function post_outbox($conn,$mobileno,$msg)
{
 	$coutrycode=substr($mobileno ,0 ,2);
	 

	$query="insert into tbl_outbox1919(oid,mobileno,body,shortcode,insertdate) values('',$mobileno,'$msg',1919,sysdate)"; 
	$post = helper_insert_query($conn, $query);

      //log_outgoing($conn,$mobileno,$msg,1919);

	return true;
}

  function helper_send_one_text_sms_simple($mobileno, $body, $shortcode=2233)
  {
    $mobileno = preg_replace("/^[^0-9]*(88)?0/", "", $mobileno);
    $op = get_op($mobileno);
    if (!$op) {
      return false;
    }
    $conn = helper_login($op);
    if (!$conn) {
      echo 'Error connecting to database';
      return false;
    }
    $ret = helper_send_text_sms($op, $conn, $mobileno, $body, $shortcode);
    helper_logout($conn);
    return $ret;
  }

  function helper_send_invite($op, $mobileno)
  {
    $conn = helper_login($op);
    if (!$conn) {
      echo 'Error connecting to database';
      return false;
    }
    $ret = helper_send_text_sms($op, $conn, $mobileno, $msg, $shortcode);
    helper_logout($conn);
    return $ret;
  }
  
 function log_incoming($conn,$mobileno,$msg,$shortcode)
	{
	$put_msg="insert into txt_inbox(logid,mobileno,body,shortcode,dtime) values(mchat_login_seq.NEXTVAL,$mobileno,'$msg',$shortcode,sysdate)";
	$outbox=helper_insert_query($conn, $put_msg);
	return $outbox;	
	}	
 function log_outgoing($conn,$mobileno,$msg,$shortcode)
	{
	$put_msg="insert into txt_outbox(logid,mobileno,body,shortcode,dtime) values(mchat_logout_seq.NEXTVAL,$mobileno,'$msg',$shortcode,sysdate)";
	$outbox=helper_insert_query($conn, $put_msg);
	return $outbox;	
	}	
	
  function helper_send_one_wappush_sms_simple($mobileno, $body, $title, $shortcode=2233)
  {
    if ($title == '') {
      $title = "Fetch the URL";
    }
    $body = helper_build_wappush("$title", "$body");
    $mobileno = preg_replace("/^[^0-9]*(88)?0/", "", $mobileno);
    $op = get_op($mobileno);
    if (!$op) {
      return false;
    }
    $conn = helper_login($op);
    if (!$conn) {
      echo 'Error connecting to database';
      return false;
    }
    $ret = helper_send_wappush_sms($op, $conn, $mobileno, $body, $shortcode);
    helper_logout($conn);
    return $ret;
  }

  function helper_send_one_wappush_sms($op, $mobileno, $msg, $shortcode=2233)
  {
    $conn = helper_login($op);
    if (!$conn) {
      echo 'Error connecting to database';
      return false;
    }
    $ret = helper_send_wappush_sms($op, $conn, $mobileno, $msg, $shortcode);
    helper_logout($conn);
    return $ret;
  }

  function helper_send_one_picture_sms($op, $mobileno, $msg, $shortcode=2233)
  {
    $conn = helper_login($op);
    if (!$conn) {
      echo 'Error connecting to database';
      return false;
    }
    $ret = helper_send_picture_sms($op, $conn, $mobileno, $msg, $shortcode);
    helper_logout($conn);
    return $ret;
  }

  function helper_send_one_ringtone_sms($op, $mobileno, $msg, $shortcode=2233)
  {
    $conn = helper_login($op);
    if (!$conn) {
      echo 'Error connecting to database';
      return false;
    }
    $ret = helper_send_ringtone_sms($op, $conn, $mobileno, $msg, $shortcode);
    helper_logout($conn);
    return $ret;
  }
function transencoderus ($s) {
  $trans_tbl = array(
  'À'=>'&#x410;','Á'=>'&#x411;','Â'=>'&#x412;','Ã'=>'&#x413;','Ä'=>'&#x414;',
  'Å'=>'&#x415;','Æ'=>'&#x416;','Ç'=>'&#x417;','È'=>'&#x418;','É'=>'&#x419;',
  'Ê'=>'&#x41A;','Ë'=>'&#x41B;','Ì'=>'&#x41C;','Í'=>'&#x41D;','Î'=>'&#x41E;',
  'Ï'=>'&#x41F;','Ð'=>'&#x420;','Ñ'=>'&#x421;','Ò'=>'&#x422;','Ó'=>'&#x423;',
  'Ô'=>'&#x424;','Õ'=>'&#x425;','Ö'=>'&#x426;','×'=>'&#x427;','Ø'=>'&#x428;',
  'Ù'=>'&#x429;','Ú'=>'&#x42A;','Û'=>'&#x42B;','Ü'=>'&#x42C;','Ý'=>'&#x42D;',
  'Þ'=>'&#x42E;','ß'=>'&#x42F;','à'=>'&#x430;','á'=>'&#x431;','â'=>'&#x432;',
  'ã'=>'&#x433;','ä'=>'&#x434;','å'=>'&#x435;','æ'=>'&#x436;','ç'=>'&#x437;',
  'è'=>'&#x438;','é'=>'&#x439;','ê'=>'&#x43A;','ë'=>'&#x43B;','ì'=>'&#x43C;',
  'í'=>'&#x43D;','î'=>'&#x43E;','ï'=>'&#x43F;','ð'=>'&#x440;','ñ'=>'&#x441;',
  'ò'=>'&#x442;','ó'=>'&#x443;','ô'=>'&#x444;','õ'=>'&#x445;','ö'=>'&#x446;',
  '÷'=>'&#x447;','ø'=>'&#x448;','ù'=>'&#x449;','ú'=>'&#x44A;','û'=>'&#x44B;',
  'ü'=>'&#x44C;','ý'=>'&#x44D;','þ'=>'&#x44E;','ÿ'=>'&#x44F;','¨'=>'&#x401;', ' '=>' ',
  '¸'=>'&#x451;');
  $s = strtr ($s, $trans_tbl);
  return $s;
}

function transdecoderus ($s) {
  $trans_tbl = array(
  '&#x410;'=>'À','&#x411;'=>'Á','&#x412;'=>'Â','&#x413;'=>'Ã','&#x414;'=>'Ä',
  '&#x415;'=>'Å','&#x416;'=>'Æ','&#x417;'=>'Ç','&#x418;'=>'È','&#x419;'=>'É',
  '&#x41A;'=>'Ê','&#x41B;'=>'Ë','&#x41C;'=>'Ì','&#x41D;'=>'Í','&#x41E;'=>'Î',
  '&#x41F;'=>'Ï','&#x420;'=>'Ð','&#x421;'=>'Ñ','&#x422;'=>'Ò','&#x423;'=>'Ó',
  '&#x424;'=>'Ô','&#x425;'=>'Õ','&#x426;'=>'Ö','&#x427;'=>'×','&#x428;'=>'Ø',
  '&#x429;'=>'Ù','&#x42A;'=>'Ú','&#x42B;'=>'Û','&#x42C;'=>'Ü','&#x42D;'=>'Ý',
  '&#x42E;'=>'Þ','&#x42F;'=>'ß','&#x430;'=>'à','&#x431;'=>'á','&#x432;'=>'â',
  '&#x433;'=>'ã','&#x434;'=>'ä','&#x435;'=>'å','&#x436;'=>'æ','&#x437;'=>'ç',

  '&#x438;'=>'è','&#x439;'=>'é','&#x43A;'=>'ê','&#x43B;'=>'ë','&#x43C;'=>'ì',
  '&#x43D;'=>'í','&#x43E;'=>'î','&#x43F;'=>'ï','&#x440;'=>'ð','&#x441;'=>'ñ',
  '&#x442;'=>'ò','&#x443;'=>'ó','&#x444;'=>'ô','&#x445;'=>'õ','&#x446;'=>'ö',
  '&#x447;'=>'÷','&#x448;'=>'ø','&#x449;'=>'ù','&#x44A;'=>'ú','&#x44B;'=>'û',
  '&#x44C;'=>'ü','&#x44D;'=>'ý','&#x44E;'=>'þ','&#x44F;'=>'ÿ','&#x401;'=>'¨',
  '&#x451;'=>'¸');
  $s = strtr ($s, $trans_tbl);
  return $s;
}

?>
