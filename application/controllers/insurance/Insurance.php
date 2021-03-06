<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'insurance/insurance_model' 
		));

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1) 
			redirect('login');
	}
 
	public function index()
	{ 
		$data['title'] = display('insurance_list');
        #-------------------------------#
        #
        #pagination starts
        #
        $config["base_url"] = base_url('insurance/insurance/index');
        $config["total_rows"] = $this->db->count_all('inc_insurance');
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['insurances'] = $this->insurance_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #    
		$data['content'] = $this->load->view('insurance/insurance_list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 



	public function form()
	{
		$data['title'] = display('add_insurance');
		#-------------------------------#
		$this->form_validation->set_rules('insurance_name', display('insurance_name'),'required|max_length[255]');
		$this->form_validation->set_rules('service_tax', display('service_tax'),'max_length[50]');
		$this->form_validation->set_rules('discount', display('discount'),'max_length[50]');
		$this->form_validation->set_rules('remark', display('remark'),'max_length[1024]');
		$this->form_validation->set_rules('insurance_no', display('insurance_no'),'max_length[50]');
		$this->form_validation->set_rules('insurance_code', display('insurance_code'),'max_length[50]');
		$this->form_validation->set_rules('status', display('status'),'required'); 
		#-------------------------------#
		$name   = $this->input->post('disease_name', true);
		$charge = $this->input->post('disease_charge', true);
		$disease = array();
		if(!empty($name))
    		for ($i=0; $i < sizeof($name); $i++)
    		{
    			if(!empty($name[$i]))
    			$disease[$name[$i]] = $charge[$i]; 
    		} 
		$disease = json_encode($disease); 
		#-------------------------------#
		$data['insurance'] = (object)$postData = array(
			'insurance_name'  => $this->input->post('insurance_name', true), 
			'service_tax'     => $this->input->post('service_tax', true), 
			'discount'        => $this->input->post('discount', true), 
			'remark'          => $this->input->post('remark', true), 
			'insurance_no'    => $this->input->post('insurance_no', true), 
			'insurance_code'  => $this->input->post('insurance_code', true), 
			'disease_charge'  => $disease, 
			'hospital_rate'   => $this->input->post('hospital_rate', true), 
			'insurance_rate'  => $this->input->post('insurance_rate', true), 
			'total'           => $this->input->post('total', true), 
			'status'          => $this->input->post('status', true),
		); 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if ($this->insurance_model->create($postData)) {
				$patient_id = $this->db->insert_id();
				#set success message
				$this->session->set_flashdata('message', display('save_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			} 
			redirect('insurance/insurance/form/');

		} else { 
			$data['content'] = $this->load->view('insurance/insurance_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}



	public function update($id = null)
	{
		$data['title'] = display('add_insurance');
		#-------------------------------#
		$this->form_validation->set_rules('insurance_name', display('insurance_name'),'required|max_length[255]');
		$this->form_validation->set_rules('service_tax', display('service_tax'),'max_length[50]');
		$this->form_validation->set_rules('discount', display('discount'),'max_length[50]');
		$this->form_validation->set_rules('remark', display('remark'),'max_length[1024]');
		$this->form_validation->set_rules('insurance_no', display('insurance_no'),'max_length[50]');
		$this->form_validation->set_rules('insurance_code', display('insurance_code'),'max_length[50]');
		$this->form_validation->set_rules('status', display('status'),'required'); 
		#-------------------------------#
		$name   = $this->input->post('disease_name', true);
		$charge = $this->input->post('disease_charge', true);
		$disease = array();
		if(!empty($name))
    		for ($i=0; $i < sizeof($name); $i++)
    		{
    			if(!empty($name[$i]))
    			$disease[$name[$i]] = $charge[$i]; 
    		} 
		$disease = json_encode($disease); 
		#-------------------------------#
		$data['insurance'] = (object)$postData = array(
			'id'   		      => $this->input->post('id', true),
			'insurance_name'  => $this->input->post('insurance_name', true), 
			'service_tax'     => $this->input->post('service_tax', true), 
			'discount'        => $this->input->post('discount', true), 
			'remark'          => $this->input->post('remark', true), 
			'insurance_no'    => $this->input->post('insurance_no', true), 
			'insurance_code'  => $this->input->post('insurance_code', true), 
			'disease_charge'  => $disease, 
			'hospital_rate'   => $this->input->post('hospital_rate', true), 
			'insurance_rate'  => $this->input->post('insurance_rate', true), 
			'total'           => $this->input->post('total', true), 
			'status'          => $this->input->post('status', true),
		); 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if ($this->insurance_model->update($postData)) {
				#set success message
				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			}
			redirect('insurance/insurance/update/'.$id);

		} else { 
			$data['insurance'] = $this->insurance_model->read_by_id($id);
			$data['content'] = $this->load->view('insurance/insurance_update',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}


	public function view($id = null)
	{
		$data['title'] = display('insurance');
		#-------------------------------#  
		$data['insurance'] = $this->insurance_model->read_by_id($id);
		$data['content'] = $this->load->view('insurance/insurance_view',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}



    public function delete($id = null) 
    {
        if ($this->insurance_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
		redirect('insurance/insurance/index');
    }


}
