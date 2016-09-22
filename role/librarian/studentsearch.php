<?php
require_once 'includes/db.inc.php';
require_once 'includes/secure.inc.php';

$key = $_POST['key'];
$branch = $_POST['branch'];
$sem = $_POST['sem'];

if (is_numeric($key)) {
    if ($branch == 'all' && $year == 'all') {
        $query = "select * from student where s_id like '%$key%'";
    } else if ($branch == 'all' && $year != 'all') {
        $query = "select * from student where s_id like '%$key%' and semester = '$sem'";
    } else if ($branch != 'all' && $year == 'all') {
        $query = "select * from student where s_id like '%$key%' and branch = '$branch'";
    } else {
        $query = "select * from student where s_id like '%$key%' and branch = '$branch' and semester = '$sem'";
    }
} else {
    $query = "select * from student where name like '%$key%'";
}
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="w3-table w3-responsive">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Date Of Birth</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_row($result)) { ?>
                <tr>
                    <td><?php echo $row['s_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo date('d-m-y', $row['dob']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    echo "<p class = 'w3-text-red w3-center'>No Result Found</p>";
}?>