<?php

if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    exit;
}


//テスト用
//$result = [
//    "name" => [0 => "めいしたろう"],
//    "location" => [0 => "〒000-0000", 1 => "東京都", 2 => "渋谷区0-0-0", 3 => "〇〇ビル○階"],
//    "url" => [0 => "http://example.com"],
//    "email" => [0 => "example@example.com"],
//];
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
    <a class="navbar-brand" href="/">簡単名刺読込</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template">
        <h1>読み込み結果</h1>
        <p>

        <table class="table table-striped">
            <tbody>
            <?php foreach ((array)$result['name'] as $name) { ?>
                <tr>
                    <th>お名前</th>
                    <td><?php echo htmlspecialchars($name) ?></td>
                </tr>
            <?php } ?>
            <?php if ($result['location']) { ?>
                <tr>
                    <th>住所</th>
                    <td>
                        <?php foreach ((array)$result['location'] as $name) { ?>
                            <?php echo htmlspecialchars($name) ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            <?php foreach ((array)$result['url'] as $name) { ?>
                <tr>
                    <th>URL</th>
                    <td><?php echo htmlspecialchars($name) ?></td>
                </tr>
            <?php } ?>
            <?php foreach ((array)$result['email'] as $name) { ?>
                <tr>
                    <th>メールアドレス</th>
                    <td><?php echo htmlspecialchars($name) ?></td>
                </tr>
            <?php } ?>

        </table>
        <a href="./index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">戻る</a>


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
</body>
</html>