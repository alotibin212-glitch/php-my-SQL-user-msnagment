<?php
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['fullName'];
    $age = intval($_POST['age']);
    $status = 1; 

    $stmt = $conn->prepare("INSERT INTO users (name, age, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $name, $age, $status);
    $stmt->execute();
    $stmt->close();
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['toggle'])) {
    $id = intval($_GET['toggle']);
    
    $result = $conn->query("SELECT status FROM users WHERE id = $id");
    if ($row = $result->fetch_assoc()) {
        $new_status = $row['status'] == 1 ? 0 : 1;
        $conn->query("UPDATE users SET status = $new_status WHERE id = $id");
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$users_result = $conn->query("SELECT * FROM users ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #fcfcfc;
            color: #333;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .form-container {
            margin-bottom: 30px;
        }

        input[type="text"], input[type="number"] {
            padding: 8px 12px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button, input[type="submit"] {
            padding: 8px 15px;
            background-color: #e0e0e0;
            border: 1px solid #adadad;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #d4d4d4;
        }

        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .badge-0 { 
            background-color: #fadbd8; 
            color: #c0392b; 
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
        } 
        
        .badge-1 { 
            background-color: #d4efdf; 
            color: #27ae60; 
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            display: inline-block;
        }

        .toggle-btn {
            text-decoration: none;
            padding: 4px 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #333;
            font-size: 12px;
            font-weight: normal;
        }

        .toggle-btn:hover {
            background-color: #e2e2e2;
        }

        .no-data {
            color: #666;
            font-style: italic;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h2>Insert Data</h2>
    <div class="form-container">
        <form method="POST" action="">
            <input type="text" name="fullName" placeholder="Full Name" required>
            <input type="number" name="age" placeholder="Age" required min="1">
            <input type="submit" name="add_user" value="Submit">
        </form>
    </div>

    <hr>

    <h2>Registered Users (Database)</h2>

    <?php if ($users_result && $users_result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Status</th>
                    <th>Action (Toggle)</th>
                </tr>
            </thead>
<tbody>
                <?php while($user = $users_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td>
                            <?php if ($user['status'] == 1): ?>
                                <span class="badge-1">Active</span>
                            <?php else: ?>
                                <span class="badge-0">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?toggle=<?php echo $user['id']; ?>" class="toggle-btn">Toggle Status</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No data available. Add the first user!</p>
    <?php endif; ?>

</body>
</html>