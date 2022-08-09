<?php

session_start();

// require_once("../../db/conf.php");
require_once("../../db/config.php");
require_once("../../setup.php");
require_once("../../functions/index.php");
require_once("../../utils/country_fee.php");
require_once("../../utils/store.php");

require_once("../../models/Admin.php");
require_once("../../models/BI.php");
require_once("../../models/Card.php");
require_once("../../models/FAQs.php");
require_once("../../models/Message.php");
require_once("../../models/Payment.php");
require_once("../../models/ResetPassword.php");
require_once("../../models/ResetUserPassword.php");
require_once("../../models/Review.php");
require_once("../../models/Service.php");
require_once("../../models/Tracking.php");
require_once("../../models/Upload.php");
require_once("../../models/User.php");
require_once("../../models/UserLogin.php");
require_once("../../models/SubadminUsers.php");
require_once("../../models/UserService.php");

require_once("../../payment/Paystack.php");