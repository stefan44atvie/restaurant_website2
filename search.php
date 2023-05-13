<?php
    require_once "includes/db_connect.php";

    $value = $_GET['search'];

    $sql = "SELECT * FROM `users` WHERE username LIKE '$value%' OR email LIKE '$value%'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
            echo 
                "
                        <img class='card-img-top ' src='uploads/pictures/user/" .$row['picture']."' width='100' alt='Card image cap'>
                        <div class='card-body'>
                        <h5 class='card-title'>{$row["username"]}</h5>
                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class='list-group list-group-flush'>
                        <li class='list-group-item'><b>Email</b>: {$row["email"]}</li>
                        <li class='list-group-item'><b>Rolle</b>: {$row["status"]}</li>
                        <li class='list-group-item'>A third item</li>
                        </ul>
                        <div class='card-body'>
                        <a href='details_user.php?id={$row["id"]}' class='btn btn-success' tabindex='-1' role='button' >Details</a>
                        <a href='delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>

                    </div>
                
                ";
        }

    }else{
        echo "No results";
    }
?>