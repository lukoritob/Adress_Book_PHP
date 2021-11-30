<?php
include "process.php";
$link = mysqli_connect("localhost", "root", "", "book") or die(mysqli_error($link));
$id = $_GET['id'];
$name="";
$firstname="";
$email="";
$street="";
$zipcode="";
$city="";
$sql = "SELECT * from data WHERE id=$id";
$res = mysqli_query($link, $sql);
while($row=mysqli_fetch_array($res))
{
    $name=$row["name"];
    $firstname=$row["firstname"];
    $email=$row["email"];
    $street=$row["street"];
    $zipcode=$row["zipcode"];
    $city=$row["city"];
}

?>
<html>
    <head>
        <title>
            Address Book
        </title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
        <div class="col-lg-4 w-50 bg-success">
        <form action="" name="form1" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your First Name" value="<?php echo $firstname; ?>">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Address" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>Street</label>
                <input type="text" name="street" id="street" class="form-control" placeholder="Enter Your Street" value="<?php echo $street; ?>">
            </div>
            <div class="form-group">
                <label>zip-Code</label>
                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Your Zip-Code" value="<?php echo $zipcode; ?>">
            </div>
            <div class="form-group">
                <label>City</label>
                <input list="cities" name="city" value="<?php echo $city; ?>">
                <datalist id="cities">
                    <option value="Nairobi">
                    <option value="Mombasa">
                    <option value="Kisumu">
                    <option value="New York">
                    </datalist>
            </div>
            <div>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>  
        </div>
        
    </body>
    <?php
        if(isset($_POST['save']))
        {
            $link = mysqli_connect("localhost", "root", "", "book") or die(mysqli_error($link));
            $sql = "UPDATE data SET name='$_POST[name]', firstname='$_POST[firstname]', email='$_POST[email]', street='$_POST[street]', zipcode='$_POST[zipcode]', city='$_POST[city]' WHERE id=$id";
            $result = mysqli_query($link, $sql);

        ?>
        <script type="text/javascript">
        window.location="index.php";
        </script>
        
        <?php

        }

    
    ?>
</html>
