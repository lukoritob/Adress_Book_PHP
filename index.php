<!DOCTYPE html>
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
        <div class="col-lg-4 card card-body float-left w-50 bg-success">
        <form action="" name="form1" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your First Name">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Address">
            </div>
            <div class="form-group">
                <label>Street</label>
                <input type="text" name="street" id="street" class="form-control" placeholder="Enter Your Street">
            </div>
            <div class="form-group">
                <label>zip-Code</label>
                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Your Zip-Code">
            </div>
            <div class="form-group">
                <label>City</label>
                <input list="cities" name="city">
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
        <div class="card"> 
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">firstname</th>
                    <th scope="col">email</th>
                    <th scope="col">street</th>
                    <th scope="col">zipcode</th>
                    <th scope="col">city</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "book") or die(mysqli_error($link));
                        $sql = "SELECT * FROM data";
                        $result = mysqli_query($link, $sql) or die( mysqli_error($link));
                       while($row=mysqli_fetch_array($result)) {
                           echo "<tr>";
                            echo"<td>"; echo $row["id"]; echo"</td>";
                            echo"<td>"; echo $row["name"]; echo"</td>";
                            echo"<td>"; echo $row["firstname"]; echo"</td>";
                            echo"<td>"; echo $row["email"]; echo"</td>";
                            echo"<td>"; echo $row["street"]; echo"</td>";
                            echo"<td>"; echo $row["zipcode"]; echo"</td>";
                            echo"<td>"; echo $row["city"]; echo"</td>";
                            echo"<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edit</button></a><?php echo"</td>";
                            echo"<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a><?php echo"</td>";
                            echo "</tr>";
                       }
                    ?>
                </tbody>
                </table>

        </div>

    </body>
    <?php
        if(isset($_POST['save'])){
            $link = mysqli_connect("localhost", "root", "", "book") or die(mysqli_error($link));
            $sql = "INSERT Into data(id, name, firstname, email, street, zipcode, city) VALUES(NULL, '$_POST[name]', '$_POST[firstname]', '$_POST[email]', '$_POST[street]', '$_POST[zipcode]', '$_POST[city]')";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));   
        }
    ?>
</html>
