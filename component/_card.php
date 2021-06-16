<?php

/**
 * Defination:
 *
 *
 * Usage:
 *
 */
function card($color, $title, $value, $subTitle, $icon, $col = 'col-xl-3 col-md-6')
{
	$card = '
	<div class="' . $col . '">
		<div class="card bg-' . $color . ' mini-stat position-relative">
			<div class="card-body">
				<div class="mini-stat-desc">
					<h6 class="text-uppercase verti-label text-white-50">' . ucwords($title) . '</h6>
					<div class="text-white">
						<h6 class="text-uppercase mt-0 text-white-50">' . ucwords($title) . '</h6>
						<h3 class="mb-3 mt-0">' . $value . '</h3>
						<span class="badge badge-white py-1">' . ucwords($subTitle) . '</span>
					</div>
					<div class="mini-stat-icon"><i class="mdi ' . $icon . ' display-2"></i></div>
				</div>
			</div>
		</div>
	</div>
	';

	return $card;
}
