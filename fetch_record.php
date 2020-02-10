<?php
include("./includes/dbconfig.php");
if ($_POST['rowid']) {
    $id = $_POST['rowid']; //escape string
    $sql = "SELECT * FROM blacklist WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
    <table class="table-responsive">
        <tbody>
            <tr>
                <td colspan="1" rowspan="2">
                    <div class="m-r-10"><img src="uploads/<?php echo $row['passport']; ?>" alt="<?php echo $row['passport']; ?>" class="rounded" width="100"></div>
                </td>
                <td>Matric No: <?php echo $row['matric_no']; ?> </td>

            </tr>
            <tr>
                <td colspan="2">Name: <?php echo $row['surname'] . " " . $row['first_name'] . " " . $row['middlename']; ?> </td>

            </tr>
            <tr>
                <td>Level: <?php echo $row['level']; ?></td>
                <td>Gender: <?php echo $row['sex']; ?> </td>
                <td>Department: <?php echo $row['department']; ?> </td>

            </tr>
            <tr>
                <td>Faculty: <?php echo $row['faculty']; ?> </td>
                <td>Crime Committed: <?php echo $row['crime']; ?></td>
                <td>Date Committe: <?php echo $row['date']; ?> </td>
            </tr>
            <tr>
                <td>Eye Witness: <?php echo $row['eye_witness']; ?></td>
                <td rowspan="2">Penalty: <?php echo $row['penalty']; ?> </td>
            </tr>
        </tbody>
    </table>
<?php
}
?>