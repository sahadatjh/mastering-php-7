<?php
include_once 'scrambler.php';
$task = 'encode';
if (isset($_GET['task']) && $_GET['task'] != '') {
    $task = $_GET['task'];
}

$key = "abcdefghijklmnopqrstuvwxyz1234567890";
if ('key' == $task) {
    $keyOriginal = str_split($key);
    shuffle($keyOriginal);
    $key = join('', $keyOriginal);
} else if (isset($_POST['key']) && $_POST['key'] != '') {
    $key = $_POST['key'];
}

$scrambledData = '';
if ('encode' == $task) {
    $data = $_POST['data'] ?? '';
    if ($data != '') {
        $scrambledData = scrambleData($data, $key);
    }
}

if ('decode' == $task) {
    $data = $_POST['data'] ?? '';
    if ($data != '') {
        $scrambledData = decodeData($data, $key);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <title>data scrambler</title>
    <style>
        body {
            margin-top: 30px;
        }

        #data {
            width: 100%;
            height: 160px;
        }

        #result {
            height: 160px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>data scrambler</h2>
                <p>
                    <a href="?task=encode">Encode ||</a>
                    <a href="?task=decode">decode ||</a>
                    <a href="?task=key">Generate Key</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form method="post" action="index.php<?php if ('decode' == $task) {
                                                            echo '?task=decode';
                                                        } ?>">
                    <label for="key">Key</label>
                    <input type="text" name="key" id="key" <?php DisplayKey($key); ?>>
                    <label for="data">data</label>
                    <textarea id="data" name="data"><?php if (isset($_POST['data'])) {
                                                        echo $_POST['data'];
                                                    } ?></textarea>
                    <label for="result">result</label>
                    <textarea id="result" name="result"><?php echo $scrambledData; ?></textarea>
                    <button type="submit">do it for me</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>