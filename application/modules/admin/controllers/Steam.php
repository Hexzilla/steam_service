<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Steam extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->load->model('users_model', 'users');
	}

	public function games()
	{
		$this->mPageTitle = 'Steam Games';
		$this->render('steam/games', 'default');
	}
	public function account()
	{
		$this->mPageTitle = 'Steam Acounts';
		$this->mViewData['gamesList']=$this->users->execute_query("select * from steam_games");
		$this->render('steam/account', 'default');
	}
	public function msaccount()
	{
		$this->mPageTitle = 'MS Acounts';
		$this->mViewData['gamesList']=$this->users->execute_query("select * from ms_games");
		$this->render('steam/msaccount', 'default');
	}
	public function epicaccount()
	{
		$this->mPageTitle = 'EPIC Acounts';
		$this->render('steam/epicaccount', 'default');
	}
	public function msgames()
	{
		$this->mPageTitle = 'MS Games';
		$this->render('steam/msgames', 'default');
	}
	public function playgames()
	{
		$this->mPageTitle = 'Play Games';
		$this->render('steam/playgames', 'default');
	}
	public function origingames()
	{
		$this->mPageTitle = 'Origin Games';
		$this->render('steam/origingames', 'default');
	}
	public function playaccount()
	{
		$this->mPageTitle = 'UPlay Acounts';
		$this->mViewData['gamesList']=$this->users->execute_query("select * from play_games");
		$this->render('steam/playaccount', 'default');
	}
	public function originaccount()
	{
		$this->mPageTitle = 'Origin Acounts';
		$this->render('steam/originaccount', 'default');
	}
	public function assign()
	{
		$this->mViewData['accountList']=$this->users->execute_query("select * from steam_account");
		$this->mViewData['msaccountList']=$this->users->execute_query("select * from ms_account");
		$this->mViewData['epicaccountList']=$this->users->execute_query("select * from epic_account");
		$this->mViewData['playaccountList']=$this->users->execute_query("select * from play_account");
		$this->mViewData['originaccountList']=$this->users->execute_query("select * from origin_account");
		$this->mPageTitle = 'User Database';
		$this->render('steam/assign', 'default');
	}

	public function GetGamesList(){
		$rows=$this->users->execute_query("SELECT a.*,COALESCE(cnt,0) cnt FROM steam_games a left join (select count(*) cnt,gameid from steam_account group by gameid) b on a.id=b.gameid order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}

	public function GetMSGamesList(){
		$rows=$this->users->execute_query("SELECT a.*,COALESCE(cnt,0) cnt FROM ms_games a left join (select count(*) cnt,gameid from ms_account group by gameid) b on a.id=b.gameid order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetOriginGamesList(){
		$rows=$this->users->execute_query("SELECT a.*,COALESCE(cnt,0) cnt FROM origin_games a left join (select count(*) cnt,gameid from origin_account group by gameid) b on a.id=b.gameid order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetPlayGamesList(){
		$rows=$this->users->execute_query("SELECT a.*,COALESCE(cnt,0) cnt FROM play_games a left join (select count(*) cnt,gameid from play_account group by gameid) b on a.id=b.gameid order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetAccountList(){
		$rows=$this->users->execute_query("SELECT a.*,c.name game_name,COALESCE(cnt,0) cnt FROM steam_account a left join (select count(*) cnt,account from steam_assign where type=0 group by account) b on a.id=b.account join steam_games c on a.gameid=c.id order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetMSAccountList(){
		$rows=$this->users->execute_query("SELECT a.*,c.name game_name,COALESCE(cnt,0) cnt FROM ms_account a left join (select count(*) cnt,account from steam_assign where type=1 group by account) b on a.id=b.account join ms_games c on a.gameid=c.id order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetEPICAccountList(){
		$rows=$this->users->execute_query("SELECT a.*,COALESCE(cnt,0) cnt FROM epic_account a left join (select count(*) cnt,account from steam_assign where type=2 group by account) b on a.id=b.account order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetPlayAccountList(){
		$rows=$this->users->execute_query("SELECT a.*,c.name game_name,COALESCE(cnt,0) cnt FROM play_account a left join (select count(*) cnt,account from steam_assign where type=3 group by account) b on a.id=b.account join play_games c on a.gameid=c.id order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetOriginAccountList(){
		$rows=$this->users->execute_query("SELECT a.*,c.name game_name,COALESCE(cnt,0) cnt FROM origin_account a left join (select count(*) cnt,account from steam_assign where type=4 group by account) b on a.id=b.account join origin_games c on a.gameid=c.id order by a.id");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$arr[$i]['action']="<div class=\"tools\">";
			if(!$arr[$i]['cnt'])$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}
	public function GetAssignList(){
		$colors=explode(",", "yellow,green,red");
		$rows=$this->users->execute_query("SELECT * FROM steam_invoice order by created_date");
		$arr=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				$arr[$i][$key]=$val;
			$rows_=$this->users->execute_query("SELECT a.*,b.name FROM steam_assign a join steam_account b on a.account=b.id where a.type=0 and a.invoice={$row['id']} order by a.created_date");
			$arr[$i]['account']="";
			$accounts="";
			foreach ($rows_ as $row_){
				$arr[$i]['account'].="<span class=\"badge bg-{$colors[$row_['account']%3]}\">{$row_['name']}</span>&nbsp;&nbsp;";
				$accounts.=($accounts==""?"":",").$row_['account'];
			}
			$rows_=$this->users->execute_query("SELECT a.*,b.name FROM steam_assign a join ms_account b on a.account=b.id where a.type=1 and a.invoice={$row['id']} order by a.created_date");
			$arr[$i]['msaccount']="";
			$msaccounts="";
			foreach ($rows_ as $row_){
				$arr[$i]['msaccount'].="<span class=\"badge bg-{$colors[$row_['account']%3]}\">{$row_['name']}</span>&nbsp;&nbsp;";
				$msaccounts.=($msaccounts==""?"":",").$row_['account'];
			}
			$rows_=$this->users->execute_query("SELECT a.*,b.name FROM steam_assign a join epic_account b on a.account=b.id where a.type=2 and a.invoice={$row['id']} order by a.created_date");
			$arr[$i]['epicaccount']="";
			$epicaccounts="";
			foreach ($rows_ as $row_){
				$arr[$i]['epicaccount'].="<span class=\"badge bg-{$colors[$row_['account']%3]}\">{$row_['name']}</span>&nbsp;&nbsp;";
				$epicaccounts.=($epicaccounts==""?"":",").$row_['account'];
			}
			
			$rows_=$this->users->execute_query("SELECT a.*,b.name FROM steam_assign a join play_account b on a.account=b.id where a.type=3 and a.invoice={$row['id']} order by a.created_date");
			$arr[$i]['playaccount']="";
			$playaccounts="";
			foreach ($rows_ as $row_){
				$arr[$i]['playaccount'].="<span class=\"badge bg-{$colors[$row_['account']%3]}\">{$row_['name']}</span>&nbsp;&nbsp;";
				$playaccounts.=($playaccounts==""?"":",").$row_['account'];
			}

			$rows_=$this->users->execute_query("SELECT a.*,b.name FROM steam_assign a join origin_account b on a.account=b.id where a.type=4 and a.invoice={$row['id']} order by a.created_date");
			$arr[$i]['originaccount']="";
			$originaccounts="";
			foreach ($rows_ as $row_){
				$arr[$i]['originaccount'].="<span class=\"badge bg-{$colors[$row_['account']%3]}\">{$row_['name']}</span>&nbsp;&nbsp;";
				$originaccounts.=($originaccounts==""?"":",").$row_['account'];
			}
			
			$arr[$i]['action']="<div class=\"tools\">";
			$arr[$i]['action'].="<a onclick=\"deleteBlog(".$row['id'].");\" title=\"delete\" class=\"delete-row\" aria-describedby=\"ui-tooltip-0\"><span class=\"delete-icon-custom\"></span></a>";
			$arr[$i]['action'].="<a data-toggle=\"modal\" data-target=\"#modal-add\" onclick=\"editBlog(".$row['id'].",'".$row['name']."','".$accounts."','".$msaccounts."','".$epicaccounts."','".$playaccounts."','".$originaccounts."');\" title=\"edit\" class=\"edit_button\" aria-describedby=\"ui-tooltip-0\"><span class=\"edit-icon-custom\"></span></a></div>";
			$i++;
		}
		exit(json_encode($arr));
	}

	public function gamesSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name']
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('steam_games','id',$row);
		}else{
			$id=$this->users->execute_insert('steam_games',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function msGamesSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name']
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('ms_games','id',$row);
		}else{
			$id=$this->users->execute_insert('ms_games',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function originGamesSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name']
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('origin_games','id',$row);
		}else{
			$id=$this->users->execute_insert('origin_games',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}	
	public function playGamesSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name']
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('play_games','id',$row);
		}else{
			$id=$this->users->execute_insert('play_games',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}	
	public function accountSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'gameid'=>$_POST['gamename'],
			'account'=>$_POST['account'],
			'password'=>$_POST['password'],
			'code_gmail'=>$_POST['codegmail'],
			'code_password'=>$_POST['codepassword'],
			'system32id'=>$_POST['system32id'],
			'appid'=>$_POST['appid'],
			'dbdata'=>$_POST['dbdata'],
			'created_date'=>date("Y-m-d"),
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('steam_account','id',$row);
		}else{
			$id=$this->users->execute_insert('steam_account',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function msaccountSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'gameid'=>$_POST['gamename'],
			'account'=>$_POST['account'],
			'password'=>$_POST['password'],
			'code_gmail'=>$_POST['codegmail'],
			'code_password'=>$_POST['codepassword'],
			'system32id'=>$_POST['system32id'],
			'appid'=>$_POST['appid'],
			'dbdata'=>$_POST['dbdata'],
			'created_date'=>date("Y-m-d"),
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('ms_account','id',$row);
		}else{
			$id=$this->users->execute_insert('ms_account',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function epicaccountSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'gmail'=>$_POST['gmail'],
			'password'=>$_POST['password'],
			'created_date'=>date("Y-m-d"),
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('epic_account','id',$row);
		}else{
			$id=$this->users->execute_insert('epic_account',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}

	public function playaccountSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'gameid'=>$_POST['gamename'],
			'account'=>$_POST['account'],
			'password'=>$_POST['password'],
			'code_gmail'=>$_POST['codegmail'],
			'code_password'=>$_POST['codepassword'],
			'system32id'=>$_POST['system32id'],
			'appid'=>$_POST['appid'],
			'dbdata'=>$_POST['dbdata'],
			'created_date'=>date("Y-m-d"),
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('play_account','id',$row);
		}else{
			$id=$this->users->execute_insert('play_account',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}

	public function originaccountSave()
	{
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'gameid'=>$_POST['gamename'],
			'account'=>$_POST['account'],
			'password'=>$_POST['password'],
			'code_gmail'=>$_POST['codegmail'],
			'code_password'=>$_POST['codepassword'],
			'system32id'=>$_POST['system32id'],
			'appid'=>$_POST['appid'],
			'dbdata'=>$_POST['dbdata'],
			'created_date'=>date("Y-m-d"),
		);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('origin_account','id',$row);
		}else{
			$id=$this->users->execute_insert('origin_account',$row);
		}

		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}

	public function assignSave()
	{
	   $currentIpAddress="";
	   $currentMacAddress="";
	   
	   $vars = array('ipaddress', 'deviceid');
$verified = TRUE;
foreach($vars as $v) {
   if(!isset($_POST[$v]) || empty($_POST[$v])) {
      $verified = FALSE;
   }
}
if(!$verified) {
 $currentIpAddress="";
	   $currentMacAddress="";
}else{
    $currentIpAddress=$_POST['ipaddress'];
	   $currentMacAddress=$_POST['deviceid'];
}

	  $row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
			'ipaddress'=>$currentIpAddress,
			'deviceid'=>$currentMacAddress
		);				
		
		//echo json_encode($row);
		$id=$_POST['id'];
		if($id){
			$this->users->execute_update('steam_invoice','id',$row);
		}else{
		$row['ipaddress']="";//$currentIpAddress;//$_POST['ipaddress'];
		$row['deviceid']="";//$currentMacAddress;//$_POST['deviceid'];
			$row['created_date']=date("Y-m-d");
			$row['number']="";
			$id=$this->users->execute_insert('steam_invoice',$row);
			$row['id']=$id;
			$row['number']=strtoupper(md5($id.$_POST['name']));
			$row['number']=substr($row['number'], strlen($row['number'])-20,15);
			$this->users->execute_update('steam_invoice','id',$row);
		}
		$this->users->execute_delete('steam_assign','invoice',$_POST['id']);
		$accounts=explode(",",$_POST['account']);
		for($i=0;$i<count($accounts);$i++){
			$row_=array(
				'id'=>0,
				'invoice'=>$id,
				'account'=>$accounts[$i],
				'type'=>0,
				'created_date'=>date("Y-m-d")
			);
			if($accounts[$i]!='null'&&$accounts[$i]!='')$this->users->execute_insert('steam_assign',$row_);
		}
		$msaccounts=explode(",",$_POST['msaccount']);
		for($i=0;$i<count($msaccounts);$i++){
			$row_=array(
				'id'=>0,
				'invoice'=>$id,
				'account'=>$msaccounts[$i],
				'type'=>1,
				'created_date'=>date("Y-m-d")
			);
			if($msaccounts[$i]!='null'&&$msaccounts[$i]!='')$this->users->execute_insert('steam_assign',$row_);
		}

		$epicaccounts=explode(",",$_POST['epicaccount']);
		for($i=0;$i<count($epicaccounts);$i++){
			$row_=array(
				'id'=>0,
				'invoice'=>$id,
				'account'=>$epicaccounts[$i],
				'type'=>2,
				'created_date'=>date("Y-m-d")
			);
			if($epicaccounts[$i]!='null'&&$epicaccounts[$i]!='')$this->users->execute_insert('steam_assign',$row_);
		}

		$playaccounts=explode(",",$_POST['playaccount']);
		for($i=0;$i<count($playaccounts);$i++){
			$row_=array(
				'id'=>0,
				'invoice'=>$id,
				'account'=>$playaccounts[$i],
				'type'=>3,
				'created_date'=>date("Y-m-d")
			);
			if($playaccounts[$i]!='null'&&$playaccounts[$i]!='')$this->users->execute_insert('steam_assign',$row_);
		}

		$originaccounts=explode(",",$_POST['originaccount']);
		for($i=0;$i<count($originaccounts);$i++){
			$row_=array(
				'id'=>0,
				'invoice'=>$id,
				'account'=>$originaccounts[$i],
				'type'=>4,
				'created_date'=>date("Y-m-d")
			);
			if($originaccounts[$i]!='null'&&$originaccounts[$i]!='')$this->users->execute_insert('steam_assign',$row_);
		}
		
		$res=array(
			'id'=>$id,
			'msg'=>'ok'
		);
		echo json_encode($res);
	}

	public function gamesDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('steam_games','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function msGamesDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('ms_games','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function originGamesDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('origin_games','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function playGamesDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('play_games','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function accountDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('steam_account','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function msaccountDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('ms_account','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function epicaccountDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('epic_account','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function playaccountDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('play_account','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function originaccountDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('origin_account','id',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}
	public function assignDelete()
	{
		if($_POST['id']){
			$this->users->execute_delete('steam_invoice','id',$_POST['id']);
			$this->users->execute_delete('steam_assign','invoice',$_POST['id']);
		}
		$res=array(
			'id'=>$_POST['id'],
			'msg'=>'ok'
		);
		echo json_encode($res);
	}


}