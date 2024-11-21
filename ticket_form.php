<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ticket</title>

    <style>
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea, button {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .card {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .background {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e0f7fa;
        }
    </style>
</head>

<?php include('header.php'); ?>

<body>
    <div class="background">
        <div class="card">
            <h2 style="padding-bottom:20px">Add New Ticket</h2>
            <form action="addticket.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ticket-type">Ticket Type:</label>
                    <input type="text" id="ticket-type" name="ticket_type" placeholder="e.g., Adult, Child" required>
                </div>
                <div class="form-group">
                    <label for="price">Price (USD):</label>
                    <input type="number" id="price" name="price" placeholder="e.g., 29.99" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" placeholder="Describe the ticket..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Ticket Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit">Add Ticket</button>
            </form>
        </div>
    </div>
</body>

</html>