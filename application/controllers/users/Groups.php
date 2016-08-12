<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->model('groups_m');
	}

	public function index() {		
		$result = $this->groups_m->get();
		$this->load->view('users/groups/index', array(
			'result' => $result
		));		
	}

	public function create() {
		$this->load->view('users/groups/create');
	}

	public function store() {						
		$post = $this->input->post();
		$this->groups_m->insert($post);
		$this->redirect->with('successMessage', 'Grup user berhasil dibuat.')->to('users/groups');
	}

	public function edit($id) {
		$result = $this->groups_m->find_or_fail($id);
		$this->load->view('users/groups/edit', array(
			'result' => $result
		));
	}

	public function update($id) {		
		$result = $this->groups_m->find_or_fail($id);
		$post = $this->input->post();
		$this->groups_m->update($id, $post);
		$this->redirect->with('successMessage', 'Grup user berhasil dibuat.')->to('users/groups');
	}

	public function access($id) {
		$result = $this->groups_m->find_or_fail($id);
		$result->access = new stdClass();		
		$rs_group_access = $this->groups_m->get_group_access($id);		
		foreach ($rs_group_access as $group_access) {			
			$result->access->{$group_access->access_key} = $group_access->permission;
		}
		$rs_access = $this->groups_m->get_access();				
		foreach ($rs_access as $key => $access) {			
			$rs_access[$key]->rs_access_key = $this->groups_m->get_access_key($access->id);
		}
		$this->load->view('users/groups/access', array(
			'result' => $result,
			'rs_access' => $rs_access
		));
	}

	public function update_access($id) {
		$this->groups_m->find_or_fail($id);
		$post = $this->input->post();
		$this->groups_m->update_access($id, $post['access']);
		$this->redirect->with('successMessage', 'Hak akses berhasil diperbarui.')->back();
	}

	public function delete($id) {
		$this->groups_m->find_or_fail($id);
		$this->groups_m->delete($id);
		$this->redirect->with('successMessage', 'Grup user berhasil dihapus')->back();
	}

}
