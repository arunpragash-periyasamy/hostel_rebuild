<?php
$mobile_number = "+916382868122";
$message = "Message_by_php";
$command = "python3 ./python/sendmessage.py $mobile_number $message";
$result = passthru($command, $return_var);
if ($return_var !== 0) {
    echo "Executing python script has an error";
}

echo $result;
echo $return_var;
?>