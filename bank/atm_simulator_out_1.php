<?php
    include "header.php";
    include "navbar.php";
    include "connect.php";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="atm_simulator_out_action_1.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">ATM Simulator</h1>
        </div>


       

         <div class="flex-container">
            <div class=container>
                <center><h2>Welcome <?php echo $_SESSION['atm_name']; ?></h3><br></center>
            </div>
        </div>
        <br> <br>
        <div class="flex-container">
            <div class="container">

            <div class="container" >
            <a href="atm_debit.php" class="button">Add Money</a>
            </div>
            <div class="container">
            <a href="atm_debit.php" class="button">Withdraw Money</a>
            </div>
            <div class="container">
            <a href="atm_check_balance.php" class="button">Check Balance</a>
            </div>
            <div class="container">
            <a href="atm_show_receipt.php" class="button">Show Receipt</a>
            </div>
            <div class="container">
            <a href="atm_change_pin.php" class="button">Change Pin</a>
            </div>
            <div class="container">
            <a href="atm_exit.php" class="button" onclick="return confirm('Are you sure?')">Exit</a>
            </div>

        </div>
        <br> <br>
        <div class="flex-container">
            <!-- <div class="container">
                <button class="button" type="submit">Submit</button>
            </div> -->

            
        </div>

    </form>
    

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }
    </script>

</body>
</html>
