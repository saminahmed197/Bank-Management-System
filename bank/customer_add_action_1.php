<?php

    include "connect.php";
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<?php
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$dob = mysqli_real_escape_string($conn, $_POST["dob"]);
$nid = mysqli_real_escape_string($conn, $_POST["nid"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$phno = mysqli_real_escape_string($conn, $_POST["phno"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$branch = mysqli_real_escape_string($conn, $_POST["branch"]);
$near_branch = mysqli_real_escape_string($conn, $_POST["nearby_branch"]);
$acno = rand(10000000,19999999);
$o_balance = 0;
$pin = 1234;
$cus_uname = mysqli_real_escape_string($conn, $_POST["cus_uname"]);
$cus_pwd = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);

$sql0 = "SELECT MAX(cust_id) FROM customer";
$result = $conn->query($sql0);
$row = $result->fetch_assoc();
$id = $row["MAX(cust_id)"] + 1;


$sql5 = "ALTER TABLE customer AUTO_INCREMENT=".$id;
$conn->query($sql5);

$sql1 = "CREATE TABLE passbook".$id."(
            trans_id INT NOT NULL AUTO_INCREMENT,
            trans_date DATETIME,
            remarks VARCHAR(255),
            debit INT,
            credit INT,
            balance INT,
            PRIMARY KEY(trans_id)
        )";

$sql2 = "CREATE TABLE beneficiary".$id."(
            benef_id INT NOT NULL AUTO_INCREMENT,
            benef_cust_id INT UNIQUE,
            email VARCHAR(30) UNIQUE,
            phone_no VARCHAR(20) UNIQUE,
            account_no INT UNIQUE,
            PRIMARY KEY(benef_id)
        )";

$sql3 = "INSERT INTO customer( `first_name`, `last_name`, `gender`, `dob`, `nid_no`, `email`, `phone_no`, `address`, `branch`, `nearby_branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES(
            '$fname',
            '$lname',
            '$gender',
            '$dob',
            '$nid',
            '$email',
            '$phno',
            '$address',
            '$branch',
            '$near_branch',
            '$acno',
            '$pin',
            '$cus_uname',
            '$cus_pwd'
        )";

$sql4 = "INSERT INTO passbook".$id." VALUES(
            NULL,
            NOW(),
            'Opening Balance',
            '0',
            '$o_balance',
            '$o_balance'
        )";

?>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            if (($conn->query($sql3) === TRUE)) { ?>
                <p id="info"><?php echo "Customer created successfully !\n"; ?></p>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql1) === TRUE)) { ?>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql4) === TRUE)) { ?>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql4 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql2) === TRUE)) { ?>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

            <?php
            } else { ?>
        </div>
        <div class="flex-item">
                <p id="info"><?php
                echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="customer_add_1.php" class="button">Add Again</a>
        </div>

    </div>

</body>
</html>
