<?php 

session_start(); 

include("../db/config.php");

include("../utils/country_fee.php");
include("../functions/index.php");
include("../models/User.php");
include("../models/Service.php");
include("../models/UserService.php");
include("../models/Tracking.php");
include("../models/BI.php");
include("../models/UserLogin.php");
include("../models/FAQs.php");
include("../models/Card.php");
include("../models/Payment.php");
include("../models/Message.php");
include("../models/Upload.php");
include("../models/Review.php");
include("../models/Admin.php");
include("../models/ResetUserPassword.php");

include("../payment/Paystack.php");

if(!isset($_SESSION["LOGGED_USER"])) header("Location: ../signin.php");

if(isset($_SESSION["REG_MODE"])) {
    if($_SESSION["REG_MODE"] == "TWP") {
        header("Location: ./NTWPDASHFORM.php");
    }

    if($_SESSION["REG_MODE"] == "BVA") {
        header("Location: ./NBVADASHFORM.php");
    }
}
?>


<?php  
    $users = new User($connect);
    $LOGGED_USER = json_decode($_SESSION['LOGGED_USER'], true);
    $USER_ID = $LOGGED_USER['user_id'];

    $USER = $users->get_user($USER_ID);
?>
