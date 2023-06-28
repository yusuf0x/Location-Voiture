<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Status</title>
  <link rel="stylesheet" href="styles.css">
  <style type="text/css">
    body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.reservation-status {
  background-color: #fff;
  max-width: 400px;
  margin: 40px auto;
  padding: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
}

h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

.status {
  font-size: 18px;
  font-weight: bold;
  color: #00a300;
  margin-bottom: 20px;
}

.details {
  font-size: 16px;
  color: #333;
}

  </style>
</head>
<body>
  <div class="reservation-status">
    <h1>Reservation Status</h1>
    <!-- <p class="status">Confirmed</p> -->
    <!-- <p class="details">Your reservation is confirmed. We look forward to seeing you!</p> -->
    <p>ID Reservation {{ $reservation->id }},</p>
    <p class="status">Your reservation status is: {{ $reservation->etat_reservation }}</p>
    <p class="details">Your reservation is confirmed. We look forward to seeing you!</p>
    <p>Thank you !</p>
  </div>
</body>
</html>