<?php
require_once('classes/User.php');
$user = new User();
if (!$user->isLoggedIn())
    header("Location: signin.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <title>gpsHub</title>

    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
    <script src="js/jquery.layout-latest.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&language=ru&libraries=drawing"
            type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/map.min.js" type="text/javascript"></script>
    <script src="js/user.min.js" type="text/javascript"></script>

    <link rel="StyleSheet" type="text/css" href="css/layout-default-latest.min.css"/>
    <link rel="StyleSheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="StyleSheet" type="text/css" href="css/main.min.css"/>
</head>
<body>
<div id="container" class="layout-item">
    <div id="list-layout" class="layout-item">
        <div id="list-header">
            <input class="form-control input-sm clearable" placeholder="Поиск машины">
        </div>
        <div id="list">
            <ul>
                <?php
                    while($row = $user->getDrivers()->fetch_array(MYSQLI_ASSOC)){
                        echo "<li><div class='circle online'></div><div>" . $row['name'] . "<br>" . $row['phone_number'] . "</div></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <div id="map-layout" class="layout-item">
        <div id="map-canvas"></div>
    </div>
</div>

<div id="userbar">
    <div id="userinfo">
        <?php
        echo $user->getEmail() . "; " . $user->getName() . "<br>";
        echo $user->getCompanyName();
        ?>
    </div>
    <div class="btn-group">
        <button id="sign-in-button" type="button" class="btn btn-warning" onclick="signOut()">
            <span class="glyphicon glyphicon glyphicon-log-out"></span>
        </button>
    </div>
</div>

<div id="menubar">
    <div class="btn-group">
        <button id="zoom-out" type="button" class="btn btn-success glyphicon glyphicon-zoom-out"></button>
        <button id="zoom-in" type="button" class="btn btn-success glyphicon glyphicon-zoom-in"></button>
    </div>
</div>

</body>
</html>	