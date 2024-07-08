<?php
require_once './php/config.php';

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
        <div id="successMessage" class="text-center text-blue-900">
            <?php
                echo $connectionMsg;
            ?>
        </div>
  </header>

  <main class="w-screen border-2  flex flex-col items-center p-4 rounded-lg mt-8">
    <section class="w-1/2 flex flex-row border-2 rounded-md items-center ">

        <form action="" method="post" class="flex w-full">
            <input type="text" name="todo" id="todo" placeholder="write your todo for today here..." class="w-full flex-1 px-4 py-2 bg-gray-200 rounded-l-md focus:outline-none focus:border-blue-500">
            <button type="submit" class="text-md px-8 py-2 bg-green-500 text-white rounded-r-md hover:bg-green-500 focus:outline-none focus:bg-green-500">Add</button>
      </form>

    </section>

    <section class="w-1/2 border-2 flex items-center space-x-4 p-4 bg-gray-200 rounded-lg mt-8  ">
      <p class="flex-1">I will complete maths basic today Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, atque cum. Nisi nostrum iure quos consequatur fugit quam hic, voluptates reprehenderit eum.. <br><span class="text-sm text-gray-800">12-07-2024</span></p>
      <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update</button>
      <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Delete</button>

      
    </section>
  </main>
</body>
</html>