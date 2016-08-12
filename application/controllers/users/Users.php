<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_m');
	}

	public function index() {
		if ($this->input->is_ajax_request()) {
			$this->load->library('datatables');
			$response = $this->datatables->collection(
				$this->users_m->view_users()->query()			
			)
			->editColumn('last_login' ,function($row) {
				return locale_human_date($row->last_login);
			})
			->orderableColumns('username, profile_name, group, last_login')
			->searchableColumns('username, profile_name, group')
			->render(true);
			$this->output->set_content_type('application/json')->set_output($response);
		} else {
			$this->load->view('users/users/index');
		}
	}

	public function create() {
		$this->load->model('groups_m');
		$ls_group = $this->groups_m->lists('id', 'group');
		$this->load->view('users/users/create', array(
			'ls_group' => $ls_group
		));
	}

	public function store() {	
		$post = $this->input->post();
		$this->users_m->register($post['username'], $post['password'], $post);
		$this->redirect->with('successMessage', 'User berhasil ditambahkan.')->to('users');
	}

	public function edit($id) {			
		$result = $this->users_m->find_or_fail($id);
		$this->load->model('groups_m');
		$ls_group = $this->groups_m->lists('id', 'group');
		$this->load->view('users/users/edit', array(
			'result' => $result,
			'ls_group' => $ls_group
		));
	}

	public function delete($id) {
		$this->users_m->find_or_fail($id);
		$this->users_m->delete($id);
		$this->redirect->with('successMessage', 'User berhasil dihapus')->back();
	}

	public function update_profile($id) {				
		$this->users_m->find_or_fail($id);
		$post = $this->input->post();	
		$this->users_m->update($id, $post);
		$this->redirect->with('successMessage', 'Profile berhasil diperbaui.')->back();
	}

	public function update_setting($id) {
		$this->users_m->find_or_fail($id);
		$post = $this->input->post();				
		$this->users_m->update($id, $post);
		$this->redirect->with('successMessage', 'Pengaturan akun berhasil diperbaui.')->back();
	}

	public function change_password($id) {
		$this->users_m->find_or_fail($id);		
		$post = $this->input->post();		
		$this->users_m->update($id, $post);
		$this->redirect->with('successMessage', 'Ubah password berhasil.')->back();
	}

}