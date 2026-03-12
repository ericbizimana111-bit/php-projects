<?php
include 'connection.php';

// Fetch all users
$sql = "SELECT id, fname, lname, email, gender, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; margin-top: 50px; }
        th, td { border: 1px solid #333; padding: 10px; text-align: center; }
        th { background-color: #00c6ff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        h2 { text-align: center; margin-top: 30px; }
    </style>
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Registered At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['created_at']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>