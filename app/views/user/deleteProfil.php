<?php

$user = new \App\Controller\UserController();

$user->delete();

header('Location:index.php');