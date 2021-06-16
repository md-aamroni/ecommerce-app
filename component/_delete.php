<?php

/**
 * Defination:
 *
 *
 * Usage:
 *
 */
function deleteButton($deleteID, $buttonName, $isFileExist = null, $action = "delete")
{
	$makeForm = '<form method="POST" action="' . $action . '">';
	$makeForm .= '<input type="hidden" name="csrf_token" value="" />';
	$makeForm .= '<input type="hidden" name="delete_id" value="' . $deleteID . '" />';

	if (!is_null($isFileExist)) {
		$makeForm .= '<input type="hidden" name="filePath" value="' . $isFileExist . '" />';
	}

	$makeForm .= '<button name="' . $buttonName . '"
							class="btn btn-primary btn-sm waves-effect waves-light mw-80"
							type="submit"><i class="fas fa-trash"></i> Trash</button>';
	$makeForm .= '</form>';

	return $makeForm;
}
