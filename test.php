<?php
include "idgames.php";

$api = new IdGamesApi();
echo "Ping Server Response: ";
echo $api->pingServer();
echo "DB Ping Server Response: ";
echo $api->pingDBServer();
echo "Get API Info: ";
echo $api->getApiInfo();
echo "Get File by ID: ";
echo $api->getFileById(3);
echo "Get File by Path: ";
echo $api->getFileByPath('levels/doom2/megawads/d2reload.zip');