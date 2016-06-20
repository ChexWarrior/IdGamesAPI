<?php
include "idgames.php";

$api = new IdGamesApi();
echo "Ping Response: {$api->ping()}";