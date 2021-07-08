<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 class="text-center">GOOLGE STORAGE</h2>
        </div>
        <div class="text-center">
            <img src="img.png" alt="google cloud" class="img-fluid rounded mx auto d-block width 500">
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="upload">upload</button>

    </form>
    <?php
    //print_r($_FILES);
    //exit;
    include('storage.php');
    $storage = new storage;
    // $storage->createBucket("husnain");
    $storage->listbucket();
    $storage->list_objects('daudkhan');
    if (isset($_POST['upload']))
        $storage->upload_object('daudkhan', $_FILES['file']['name'], $_FILES['file']['tmp_name']);
    $storage->delete_object('daudkhan', 'Hasnain Ali Raza.pdf');
    ?>

</body>

</html>