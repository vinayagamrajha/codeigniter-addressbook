<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_class extends CI_Controller
{
    
    /**
     * This function is used to initialize the model & library class
     * 
     *
     * 
     */
    public function __construct()
    {
        //load database in autoload libraries 
        parent::__construct();
        $this->load->model('User_model');
		$this->load->library('session');
    }
    /**
     * This function is used to list the contacts
     *
     * @return view 
     */
    public function index()
    {
        $data['users'] = $this->User_model->get_users();
        $metadata['title'] = 'Address Book Lists';
        $data['heading'] = "User Address Book";
        $this->load->view('includes/header', $metadata);
        $this->load->view('user/list', $data);
        $this->load->view('includes/footer');
    }
    /**
     * This function is used to create the contact 
     *
     * @return view
     */
    public function create()
    {
        $metadata['title'] = 'Add Contact';
        $data['heading'] = "Add Contact";
        $this->load->view('includes/header', $metadata);
        $this->load->view('user/create',$data);
        $this->load->view('includes/footer');
    }
    /**
     * This function is used to save the contact
     *
     * @return redirect
     */
    public function store()
    {
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('contact_number[]', 'Contact Number', 'required');
        $this->form_validation->set_rules('email_address[]', 'Email Address', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $metadata['title'] = 'Store Contact';
            $data['heading'] = "Add Contact";
            $this->load->view('includes/header', $metadata);
            $this->load->view('user/create', $data);
            $this->load->view('includes/footer');
        } else {
            $contact_numbers = implode('|', $this->input->post('contact_number[]')); // mutiple contact numbers save using comma separator
            $email_address   = implode('|', $this->input->post('email_address[]')); // mutiple contact numbers save using comma separator
            $data_insert     = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'contact_number' => $contact_numbers,
                'email_address' => $email_address
            );
            $this->User_model->insert_user($data_insert);
			$this->session->set_flashdata('msg', 'Sucessfully a contact updated.');
            redirect('user_class/index');
        }
    }
    /**
     * This function is used to edit the contact.
     * @param int id
     * @return view
     */
    public function edit($id)
    {
        $user = $this->User_model->get_user_by_id($id);
        $metadata['title'] = 'Edit Contact';
        $data['heading'] = "Edit Contact";
        $this->load->view('includes/header', $metadata);
        $this->load->view('user/edit', array(
            'user' => $user, 'heading'=>$data
        ));
        $this->load->view('includes/footer');
    }
    /**
     * This function is used to update the contact.
     * 
     * @return redirect
     */
    public function update()
    {
        $id = $this->input->post('userid');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('contact_number[]', 'Contact Number', 'required');
        $this->form_validation->set_rules('email_address[]', 'Email Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $user = $this->User_model->get_user_by_id($id);
            $metadata['title'] = 'Update Contact';
            $data['heading'] = "Edit Contact";
            $this->load->view('includes/header', $metadata);
            $this->load->view('user/edit', array(
                'user' => $user, 'heading'=>$data
            ));
            $this->load->view('includes/footer');
        } else {
            $contact_numbers = implode('|', $this->input->post('contact_number[]')); // mutiple contact numbers save using comma separator
            $email_address   = implode('|', $this->input->post('email_address[]')); // mutiple contact numbers save using comma separator
            $data_update     = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'contact_number' => $contact_numbers,
                'email_address' => $email_address
            );
            $this->User_model->update_user($id, $data_update);
			$this->session->set_flashdata('msg', 'Sucessfully a contact updated.');
            redirect('user_class/index');
        }
    }
    /**
     *This function is used to delete the contact.
     * @param int id
     * @return redirect
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
		$this->session->set_flashdata('msg', 'Sucessfully a contact deleted.');
        redirect('user_class/index');
    }
}