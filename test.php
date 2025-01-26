<?php
require_once 'classes/front.php';
$email = 'aankitbelal@gmail.com';
$front = new Front();
$check=$front->sendotp($email);
