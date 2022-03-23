<?php
include("includes/includedFiles.php");

?>


<div class="entityInfo">

    <div class="centerSection">
        <div class="userInfo">
            <h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
        </div>
    </div>

    <div class="buttons items">
        <!-- Buttons User Details -->
        <button class="button" onclick="openPage('updateDetails.php')">
            User DETAILS
        </button>

        <!-- Logout  Buttons  -->
        <button class="button" onclick="logout()">
            LOGOUT
        </button>
    </div>

</div>