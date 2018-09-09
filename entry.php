<?php

if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    exit;
}

?>
<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>簡単名刺自動読込</title>
    <style type="text/css">
        body {
            padding-top: 5rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./index.php">簡単名刺読込</a>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        <h1>読み込む名刺を指定してください</h1>
        <p>
            <form method="POST" enctype="multipart/form-data" id="inpiutGroupForm">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile02"
                               accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
                        <label class="custom-file-label" for="inputGroupFile02">名刺を撮影 / 画像を選択</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" id="inputGroupFile02Submit" disabled>Upload</button>
                    </div>
                </div>
            </form>
        </p>
        <p>
            <a href="https://github.com/kenji0302/b-card">GitHubでソースを見る</a>
        </p>
    </div>

</main><!-- /.container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
<script>
    $('#inputGroupFile02').on('change', function () {
        var file = $(this).prop('files')[0];
        if (file.size > (2 * 1024 * 1024)) {
            alert('2M未満のファイルを指定してください');
            return;
        }
        $('.custom-file-label').html(file.name);
        $('#inputGroupFile02Submit').prop('disabled', false);
    });
    $('#inpiutGroupForm').on('submit', function () {
        var loading = $('<div>読み込み中...</div>');
        loading.css("z-index", "9999")
        .css("text-align", "center")
        .css('color', "#ffffff")
        .css("padding-top", "250px")
        .css("position", "absolute")
        .css("top", "0px")
        .css("left", "0px")
        .css("right", "0px")
        .css("bottom", "0px")
        .css("background-color", "gray")
        .css("opacity", "0.8");
        $('body').append(loading);
        return true;
    });
</script>

</body>
</html>