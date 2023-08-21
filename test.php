<?php

$notAuth = "";

include "connect.php";

sendGCM("hi", "How Are You", "users", "","");

echo "Not Auth";
