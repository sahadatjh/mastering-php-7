<?php
define('DB_NAME', '/var/www/practice/lwhh-php/crud/data/db.txt');
function getStudent($id)
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }
    return false;
}
function addStudent($fname, $lname, $phone)
{
    $found = false;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    foreach ($students as $_student) {
        if ($_student['mobile'] == $phone) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $newId = getNewId($students);
        $student = array(
            "id" => $newId,
            "fname" => $fname,
            "lname" => $lname,
            "mobile" => $phone
        );
        array_push($students, $student);
        $serializedData = serialize($students);
        file_put_contents(DB_NAME, $serializedData, LOCK_EX);
        return true;
    }
    return false;
}

function updateStudent($id, $fname, $lname, $phone)
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    $students[$id - 1]['fname'] = $fname;
    $students[$id - 1]['lname'] = $lname;
    $students[$id - 1]['mobile'] = $phone;
    $serializedData = serialize($students);
    file_put_contents(DB_NAME, $serializedData, LOCK_EX);
    return true;
}

function seed($fileName)
{
    $data = array(
        array(
            "id" => "1",
            "fname" => "Sahadat",
            "lname" => "Hossain",
            "mobile" => "0121234789"
        ),
        array(
            "id" => "2",
            "fname" => "Abul",
            "lname" => "Bashar",
            "mobile" => "123456789"
        ),
        array(
            "id" => "3",
            "fname" => "Mohiuddin",
            "lname" => "Alamgir",
            "mobile" => "0123456789"
        ),
        array(
            "id" => "4",
            "fname" => "Arif",
            "lname" => "Mahmud",
            "mobile" => "01321345678"
        ),
        array(
            "id" => "5",
            "fname" => "Munzerin",
            "lname" => "Shaheed",
            "mobile" => "0123987654"
        ),
        array(
            "id" => "6",
            "fname" => "Abul",
            "lname" => "Bashar",
            "mobile" => "34789987"
        ),

    );
    $serializedData = serialize($data);
    file_put_contents($fileName, $serializedData, LOCK_EX);
}

function generateReport()
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
?>

    <table>
        <tr>
            <td>Sl No</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>
        <?php
        foreach ($students as $student) {
        ?>
            <tr>
                <td><?php printf('%s', $student['id']); ?></td>
                <td><?php printf('%s %s', $student['fname'], $student['lname']); ?></td>
                <td><?php printf('%s ', $student['mobile']); ?></td>
                <td><?php printf('<a href="index.php?task=edit&id=%s">Edit</a> || <a class="delete" href="index.php?task=delete&id=%s">Delete</a>', $student['id'], $student['id']); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

<?php
}
?>
<?php
function deleteStudent($id)
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);

    $i = 0;
    foreach ($students as $offset => $student) {
        if ($student['id'] == $id) {
            unset($students[$offset]);
        }
        $i++;
    }

    $serializedData = serialize($students);
    file_put_contents(DB_NAME, $serializedData, LOCK_EX);
}


function printRaw()
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);
    print_r($students);
}


function getNewId($students)
{
    $maxId = max(array_column($students, 'id'));
    return $maxId + 1;
}
?>