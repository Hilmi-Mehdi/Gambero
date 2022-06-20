<?php

require_once "Config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <title>Add Product</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="add.php">
        <div style="width: 60%;margin-left: 20%;margin-top: 5%;background:#f6f6f9;border-radius: 20px;padding:50px">
            <center><h1 style="font-size:x-large;font-weight:600;">Add product</h1></center>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                <input name="name" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Details</label>
                <input name="det" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input name="price" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>


            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Category</label>
            <select name="cat" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a category</option>
                <?php 
                    $req = "select * from category";
                    $res = mysqli_query($link, $req);
                    while($data = mysqli_fetch_array($res)){
                        echo "<option value = " . $data['category_id'] .">".$data['name'] ."</option>";
                    }
                ?>
            </select>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Image</label>
            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-purple-300 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="image" type="file">
            <br>
            <center><button type="submit" name="up" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add Product</button></center>
        </div>
        </form>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>