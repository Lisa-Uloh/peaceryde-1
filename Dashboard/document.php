<?php include("./inc/check_session.php"); ?>
<?php  
    $upload = new Upload($connect);
    $UPLOADS = $upload->getUserUploads($USER_ID);

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./dist/image/logo.png">
    <title>PeaceRyde</title>
    <!-- Custom CSS -->
    <link href="./assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="./assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="./dist/css/style.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @media only screen and (max-width: 1680px) {
            .breadcrumb {
                margin-top: -100px;
                margin-left: 758px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 1600px) {
            .breadcrumb {
                margin-top: -200px;
                margin-left: 758px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 1440px) {
            .breadcrumb {
                margin-top: -70px;
                margin-left: 658px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 1366px) {
            .breadcrumb {
                margin-top: -200px;
                margin-left: 558px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 1280px) {
            .breadcrumb {
                margin-top: -200px;
                margin-left: 458px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 820px) {
            .breadcrumb {
                margin-top: -200px;
                margin-left: 358px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 768px) {
            .breadcrumb {
                margin-top: -220px;
                margin-left: 214px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 540px) {
            .breadcrumb {
                margin-top: -220px;
                margin-left: 214px;
            }

            .account {
                padding-top: 0px;
            }

            .account-img {
                margin-left: 19px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .breadcrumb {
                margin-top: -160px;
                margin-left: 14px;
            }

            .example {
                margin-left: 7px;
            }

        }

        @media only screen and (max-width: 412px) {
            .breadcrumb {
                margin-top: -160px;
                margin-left: 14px;
            }

            .account {
                padding-top: 0px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .6rem;
            }

            .example {
                margin-left: 3px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .account-img {
                margin-left: 9px;
            }
        }

        @media only screen and (max-width: 390px) {
            .breadcrumb {
                margin-top: -120px;
                margin-left: 1px;
            }

            .account {
                padding-top: 0px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .55rem;
            }

            .example {
                margin-left: 3px;
            }

            .mobile {
                margin-left: 30px;
            }

            .sidebarAccount h2 {
                margin-left: -25px;
            }

            .sidebarAccount p {
                margin-left: -30px;
            }
        }

        @media only screen and (max-width: 360px) {
            .breadcrumb {
                margin-top: -170px;
                margin-left: 14px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .5rem;
            }

        }

        @media only screen and (max-width: 320px) {
            .breadcrumb {
                margin-top: -220px;
                margin-left: 214px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 280px) {
            .breadcrumb {
                margin-top: -250px;
                margin-left: 14px;
            }

            .mobile {
                margin-left: 0px;
            }

            .account {
                padding-left: 0px;
            }

            .account-img {
                margin-left: 49px;
            }
        }

        .left-sidebar a:hover {
            color: #f1f1f1;
        }

        .left-sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        .question {
            font-family: Ubuntu;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            padding: 20px 80px 20px 20px;
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .question::after {
            content: "\002B";
            font-size: 2.2rem;
            position: absolute;
            right: 20px;
            transition: 0.2s;
        }

        .question.active::after {
            transform: rotate(45deg);
        }

        .answercont {
            max-height: 0;
            overflow: hidden;
            transition: 0.3s;
        }

        .answer {
            padding: 0 20px 20px;
            line-height: 1.5rem;
        }

        .containerques {
            background-color: white;
            color: #0A0E69;
            border-radius: 10px;
            width: 622px;
            margin: 20px 0;
            margin-left: 43px;

        }
    </style>

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">

        </header>


        <!-- Sidebar -->
        <?php include("./inc/sidebar.php"); ?>
        <!-- Sidebar -->


        <div class="page-wrapper" id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="align-self-center">
                        <div class="row">
                            <div class="">
                                <h3 class="page-title text-truncate mb-1" style="font-family: Ubuntu;
                                font-size: 30px;
                                font-style: normal;
                                color:#0F1377;
                                padding-top:20px;padding-left:51px
                                ">My Document</h3>

                            </div>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <div class="customize-input">
                            <ol class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="" style="color: #080C58;"><svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.6618 3.6875C19.1722 3.6875 20.3962 4.91146 20.3962 6.42188V16.5781C20.3962 18.0885 19.1722 19.3125 17.6618 19.3125H3.33887C2.61367 19.3125 1.91817 19.0244 1.40537 18.5116C0.892577 17.9988 0.604492 17.3033 0.604492 16.5781V6.42188C0.604492 4.91146 1.82845 3.6875 3.33887 3.6875H17.6618ZM19.0941 8.55781L10.8139 13.112C10.7287 13.1588 10.6341 13.186 10.537 13.1915C10.4399 13.197 10.3429 13.1807 10.2529 13.1437L10.1868 13.1125L1.90658 8.55729V16.5781C1.90658 16.958 2.05748 17.3223 2.32608 17.5909C2.59469 17.8595 2.959 18.0104 3.33887 18.0104H17.6618C18.0417 18.0104 18.406 17.8595 18.6746 17.5909C18.9432 17.3223 19.0941 16.958 19.0941 16.5781V8.55781ZM17.6618 4.98958H3.33887C2.959 4.98958 2.59469 5.14048 2.32608 5.40909C2.05748 5.6777 1.90658 6.04201 1.90658 6.42188V7.0724L10.5003 11.7984L19.0941 7.07187V6.42188C19.0941 6.04201 18.9432 5.6777 18.6746 5.40909C18.406 5.14048 18.0417 4.98958 17.6618 4.98958Z" fill="#080C58" />
                                            <circle cx="16" cy="6.09082" r="6" fill="#E80F0F" />
                                            <path d="M14.023 3.95C14.441 3.78867 14.848 3.58333 15.244 3.334C15.64 3.07733 16.003 2.75833 16.333 2.377H17.059V10H16.036V3.796C15.948 3.87667 15.838 3.961 15.706 4.049C15.5813 4.137 15.442 4.22133 15.288 4.302C15.1413 4.38267 14.9837 4.45967 14.815 4.533C14.6537 4.60633 14.496 4.66867 14.342 4.72L14.023 3.95Z" fill="white" />
                                        </svg>
                                        &nbsp;&nbsp; Inbox</a></li>
                                <li class="breadcrumb-item">
                                    <button id="top" class="" onclick="openForm()" style="background-color: transparent;
                                border: transparent;
                                color: #080C58;">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5 1.25C17.8315 1.25 18.1495 1.3817 18.3839 1.61612C18.6183 1.85054 18.75 2.16848 18.75 2.5V12.5C18.75 12.8315 18.6183 13.1495 18.3839 13.3839C18.1495 13.6183 17.8315 13.75 17.5 13.75H5.5175C4.85451 13.7501 4.21873 14.0136 3.75 14.4825L1.25 16.9825V2.5C1.25 2.16848 1.3817 1.85054 1.61612 1.61612C1.85054 1.3817 2.16848 1.25 2.5 1.25H17.5ZM2.5 0C1.83696 0 1.20107 0.263392 0.732233 0.732233C0.263392 1.20107 0 1.83696 0 2.5L0 18.4913C2.62686e-05 18.6149 0.0367407 18.7358 0.105497 18.8386C0.174252 18.9414 0.271959 19.0215 0.386249 19.0687C0.50054 19.116 0.626276 19.1282 0.747545 19.104C0.868814 19.0797 0.980163 19.0201 1.0675 18.9325L4.63375 15.3663C4.86812 15.1318 5.18601 15.0001 5.5175 15H17.5C18.163 15 18.7989 14.7366 19.2678 14.2678C19.7366 13.7989 20 13.163 20 12.5V2.5C20 1.83696 19.7366 1.20107 19.2678 0.732233C18.7989 0.263392 18.163 0 17.5 0L2.5 0Z" fill="#080C58" />
                                        </svg>
                                        Send a Message
                                    </button>



                                <li class="breadcrumb-item"><a href="javascript:void(0)" style="color: #080C58;"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.0625 2.58789L12.4375 3.66914C13.7482 4.42585 14.7725 5.5939 15.3517 6.99212C15.9308 8.39034 16.0324 9.94059 15.6407 11.4024C15.249 12.8643 14.3859 14.1561 13.1852 15.0774C11.9846 15.9987 10.5134 16.4981 9 16.4981C7.48658 16.4981 6.01545 15.9987 4.81477 15.0774C3.61409 14.1561 2.75097 12.8643 2.35926 11.4024C1.96756 9.94059 2.06917 8.39034 2.64833 6.99212C3.22749 5.5939 4.25184 4.42585 5.5625 3.66914L4.9375 2.58789C3.38854 3.48219 2.17795 4.8626 1.49348 6.51504C0.809018 8.16749 0.688934 9.99961 1.15186 11.7273C1.61478 13.4549 2.63483 14.9815 4.05382 16.0703C5.4728 17.1592 7.21141 17.7493 9 17.7493C10.7886 17.7493 12.5272 17.1592 13.9462 16.0703C15.3652 14.9815 16.3852 13.4549 16.8482 11.7273C17.3111 9.99961 17.191 8.16749 16.5065 6.51504C15.8221 4.8626 14.6115 3.48219 13.0625 2.58789Z" fill="#E80F0F" />
                                            <path d="M8.375 0.25H9.625V9H8.375V0.25Z" fill="#E80F0F" />
                                        </svg>
                                        &nbsp; &nbsp; Logout</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="containerques" style="margin-top: 96px;">
                <div class="question">
                    My Uploads
                </div>
                <div class="answercont">
                    <div class="answer">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="color:#000000;font-family: Ubuntu;font-size: 16px;font-style: normal;font-weight: 400;">Status</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php if(count($UPLOADS)): ?>
                                    <?php foreach($UPLOADS as $UPLOAD): ?>
                                        <tr>
                                            <th scope="row" style="padding-top:48px;padding-left:36px;color:#5A5A5A;font-family: Ubuntu;font-size: 16px;font-style: normal;font-weight: 400;">
                                                <?= $UPLOAD['name'] ?>
                                            </th>
                                            <td style="padding-top:48px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5A5A5A" />
                                                    <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5A5A5A" />
                                                    <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5A5A5A" />
                                                </svg>
                                                <span style="color:#5A5A5A;font-family: Ubuntu;padding-left:16px;font-size: 16px;font-style: normal;font-weight: 500;">
                                                    <?= $UPLOAD['status']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td class="text-center text-sm text-muted" colspan="2"> No uploads found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="chat-popup" id="myForm">
                <div class="form-container">
                    <div class="wrapper">
                        <div class="mainchat">
                            <button type="button" class="btn cancel" style="margin-left: 280px;" onclick="closeForm()">X</button>
                            <div class="px-2 scroll">
                                <?php if (count($USER_MESSAGES)) : ?>
                                    <?php foreach ($USER_MESSAGES as $message) : ?>
                                        <?php $messages->mark_read($message['message_id']); ?>
                                        <!--   SENDER  -->
                                        <?php if ($message['sender_id'] == $USER_ID) : ?>
                                            <!-- USER -->
                                            <div class="d-flex align-items-center text-right justify-content-end ">
                                                <div class="pr-2"> <span class="name"><?= $USER['firstname'] . ' ' . $USER['lastname']; ?></span>
                                                    <p class="msg"><?= $message['message']; ?></p>
                                                </div>
                                                <div>
                                                    <div class="avater">
                                                        <?= getSubName($USER['firstname'] . ' ' . $USER['lastname']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php else : ?>
                                            <div class="d-flex align-items-center">
                                                <div class="text-left pr-1">
                                                    <div class="avater">
                                                        <?= "A"; ?>
                                                    </div>
                                                </div>
                                                <div class="pr-2 pl-1"> <span class="name">Admin</span>
                                                    <p class="msg"><?= $message['message'] ?>.</p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p class="text-muted text-center">No messages yet</p>
                                <?php endif; ?>

                            </div>
                            <form action="./handler/message_handler.php" method="post" class="navbars bg-white navbar-expand-sm d-flex justify-content-between">
                                <input type="text" name="message" class="form-controls" placeholder="Type a message...">
                                <input type="hidden" name="sender" value="<?= $USER_ID ?>">
                                <input type="hidden" name="reciever" value="<?= "MAIN_ADMIN" ?>">
                                <button name="send" style="border: none; background: transparent;" class=" d-flex justify-content-end align-content-center text-center ml-2">
                                    <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32.4419 20.4722C32.5822 19.2858 32.0534 18.1264 31.0686 17.4434L8.12261 1.50404C7.09665 0.772938 5.80289 0.713532 4.70133 1.30734C3.57966 1.91099 2.86538 3.55356 3.029 4.81133L4.30132 14.5749C4.43205 15.5761 5.23388 16.3557 6.23997 16.4571L19.7964 17.8394C20.4918 17.8985 20.9955 18.5204 20.9086 19.213C20.8348 19.8949 20.222 20.3912 19.5266 20.3321L5.95836 18.9379C4.95253 18.8342 4.00153 19.4326 3.65928 20.3856L0.300426 29.7007C-0.10413 30.8007 0.103129 31.9631 0.816651 32.8442C0.900595 32.9479 0.995031 33.0645 1.09201 33.1576C2.04085 34.0627 3.38245 34.3065 4.60167 33.8126L30.4291 23.1319C31.5361 22.6861 32.3016 21.6586 32.4419 20.4722Z" fill="#1161D9" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->

        </div>

    </div>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
    <script>
        function openNav() {
            document.getElementById("sidebar").style.width = "260px";
            document.getElementById("main").style.marginLeft = "260px";
        }

        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";

        }
    </script>
    <script>
        let question = document.querySelectorAll(".question");

        question.forEach(question => {
            question.addEventListener("click", event => {
                const active = document.querySelector(".question.active");
                if (active && active !== question) {
                    active.classList.toggle("active");
                    active.nextElementSibling.style.maxHeight = 0;
                }
                question.classList.toggle("active");
                const answer = question.nextElementSibling;
                if (question.classList.contains("active")) {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                } else {
                    answer.style.maxHeight = 0;
                }
            })
        })
    </script>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="./dist/js/app-style-switcher.js"></script>
    <script src="./dist/js/feather.min.js"></script>
    <script src="./assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="./dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="./assets/extra-libs/c3/d3.min.js"></script>
    <script src="./assets/extra-libs/c3/c3.min.js"></script>
    <script src="./assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="./assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="./assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>