<?php
/**
 * @version      $Id$
 * @package      Commission Calculator - Pound
 * @subpackage   mod_commission_calc_pound
 * @copyright    Copyright (C) 2009 Noxidsoft. All rights reserved.
 * @license      GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @author       Noel Dixon <noel.dixon@noxidsoft.com>
 */

//get the q parameter from URL which governs the users input
$q 				= $_GET["q"];
$percentBefore 	= $_GET["percentBefore"];
$baseAmount 	= $_GET["baseAmount"];
$percentAfter 	= $_GET["percentAfter"];
$taxation		= $_GET["taxation"];

// do the forward calculations
if ($q > 0) {
	if ($q > $baseAmount) {
		$response = $baseAmount * ($percentBefore / 100) + ($q - $baseAmount) * ($percentAfter / 100);
		// add tax at the end of everything
		$tax = $response * ($taxation / 100);
		// send the result to the screen
		//echo $response + $tax;
		echo number_format($response + $tax, 2);
	} else {
		$response = $q * ($percentBefore / 100);
		// add tax at the end of everything
		$tax = $response * ($taxation / 100);
		// send the result to the screen
		//echo $response + $tax;
		echo number_format($response + $tax, 2);
	}
}
