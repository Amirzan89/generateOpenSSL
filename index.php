<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $config = array(
        'config' => 'openssl.cnf',
        'default_md' => 'sha512',
        'private_key_bits' => '512',
        'private_key_type' => OPENSSL_KEYTYPE_RSA
    );
    $keypair =  openssl_pkey_new($config);
    openssl_pkey_export($keypair, $privKey, null, $config);
    $publicKey = openssl_pkey_get_details($keypair);
    $pubKey = $publicKey['key'];
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
            <form action="./index.php" method="POST">
                <div class="row row-cols-2">
                    <div class="p-3">
                        <label for="privateKey" class="form-label">Private key</label>
                        <textarea class="form-control" name="privateKey" id="privateKey" rows="25"><?php echo $privKey ?? null ?></textarea>
                    </div>
                    <div class="p-3">
                        <label for="publicKey" class="form-label">Public Key</label>
                        <textarea class="form-control" name="publicKey" id="publicKey" rows="25"><?php echo $pubKey ?? null ?></textarea>
                    </div>
                    <div class="mt-5 text-end">
                        <button class="btn btn-primary" type="submit">Generate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>