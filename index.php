<?php
session_start();
$select = 1;            //Remove After Librarian Login Is Completed...
require_once './includes/db.inc.php';
if (isset($_SESSION['username']) == "librarian" && $_SESSION['llogin'] === "true") {
    header('location: role/librarian/index.php');
}
$lerr = 0;
if (isset($_GET['lfail'])) {
    $select = 1;
    $lerr = 2;
    $lerr2 = 'Sign-in to Continue';
    $continue = $_GET['continue'];
    $redirect = 'true';
}
$username = "";
if (isset($_POST['llogin'])) {
    $select = 1;
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $lerr1 = "Invalid Username or Password";

    $lerr = 0;
    if ($username == NULL || $password == NULL) {
        $lerr = 1;
    } else {
        $query = "select * from librarian where username='$username' and password='$password'";
        if (mysqli_query($link, $query)) {
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) == 1) {
                $lerr = 0;
                $result = (mysqli_fetch_assoc($result));
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $result['name'];
                $_SESSION['llogin'] = "true";
                $_SESSION['picture'] = $result['picture'];
                if ($redirect == "true") {
                    header('location: ' . $continue);
                } else {
                    header('location: role/librarian/index.php');
                }
            } else {
                $lerr = 1;
            }
        } else {
            $lerr = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/w3.css">
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <title>Library: Login</title>
    <style>
<?php
switch ($select) {
    case 1:
        echo ".slogin {display:none;}";
        break;
    default :
        echo ".llogin {display:none;}";
        break;
}
?>
    </style>
    <body>
        <div class="w3-twothird">
            <img style="width:100%" src="images/banner.jpg">
        </div>
        <div class="w3-third w3-grey w3-container" style="height: 91px;">
            <h2 class="w3-center" style="font-size: 2.5em;"><strong><b><i class="fa fa-book"></i>Online Library Portal</b></strong></h2>
        </div>
        <div class="w3-half">
            <div class="w3-row">
                <a href="#" onclick="openForm(event, 'slogin');">
                    <div class="w3-third tablink w3-bottombar w3-hover-shadow w3-padding <?php if (!isset($select)) echo "w3-border-blue"; ?> w3-center"><b><i class="w3-text-teal fa fa-sign-in"></i> Student Login</b></div>
                </a>
                <a href="#" onclick="openForm(event, 'llogin');">
                    <div class="w3-third tablink w3-bottombar w3-hover-shadow w3-padding <?php if ($select === 1) echo "w3-border-blue"; ?> w3-center"><b><i class="w3-text-teal fa fa-sign-in"></i> Librarian Login</b></div>
                </a>
                <a href="register.php">
                    <div class="w3-third tablink w3-bottombar w3-hover-shadow w3-padding w3-center"><b><i class="w3-text-teal fa fa-user-plus"></i> Student Registration</b></div>
                </a>
            </div>

            <div id="slogin" class="w3-container slogin all w3-margin-top">
                <form class="w3-container w3-card-12 w3-padding" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2 class="w3-text-black w3-center"><strong>Student Login</strong></h2>
                    <p>      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Username :</strong></b></label><br>
                        <input class="w3-input w3-border w3-border-blue" name="username" type="text" placeholder="Username"></p>
                    <p>      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-lock"></i> Password :</strong></b></label><br>
                        <input class="w3-input w3-border w3-border-blue" name="password" type="password" placeholder="*******"></p>
                    <p>      
                        <button type="submit" name="slogin" class="w3-btn w3-border w3-round w3-teal"><b><i class="fa fa-sign-in"></i> Sign In</b></button>
                        <span class="w3-text-red"><b>&nbsp;&nbsp;&nbsp;<?php
                                $sign = "<i class=\"fa fa-warning\"></i> ";
                                if ($serr == 1) {
                                    echo $sign . $serr1;
                                }
                                if ($serr == 2) {
                                    echo $sign . $serr2;
                                }
                                ?></b></span></p>
                </form>
            </div>

            <div id="llogin" class="w3-container llogin all w3-margin-top">
                <form class="w3-container w3-card-12 w3-padding" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2 class="w3-text-black w3-center"><strong>Librarian Login</strong></h2>
                    <p>      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Username :</strong></b></label><br>
                        <input class="w3-input w3-border w3-border-blue" name="username" type="text" placeholder="Username"></p>
                    <p>      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-lock"></i> Password :</strong></b></label><br>
                        <input class="w3-input w3-border w3-border-blue" name="password" type="password" placeholder="*******"></p>
                    <p>      
                        <button type="submit" name="llogin" class="w3-btn w3-border w3-round w3-teal"><b><i class="fa fa-sign-in"></i> Sign In</b></button>
                        <span class="w3-text-red"><b>&nbsp;&nbsp;&nbsp;<?php
                                $sign = "<i class=\"fa fa-warning\"></i> ";
                                if ($lerr == 1) {
                                    echo $sign . $lerr1;
                                }
                                if ($lerr == 2) {
                                    echo $sign . $lerr2;
                                }
                                ?></b></span></p>
                </form>
            </div>
        </div>
        <div class="w3-half">
        </div>

        <script>
            function openForm(evt, tab) {
                var i, x, tablinks;
                x = document.getElementsByClassName("all");
                for (i = 0; i < x.length; i++) {
                    if (x[i].className === tab) {
                        continue;
                    }
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" w3-border-blue", "");
                }
                document.getElementById(tab).style.display = "block";
                evt.currentTarget.firstElementChild.className += " w3-border-blue";
            }
        </script>
    </body>
</html> 
