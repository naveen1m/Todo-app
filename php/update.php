<?php
if($conn){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
        echo "update todo";
        $description = $_POST["editdesc"];
        $itemId = (int)$_POST["itemId"];
        // echo var_dump($description);
        // echo var_dump($itemId); 

        if(!empty($description)){
            $sql = "UPDATE `todo` SET `description` = '$description' WHERE `sno` = $itemId";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo '<script> alert("successfully inserted"); </script>';
                header('Location: success.php');
                header('Location: index.php');
            }else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            // echo var_dump($result);
        }
    }
}
?>