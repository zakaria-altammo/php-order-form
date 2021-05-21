<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<?php
$emailErr = $streetErr = $streetnumberErr = $cityErr = $zipcodeErr = "";
$email = $street = $streetnumber = $city = $zipcode =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "*Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["street"])) {
        $streetErr = "*Street name is required";
    } else {
        $street = test_input($_POST["street"]);
    }

    if (empty($_POST["streetnumber"])) {
        $streetnumberErr = "*Street number is required";
    } else {
        $streetnumber = test_input($_POST["streetnumber"]);
    }
    if (empty($_POST["city"])) {
        $cityErr = "*City name is required";
    } else {
        $city = test_input($_POST["city"]);
    }
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "*Zip code is required";
    } else {
        $zipcode = test_input($_POST["zipcode"]);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <div class="alert alert-success" role="alert">

        <span class="error"><?php echo "$emailErr";?></span><br>
        <span class="error"><?php echo "$streetErr";?></span><br>

        <span class="error"><?php echo "$cityErr";?></span><br>

        <span class="error"><?php echo "$streetnumberErr";?></span><br>
        <span class="error"><?php echo "$zipcodeErr";?></span>
    </div>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $email?>"/>

            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="<?php echo $street?>">

                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="number" id="streetnumber" name="streetnumber" class="form-control" value="<?php echo $streetnumber?>">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php echo $city?>">

                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="number" id="zipcode" name="zipcode" class="form-control" value="<?php echo $zipcode?>">

                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        </fieldset>
        
        <label>
            <input type="checkbox" name="express_delivery" value="5" /> 
            Express delivery (+ 5 EUR) 
        </label>
            
        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>
<?php
echo $email;
echo $street;
echo $streetnumber;
echo $zipcode;
echo $city;

?>
<style>
    .error {
        color: red;
    }
    footer {
        text-align: center;
    }
</style>
</body>
</html>
