<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(is_null($_POST['data']) || empty($_POST['data'])){
        echo "<script>alert('errrorr data empty')</script>";
        return;
    }
    openssl_public_encrypt($_POST['data'], $outputt, $_POST['publicKey']);
    if(!is_dir('output/encrypt')){
        mkdir('output/encrypt', 0777, true);
    }
    $fileName = 'output/encrypt/dataEncrypt'.rand(0, 9999).'.bin';
    file_put_contents($fileName, $outputt);
    echo "<script>alert('success saved on $fileName')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="my-5">
            <form action="./encrypt.php" method="POST">
                Encrypt
                <div class="row row-cols-2">
                    <div class="p-3">
                        <label for="publicKey" class="form-label">Data</label>
                        <textarea class="form-control" name="data" id="data" rows="25"></textarea>
                    </div>
                    <div class="p-3">
                        <label for="publicKey" class="form-label">Public Key</label>
                        <textarea class="form-control" name="publicKey" id="publicKey" rows="25"></textarea>
                    </div>
                    <div class="mt-5 text-end">
                        <button class="btn btn-primary" type="submit">Encrypt</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>