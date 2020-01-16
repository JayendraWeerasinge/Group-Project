<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	//------------------------------------------------------------Index page
	function index(){
		$this->load->view('index');
	}

	public function viewDocument(){
		$this->load->view('view_document');
	}

	//------------------------------------------------------------User Guide page
	public function USG(){
		$this->load->view('userGuide');
	}

	//------------------------------------------------------------User Guide page
	public function Contacts(){
		$this->load->view('contacts');
	}

	public function BackUp(){
		$this->load->view('backup');
	}






















}






