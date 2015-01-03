<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{   
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->library('ion_auth');
		
		
	}
	
	
	
	function index()
	{
					
		$content =  $this->load->view('admin/dashboard','',true);
		//$this->pr($content); die;
		$this->load->view('admin/master',array('content' => $content));
	}



		
	



}