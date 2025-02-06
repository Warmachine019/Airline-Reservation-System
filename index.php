<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Reservation</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        form { display: inline-block; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        select, button { padding: 10px; margin: 10px; width: 200px; }
        button { background-color: #007BFF; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        img { max-width: 100%; height: auto; margin-bottom: 20px; }
    </style>
</head>
<body>

    <img src="AirVoyagerLogo.jpg" alt="Airline Logo" width="300">

    <h2>Book your flight</h2>
    <form method="POST">
        <label for="depart">Depart From:</label>
        <select name="depart" id="depart">
            <option value="Delhi">Delhi</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Chennai">Chennai</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Pune">Pune</option>
            <option value="Kolkata">Kolkata</option>
        </select>

        <br>

        <label for="destination">Destination:</label>
        <select name="destination" id="destination">
            <option value="Delhi">Delhi</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Chennai">Chennai</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Pune">Pune</option>
            <option value="Kolkata">Kolkata</option>
        </select>

        <br>
        <button type="submit" name="book">Book Now</button>
    </form>

    <h3>
        <?php
        if (isset($_POST['book'])) {
            $depart = $_POST['depart'];
            $destination = $_POST['destination'];

            $conn = new mysqli("localhost", "root", "", "airline_reservation");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT price FROM flights WHERE depart_from='$depart' AND destination='$destination'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "Flight Available! Price: ₹" . $row["price"];
            } else {
                echo "No flights found!";
            }

            $conn->close();
        }
        ?>
    </h3>

</body>
</html>
