<?php



//require_once('../../../../../../wp-load.php');



//require_once('../../../amazon_api/SimpleEmailService.php');







//$app_details = $wpdb->get_results("SELECT * FROM $masta_settings");







//print_r($app_details);



//die();











 //global $wpdb;



//$masta_campaign = $wpdb->prefix . "masta_campaign";



// $send_campaign_id = $_GET["send_id"];



//$masta_settings = $wpdb->prefix."masta_settings";



//$masta_subscribers = $wpdb->prefix . "masta_subscribers";



 ///$masta_report = $wpdb->prefix . "masta_reports";



 



//echo $send_campaign_id;exit;



//$rows_data = $wpdb->get_results( "SELECT * FROM $masta_campaign WHERE camp_id = $send_campaign_id");







//$extract_data = $rows_data[0];



//$listid = $extract_data->to_list;







//save_job_responder_function();



	function save_job_responder_function(){



		



		global $wpdb;



		$app_details = $wpdb->get_results("SELECT * FROM $masta_settings");



		$rows_data = $app_details[0];



	



		$ses = new SimpleEmailService($rows_data->accesskey, $rows_data->secretkey);		



		$masta_responder = $wpdb->prefix . "masta_responder";



		// $send_campaign_id = $_GET["send_id"];



		$masta_settings = $wpdb->prefix."masta_settings";



		$masta_subscribers = $wpdb->prefix . "masta_subscribers";



		$masta_responder_reports = $wpdb->prefix . "masta_responder_reports";



		



		



		$responderdatas = $wpdb->get_results("SELECT *



		FROM $masta_responder



		WHERE responder_type =1



		and status=5



		");



		







		foreach($responderdatas as $responderdata) {



		



	







			$responderidq=$responderdata->responder_id;



			



			mail_send_responder($responderidq);



			



			



			



			//$update_data  = array('status'=> 1);



			//$where_array = array('camp_id' => $campidq);



			//rows_affected_one = $wpdb->update($masta_responder,$update_data,$where_array);







	}







}



function mail_send_responder($responder_id_top)



	{

		

		

global $wpdb;



$masta_responder = $wpdb->prefix . "masta_responder";



		// $send_campaign_id = $_GET["send_id"];



		$masta_settings = $wpdb->prefix."masta_settings";



		$masta_subscribers = $wpdb->prefix . "masta_subscribers";



		$masta_responder_reports = $wpdb->prefix . "masta_responder_reports";

		



	



		$masta_responder = $wpdb->prefix . "masta_responder";



		$masta_settings = $wpdb->prefix."masta_settings";



		$masta_subscribers = $wpdb->prefix . "masta_subscribers";



		$masta_responder_reports = $wpdb->prefix . "masta_responder_reports";



	 



	$listdata = $wpdb->get_results("SELECT wms.id sub_id,wms.sub_ip sub_ip,wms.status sub_status, wms.email sub_email, wmr.responder_id res_id, wmr.status res_status, wmr.to_list res_list



	FROM $masta_subscribers wms



	LEFT JOIN $masta_responder wmr ON ( wms.list_id = wmr.to_list )



	WHERE wmr.responder_id =$responder_id_top



");











	//print_r($listdata);



	$sub_count = count($listdata);



	if($sub_count > 0) {



		$inde=0;



	  foreach($listdata as $subdata) :







		$subscriber_id = $subdata->sub_id;



		$status = '2';



		$sub_status = $subdata->sub_status;



		$sub_email = $subdata->sub_email;



		$sub_ip = $subdata->sub_ip;



		$send_responder_id=$subdata->res_id;



		$listid=$subdata->res_list;



		



		$details = json_decode(file_get_contents("http://ipinfo.io/{$sub_ip}"));



        if(!empty($details->country)){



			$country_code = $details->country;



		



		} else {



		    $country_code = "IN";	



		}



		



		$country_name = mmasta_country_code_to_country($country_code);



		



		



		$checkresponnders=$wpdb->get_results("select count(*) cou, id from $masta_responder_reports where responder_id=$send_responder_id and subscriber_id=$subscriber_id and list_id=$listid");



		



//		if($checkresponnders[0]->cou =='0'){



			$insert_data  = array('responder_id' => $send_responder_id,'list_id'=>$listid,'subscriber_id'=>$subscriber_id,'status' => '2','request_id'=>'','message_id'=>'','sub_status'=>$sub_status,'subscriber_email'=>$sub_email,'country_code'=>$country_name);



			$rows_affected_one = $wpdb->insert($masta_responder_reports, $insert_data);



			$las_id[$inde]=$wpdb->insert_id;



//		}



//		else{



	



//			$where_arrays=array('id' => $checkresponnders[0]->id);



//			$insert_data  = array('responder_id' => $send_responder_id, 'list_id'=>$listid,'subscriber_id'=>$subscriber_id,'opened'=>'0','clicked'=>'0','bounce'=>'0','status' => '2','request_id'=>'','message_id'=>'','sub_status'=>$sub_status,'subscriber_email'=>$sub_email,'country_code'=>$country_name);



//			$rows_affected_one = $wpdb->update($masta_responder_reports, $insert_data, $where_arrays);



//			$las_id[$inde]=$checkresponnders[0]->id;



		



//		}



		



		



		



		



	  $inde++;



		endforeach;	



	//send sheduled email







	   $new_counter=0;



	   $limit=1;



	   



	   $inde=0;







	  foreach($listdata as $subdata) :



		$subscriber_id = $subdata->sub_id;



		$status = '2';



		$sub_status = $subdata->sub_status;



		$sub_email = $subdata->sub_email;



		$send_responder_id=$subdata->res_id;



		$list_id=$subdata->res_list;



	  



	  //echo $list_id 











		$app_details = $wpdb->get_results("SELECT * FROM $masta_settings");



		$rows_data = $app_details[0];



		$api_send_type = $rows_data->send_type;



		



		$ses = new SimpleEmailService($rows_data->accesskey, $rows_data->secretkey);



		



		



		//$sql = "SELECT * FROM $mail_reports where camp_id = $camp_id and list_id = $list_id order by id asc limit $new_counter,$limit";



		$las_id_val=$las_id[$inde];







		



		$listdata_2 = $wpdb->get_results("SELECT * FROM $masta_responder_reports where id = $las_id_val");



	 



		$inde++;



	 



		if(count($listdata_2) > 0) {



			



			



		



		



			$row_data =  $listdata_2[0];



			$sent_date = date("Y-m-d H:i:s");



			$req_id = '';



			$msg_id = '';



			$status = $row_data->status;



			$sub_status = $row_data->sub_status;



			$sub_email = $row_data->subscriber_email;



			$subscriber_id = $row_data->subscriber_id;



			$report_id = $row_data->id;



			$datess=$row_data->sent_date; 



				//echo $report_id."<br>";



		



		



			if($status == 2 && $sub_status == 1){



					



				



			$rs_data = $wpdb->get_results( "SELECT * FROM $masta_responder WHERE responder_id = $send_responder_id ");



		$responder_data = $rs_data[0];	



		$open_url = home_url().'?openid2='.urlencode(mmasta_encrypt($report_id))."oressss".$datess;



		$encrypt_url = home_url().'?uid='.urlencode(mmasta_encrypt($subscriber_id));



		



		$reportides=urlencode(mmasta_encrypt($report_id));



		



		$arrr = array("respid=mailmastadata" => "respid=".$reportides);



		$contentbody=strtr($responder_data->resp_mail,$arrr);



		



		$arrr = array("[unsubscribe]" => '<a href="'.$encrypt_url.'">', "[/unsubscribe]" => '</a>');



	



		$contentbody=strtr($contentbody,$arrr);



		



		$wp_maillist=$wpdb->prefix.'masta_list';



		$wp_mailsubs=$wpdb->prefix.'masta_subscribers';



		



		



		$list_id_o=$wpdb->get_results( "SELECT * FROM $wp_maillist WHERE  list_id = $list_id");



		$subscriber_id_o=$wpdb->get_results( "SELECT * FROM  $wp_mailsubs WHERE  id = $subscriber_id");



	



		$da=(array)json_decode($list_id_o[0]->edit_form);



		$ed=(array)json_decode($subscriber_id_o[0]->subscriber_data);



	



		$da_keys=array_keys($da);



		$ed_keys=array_values($ed);



		

		//remove placeholder  [email]

				$value_by_r=$subscriber_id_o[0]->email;

				$value_to_r='[email]';

				$arrv=array($value_to_r=>$value_by_r);

				$contentbody=strtr($contentbody,$arrv);

				//end placeholder [email]

	



		



		foreach($da_keys as $key=>$values)



		{



			$value_to_r='['.$values.']';



			$arrv=array($value_to_r=>$ed_keys[$key]);	



			$contentbody=strtr($contentbody,$arrv);



		}



	



	



		



		//echo $contentbody;



		//die();



		$checkstr='<a href="'.$encrypt_url.'">';



		if (strpos($contentbody,$checkstr) !== false)



		{



			$link_msg = $contentbody.'<br><img src="'.$open_url.'" height="1" width="1">';



			$plainTextBody = $contentbody.'<br><img src="'.$open_url.'" height="1" width="1">';



		}



		else{



			$link_msg = $contentbody.'<br><a href="'.$encrypt_url.'">Click here to unsubscribe</a><br><img src="'.$open_url.'" height="1" width="1">';



			$plainTextBody = $contentbody.'<br><a href="'.$encrypt_url.'">Click here to unsubscribe</a><br><img src="'.$open_url.'" height="1" width="1">';



		}



		



	



			if($api_send_type == 2) {



			



			   $msg_body_header = '<html><body>';	



			   $msg_body_footer = '</body></html>';



			   $headers  = 'MIME-Version: 1.0' . "\r\n";



			   $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";



			   $headers .= 'From: '.ucfirst($responder_data->from_name).' <'.$responder_data->from_email.'>' . "\r\n";



			   $send_subject = $responder_data->responder_name;



			}



			



			if($api_send_type == '1') {



					



				



					//array_push($mail_array,$emails->email);



					$m = new SimpleEmailServiceMessage();



					$m->addTo($sub_email);



					$m->setFrom($responder_data->from_email);



					$m->setSubject($responder_data->responder_name);



					$m->setMessageFromString($plainTextBody,$link_msg); 



					$rt =  $ses->sendEmail($m);



					if(!empty($rt['MessageId'])){



					  $msg_id = $rt['MessageId']; 	



					}



					



					if(!empty($rt['RequestId'])){



					  $req_id = $rt['RequestId']; 	



					}



				}	else {



					



						$send_message = $msg_body_header.$plainTextBody.$msg_body_footer;



						mail($sub_email, $send_subject, $send_message, $headers);



					}



				



			



			$where_array = array('id' => $report_id);



			$update_data  = array('status'=>1,'request_id'=>$req_id,'message_id'=>$msg_id,'sent_date'=>$sent_date);



			



			$rows_affected_one = $wpdb->update($masta_responder_reports	,$update_data,$where_array);



			$error = $wpdb->print_error();



			$insert_id = '212';



			



			} 



			//$insert_id = $wpdb->insert_id;



			if(!empty($insert_id)) {



			  //echo 'the last insert id is '.$insert_id;exit;	



			} else {



				



			 // echo '';exit;	



		}  



		 



	  } else {



	   // echo '';exit;	  



	  } 



		$new_counter++;



		



	  endforeach;	



	}



}


