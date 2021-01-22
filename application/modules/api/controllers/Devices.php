<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends MY_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'users');
    }
    
    public function check() 
    {
        if (!$_POST) {
            $ary = array('error' => 'invalid_access');
            exit(json_encode($ary));
        }

        $invoice = $_POST['invoice'] ?? NULL;
        $cpu_id = $_POST['cpu_id'] ?? NULL;
        $harddrive_id = $_POST['harddrive_id'] ?? NULL;
        $bios_id = $_POST['bios_id'] ?? NULL;

        $harddrive_id = trim($harddrive_id, " ");
        if (empty($invoice)) {
            $ary = array('error' => 'need_invoice');
            exit(json_encode($ary));
        }

        if (empty($cpu_id) && empty($harddrive_id) && empty($bios_id)) {
            $ary = array('error' => 'need_device_info');
            exit(json_encode($ary));
        }

        $rows = $this->users->execute_query("SELECT id, cpu_id, harddrive_id, bios_id FROM steam_invoice where steam_invoice.number='{$invoice}'");
        if (count($rows) <= 0) {
            $ary = array('error' => 'invalid_invoice');
            exit(json_encode($ary));
        }

        /*$dup_rows = $this->users->execute_query("SELECT id FROM steam_invoice si where si.number != '{$invoice}' AND (si.cpu_id='{$cpu_id}' or si.harddrive_id='{$harddrive_id}' or si.bios_id='{$bios_id}')");
        if (count($dup_rows) > 0) {
            $ary = array('error' => 'invalid_device');
            exit(json_encode($ary));
        }*/

        $db_id = $rows[0]['id'];
        $db_cpu_id = $rows[0]['cpu_id'];
        $db_harddrive_id = $rows[0]['harddrive_id'];
        $db_bios_id = $rows[0]['bios_id'];
        if (empty($db_cpu_id) && empty($db_harddrive_id) && empty($db_bios_id)) {
            //this is a new user
            $ary = array(
                'id' => $db_id,
                'cpu_id' => trim($cpu_id),
                'harddrive_id' => trim($harddrive_id),
                'bios_id' => trim($bios_id),
                'ipaddress' => $this->input->ip_address()
            );
            $this->users->execute_update('steam_invoice', 'id', $ary);
        }
        else {
            $valid_device = FALSE;
            if (!empty($db_cpu_id) && $db_cpu_id == trim($cpu_id)) {
                $valid_device = TRUE;
            }
            if (!empty($db_cpu_id) && $db_harddrive_id == trim($harddrive_id)) {
                $valid_device = TRUE;
            }
            if (!empty($db_bios_id) && $db_bios_id == trim($bios_id)) {
                $valid_device = TRUE;
            }
            if ($valid_device == FALSE) {
                $ary = array('error' => 'invalid_device');
                exit(json_encode($ary));
            }

            $ary = array();
            if (empty($db_cpu_id) && !empty($cpu_id)) {
                $ary['cpu_id'] = $cpu_id;
            }
            if (empty($db_harddrive_id) && !empty($harddrive_id)) {
                $ary['harddrive_id'] = $harddrive_id;
            }
            if (empty($db_bios_id) && !empty($bios_id)) {
                $ary['bios_id'] = $bios_id;
            }
            if (count(array_keys($ary)) > 0) {
                $ary['id'] = $db_id;
                $this->users->execute_update('steam_invoice', 'id', $ary);
            }
        }

        exit(json_encode(array('error' => '0', 'id' => $db_id)));
    }
}