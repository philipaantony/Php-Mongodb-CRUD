<!DOCTYPE html>
<html>

<head>
    <title>View Event Details</title>
    <link rel="stylesheet" type="text/css" href="table.css">
</head>

<body>
    <center>
        <h2>Event Details</h2>
        <table border="1" id="customers">
            <tr>
                <th>Name</th>
                <th>Mob No</th>
                <th>Address</th>
                <th>Date</th>
                <th>Time</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
        require_once __DIR__ . '/vendor/autoload.php';

        $client = new MongoDB\Client('mongodb://localhost:27017');
        $db = $client->Event;
        $collection = $db->List;

        $events = $collection->find();

        foreach ($events as $event) {
            echo '<tr>';
            echo '<td>' . $event['name'] . '</td>';
            echo '<td>' . ($event['mobno'] ?? '') . '</td>';
            echo '<td>' . ($event['address'] ?? '') . '</td>';
            echo '<td>' . ($event['age'] ?? '') . '</td>';
            echo '<td>' . ($event['bgroup'] ?? '') . '</td>';
            echo '<td><a class="button" href="update.php?id=' . $event['_id'] . '">Edit</a></td>';
            echo '<td><a class="button" href="delete.php?id=' . $event['_id'] . '">delete</a></td>';
            echo '</tr>';
        }
        ?>
        </table>
        <a href="regform.php">Add Event</a>
    </center>
</body>

</html>