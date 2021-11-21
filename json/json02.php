<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP to Json</title>
</head>

<body>

    <h3>PHP to Json</h3>
    <button id="btn">Click</button>
    <script>
        <?php
        $data = array(
            "name"         => "Sahadat Hossain",
            "phone number" => "1234567890",
            "address"      => "Jhenaidah"
        );
        ?>
        let data = <?php echo json_encode($data); ?>;
        document.getElementById("btn").addEventListener("click", function() {
            alert(data.name);
            console.log(data);
        });
    </script>
</body>

</html>