<?php

/* READ VALUES AND MAKE CALCULATIONS */
@$base    = $_POST['base'];
@$foreign = $_POST['foreign'];
@$amount  = $_POST['amount'];

/* require class and create function */
require ('class.php');
function format($amount) { return round($amount, 2); }

/* create object */
$fx = new exchange($base, $foreign);

/* echo the value */
echo format($fx->toForeign($amount));


