<?php

if($conn){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // echo "create.php";

        $description = $_POST["desc"];
        // echo var_dump($description);
        if(!empty($description)){
            $sql = "INSERT INTO `todo` (`description`) VALUES ('$description')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo '<script> alert("successfully inserted"); </script>';
                header('Location: success.php');
                header('Location: index.php');
            }
            // echo var_dump($result);
        }
    }
}

?>