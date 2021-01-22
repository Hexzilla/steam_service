<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swagger extends MY_Controller {
	
	// Output Swagger JSON
	public function index()
	{
		// folders which include files with Swagger annotations
		$module_dir = APPPATH.'modules/'.$this->mModule;
		$paths = array(
			$module_dir.'/swagger',
			$module_dir.'/controllers',
		);
		$swagger = \Swagger\scan($paths);

		// output JSON
		header('Content-Type: application/json');		
		echo $swagger;
	}
	public function getIsValidateInvoiceOld()
	{
		$ipaddress=isset($_POST['ipaddress'])?$_POST['ipaddress']:"";
		$deviceid=isset($_POST['deviceid'])?$_POST['deviceid']:"";
		$invoice=isset($_POST['invoice'])?$_POST['invoice']:"";
		$status=true;
		$error="ok";
		if($invoice==''){
			$status=false;
			$error="invalid_invoice";
		}else{
			$account_rows=$this->users->execute_query("SELECT a.id,a.gameid,a.created_date,COALESCE(cnt,0) cnt,c.name FROM steam_account a left join (select count(*) cnt,account from steam_assign group by account) b on a.id=b.account join steam_games c on a.gameid=c.id order by a.created_date");
			$invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.account account_login,c.password account_password,c.code_gmail,c.code_password,c.system32id,c.appid,c.dbdata,c.created_date account_created_date,d.name gamename from steam_assign a join steam_invoice b on a.invoice=b.id join steam_account c on a.account=c.id join steam_games d on c.gameid=d.id where b.number='{$invoice}'");
			//where b.number='{$invoice' //8XB06H2K69MWG3Z//9C87B94B
			if(count($invoice_rows)){
				if($deviceid==""||($invoice_rows[0]['deviceid']!=''&&$invoice_rows[0]['deviceid']!=$deviceid)){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$row=array(
						'id'=>$invoice_rows[0]['invoice'],
						'ipaddress'=>$ipaddress,
						'deviceid'=>$deviceid
					);
					$this->users->execute_update('steam_invoice','id',$row);	


					for($i=0;$i<count($account_rows);$i++){
						for($j=0;$j<count($invoice_rows);$j++)
						if($account_rows[$i]['id']==$invoice_rows[$j]['account']){
							$account_rows[$i]['kindly_name']=$invoice_rows[$j]['name'];
							$account_rows[$i]['login']=$invoice_rows[$j]['account_login'];
							$account_rows[$i]['password']=$invoice_rows[$j]['account_password'];
							$account_rows[$i]['code_gmail']=$invoice_rows[$j]['code_gmail'];
							$account_rows[$i]['code_password']=$invoice_rows[$j]['code_password'];
							$account_rows[$i]['system32id']=$invoice_rows[$j]['system32id'];
							$account_rows[$i]['appid']=$invoice_rows[$j]['appid'];
							$account_rows[$i]['dbdata']=$invoice_rows[$j]['dbdata'];
							break;
						}
					}

					$games=array();$games_cnt=0;$games_hash=array();
					for($i=0;$i<count($account_rows);$i++){
						if(!isset($games_hash[$account_rows[$i]['gameid']])){
							$games_hash[$account_rows[$i]['gameid']]=1;
							$games[$games_cnt++]=$account_rows[$i];
						}else{
							if(isset($account_rows[$i]['login'])){
								for($j=0;$j<$games_cnt;$j++){
									if($games[$j]['gameid']==$account_rows[$i]['gameid']){
											//$games[$j]=null;
											$games[$j]=$account_rows[$i];
											break;
										}
								}
							}
						}
					}
				}
				if($invoice_rows[0]['ipaddress']!=''&&$invoice_rows[0]['ipaddress']!=$ipaddress){
				//	$status=false;
				//	$error="invalid_ipaddress";
				}
			}else{
				$status=false;
				$error="invalid_invoice";
			}
		}
		header('Content-Type: application/json');		
		$res = array(
			'status'=>$status,
			'error_message'=>$error,
			'deviceid'=>$deviceid,
			'ipaddress'=>$ipaddress,
			'invoice'=>$invoice,
		);
		if($status){
			$res['account_list']=$games;
		}
		echo json_encode($res);
	}
	public function getIsValidateInvoice()
	{
		$ipaddress=isset($_POST['ipaddress'])?$_POST['ipaddress']:"";
		$deviceid=isset($_POST['deviceid'])?$_POST['deviceid']:"";
		$invoice=isset($_POST['invoice'])?$_POST['invoice']:"";
		$status=false;
		$error="ok";
		$games=array();
		if($invoice==''){
			$status=false;
			$error="invalid_invoice";
		}else{
			$account_rows=$this->users->execute_query("SELECT a.id,a.gameid,a.created_date,COALESCE(cnt,0) cnt,c.name FROM steam_account a left join (select count(*) cnt,account from steam_assign group by account) b on a.id=b.account join steam_games c on a.gameid=c.id order by a.created_date");
			$invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.account account_login,c.password account_password,c.code_gmail,c.code_password,c.system32id,c.appid,c.dbdata,c.created_date account_created_date,d.name gamename from steam_assign a join steam_invoice b on a.invoice=b.id join steam_account c on a.account=c.id join steam_games d on c.gameid=d.id where a.type=0 and b.number='{$invoice}'");
			//where b.number='{$invoice' //8XB06H2K69MWG3Z//9C87B94B
			if(count($invoice_rows)){
				if($deviceid==""||($invoice_rows[0]['deviceid']!=''&&$invoice_rows[0]['deviceid']!=$deviceid)){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$status=true;
					$row=array(
						'id'=>$invoice_rows[0]['invoice'],
						'ipaddress'=>$ipaddress,
						'deviceid'=>$deviceid
					);
					$this->users->execute_update('steam_invoice','id',$row);	


					for($i=0;$i<count($account_rows);$i++){
						for($j=0;$j<count($invoice_rows);$j++)
						if($account_rows[$i]['id']==$invoice_rows[$j]['account']){
							$account_rows[$i]['kindly_name']=$invoice_rows[$j]['name'];
							$account_rows[$i]['login']=$invoice_rows[$j]['account_login'];
							$account_rows[$i]['password']=$invoice_rows[$j]['account_password'];
							$account_rows[$i]['code_gmail']=$invoice_rows[$j]['code_gmail'];
							$account_rows[$i]['code_password']=$invoice_rows[$j]['code_password'];
							$account_rows[$i]['system32id']=$invoice_rows[$j]['system32id'];
							$account_rows[$i]['appid']=$invoice_rows[$j]['appid'];
							$account_rows[$i]['dbdata']=$invoice_rows[$j]['dbdata'];
							break;
						}
					}

					
				}
				if($invoice_rows[0]['ipaddress']!=''&&$invoice_rows[0]['ipaddress']!=$ipaddress){
				//	$status=false;
				//	$error="invalid_ipaddress";
				}
			}else{
				
			}
			$games_cnt=0;$games_hash=array();
			for($i=0;$i<count($account_rows);$i++){
				if(!isset($games_hash[$account_rows[$i]['gameid']])){
					$games_hash[$account_rows[$i]['gameid']]=1;
					$games[$games_cnt++]=$account_rows[$i];
				}else{
					if(isset($account_rows[$i]['login'])){
						for($j=0;$j<$games_cnt;$j++){
							if($games[$j]['gameid']==$account_rows[$i]['gameid']){
									//$games[$j]=null;
									$games[$j]=$account_rows[$i];
									break;
								}
						}
					}
				}
			}

            $ms_all_rows=$this->users->execute_query("select id,name account_name,gmail account_gmail,password account_password from ms_account");
            for($i=0;$i<count($ms_all_rows);$i++)$ms_all_rows[$i]['number']='';
			$ms_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.gmail account_gmail,c.password account_password,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join ms_account c on a.account=c.id where a.type=1 and b.number='{$invoice}'");
			if(count($ms_rows)){
				if($deviceid==""||($ms_rows[0]['deviceid']!=''&&$ms_rows[0]['deviceid']!=$deviceid)){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$status=true;
					$row=array(
						'id'=>$ms_rows[0]['invoice'],
						'ipaddress'=>$ipaddress,
						'deviceid'=>$deviceid
					);
					$this->users->execute_update('steam_invoice','id',$row);	
				}
				foreach($ms_rows as $row){
				    for($i=0;$i<count($ms_all_rows);$i++){
    				    if($row['account']==$ms_all_rows[$i]['id']){
    				        $ms_all_rows[$i]=$row;
    				        break;
    				    }       
    				}
				}
			}
			
			$epic_all_rows=$this->users->execute_query("select id,name account_name,gmail account_gmail,password account_password from epic_account");
            for($i=0;$i<count($epic_all_rows);$i++)$epic_all_rows[$i]['number']='';
			$epic_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.gmail account_gmail,c.password account_password,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join epic_account c on a.account=c.id where a.type=2 and b.number='{$invoice}'");
			if(count($epic_rows)){
				if($deviceid==""||($epic_rows[0]['deviceid']!=''&&$epic_rows[0]['deviceid']!=$deviceid)){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$status=true;
					$row=array(
						'id'=>$epic_rows[0]['invoice'],
						'ipaddress'=>$ipaddress,
						'deviceid'=>$deviceid
					);
					$this->users->execute_update('steam_invoice','id',$row);	
				}
				
				foreach($epic_rows as $row){
				    for($i=0;$i<count($epic_all_rows);$i++){
    				    if($row['account']==$epic_all_rows[$i]['id']){
    				        $epic_all_rows[$i]=$row;
    				        break;
    				    }       
    				}
				}
			}
			
			$play_all_rows=$this->users->execute_query("select id,name account_name,gmail account_gmail,password account_password from play_account");
            for($i=0;$i<count($play_all_rows);$i++)$play_all_rows[$i]['number']='';
			$play_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.gmail account_gmail,c.password account_password,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join play_account c on a.account=c.id where a.type=3 and b.number='{$invoice}'");
			if(count($play_rows)){
				if($deviceid==""||($play_rows[0]['deviceid']!=''&&$play_rows[0]['deviceid']!=$deviceid)){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$status=true;
					$row=array(
						'id'=>$play_rows[0]['invoice'],
						'ipaddress'=>$ipaddress,
						'deviceid'=>$deviceid
					);
					$this->users->execute_update('steam_invoice','id',$row);	
				}
				
				foreach($play_rows as $row){
				    for($i=0;$i<count($play_all_rows);$i++){
    				    if($row['account']==$play_all_rows[$i]['id']){
    				        $play_all_rows[$i]=$row;
    				        break;
    				    }       
    				}
				}
			}
			
			$origin_all_rows=$this->users->execute_query("select id,name account_name,gmail account_gmail,password account_password from origin_account");
            for($i=0;$i<count($origin_all_rows);$i++)$origin_all_rows[$i]['number']='';
			$origin_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.gmail account_gmail,c.password account_password,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join origin_account c on a.account=c.id where a.type=4 and b.number='{$invoice}'");
			if(count($origin_rows)){
				if($deviceid==""||($origin_rows[0]['deviceid']!=''&&$origin_rows[0]['deviceid']!=$deviceid)){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$status=true;
					$row=array(
						'id'=>$origin_rows[0]['invoice'],
						'ipaddress'=>$ipaddress,
						'deviceid'=>$deviceid
					);
					$this->users->execute_update('steam_invoice','id',$row);	
				}
				
				foreach($origin_rows as $row){
				    for($i=0;$i<count($origin_all_rows);$i++){
    				    if($row['account']==$origin_all_rows[$i]['id']){
    				        $origin_all_rows[$i]=$row;
    				        break;
    				    }       
    				}
				}
			}
		}
		header('Content-Type: application/json');		
		$res = array(
			'status'=>$status,
			'error_message'=>$error,
			'deviceid'=>$deviceid,
			'ipaddress'=>$ipaddress,
			'invoice'=>$invoice,
		);
		$res['account_list']=$games;
		$res['ms_account_list']=$ms_all_rows;
		$res['epic_account_list']=$epic_all_rows;
		$res['play_account_list']=$play_all_rows;
		$res['origin_account_list']=$origin_all_rows;
		echo json_encode($res);
	}
	public function getVerifyCode(){
		$ipaddress=isset($_POST['ipaddress'])?$_POST['ipaddress']:"";
		$deviceid=isset($_POST['deviceid'])?$_POST['deviceid']:"";
		$invoice=isset($_POST['invoice'])?$_POST['invoice']:"";
		$status=true;
		$error="ok";
		$code="";
		if($invoice==''){
			$status=false;
			$error="invalid_invoice";
		}else{
			$invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.account account_login,c.password account_password,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join steam_account c on a.account=c.id where a.type=0 and b.number='{$invoice}'");
			if(!count($invoice_rows)){
				$invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join ms_account c on a.account=c.id where a.type=1 and b.number='{$invoice}'");
				if(!count($invoice_rows)){
				    $invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join epic_account c on a.account=c.id where a.type=2 and b.number='{$invoice}'");
				    if(!count($invoice_rows)){
    				    $invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join play_account c on a.account=c.id where a.type=3 and b.number='{$invoice}'");
    				    if(!count($invoice_rows)){
        				    $invoice_rows=$this->users->execute_query("select a.*,b.name,b.number,b.ipaddress,b.deviceid,c.name account_name,c.created_date account_created_date from steam_assign a join steam_invoice b on a.invoice=b.id join origin_account c on a.account=c.id where a.type=4 and b.number='{$invoice}'");
        				}
    				}
				}
			}
			if(count($invoice_rows)){
				if($invoice_rows[0]['deviceid']!=$deviceid){
					$status=false;
					$error="invalid_deviceid";
				}else{
					$username = 'pes.share.easy.install@gmail.com';
					$password = 'Cp$FYWp&#C9zjnwb';
					$code=$this->getCode($username,$password);
				}
			}else{
				$status=false;
				$error="invalid_invoice";
			}
		}

		header('Content-Type: application/json');		
		$res = array(
			'status'=>$status,
			'error_message'=>$error,
			'code'=>$code,
			'deviceid'=>$deviceid,
			'ipaddress'=>$ipaddress,
			'invoice'=>$invoice,
		);
		echo json_encode($res);
	}

	private function getCode($username="",$password=""){
		$code="";
		$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
		$inbox = imap_open($hostname,$username ,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
		$emails = imap_search($inbox,'FROM "Steam Support" SUBJECT "Your Steam account:"');
		if($emails) {
		    rsort($emails);
		    foreach($emails as $id) {
		        $overview = imap_fetch_overview($inbox,$id);
		        $str= quoted_printable_encode(imap_body($inbox, $id));
		        //echo  "{$id}>{$overview[0]->message_id}>from:({$overview[0]->from}),subject:({$overview[0]->subject})<br>";
				$key="Here is the Steam Guard code you need to login to account alligatordelta:";// QHX83";
				$str=str_replace("This","",explode(" ",str_replace($key,"",substr($str,strpos($str,$key))))[0]);
				$code=$str;
				break;
		    }
		} 
		imap_close($inbox);	
		return $code;	
	}
}
