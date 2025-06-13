<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operator Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<?php include(__DIR__ . '/../partials/navbar.php') ?>

<div class="container my-4">
    <h2 class="text-muted mb-4 fs-4">Operator Checker</h2>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <textarea id="textAreaInput" class="form-control shadow-sm mb-3" rows="12"
                        placeholder="Daftar Nomor 628XXXXXXXXXX"></textarea>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <textarea id="textAreaOutput" class="form-control shadow-sm mb-3" rows="12"
                        placeholder="Hasil 628XXXXXXXXXX Operator" disabled readonly></textarea>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex">
        <button id="btnSubmit" class="btn btn-primary shadow m-auto">Submit</button>
    </div>
</div>

<script>

    const btnSubmit = document.getElementById('btnSubmit');

    const operatorList = {
        "62812" : "TELKOMSEL",
        "62811" : "TELKOMSEL",
        "62813" : "TELKOMSEL",
        "62821" : "TELKOMSEL",
        "62822" : "TELKOMSEL",
        "62823" : "TELKOMSEL",
        "62851" : "TELKOMSEL",
        "62852" : "TELKOMSEL",
        "62853" : "TELKOMSEL",
        "62814" : "INDOSAT",
        "62815" : "INDOSAT",
        "62816" : "INDOSAT",
        "62855" : "INDOSAT",
        "62856" : "INDOSAT",
        "62857" : "INDOSAT",
        "62858" : "INDOSAT",
        "62817" : "XL",
        "62818" : "XL",
        "62819" : "XL",
        "62859" : "XL",
        "62877" : "XL",
        "62878" : "XL",
        "62831" : "AXIS",
        "62832" : "AXIS",
        "62833" : "AXIS",
        "62838" : "AXIS",
        "62895" : "TRI",
        "62896" : "TRI",
        "62897" : "TRI",
        "62898" : "TRI",
        "62899" : "TRI",
        "62881" : "SMARTFREN",
        "62882" : "SMARTFREN",
        "62883" : "SMARTFREN",
        "62884" : "SMARTFREN",
        "62885" : "SMARTFREN",
        "62886" : "SMARTFREN",
        "62887" : "SMARTFREN",
        "62888" : "SMARTFREN",
        "62889" : "SMARTFREN",
        "62828" : "CERIA",
    };

    
    btnSubmit.addEventListener('click', function() {
        
        let resultChceker = "";
        const textAreaInput = document.getElementById('textAreaInput');
        const textAreaOutput = document.getElementById('textAreaOutput');
        
        textAreaOutput.value = "";
        
        const resultArray = textAreaInput.value.split('\n');
        
        resultArray.forEach(function(nos, i) {
            const prefix = nos.substring(0, 5);
            // console.log(operatorList[prefix]);
            resultChceker += nos + "\t" + operatorList[prefix];
            if (i < resultArray.length - 1) {
                resultChceker += "\n";
            }
        });

        // console.log(resultChceker);
        textAreaOutput.removeAttribute('disabled');
        
        textAreaOutput.value = resultChceker;
    });
    

</script>
</body>
</html>