<?php
require_once 'includes/db.inc.php';
require_once 'includes/secure.inc.php';
//$select = 1;          //Remove after Completion
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
        echo ".sstatus {display:none;}";
        break;
    default :
        echo ".bstatus {display:none;}";
        break;
}
?>
    </style>
    <title>Check Status: Books And Students</title>
    <body>
        <?php require_once 'includes/nav.inc.php'; ?>
        <div style="margin-top: 44px;">
            <h2 class="w3-center" style="font-size: 2.5em;"><strong>
                    <i class="fa fa-book w3-margin-right"></i>
                    <b id="heading"><?php
                        $heading = $select === 1 ? "Books In Library" : "Students Enrolled";
                        echo $heading;
                        ?></b></strong></h2>
        </div>
        <div class="w3-hide-small w3-hide-medium w3-col m0 s0 l1">&nbsp;</div>
        <div class="w3-col m12 s12 l10" style="margin: auto;">
            <div class="w3-row" style="">
                <a href="#" onclick="openForm(event, 'sstatus');">
                    <div class="w3-half tablink w3-bottombar w3-hover-shadow w3-padding <?php if (!isset($select)) echo "w3-border-blue"; ?> w3-center"><b><i class="w3-text-teal fa fa-sign-in"></i> Search Students</b></div>
                </a>
                <a href="#" onclick="openForm(event, 'bstatus');">
                    <div class="w3-half tablink w3-bottombar w3-hover-shadow w3-padding <?php if ($select === 1) echo "w3-border-blue"; ?> w3-center"><b><i class="w3-text-teal fa fa-sign-in"></i> Search Book In Library</b></div>
                </a>
            </div>

            <div id="sstatus" class="w3-container sstatus all w3-margin-top w3-card-12 w3-padding">
                <h2 class="w3-text-black w3-center"><strong>Search Student Record</strong></h2>
                <input class="w3-input w3-border w3-border-blue w3-third w3-margin-right w3-margin-bottom" id="keyword" type="text" placeholder="Enter Search Keyword" />
                <div class="w3-rest">
                    <select required id="branch" class="w3-select w3-border w3-border-blue w3-third w3-margin-right w3-margin-bottom">
                        <option value="all" selected>All Branches</option>
                        <option>Civil</option>
                        <option>Mechanical Production</option>
                        <option>Mechanical Automobile</option>
                        <option>Computer Science</option>
                        <option>Information Technology</option>
                        <option>Electronics</option>
                        <option>Pharmacy</option>
                    </select>
                    <select required id="semester" class="w3-select w3-border w3-border-blue w3-third w3-margin-right w3-margin-bottom">
                        <option value="all" selected>All Years</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                    <button onclick="search()" class="w3-btn w3-border w3-round w3-teal w3-margin-bottom"><b><i class="fa fa-search"></i> Search</b></button>
                </div>
                <div id = "ssearchresult">

                </div>
            </div>

            <div id="bstatus" class="w3-container bstatus all w3-margin-top w3-card-12 w3-padding">
                <h2 class="w3-text-black w3-center"><strong>Search Books</strong></h2>
                <input class="w3-input w3-border w3-border-blue w3-third w3-margin-right w3-margin-bottom" id="bookkeyword" type="text" placeholder="Enter Search Keyword" />
                <div class="w3-rest">
                    <select required id="type" class="w3-select w3-border w3-border-blue w3-third w3-margin-right w3-margin-bottom">
                        <option value="name">Book Name</option>
                        <option value="author">Author</option>
                        <option value="bid">Book ID</option>
                    </select>
                    <button onclick="booksearch()" class="w3-btn w3-border w3-round w3-teal w3-margin-bottom"><b><i class="fa fa-search"></i> Search</b></button>
                </div>
                <div id = "bsearchresult">

                </div>
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
                if (tab == "bstatus") {
                    document.getElementById("heading").innerHTML = "Books In Library";
                }
                else {
                    document.getElementById("heading").innerHTML = "Students Enrolled";
                }
            }
            function search() {
                var key = document.getElementById("keyword").value;
                var branch = document.getElementById("branch").value;
                var sem = document.getElementById("semester").value;
                var div = document.getElementById("ssearchresult");
                div.innerHTML = '<p class = "w3-text-teal w3-center"><i class= "fa fa-spinner fa-pulse fa-5x"></i><br><strong class="w3-margin-top">Loading...</strong></p>';
                var req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (req.readyState == 4 && req.status == 200) {
                        div.innerHTML = req.responseText;
                    }
                };
                req.open("POST", "studentsearch.php", true);
                req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                req.send("key=" + key + "&branch=" + branch + "&sem=" + sem);
            }
            function booksearch() {
                var key = document.getElementById("bookkeyword").value;
                var type = document.getElementById("type").value;
                var div = document.getElementById("bsearchresult");
                div.innerHTML = '<p class = "w3-text-teal w3-center"><i class= "fa fa-spinner fa-pulse fa-5x"></i><br><strong class="w3-margin-top">Loading...</strong></p>';
                var req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (req.readyState == 4 && req.status == 200) {
                        div.innerHTML = req.responseText;
                    }
                };
                req.open("POST", "booksearch.php", true);
                req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                req.send("key=" + key + "&type=" + type);
            }
        </script>
    </body>

</html> 