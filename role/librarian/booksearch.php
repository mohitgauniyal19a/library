<?php
require_once 'includes/db.inc.php';
require_once 'includes/secure.inc.php';

$key = $_POST['key'];
$type = $_POST['type'];

if (is_numeric($key)) {
    $query = "select * from books where book_id like '%$key%'";
} else {
    if ($type == "name") {
        $query = "select * from books where name like '%$key%'";
    } else {
        $query = "select * from books where author like '%$key%'";
    }
}
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="w3-table w3-responsive">
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Available</th>
                <th>Issued To (ID)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['book_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['available'] == "Y" ? "<i class='w3-center w3-text-green fa fa-check fa-2x'></i>" : "<i class='w3-text-green fa fa-check fa-2x'></i>"; ?></td>
                    <td><?php if($row['available'] == "N"){
                        $id = $row['book_id'];
                        $query = "select * from book_issue where status = 'N' and book_id = '$id'";
                        $names = mysqli_query($link, $query);
                        $name = mysqli_fetch_assoc($names);
                        echo $name['s_id'];
                    } else{
                        echo "<i class='w3-center w3-text-green fa fa-minus fa-2x'></i>";
                    }
                    ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    echo "<p class = 'w3-text-red w3-center'>No Result Found</p>";
}?>