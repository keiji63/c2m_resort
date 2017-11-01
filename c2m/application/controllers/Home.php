<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('home_model');
    }


	public function index()
	{
		


if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='0'){

$data['saletoday'] = $this->home_model->Saletoday();

$data['productsaletoday'] = $this->home_model->Productsaletoday();

$data['customersaletoday'] = $this->home_model->Customersaletoday();

$data['productoutofstock'] = $this->home_model->Productoutofstock();



$data['tab'] = 'deshboard';
$data['title'] = 'POS - manage';
		$this->deshboardlayout('deshboard/deshboard',$data);

}else if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='1'){

$data['tab'] = 'deshboard';
$data['title'] = 'Food - manage';
		$this->deshboardlayout('deshboard/food',$data);

}else if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='2'){

$data['tab'] = 'deshboard';
$data['title'] = 'Apartment - manage';
		$this->deshboardlayout('deshboard/apartment',$data);

}else{
	header("Location: ".$this->base_url."/login");
		$data['title'] = 'C2M System';
		$this->weblayout('webbody/home',$data);
	}





	}
}
