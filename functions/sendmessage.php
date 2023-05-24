<?php

// function to send an email
// arguments $to = address, $body = body of the email ,$subject = subject of the mail
function send_mail($to, $body, $subject = "Message from the KEC Hostels"){
    

    // essential details for sending an email
    $from = 'hostels@kec';
    $server = 'smtp.gmail.com:587';
    $username = 'arunpragashap.19msc@kongu.edu';
    $password = 'lgdsdzjdcnomljqj';
    $contenttype = 'message-content-type=text/html';


    // execution command for sending email from ubuntu with the help of mail server
    $sendEmailCmd = "/usr/bin/sendEmail -f $from -t $to -u '$subject' -m '$body' -s $server -xu $username -xp $password -o $contenttype";

    // Execute the sendEmail command using exec function for running shell script
    $output = array();
    exec($sendEmailCmd, $output, $result);

    // Check the result either mail sent successfully or not
    if ($result === 0) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email: "; // . implode("\n", $output);
    }

}



// function to send an whatsapp message
function send_whatsapp_message($mobile_number = "+916382868122",$message = "Message_by_php"){
    
    $command = "python3 ./python/sendmessage.py $mobile_number $message";
    $result = passthru($command, $return_var);
    if ($return_var !== 0) {
        echo "Executing python script has an error";
    }
    
    echo $result;
    echo $return_var;
}
?>