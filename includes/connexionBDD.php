<?php

require __DIR__.'/config.inc.php';

use App\Model\Repository\Repository;

$repository = new Repository($database['host'], $database['base'], $database['user'], $database['password']);
