<?php
require_once "inc/functions.php";
$info = "";
$task = $_GET["task"] ?? "report";
if ("seed" == $task) {
    seed(DB_NAME);
    $info = "Sedding done!!!";
}

if (isset($_POST['submit'])) {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    if ($id) {
        if ($fname != '' && $lname != '' && $phone != '') {
            $update = updateStudent($id, $fname, $lname, $phone);
            if ($update) {
                header('Location: /practice/lwhh-php/crud/index.php?task=report');
            } else {
                header('Location: /practice/lwhh-php/crud/index.php?task=update&error=1');
            }
        }
    } else {
        if ($fname != '' && $lname != '' && $phone != '') {
            $crete = addStudent($fname, $lname, $phone);
            if ($crete) {
                header('Location: /practice/lwhh-php/crud/index.php?task=report');
            } else {
                header('Location: /practice/lwhh-php/crud/index.php?task=add&error=1');
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <style>
        body {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>LWHH CRUD Project</h2>
                <?php include_once("inc/template/nav.php") ?>
                <?php
                if ($info != "") {
                    echo "<p>{$info}</p>";
                }
                ?>
            </div>
        </div>
        <?php if ("report" == $task) : ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <?php generateReport(); ?>
                    <div>
                        <pre>
                            <?php
                            printRaw();
                            ?>
                        </pre>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ("add" == $task) : ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <?php if (isset($_GET['error'])) : ?>
                        <dl>
                            <dt style="color:red">Phone number alredy been taken!!!</dt>
                        </dl>
                    <?php endif; ?>

                    <form action="index.php?task=report" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone">
                        <button type="submit" class="buttom-primary" value="save" name="submit">Save</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>



        <?php
        if ("edit" == $task) :
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            $student = getStudent($id);
            // print_r($student);
            if ($student) :
        ?>

                <div class="row">
                    <div class="column column-60 column-offset-20">
                        <?php if (isset($_GET['error'])) : ?>
                            <dl>
                                <dt style="color:red">Phone number alredy been taken!!!</dt>
                            </dl>
                        <?php endif; ?>

                        <form action="index.php?task=report" method="POST">
                            <label for="fname">First Name</label>
                            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                            <input type="text" name="fname" id="fname" value="<?php echo $student['fname']; ?>">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" value="<?php echo $student['lname']; ?>">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" value="<?php echo $student['mobile']; ?>">
                            <button type="submit" class="buttom-primary" value="save" name="submit">UPDATE</button>
                        </form>
                    </div>
                </div>
        <?php
            endif;
        endif;
        ?>



        <?php
        if ('delete' == $task) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
            if ($id > 0) {
                deleteStudent($id);
            }
        }
        ?>
    </div>
    <script type="text/javascript" src="assets/js/scripts.js"></script>
</body>

</html>