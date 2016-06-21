<?php
include "idgames.php";

$api = new IdGamesApi();
echo "Ping Server Response: {$api->pingServer()}\n\n";
echo "DB Ping Server Response: {$api->pingDBServer()}\n\n";
echo "Get API Info: {$api->getApiInfo()}";