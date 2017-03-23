<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
unlink("./position_data/paths/2/2.txt");
unlink("./position_data/paths/3/2.txt");
}
?>