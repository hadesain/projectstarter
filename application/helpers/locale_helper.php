<?php

function locale_date($str) {
	if ($time = strtotime($str)) {
		return date(getConfig('_date'), $time);
	} else {
		return null;
	}
}

function locale_time($str) {
	if ($time = strtotime($str)) {
		return date(getConfig('_time'), $time);
	} else {
		return null;
	}
}

function locale_datetime($str) {
	if ($time = strtotime($str)) {
		return date(getConfig('_datetime'), $time);
	} else {
		return null;
	}
}

function locale_number($number) {
	$number = number_format($number);
	$number = str_replace(',', getConfig('_thousand_separator'), $number);
	return $number;
}

function locale_currency($str) {
	$str = number_format($str);
	$str = str_replace(',', getConfig('_thousand_separator'), $str);
	return getConfig('_currency').$str;
}

function locale_human_date($str) {
	if ($time = strtotime($str)) {
		$y = date('Y', $time);
		$m = getConfig('_month')[date('m', $time)];
		$d = date('d', $time);
		$humanDate = getConfig('_human_date');
		$humanDate = str_replace(array('{Y}', '{m}', '{d}'), array($y, $m, $d), $humanDate);
		return $humanDate;
	} else {
		return null;
	}
}

function locale_human_datetime($str) {
	if ($time = strtotime($str)) {
		$y = date('Y', $time);
		$m = getConfig('_month')[date('m', $time)];
		$d = date('d', $time);
		$H = date('H', $time);
		$i = date('i', $time);
		$s = date('s', $time);
		$humanDate = getConfig('_human_datetime');
		$humanDate = str_replace(array('{Y}', '{m}', '{d}', '{H}', '{i}', '{s}'), array($y, $m, $d, $H, $i, $s), $humanDate);
		return $humanDate;
	} else {
		return null;
	}
}