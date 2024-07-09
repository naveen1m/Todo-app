<?php
require_once './php/config.php';
if($conn){
    // require_once './php/read.php';
    require_once './php/create.php';
    require_once './php/update.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo </title>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

  <header>
     <nav class=”flex items-center justify-between p-6 container mx-auto”>
            <div class="bg-teal-500" >
                <p class="text-4xl text-white text-center">Todo</p>
                <p class="text-black text-center" >Understanding CRUD operations in PHP with MySQL</p>
            </div>
        </nav>
        <!-- db connection message -->
        <div id="successMessage" class="text-center text-blue-900">
            <?php
                echo $connectionMsg;
            ?>
        </div>

  </header>

  <main class="w-screen border-2  flex flex-col items-center p-4 rounded-lg mt-8">
    <section class="w-1/2 flex flex-row border-2 rounded-md items-center ">

        <form action="/php-projects/projects/Todo-app/index.php" method="post" class="flex w-full">
            <input type="text" name="desc" id="desc" placeholder="write your todo for today here..." class="w-full flex-1 px-4 py-2 bg-gray-200 rounded-l-md focus:outline-none focus:border-blue-500">
            <button type="submit" name="submit" id="submit" class="text-md px-8 py-2 bg-green-500 text-white rounded-r-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Add</button>
      </form>

    </section>
<!-- 
    <section class="w-1/2 border-2 flex items-center space-x-4 p-4 bg-gray-200 rounded-lg mt-8  ">
      <p class="flex-1">I will complete maths basic today. <br><span class="text-sm text-gray-800">12-07-2024</span></p>
      <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update</button>
      <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Delete</button>
      
    </section> -->
    <!-- display todo list -->
     
    <?php
        $sql = "SELECT * FROM `todo`";

        $result = mysqli_query($conn, $sql);
        
        // echo var_dump($result);
        
        while($row = mysqli_fetch_assoc($result)){
            //    echo $row['sno'] . " - desc: " . $row['description'] . " | and timestamp: ". $row['tstamp'];
            $itemid = $row['sno'];
            $description = $row['description'];
            echo '<section class="w-1/2 border-2 flex items-center space-x-4 p-4 bg-gray-200 rounded-lg mt-8">';
            echo '<p class="flex-1">' . htmlspecialchars($description) . '<br><span class="text-sm text-gray-800">' . $row['tstamp'] . '</span></p>';
            echo '<button id="edit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600" onclick="edit(\'' . $description . '\', \''. $itemid .'\')">Edit</button>';
            echo '<button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Delete</button>';
            echo '</section>';
        }
    ?>

    
  </main>

  <!-- Modal Structure -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-xl font-bold mb-4">Edit Description</h2>
        <form id="editForm" action="/php-projects/projects/Todo-app/index.php" method="post" >
            <input type="hidden" id="itemId" name="itemId">
            <input type="text" id="itemDescription" name="editdesc" class="w-full px-4 py-2 border rounded-lg mb-4" placeholder="Edit your description">
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Cancel</button>
                <button type="submit" name="edit" id="edit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(description, itemId) {
        // Show modal
        document.getElementById('modal').classList.remove('hidden');
        // Populate modal fields
        document.getElementById('itemId').value = itemId;
        document.getElementById('itemDescription').value = description;
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    function edit(desc, itemid){
        openModal(desc, itemid);
        console.log(desc, itemid)
        // alert("clicked");
    }
</script>
  
</body>
</html>