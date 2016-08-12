<?php

function getConfig($key) {
	$CI = &get_instance();
	return $CI->config->item($key);
}