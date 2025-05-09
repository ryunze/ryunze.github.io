<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VCard Maker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include_once('components/nav.php') ?>

    <div class="col-md-8 offset-md-2 my-4">
        <h2 class="text-muted mb-4 fs-4">VCard Maker</h2>
        <div class="card shadow">
            <div class="card-body">
                <textarea id="inputDatas" class="form-control shadow-sm mb-3" rows="12"
                    placeholder="Contoh: Budi Gaul    0812345678910"></textarea>
                <div class="d-flex">
                    <button id="btnSubmit" class="btn btn-primary shadow m-auto">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-44Y9M73WYF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-44Y9M73WYF');
</script>

    <script>
        /*

Source: https://en.wikipedia.org/wiki/VCard

BEGIN:VCARD
VERSION:3.0
FN:Simon Perreault
N:Perreault;;;;
TEL:081240330033
END:VCARD

*/


        const btnSubmit = document.getElementById('btnSubmit');

        const generateVcard = function (data) {

            let template = "BEGIN:VCARD\nVERSION:3.0\nFN:" + data[0] + "\nN:" + data[0] + ";;;;\nTEL:" + data[1] +
                "\nEND:VCARD";

            return template;
        }

        const downloadFile = function (filename, text) {

            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);

            element.style.display = 'none';
            document.body.appendChild(element);

            element.click();

            document.body.removeChild(element);
        }

        btnSubmit.addEventListener('click', function () {

            const inputDatas = document.getElementById('inputDatas');

            if (inputDatas.value == "") {
                Toastify({
                    text: "Data tidak boleh kosong",
                    duration: 3000
                }).showToast();
                return false;
            }

            const data = inputDatas.value.split('\n');

            let v = '';

            data.forEach(function (c) {
                v = v + generateVcard(c.split('\t')) + "\n";
            });

            // console.log(v);

            downloadFile('kontak.vcf', v);
        });
    </script>
</body>

</html>
