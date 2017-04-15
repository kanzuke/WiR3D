<?php

namespace SelfPortal;


class SessionFactory {
	
	public static function checkSession() {
		$sessionTimeoutSecs = 3600;
	
		if (!isset($_SESSION)) session_start();
 	
		if (!empty($_SESSION['lastactivity']) && $_SESSION['lastactivity'] > time() - $sessionTimeoutSecs && !isset($_GET['logout'])) {
			$_SESSION['lastactivity'] = time();
		}
		else {
			SessionFactory::closeSession();
		}
	}
	
	
	
	public static function closeSession() {
		if (!isset($_SESSION)) session_start();
		
		session_unset();
		
		session_write_close();
		header("Location: index.php");
	}
}