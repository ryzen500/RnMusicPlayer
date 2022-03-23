<?php
if (isset($_POST['loginButton'])) {
//whatever just semacam alert aja simpel

    $username=$_POST['loginUsername'];
    $password=$_POST['loginPassword'];

    $result=$account->login($username, $password);

    if ($result == true){
        header("Location: index.php");
    }
}
?>