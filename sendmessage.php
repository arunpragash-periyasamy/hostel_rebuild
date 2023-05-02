<?php
$command = 'python3 ./python/sendmessage.py';
exec($command, $output, $exitCode);
print_r($output);
if ($exitCode !== 0) {
    die("Script exited with code $exitCode.");
}
?>