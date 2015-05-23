<?php
/**
 * @version      $Id$
 * @package      Commission Calculator - Yen
 * @subpackage   mod_commission_calc_yen
 * @copyright    Copyright (C) 2009 Noxidsoft. All rights reserved.
 * @license      GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @author       Noel Dixon <noel.dixon@noxidsoft.com>
 */

//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die();

$baseUrl = JUri::base(true);

$salePriceLabel		= $params->get( 'salePriceLabel' );
$commissionLabel	= $params->get( 'commissionLabel' );
$labelPosition		= $params->get( 'labelPosition' );
$percentBefore		= $params->get( 'percentOfAmount' );
$baseAmount 		= $params->get( 'amount' );
$percentAfter		= $params->get( 'percentOfEverythingAfterAmount' );
$taxation 			= $params->get( 'taxation' );
$style				= $params->get( 'style' );
?>

<html>
<head>
<title></title>
<jdoc:include type="head" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?php echo $baseUrl ?>/modules/mod_commission_calc_yen/css/template.css" type="text/css" />
<?php
	$document = &JFactory::getDocument();
	$document->addScript( $baseUrl.'/modules/mod_commission_calc_yen/js/ajax.js' );
?>
</head>

<!-- Default - Below Fields -->
<?php if ($labelPosition == 0) { ?>
	<!-- Default - Inline Pretty -->
	<?php if ($style == 0) { ?>
		<body>
		<form>
		<table border="0">
		<tr>
			<td><input type="text" id="txt1" class="inputBox" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="text" id="txt2" class="inputBox" maxlength="10" /></td>
		</tr>
		<tr class="textStyle">
			<td><?php echo "$salePriceLabel"; ?></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo "$commissionLabel"; ?></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>

	<!-- Inline Raw -->
	<?php if ($style == 1) { ?>
		<body>
		<form>
		<table border="0">
		<tr>
			<td><input type="text" id="txt1" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="text" id="txt2" maxlength="10" /></td>
		</tr>
		<tr>
			<td><?php echo "$salePriceLabel (&#165;)"; ?></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo "$commissionLabel (&#165;)"; ?></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>

	<!-- Stacked Pretty -->
	<?php if ($style == 2) { ?>
		<body>
		<form>
		<table border="0">
		<tr>
			<td><input type="text" id="txt1" class="inputBox" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
		</tr>
		<tr class="textStyle">
			<td><?php echo "$salePriceLabel"; ?></td>
		</tr>
		<tr class="textStyle">
			<td><br /></td>
		</tr>
		<tr>
			<td><input type="text" id="txt2" class="inputBox" maxlength="10" /></td>
		</tr>
		<tr class="textStyle">
			<td><?php echo "$commissionLabel"; ?></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>

	<!-- Stacked Raw -->
	<?php if ($style == 3) { ?>
		<body>
		<form>
		<table border="0">
		<tr>
			<td><input type="text" id="txt1" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
		</tr>
		<tr>
			<td><?php echo "$salePriceLabel (&#165;)"; ?></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td><input type="text" id="txt2" maxlength="10" /></td>
		</tr>
		<tr>
			<td><?php echo "$commissionLabel (&#165;)"; ?></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>
<?php } ?>

<!-- Above Fields -->
<?php if ($labelPosition == 1) { ?>
	<!-- Default - Inline Pretty -->
	<?php if ($style == 0) { ?>
		<body>
		<form>
		<table border="0">
		<tr class="textStyle">
			<td><?php echo "$salePriceLabel"; ?></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo "$commissionLabel"; ?></td>
		</tr>
		<tr>
			<td><input type="text" id="txt1" class="inputBox" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="text" id="txt2" class="inputBox" maxlength="10" /></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>

	<!-- Inline Raw -->
	<?php if ($style == 1) { ?>
		<body>
		<form>
		<table border="0">
		<tr>
			<td><?php echo "$salePriceLabel (&#165;)"; ?></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo "$commissionLabel (&#165;)"; ?></td>
		</tr>
		<tr>
			<td><input type="text" id="txt1" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="text" id="txt2" maxlength="10" /></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>

	<!-- Stacked Pretty -->
	<?php if ($style == 2) { ?>
		<body>
		<form>
		<table border="0">
		<tr class="textStyle">
			<td><?php echo "$salePriceLabel"; ?></td>
		</tr>
		<tr>
			<td><input type="text" id="txt1" class="inputBox" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr class="textStyle">
			<td><?php echo "$commissionLabel"; ?></td>
		</tr>
		<tr>
			<td><input type="text" id="txt2" class="inputBox" maxlength="10" /></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>

	<!-- Stacked Raw -->
	<?php if ($style == 3) { ?>
		<body>
		<form>
		<table border="0">
		<tr>
			<td><?php echo "$salePriceLabel (&#165;)"; ?></td>
		</tr>
		<tr>
			<td><input type="text" id="txt1" onkeyup="showCalc1(this.value)" maxlength="10" /></td>
		</tr>
		<tr>
			<td><br /></td>
		</tr>
		<tr>
			<td><?php echo "$commissionLabel (&#165;)"; ?></td>
		</tr>
		<tr>
			<td><input type="text" id="txt2" maxlength="10" /></td>
		</tr>
		</table>
		<input type="hidden" id="percentBefore" value="<?php echo $percentBefore; ?>" />
		<input type="hidden" id="baseAmount" value="<?php echo $baseAmount; ?>" />
		<input type="hidden" id="percentAfter" value="<?php echo $percentAfter; ?>" />
		<input type="hidden" id="taxation" value="<?php echo $taxation; ?>" />
		</form>
		<div class="txtHint"><span id="txtHint"></span></div>
		</body>
	<?php } ?>
<?php } ?>

</html>
