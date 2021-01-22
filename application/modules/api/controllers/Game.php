<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends MY_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'users');
    }

    public function getAccountName($type)
    {
        switch ($type) {
            case 0:
                return 'steam_account';
            case 1:
                return 'ms_account';
            case 2:
                return 'epic_account';
            case 3:
                return 'play_account';
            case 4:
                return 'origin_account';
        }

        return '';
    }
    
    public function accounts($invoice) 
    {
        if (empty($invoice)) {
            $ary = array('error' => 'need_invoice');
            exit(json_encode($ary));
        }

        $steam_games = $this->users->execute_query("SELECT * from steam_games");
        $play_games = $this->users->execute_query("SELECT id, name from play_account group by name");
        $origin_games = $this->users->execute_query("SELECT id, name from origin_account group by name");
        $epic_games = $this->users->execute_query("SELECT id, name from epic_account group by name");
        $ms_games = $this->users->execute_query("SELECT id, name from ms_account group by name");


        $query = "SELECT 
                    SA.account as account_id,
                    SA.type as account_type
                  FROM 
                    steam_assign SA 
                  LEFT JOIN 
                    steam_invoice SI ON SA.invoice = SI.id 
                  WHERE 
                    SI.number='{$invoice}'";

        $accounts = array();
        $assigns = $this->users->execute_query($query);
        if (count($assigns) > 0) {
            foreach ($assigns as $assign) {
                $table_name = $this->getAccountName($assign['account_type']);
                if (empty($table_name)) {
                    continue;
                }
                
                $account_id = $assign['account_id'];
                $rows = $this->users->execute_query("SELECT * FROM {$table_name} WHERE id = {$account_id}");
                if (count($rows) > 0) {
                    $account = $rows[0];
                    $account['account_type'] = str_replace('_account', '', $table_name);
                    array_push($accounts, $account);
                }
            }
        }

        $result = array(
            "error" => 0, 
            "steam" => $steam_games,
            "epic" => $epic_games,
            "origin" => $origin_games,
            "play" => $play_games,
            "ms" => $ms_games,
            "accounts" => $accounts 
        );
        exit(json_encode($result));
    }

    public function fetch($invoice) 
    {
        if (empty($invoice)) {
            $ary = array('error' => 'need_invoice');
            exit(json_encode($ary));
        }

        $steam_games = $this->users->execute_query("SELECT * from steam_games");
        $play_games = $this->users->execute_query("SELECT id, name from play_account_save group by name");
        $origin_games = $this->users->execute_query("SELECT id, name from origin_account group by name");
        $epic_games = $this->users->execute_query("SELECT id, name from epic_account group by name");
        $ms_games = $this->users->execute_query("SELECT id, name from ms_account group by name");


        $query = "SELECT 
                    SA.account as account_id,
                    SA.type as account_type
                  FROM 
                    steam_assign SA 
                  LEFT JOIN 
                    steam_invoice SI ON SA.invoice = SI.id 
                  WHERE 
                    SI.number='{$invoice}'";

        $accounts = array();
        $assigns = $this->users->execute_query($query);
        if (count($assigns) > 0) {
            foreach ($assigns as $assign) {
                $table_name = $this->getAccountName($assign['account_type']);
                if (empty($table_name)) {
                    continue;
                }
                
                $account_id = $assign['account_id'];
                $rows = $this->users->execute_query("SELECT * FROM {$table_name} WHERE id = {$account_id}");
                if (count($rows) > 0) {
                    $account = $rows[0];
                    $account['account_type'] = str_replace('_account', '', $table_name);
                    $account['password'] = $this->encrypt($account['password']);
                    array_push($accounts, $account);
                }
            }
        }

        /*$length = 5;
        for ($i = 0; $i < 1000; $i++) {
            $value = $this->generateRandomString($length);
            $length ++;
            if ($length > 30) $length = 5;

            $encrypted = $this->encrypt($value);
            echo('"'. $encrypted . '"'. ',' . '"'. $value. '",');
        }
        exit();*/

        $result = array(
            "error" => 0, 
            "steam" => $steam_games,
            "epic" => $epic_games,
            "origin" => $origin_games,
            "play" => $play_games,
            "ms" => $ms_games,
            "accounts" => $accounts 
        );
        exit(json_encode($result));
    }

    public function v2_accounts($invoice) 
    {
        if (empty($invoice)) {
            $ary = array('error' => 'need_invoice');
            exit(json_encode($ary));
        }

        $steam_games = $this->users->execute_query("SELECT * from steam_games");
        $play_games = $this->users->execute_query("SELECT * from play_games");
        $origin_games = $this->users->execute_query("SELECT id, name from origin_account group by name");
        $epic_games = $this->users->execute_query("SELECT id, name from epic_account group by name");
        $ms_games = $this->users->execute_query("SELECT id, name from ms_account group by name");


        $query = "SELECT 
                    SA.account as account_id,
                    SA.type as account_type
                  FROM 
                    steam_assign SA 
                  LEFT JOIN 
                    steam_invoice SI ON SA.invoice = SI.id 
                  WHERE 
                    SI.number='{$invoice}'";

        $accounts = array();
        $assigns = $this->users->execute_query($query);
        if (count($assigns) > 0) {
            foreach ($assigns as $assign) {
                $table_name = $this->getAccountName($assign['account_type']);
                if (empty($table_name)) {
                    continue;
                }
                
                $account_id = $assign['account_id'];
                $rows = $this->users->execute_query("SELECT * FROM {$table_name} WHERE id = {$account_id}");
                if (count($rows) > 0) {
                    $account = $rows[0];
                    $account['account_type'] = str_replace('_account', '', $table_name);
                    $account['password'] = $this->encrypt($account['password']);
                    $account['code_gmail'] = '';
                    $account['code_password'] = '';
                    array_push($accounts, $account);
                }
            }
        }

        /*$length = 5;
        for ($i = 0; $i < 1000; $i++) {
            $value = $this->generateRandomString($length);
            $length ++;
            if ($length > 30) $length = 5;

            $encrypted = $this->encrypt($value);
            echo('"'. $encrypted . '"'. ',' . '"'. $value. '",');
        }
        exit();*/

        $result = array(
            "error" => 0, 
            "steam" => $steam_games,
            "epic" => $epic_games,
            "origin" => $origin_games,
            "play" => $play_games,
            "ms" => $ms_games,
            "accounts" => $accounts 
        );
        exit(json_encode($result));
    }

    function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function encrypt($painText) 
    {
        $password = 'se3nkaheg_KSMEK_hahsekbmalks#JJKsmske$$sjelsie_JssfeSY_3sc3RLrpd17';
        $method = 'aes-256-cbc';

        // Must be exact 32 chars (256 bit)
        $password = substr(hash('sha256', $password, true), 0, 32);
        //echo "Password:" . $password . "\n";

        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

        // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $encrypted = base64_encode(openssl_encrypt($painText, $method, $password, OPENSSL_RAW_DATA, $iv));

        // My secret message 1234
        //$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);

        return $encrypted;
    }
}