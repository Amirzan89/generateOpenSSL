<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!file_exists($_POST['data'])){
        echo "<script>alert('errrorr file not found')</script>";
        return;
    }
    openssl_private_decrypt(file_get_contents($_POST['data']), $outputt, $_POST['privateKey']);
    if(!is_dir('output/decrypt')){
        mkdir('output/decrypt', 0777, true);
    }
    $fileName = 'output/decrypt/dataDecrypt'.rand(0, 9999).'.bin';
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
            <form action="./decrypt.php" method="POST">
                Decrypt
                <div class="row row-cols-2">
                    <div class="p-3">
                        <label for="privateKey" class="form-label">Data</label>
                        <textarea class="form-control" name="data" id="data" rows="25"></textarea>
                    </div>
                    <div class="p-3">
                        <label for="privateKey" class="form-label">Private Key</label>
                        <textarea class="form-control" name="privateKey" id="privateKey" rows="25"></textarea>
                    </div>
                    <div class="mt-5 text-end">
                        <button class="btn btn-primary" type="submit">Decrypt</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>