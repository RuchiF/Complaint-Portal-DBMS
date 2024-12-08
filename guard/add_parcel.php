<?php
include('../conn.php');

$roll_number = isset($_GET['roll_number']) ? htmlspecialchars($_GET['roll_number']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll_number = $_POST['Roll_number'];
    $room_number = $_POST['Room_number'];
    $phone_number = $_POST['Phone_number'];

    $sql = "INSERT INTO parcels (Roll_number, Room_number, Phone_number) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $roll_number, $room_number, $phone_number);

    if ($stmt->execute()) {
        header("Location: parcels.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parcel</title>
    <link rel="stylesheet" href="parcel.css">
    <style>
        /* Root Colors for Light and Dark Themes */
        :root {
            --symbolcolor: rgb(26, 14, 24);
            --symbolcolorhover: rgb(34, 6, 29);
            --navfootcolor: rgb(176, 164, 147);
            --boxcolor: rgb(226, 201, 171);
            --boxcolorhover: rgb(178, 159, 135);
            --bgcolor: rgb(231, 218, 202);
            --textcolor: rgb(15, 8, 14);
            --textcolorhover: rgb(21, 16, 20);
        }

        [data-theme="dark"] {
            --symbolcolor: rgb(204, 170, 125);
            --symbolcolorhover: rgb(177, 147, 107);
            --navfootcolor: rgb(15, 8, 14);
            --boxcolor: rgb(31, 21, 18);
            --boxcolorhover: rgb(64, 36, 28);
            --bgcolor: rgb(27, 20, 18);
            --textcolor: rgb(231, 218, 202);
            --textcolorhover: rgb(180, 168, 154);
        }

        /* Form Styling */
        .form-container {
            width: 50%;
            margin: 100px auto;
            padding: 30px;
            background-color: var(--boxcolor);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            color: var(--textcolor);
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: var(--textcolor);
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid var(--symbolcolor);
            border-radius: 5px;
            font-size: 16px;
            background-color: var(--boxcolor);
            color: var(--textcolor);
            transition: border-color 0.3s ease;
        }

        .form-container input:focus {
            border-color: var(--symbolcolorhover);
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: var(--symbolcolor);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: var(--symbolcolorhover);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }

        /* Cloud Icon */
        .theme-switcher {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .cloud {
            width: 40px;
            height: 40px;
            background: var(--symbolcolor);
            border-radius: 50%;
            position: relative;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, box-shadow 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cloud:before,
        .cloud:after {
            content: '';
            position: absolute;
            background: var(--symbolcolor);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            top: -10px;
        }

        .cloud:before {
            left: -20px;
        }

        .cloud:after {
            right: -20px;
        }

        .cloud:hover {
            background: var(--symbolcolorhover);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body data-theme="light">
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/">ComplaintPortal</a>
        </div>
        
        <div class="theme-switcher">
            <div class="cloud" id="theme-toggle"></div>
        </div>
    </nav>
        <br>
    <div class="form-container">
        <h1>Add New Parcel</h1>
        <form action="" method="POST">
            <label for="Roll_number">Roll Number:</label>
            <input type="text" id="Roll_number" name="Roll_number" value="<?= $roll_number ?>" required>

            <label for="Room_number">Room Number:</label>
            <input type="text" id="Room_number" name="Room_number" required>

            <label for="Phone_number">Phone Number:</label>
            <input type="text" id="Phone_number" name="Phone_number" required>

            <button type="submit">Add Parcel</button>
        </form>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            // Toggle between dark and light themes
            if (body.getAttribute('data-theme') === 'light') {
                body.setAttribute('data-theme', 'dark');
            } else {
                body.setAttribute('data-theme', 'light');
            }
        });
    </script>
</body>

</html>
