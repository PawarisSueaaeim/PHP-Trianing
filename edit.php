<?php

include 'config.php';
$edit_ID = $_GET['employeeID'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $skill = $_POST['skill'];


    $sql = "
            UPDATE employee
            SET name='$name',department='$department',skill='$skill'
            WHERE employeeID=$edit_ID;
        ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:index.php');
    } else {
        echo "<script>alert('Udate employee failed!!!!!')</script>";
    }
} else {
    echo mysqli_error($conn);
}

if (isset($_POST['cancel'])) {
    header('location:index.php');
}

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
        <h2 class="m-3">แก้ไขข้อมูลพนักงาน</h2>
        <form action="" name="add_name" id="add_name" method="POST">
            <div class="box class-to-edit">
                <h4 class="mt-3">รหัสพนักงาน <?php echo $edit_ID ?></h4>
                <h4 class="mt-3">ชื่อ</h4>
                <input type="text" name="name" id="name" placeholder="<?php echo $name ?>">
                <h4 class="mt-3">แผนก</h4>
                <input type="text" name="department" id="department" placeholder="<?php echo $department ?>">
                <h4 class="mt-3">ความสามาารถ</h4>
                <input type="text" name="skill" id="skill" placeholder="<?php echo $skill ?>">
                <br>
                <button class="btn btn-warning mt-5" name="submit" id="submit">แก้ไข</button>
                <button class="btn btn-secondary mt-5 ml-5" name="cancel" id="cancel">ยกเลิก</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>