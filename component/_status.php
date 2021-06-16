<?php

/**
 * Defination:
 *
 *
 * Usage:
 *
 */
function changeStatus($changeID, $currentStatus)
{
	$makeForm = '<form method="POST" action="">';
	$makeForm .= '<input type="hidden" name="csrf_token" value="" />';
	$makeForm .= '<input type="hidden" name="id" value="' . $changeID . '" />';
	$makeForm .= '<input type="hidden" name="status" value="' . $currentStatus . '" />';

	switch ($currentStatus) {
		case 'Active':
			$makeForm .= '<button name="changeStatus"
									class="btn btn-info btn-sm waves-effect waves-light mw-80"
									type="submit"">' . $currentStatus . '</button>';
			break;
		case 'Inactive':
			$makeForm .= '<button name="changeStatus"
									class="btn btn-secondary btn-sm waves-effect waves-light mw-80"
									type="submit"">' . $currentStatus . '</button>';
			break;
	}

	$makeForm .= '</form>';

	return $makeForm;
}
