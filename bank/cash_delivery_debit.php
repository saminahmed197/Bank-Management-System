<?php
    include "header.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="cash_delivery_create_request.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">CASH Delivery System</h1>
        </div>


        <input type="hidden" id="type" name="type" value="debit">

        <div class="flex-container">
            <div class=container>
                <label>Enter Amount (in BDT) :</label><br>
                <input name="amt" size="24" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <button type="submit">Submit</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
    }
    </script>

</body>
</html>
