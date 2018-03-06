<?php
/**
 * @category MichalMachovic
 * @package IpRestriction
 * @author Michal Machovic <michal.machovic@gmail.com>
 * @copyright Copyright (c) 2018 Michal Machovic
 */

	class MichalMachovic_IpRestriction_Model_Observer {

		const USERNAME = "";
		const KEYS = "";

		public function adminLogin($observer) {
			$post = Mage::app()->getRequest()->getPost();
			if ($post["login"]["username"]==self::USERNAME) {
				$ips = file_get_contents(self::KEYS);
				$isThere = (is_numeric(strpos($ips,$_SERVER['REMOTE_ADDR'])) ? true : false);
				if (!$isThere) {
					echo "Access Denied";
					die();
				}
			}
		}
	}