<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct(){
        parent::__construct();
         $this->load->model('Invoice_model');
    }


    /* Controller name: index main page  */
	public function index()
	{
		$data = array();
		$this->load->helper('url');	
		$data['clients'] = $this->Invoice_model->getClients();
		$this->load->view('Invoice/invoice',$data);
	}


	/* Controller name: getProductByClientID ajax request
	   Use: Get products by client ID  */
	public function getProductByClientID()
	{
		$data = array();
		$clientId = $this->input->post('client_id');
		$data['productData'] = $this->Invoice_model->getProductByClientID($clientId);
		echo json_encode($data);


	}

	/* Controller name: generateHTML ajax request
	   Use: Generate HTML in invoice page  */
	public function generateHTML()
	{
		
		$data = array();
		$clientId = $this->input->post('client_id');
		$productId = $this->input->post('product_id');
		$date = $this->input->post('date');

		$data['invoiceData'] = $this->Invoice_model->getInvoiceData($clientId,$productId,$date);

		echo json_encode($data);
	}
}





