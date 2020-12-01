<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pay');
	}

	public function checkout(){
		$params = array (
											'emailOrMobileNumber' => 'foundation@dreamoval.org',
											'merchantKey' => 'KQN5+zBcCB/HsK5OLqORLy5wnMGt7T',
											'amount'=>1,
											'orderCode' => $this->GUID(),
											'sendInvoice' => false, //set to true, if you want invoice to be sent
											'description' => 'Sample request',
											'customerName' => $this->input->post('name'),
											'customerEmail' => $this->input->post('email'),
											'customerMobileNumber' => $this->input->post('mobile')
										);
		$this->load->library('slydepay', $params);
		$result = $this->slydepay->create_invoice($params);
		echo print_r($result);
		$token = $result->result->payToken;
		$link = "https://app.slydepay.com.gh/payLIVE/detailsnew.aspx?pay_token=".$token;
		redirect($link);
	}

	public function confirm_payment(){
		$params = array (
											'emailOrMobileNumber' => 'foundation@dreamoval.org',
											'merchantKey' => 'KQN5+zBcCB/HsK5OLqORLy5wnMGt7T',
											'orderCode' => $this->input->get('cust_ref'),
											'payToken' => $this->input->get('payToken'),
											'transactionId' => $this->input->get('transac_id'),
										);
		$this->load->library('slydepay', $params);
		$result = $this->slydepay->confirm_transaction($params);

    if ($result->success){
      //here, whatever action you want to carryout after payment process is succesful'
      $data['message'] = 'Congratulations, Payment Complete';
      $this->load->view('message', $data);
    }else{
      //here, all actions to be carried out when there is a failure in payment process
      $data['message'] = $result->errorMessage;
      $this->load->view('message', $data);
    }
	}

	function GUID(){
					 if (function_exists('com_create_guid') === true)
					 {
							 return trim(com_create_guid(), '{}');
					 }

					 return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
 }
}
