<!DOCTYPE html>
<!-- after selection of mortgage or loans, the view data goes here -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
            function checkbox_selector() {
                // alert("Bla bla blaaaa");
                if (document.getElementById("customer_selection").checked==true) {
                    document.getElementById("checkbox-selector").style.display="inline";
                    document.getElementById("checkbox-selector").style.color="#ffffff";
                }

                else{
                    document.getElementById("checkbox-selector").style.display="none";
                    document.getElementById("checkbox-selector").style.color="#00ff00";
                }
            }
        </script>

</head>
<body>

    <form action="bank_data_fetch.php" method="POST" onChange="checkbox_selector()">
            <input type="radio" value="Customer" name="customer_filter" id="customer_selection" checked> Customer
            <input type="radio" value="Mortgage" name="customer_filter"> Mortgage
            <input type="radio" value="Loan" name="customer_filter"> Loan
            <input type="text" value="" name="filter_set">
            <span id="checkbox-selector">
                <input type="checkbox" value="Loan" name="customer_filter_loan">Loan
                <input type="checkbox" value="Mortgage" name="customer_filter_mortgage">Mortgage
            </span>
            <input type="submit" value="Submit">
        </form>
        
</body>
</html>
