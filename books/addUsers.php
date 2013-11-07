<?php
include_once '../config/global.php';
if ($_SESSION['time'] + 10 * 60 < time()) {
    unset( $_SESSION['time'] );
    unset( $_SESSION['username'] );
    header( 'Location: ../books/login.php' ) ;
} else {
    if( empty( $_SESSION['username'] )){
        header( 'Location: ../books/login.php' ) ;
    }
    else{
        $_SESSION['time'] = time();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include '../assets/inc/meta.php';
    ?>
</head>
<body>
<div id="wrapper">
    <?php
    include APP_URL . 'assets/inc/header.php';
    ?>

    <div id="content">
        <p class="pageTitle">
            Add Administrator Users
        </p>
        <div class="width35 centermargin">
            <p class="margin0_left">Add Administrator Users</p>
            <form class="input addUserForm" >
                <p id="errors">

                </p>
                <label>Username:
                    <input name="username" type="text" placeholder="Username" data-type="username" value=""/>
                </label>
                <label>Password:
                    <input name="password" type="password" placeholder="Password" data-type="complex-password" value=""/>
                </label>
                <label>Confirm Password:
                    <input name="ConfirmPassword" type="password" placeholder="Confirm Password" data-type="confComplex-password" value=""/>
                </label>
                <label>Email:
                    <input name="email" type="text" placeholder="Email" data-type="email" value=""/>
                </label>
                <input class="submit" type="submit" value="Login In" />
            </form>
        </div>
        <div>
            <p class="redHeader aligncenter">
                Delete Users
            </p>
            <?php
            loadDB(DB_NAME);
            $q = "SELECT `user_id`, `username`, `email`, `last_ip`, `last_browser`, `last_platform`  FROM `47924`.`mr2358174_karate_entity_users` AS `mr2358174_karate_entity_users`;";
            $r = mysql_query($q);
            $users = array();
            $i = 0;
            while( ($row = mysql_fetch_assoc( $r ) ) ){
                $users[$i++] = $row;
            }

            echo '
            <div class="margin20_top margin10_left margin10_right users">
                    <div class="floatleft width20" >Username</div>
                    <div class="floatleft width25" >Email</div>
                    <div class="floatleft width10" >Last used ip</div>
                    <div class="floatleft width15" >Last used browser</div>
                    <div class="floatleft width15" >Last used platform</div>
                    <div class="floatleft width15" >Delete</div>
                    <div class="clear"></div>
                ';
            foreach ( $users as $user ) {
                echo '
                <div class="user">
                    <div class="floatleft width20" >'. $user['username'] .'</div>
                    <div class="floatleft width25" >'. $user['email'] .'</div>
                    <div class="floatleft width10" >'. $user['last_ip'] .'</div>
                    <div class="floatleft width15" >'. $user['last_browser'] .'</div>
                    <div class="floatleft width15" >'. $user['last_platform'] .'</div>
                    <div class="floatleft width5 userDelete" userId="'.$user['user_id'].'" data-name="'. $user['username'] .'" >Delete</div>
                    <div class="clear"></div>
                </div>
                    ';
            }
            echo '</div>';
            ?>
        </div>
    </div>
    <?php
    include APP_URL . 'assets/inc/footer.php';
    ?>
</div>
</body>
</html>
