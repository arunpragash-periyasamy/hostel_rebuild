<?php


function sendmail($to, $body, $subject = "Message from the KEC Hostels"){
    
    $from = 'hostels@kec';
    $server = 'smtp.gmail.com:587';
    $username = 'arunpragashap.19msc@kongu.edu';
    $password = 'lgdsdzjdcnomljqj';
    $contenttype = 'message-content-type=text/html';


    $sendEmailCmd = "/usr/bin/sendEmail -f $from -t $to -u '$subject' -m '$body' -s $server -xu $username -xp $password -o $contenttype";

    // Execute the sendEmail command
    $output = array();
    exec($sendEmailCmd, $output, $result);

    // Check the result
    if ($result === 0) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email: "; // . implode("\n", $output);
    }

}


// Build the sendEmail command

?>