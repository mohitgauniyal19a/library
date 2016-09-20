<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/w3.css">
        <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <title>Student Registration</title>
    </head>
    <body>
        <div>
            <div class="w3-twothird">
                <img style="width:100%" src="images/banner.jpg">
            </div>
            <div class="w3-third w3-grey w3-container" style="height: 91px;">
                <h2 class="w3-center" style="font-size: 2.3em;"><strong><b><i class="fa fa-book"></i>Online Library Portal</b></strong></h2>
            </div>
        </div>
        <div class="w3-hide-small w3-hide-medium w3-col l1 w3-margin-top w3-left">&nbsp;</div>
        <div  class="w3-col m12 s12 l10 w3-margin-top" style="margin: auto;">
            <div id="sreg" class="w3-container">
                <form class="w3-container w3-card-12 w3-padding" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/formdata">
                    <h2 class="w3-text-black w3-center w3-hover-shadow w3-border-blue w3-bottombar"><strong>New Student Registration Form</strong></h2>
                    <div class="w3-half">
                        <div class="w3-row w3-margin-top">      
                            <label  style="display: inline-block;" class="w3-text-teal w3-large w3-half"><b><strong><i class="fa fa-user"></i> Student Name :</strong></b></label>
                            <input  style="display: inline-block;" class="w3-input w3-border w3-border-blue w3-half" name="sname" type="text" placeholder="Username"></div>
                        <div class="w3-row w3-margin-top">      
                            <label  style="display: inline-block;" class="w3-text-teal w3-large w3-half"><b><strong><i class="fa fa-user"></i> Father's Name :</strong></b></label>
                            <input  style="display: inline-block;" class="w3-input w3-border w3-border-blue w3-half" name="fname" type="text" placeholder="Username"></div>
                        <div class="w3-row w3-margin-top">      
                            <label  style="display: inline-block;" class="w3-text-teal w3-large w3-half"><b><strong><i class="fa fa-user"></i> Branch :</strong></b></label>
                            <select  style="display: inline-block;" required name="branch" class="w3-select w3-border w3-border-blue w3-half">
                                <option value="" selected>Select Branch</option>
                                <option>Civil</option>
                                <option>Mechanical Production</option>
                                <option>Mechanical Automobile</option>
                                <option>Computer Science</option>
                                <option>Information Technology</option>
                                <option>Electronics</option>
                                <option>Pharmacy</option>
                            </select>
                        </div>
                        <div class="w3-row w3-margin-top">      
                            <label class="w3-text-teal w3-large w3-half" style="display: inline-block;"><b><strong><i class="fa fa-user"></i> Semester :</strong></b></label>
                            <select required name="semester" class="w3-select w3-border w3-border-blue w3-half" style="display: inline-block;">
                                <option value="" selected>Select Semester</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                        <div class="w3-row w3-margin-top">      
                            <label  style="display: inline-block;" class="w3-text-teal w3-large w3-half"><b><strong><i class="fa fa-user"></i> Year :</strong></b></label>
                            <select  style="display: inline-block;" required name="year" class="w3-select w3-border w3-border-blue w3-half">
                                <option value="" selected>Select Year</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="w3-row w3-margin-top">      
                            <label  style="display: inline-block;" class="w3-text-teal w3-large w3-half"><b><strong><i class="fa fa-user"></i> Fee Receipt :</strong></b></label>
                            <input  style="display: inline-block;" class="w3-input w3-border w3-border-blue w3-half" name="username" type="file" placeholder="Username"></div>
                    </div>
                    <div class="w3-half">
                        <img style="width: 50%;" class="w3-margin-right" src="images/students/img_avatar2.png" alt=""/>
                    </div>
                    <div class="w3-margin-top">
                        <span class="w3-text-red"><b>&nbsp;&nbsp;&nbsp;<?php
                                $sign = "<i class=\"fa fa-warning\"></i> ";
                                if ($rerr == 1) {
                                    echo $sign . $rerr1;
                                }
                                if ($rerr == 2) {
                                    echo $sign . $rerr2;
                                }
                                ?></b></span>
                        <button type="submit" name="sreg" class="w3-btn w3-border w3-round w3-teal w3-right"><b><i class="fa fa-user-plus"></i> Register</b></button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
