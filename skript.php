<?php
//Config
$mailTo = 'rjwm@outlook.de';
$mailFrom = '"No-reply" <noreply@outlook.de>';
$mailSubject = 'Neue Nachricht über deine Webseite';
$returnPage = 'gesendet.php'
$returnErrorPage = 'error.php'
$mailText = "Über das Kontaktformular ist eine Nachricht eingegangen: \n \n-------------------------------\n \n"

//Create Mail

if(isset($_Post['submit'])){
    foreach($_Post as $name => $value){
        if(is_array($value)){
            $mailText .= $name . ":\n";
            
            foreach($valueArray as $entry){
                $mailText .= "   " . $value . "\n";
            }
        }
    }else{
        $mailText .= $name . ": " . $value . "\n"."\n";
    }
}

//Delivery mail
if(isset($_Post['submit'])){
$mailSent = @mail($mailTo, $mailSubject, $mailText, "Von: ".$mailFrom);

//Return side

if(mailSent == TRUE){
    header("Location:" . $returnPage);
}else{
    header("Location:" . $returnErrorPage);
}
}
exit();

?>