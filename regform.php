<!DOCTYPE html>
<html>

<head>
    <title>Register events</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <h2>Event Registration</h2>
    <?php
        require_once __DIR__ . '/vendor/autoload.php';

        $client = new MongoDB\Client('mongodb://localhost:27017');
        $db = $client->Event;
        $collection = $db->List;

        if (isset($_POST['is_submit'])) {
            try {
                $insertOneResult = $collection->insertOne([
                    'name' => $_POST['name'],
                    'mobno' => $_POST['mobno'],
                    'address' => $_POST['address'],
                    'age' => $_POST['age'],
                    'bgroup' => $_POST['bgroup']
                ]);

                if ($insertOneResult->getInsertedCount() > 0) {
                    echo '<script>alert("Inserted Successfully!");</script>';
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        ?>
    <form method="post" action="#">

        <table>
            <tr>
                <td>Name :</td>
                <td><input type="text" placeholder="Event Name" name="name" required /></td>
            </tr>
            <tr>
                <td>Mob No :</td>
                <td><input type="text" placeholder="+91 0000000000" name="mobno" required /></td>
            </tr>
            <tr>
                <td>Address :</td>
                <td><input type="text" placeholder="Address" name="address" required /></td>
            </tr>
            <tr>
                <td>Date :</td>
                <td><input type="text" placeholder="Date" name="age" required /></td>
            </tr>
            <tr>
                <td>Time :</td>
                <td><input type="text" placeholder="Time" name="bgroup" required /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="is_submit" /></td>
            </tr>
        </table>

    </form>
    <a href="view.php">View details</a>

</body>

</html>