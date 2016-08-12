<?php

function isLogin() {
	$CI = &get_instance();
	if ($CI->session->userdata('login')) {
		return true;
	} else {
		return false;
	}
}

function setLogin($data) {
	$CI = &get_instance();
	$CI->session->set_userdata('login', $data);
}

function getLogin($key = null) {
	$CI = &get_instance();
	if ($session = $CI->session->userdata('login')) {
		if ($key) {
			if (isset($session[$key])) {
				return $session[$key];
			} else {
				return null;
			}
		} else {
			return $sesion;
		}
	}
}

function unsetLogin() {
	$CI = &get_instance();
	$CI->session->unset_userdata('login');
}