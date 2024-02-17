<?php

include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
<style>

@keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        body {
            animation: fadeIn 1s ease forwards;
        }
</style>

</head>

<body>

    <div class="contariner my-5">
        <form method="post">
            <input type="text" placeholder="Search Data" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button>

        </form>
        <div class="container my-5">
            <table class="table">
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];

                    $sql = "Select * from   `user_register_from` where id='$search'
                    or acc_number ='$search or email='$search' ";
                    // $result=mysqli_query($conn,$sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '
                <thead>
                <tr>
                <th>Sl no</th>
                <th>Account Number</th>
                <th>Email</th>
                </tr>
                </thead>
                ';
                            $row = mysqli_fetch_assoc($result);
                            echo '<tbody>
                <tr>
                <td>' . $row['acc_number'] . '</td>
                <td>' . $row['email'] . '</td>


                </tr>
                </tbody>';
                        } else {
                            '<h2> class=text-danger>Data Not Found</h2>';
                        }
                    }
                }

                ?>

            </table>

        </div>

    </div>



</body>

</html>