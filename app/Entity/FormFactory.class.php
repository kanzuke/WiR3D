<?php

namespace SelfPortal;

class FormFactory {
	
	
	public static function 	testInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	
}