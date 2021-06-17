
<?php

use App\Http\Controllers\AdminController;

$admin = new AdminController;

echo '<pre>';
print_r($admin->index());
echo '</pre>';

?>
