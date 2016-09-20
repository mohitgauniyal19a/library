<?php
require_once 'includes/db.inc.php';
require_once 'includes/secure.inc.php';
if (isset($_POST['abook'])) {
    $bookname = ucwords($_POST['bookname']);
    $bookauthor = ucwords($_POST['bookauthor']);
    $bookid = $_POST['bookid'];
    $place = $_POST['place'];
    foreach ($bookid as $bid) {
        $query = "INSERT INTO `library`.`books` (`book_id` ,`name` ,`author` ,`place` ,`available`)"
                . "VALUES ('$bid', '$bookname', '$bookauthor', '$place', 'Y')";
        if (mysqli_query($link, $query)) {
            $success = "Previous Record Successfully Added";
        }
    }
}
if (isset($_POST['ibook'])) {
    $bookname = ucwords($_POST['ibookname']);
    $bookauthor = ucwords($_POST['ibookauthor']);
    $bookid = $_POST['ibookid'];
    $s_id = $_POST['studentid'];
    $doi = time();
    $dos = time() + 15 * 24 * 60 * 60;
    $query = "INSERT INTO `library`.`book_issue` (`sno` ,`s_id` ,`book_id` ,`doi` ,`dos` ,`fine` ,`reissues` ,`status`)"
            . "VALUES (NULL , '$s_id', '$bookid', '$doi', '$dos', '0', '0', 'N')";
    if (mysqli_query($link, $query)) {
        $isuccess = "Previous Book Issue Record Successfully Added";
    }
}
?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../styles/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/w3.css">
    <link rel="icon" href="../../images/icons/Books-1-icon32.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../../images/icons/Books-1-icon48.png" type="image/x-icon" />
    <style>
<?php
switch ($select) {
    case 1:
        echo ".ibook {display:none;}";
        break;
    default :
        echo ".abook {display:none;}";
        break;
}
?>
    </style>
    <title>Home: Issue Book</title>
    <body>
        <?php require_once 'includes/nav.inc.php'; ?>
        <div style="margin-top: 44px;">
            <h2 class="w3-center" style="font-size: 2.5em;"><strong>
                    <i class="fa fa-book w3-margin-right"></i>
                    <b id="heading"><?php
                        $heading = $select === 1 ? "New Book Addition" : "Book Issue";
                        echo $heading;
                        ?></b></strong></h2>
        </div>
        <div class="w3-hide-small w3-hide-medium w3-col m0 s0 l1">&nbsp;</div>
        <div class="w3-col m12 s12 l10" style="margin: auto;">
            <div class="w3-row" style="">
                <a href="#" onclick="openForm(event, 'ibook');">
                    <div class="w3-half tablink w3-bottombar w3-hover-shadow w3-padding <?php if (!isset($select)) echo "w3-border-blue"; ?> w3-center"><b><i class="w3-text-teal fa fa-sign-in"></i> Book Issue Form</b></div>
                </a>
                <a href="#" onclick="openForm(event, 'abook');">
                    <div class="w3-half tablink w3-bottombar w3-hover-shadow w3-padding <?php if ($select === 1) echo "w3-border-blue"; ?> w3-center"><b><i class="w3-text-teal fa fa-sign-in"></i> Add New Book To Library</b></div>
                </a>
            </div>

            <div id="ibook" class="w3-container ibook all w3-margin-top">
                <form class="w3-container w3-card-12 w3-padding" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2 class="w3-text-black w3-center"><strong>Book Issue</strong></h2>
                    <div class="w3-twothird">
                        <p>      
                            <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Student Id :</strong></b></label><br>
                            <input class="w3-input w3-border w3-border-blue" name="studentid" type="text" placeholder="Student Id"></p>
                        <p>      
                            <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Book Id :</strong></b></label><br>
                            <input class="w3-input w3-border w3-border-blue" name="ibookid" type="text" placeholder="Book Id"></p>
                        <p>      
                            <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Book Name :</strong></b></label><br>
                            <input class="w3-input w3-border w3-border-blue" name="ibookname" type="text" placeholder="Book Name"></p>
                        <p>      
                            <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Author :</strong></b></label><br>
                            <input class="w3-input w3-border w3-border-blue" name="ibookauthor" type="text" placeholder="Author Name"></p>
                        <p>
                            <span class="w3-text-red"><b>&nbsp;&nbsp;&nbsp;<?php
                                    $sign = "<i class=\"fa fa-warning\"></i> ";
                                    if ($ierr == 1) {
                                        echo $sign . $ierr1;
                                    }
                                    if ($ierr == 2) {
                                        echo $sign . $ierr2;
                                    }
                                    ?></b></span>
                            <span class="w3-text-green"><b><?php
                                    if ($isuccess) {
                                        echo "<i class=\" fa fa-check\"></i> " . $isuccess;
                                    }
                                    ?></b></span>
                            <button type="submit" name="ibook" class="w3-btn w3-border w3-round w3-teal w3-right"><b><i class="fa fa-bookmark"></i> Issue</b></button>
                        </p>

                    </div>
                    <div class="w3-third">
                        <!-- Student Picture Name Code By AJAX  -->
                    </div>
                </form>
            </div>

            <div id="abook" class="w3-container abook all w3-margin-top">
                <form class="w3-container w3-card-12 w3-padding" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2 class="w3-text-black w3-center"><strong>New Book Entry</strong></h2>
                    <p>      
                        <b class="w3-text-teal w3-large"><strong><i class="fa fa-user"></i> Book Name :</strong></b>
                        <input class="w3-input w3-border w3-border-blue" name="bookname" type="text" placeholder="Book Name"></p>
                    <p>      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Book Author :</strong></b></label>
                        <input class="w3-input w3-border w3-border-blue" name="bookauthor" type="text" placeholder="Book Author"></p>
                    <p>      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Cupboard/Rack :</strong></b></label>
                        <input class="w3-input w3-border w3-border-blue" name="place" type="text" placeholder="Cupboard/Rack"></p>
                    <div id="bookiddiv">      
                        <label class="w3-text-teal w3-large"><b><strong><i class="fa fa-user"></i> Book Id :</strong></b></label>
                        <input class="w3-input w3-border w3-border-blue" name="bookid[]" type="text" placeholder="Book Id">
                    </div>
                    <div class="w3-row w3-margin-top">
                        <label class="w3-text-teal w3-large w3-quarter" style="display: inline-block;"><b><strong><i class="fa fa-user"></i> Quantity :</strong></b></label>
                        <input id="quantity" disabled class="w3-input w3-border w3-border-blue w3-quarter w3-margin-right w3-right-align" name="quantity" type="text" placeholder="Quantity" value="1" style="display: inline-block;">
                        <button class="w3-btn w3-border w3-round w3-teal" onclick="quantityedit('+');
                                return false;" type="button"><i class="fa fa-plus w3-large"></i></button>
                        <button class="w3-btn w3-border w3-round w3-teal" onclick="quantityedit('-');
                                return false;" type="button"><i class="fa fa-minus w3-large"></i></button>
                    </div>
                    <p>
                        <span class="w3-text-red"><b>&nbsp;&nbsp;&nbsp;<?php
                                $sign = "<i class=\"fa fa-warning\"></i> ";
                                if ($aerr == 1) {
                                    echo $sign . $aerr1;
                                }
                                if ($aerr == 2) {
                                    echo $sign . $aerr2;
                                }
                                ?></b>
                        </span>
                        <span class="w3-text-green"><b><?php
                                if ($success) {
                                    echo "<i class=\" fa fa-check\"></i> " . $success;
                                }
                                ?></b>
                        </span>
                        <button id="asubmit" type="submit" name="abook" class="w3-btn w3-border w3-round w3-teal w3-right"><b><i class="fa fa-plus"></i> Add Book</b></button>
                    </p>
                </form>
            </div>
        </div>
        <script type="text/javascript">
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
                if (tab == "abook") {
                    document.getElementById("heading").innerHTML = "New Book Addition";
                }
                else {
                    document.getElementById("heading").innerHTML = "Issue Book";
                }
            }
            function quantityedit(operation) {
                var x = document.getElementById("quantity");
                var y = x.value;
                if (operation === '+') {
                    if (y == 10) {
                        alert("Maximum Quantity Can Only Be 10");
                    }
                    else {
                        x.value++;
                        var div = document.getElementById("bookiddiv");
                        var box = document.createElement('input');
                        div.appendChild(box);
                        div.lastChild.className += "w3-input w3-border w3-border-blue w3-margin-top"
                        div.lastChild.setAttribute('name', 'bookid[]');
                        div.lastChild.setAttribute('type', 'text');
                        div.lastChild.setAttribute('placeholder', 'Book Id');
                        window.scrollBy(0, 80);
                    }
                }
                else {
                    if (y == 1) {
                        alert("Quantity Cannot Be Less Than 1");
                    }
                    else {
                        var div = document.getElementById("bookiddiv");
                        div.removeChild(div.lastChild);
                        x.value--;
                    }
                }
            }
        </script>
    </body>

</html> 