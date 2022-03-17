<?php
include('config.php');

if (isset($_POST['submit'])) {
    $employee_id = $_POST['employeeID'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $skill = $_POST['skill'];

    if (trim($_POST['employeeID']) != '') {
        $sql = mysqli_query($conn, "INSERT INTO employee(employeeID,name,department,skill) VALUES('$employee_id','$name','$department','$skill')");
    }
    if ($sql) {
        echo "<script>alert('Insert employee sucessful!!!!!')</script>";
    } else {
        echo "<script>alert('Insert employee failed!!!!!')</script>";
    }
}

$sql_query = '
select *
from employee
';
$objQuery = mysqli_query($conn, $sql_query) or die("Error Query [" . $sql_query . "]");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>ข้อมูลพนักงานในองค์กร</h1>
        <table class="table table-success table-striped table-pleum">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รหัสพนักงาน</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ความสามารถ</th>
                    <th scope="col">การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <form action="" name="add_name" id="add_name" method="post">
                    <tr>
                        <th></th>
                        <th scope="col"><input type="text" name="employeeID" id="employeeID" placeholder="กรุณาใส่รหัสพนักงาน...."></th>
                        <th scope="col"><input type="text" name="name" id="name" placeholder="ใส่ชื่อ...."></th>
                        <th scope="col"><input type="text" name="department" id="department" placeholder="ใส่แผนก...."></th>
                        <th scope="col"><input type="text" name="skill" id="skill" placeholder="ใส่ความสามารถ...."></th>
                        <th scope="col"><button class="btn btn-warning" name="submit" id="submit">ยืนยัน</button></th>
                    </tr>
                </form>
                <?php
                $i = 1;
                while ($objResult = mysqli_fetch_array($objQuery)) {
                ?>
                    <tr>
                        <th>
                            <div><?php echo $i; ?></div>
                        </th>
                        <th><?php echo $objResult["employeeID"]; ?></th>
                        <th><?php echo $objResult["name"]; ?></th>
                        <th><?php echo $objResult["department"]; ?></th>
                        <th><?php echo $objResult["skill"]; ?></th>
                        <th>
                            <button class="btn btn-secondary"><a class="text-light" href="edit.php?employeeID=<?php echo $objResult["employeeID"]; ?>">แก้ไข</a></button>
                            <button class="btn btn-danger"><a class="text-light" href="deletedata.php?employeeID=<?php echo $objResult["employeeID"]; ?>">ลบ</a></button>
                        </th>
                    </tr>
                <?php
                    $i++;
                }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>