<div class="w3-top w3-row">
    <!-- Navigation bar on Large screens -->
    <ul class="w3-black w3-navbar w3-theme-d2 w3-left-align w3-large">
        <li class="w3-hide-medium w3-hide-large w3-opennav w3-right w3-black">
            <a class="w3-hover-blue w3-large" href="javascript:void(0);" onclick="menutoggle()" title="Toggle Navigation Menu"><i id="pmenu" class="fa fa-bars"></i></a>
        </li>
        <li><a href="index.php" class="w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a></li>
        <li class="w3-hide-small"><a class="w3-hover-blue" href="notifications.php"><i class="fa fa-newspaper-o w3-margin-right"></i>Notifications</a></li>
        <li class="w3-hide-small"><a class="w3-hover-blue" href="checkstatus.php"><i class="fa fa-check-square w3-margin-right"></i>Check Status</a></li>
        <li class="w3-dropdown-click w3-hide-small w3-right">
            <a class="w3-hover-blue" onclick="dropdown()" href="javascript:void(0);"><i class="fa fa-user"></i> Account <i id="favicon" class="fa fa-caret-down"></i></a>
            <div id="dmenu" class="w3-dropdown-content w3-white w3-card-4">
                <a class="w3-hover-blue" href="settings.php"><i class="fa fa-cog"></i> Settings</a>
                <a class="w3-hover-blue" href="../../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </li>
    </ul>

    <!-- Navigation bar on small screens -->
    <div id="phonemenu" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:43px">
        <ul class="w3-navbar w3-left-align w3-large w3-black">
            <li><a class="w3-padding-large w3-hover-blue" href="notifications.php"><i class="fa fa-newspaper-o w3-margin-right"></i>Notifications</a></li>
            <li><a class="w3-padding-large w3-hover-blue" href="checkstatus.php"><i class="fa fa-check-square w3-margin-right"></i>Check Status</a></li>
            <li><a class="w3-padding-large w3-hover-blue" href="settings.php"><i class="fa fa-cog"></i> Settings</a></li>
            <li><a class="w3-padding-large w3-hover-blue w3-center" href="../../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</div>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
    function menutoggle() {
        var y = document.getElementById("pmenu");
        var x = document.getElementById("phonemenu");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            y.className = y.className.replace(" fa-bars", " fa-close");
        } else {
            x.className = x.className.replace(" w3-show", "");
            y.className = y.className.replace(" fa-close", " fa-bars");
        }
    }
    function dropdown() {
        var y = document.getElementById("favicon");
        var x = document.getElementById("dmenu");

        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            y.className = y.className.replace(" fa-caret-down", " fa-caret-up");
        } else {
            x.className = x.className.replace(" w3-show", "");
            y.className = y.className.replace(" fa-caret-up", " fa-caret-down");
        }
    }
</script>