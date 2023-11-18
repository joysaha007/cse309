<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #1A5276;">
        <div class="container m-3 p-3" style="background-color: #CCD1D1 ; width: 80%;">
        <div class="container text-right">
        <a href="index.php"><em class="float-right"><button type="button" class="btn btn-outline-danger">Form</button></em></a>

        </div>
            <div class="container mt-5">
                <h2>Contact Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">ID</th> -->
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "contact");

                        if ($link === false) {
                            die("Error: Could not connect. " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM table1";
                        $result = mysqli_query($link, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                // Remove the line with "id" if it doesn't exist
                                // echo "<th scope='row'>" . $row['id'] . "</th>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['message'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "Error: " . mysqli_error($link);
                        }

                        mysqli_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>