<?php

/** Number to Words (for Invoice) */
function numberToWords($num, $sentenceCase = false)
{
	$ones 		= [
		"ZERO", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE",
		"THIRTEEN", "FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN", "NINETEEN", "014" => "FOURTEEN"
	];
	$tens 		= ["ZERO", "TEN", "TWENTY", "THIRTY", "FORTY", "FIFTY", "SIXTY", "SEVENTY", "EIGHTY", "NINETY"];
	$hundreds	= ["HUNDRED", "THOUSAND", "MILLION", "BILLION", "TRILLION", "QUARDRILLION"]; // Limit to Quadrillion
	$num			= number_format($num, 2, ".", ",");
	$num_arr		= explode(".", $num);
	$wholenum	= $num_arr[0];
	$decnum		= $num_arr[1];
	$whole_arr	= array_reverse(explode(",", $wholenum));
	krsort($whole_arr, 1);
	$returnString = "";

	foreach ($whole_arr as $key => $i) {
		while (substr($i, 0, 1) == "0")
			$i = substr($i, 1, 5);
		if ($i < 20) {
			@$returnString .= $ones[$i];
		} elseif ($i < 100) {
			if (substr($i, 0, 1) != "0") $returnString .= $tens[substr($i, 0, 1)];
			if (substr($i, 1, 1) != "0") $returnString .= " " . $ones[substr($i, 1, 1)];
		} else {
			if (substr($i, 0, 1) != "0") $returnString .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
			if (substr($i, 1, 1) != "0") $returnString .= " " . $tens[substr($i, 1, 1)];
			if (substr($i, 2, 1) != "0") $returnString .= " " . $ones[substr($i, 2, 1)];
		}

		if ($key > 0) {
			$returnString .= " " . $hundreds[$key] . " ";
		}
	}

	if ($decnum > 0) {
		$returnString .= " and ";
		if ($decnum < 20) {
			$returnString .= $ones[$decnum];
		} elseif ($decnum < 100) {
			$returnString .= $tens[substr($decnum, 0, 1)];
			$returnString .= " " . $ones[substr($decnum, 1, 1)];
		}
	}

	if (!is_null($sentenceCase) && $sentenceCase === true) {
		return ucwords(strtolower($returnString));
	} else {
		return $returnString;
	}
}
