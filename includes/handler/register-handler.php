<?php
function DatanyaPassword ($InputText) {
    $InputText=strip_tags ($InputText);
    return $InputText;
}

function DatanyaFromUsername ($InputText) {
    $InputText=strip_tags ($InputText);
    $InputText=str_replace (" "," ",$InputText);
    return $InputText;
}
function DatanyaFromString($InputText){
    $InputText=strip_tags($InputText);
    $InputText=str_replace(" ","",$InputText);
    $InputText=ucfirst(strtolower($InputText));
    return $InputText;
}

if(isset($_POST['RegisterButton'])){
    //whatever semacam alert aja buat Simple
    $Username = DatanyaFromUsername($_POST['Username']);
    $Firstname = DatanyaFromString($_POST['Firstname']);
    $Lastname = DatanyaFromString($_POST['Lastname']);
    $Email= DatanyaFromString ($_POST['Email']);
    $Password = DatanyaPassword($_POST['Password']);
    $Kalausuccess =$account->register($Username, $Firstname,$Lastname , $Email, $Password);
    if ($Kalausuccess ==true) {
        header("location:index.php");
    }
}

?>