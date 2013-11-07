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
            Add Events
        </p>
        <div class="width35 centermargin">
            <p class="margin0_left">Add Events</p>
            <form class="input addEventForm" >
                <p id="errors">

                </p>
                <label>Name:
                    <input name="name" type="text" placeholder="Name" data-type="length-4"/>
                </label>
                <label>Description:
                    <textarea name="description" placeholder="Description" data-type="length-7" ></textarea>
                </label>
                <label>Date:
                    <input name="date" placeholder="Date" type="date" data-type="date"/>
                </label>
                <label>Start Time:
                    <input name="startTime" placeholder="Start Time" type="time" data-type="time"/>
                </label>
                <label>End Time:
                    <input name="endTime" placeholder="End Time" type="time" data-type="time"/>
                </label>
                <input class="submit" type="submit" value="Add Event" />
            </form>
        </div>
        <div>
            <p class="redHeader aligncenter">
                Delete Events
            </p>
            <?php
            loadDB(DB_NAME);
            $q = "SELECT `event_id`, `name`, `description`, `start_date`, `start_time`, `end_time` FROM `mr2358174_karate_entity_events`;";
            $r = mysql_query($q);
            $events = array();
            $i = 0;
            while( ($row = mysql_fetch_assoc( $r ) ) ){
                $events[$i++] = $row;
            }

            echo '
            <div class="margin20_top margin10_left margin10_right events">
                    <div class="floatleft width20" >Name</div>
                    <div class="floatleft width25" >Description</div>
                    <div class="floatleft width10" >Date</div>
                    <div class="floatleft width15" >Start time</div>
                    <div class="floatleft width15" >End time</div>
                    <div class="floatleft width15" >Delete</div>
                    <div class="clear"></div>
                ';
            foreach ( $events as $event ) {
                echo '
                <div class="event">
                    <div class="floatleft width20" >'. $event['name'] .'</div>
                    <div class="floatleft width25" >'. $event['description'] .'</div>
                    <div class="floatleft width10" >'. $event['start_date'] .'</div>
                    <div class="floatleft width15" >'. $event['start_time'] .'</div>
                    <div class="floatleft width15" >'. $event['end_time'] .'</div>
                    <div class="floatleft width5 eventDelete" eventId="'. $event['event_id'].'" data-name="'. $event['name'] .'" >Delete</div>
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
