<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .payment-methods {
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Payment Information</h2>
    <form action="process_payment.php" method="POST">
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select id="payment_method" name="payment_method" required>
                <option value="card">Credit/Debit Card</option>
                <option value="upi">UPI</option>
            </select>
        </div>
        <div id="card_payment" class="payment-methods">
            <div class="form-group">
                <label for="cardholder_name">Cardholder Name</label>
                <input type="text" id="cardholder_name" name="cardholder_name">
            </div>
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number">
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY">
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
            </div>
        </div>
        <div id="upi_payment" class="payment-methods">
            <div class="form-group">
                <label for="upi_id">UPI ID</label>
                <input type="text" id="upi_id" name="upi_id">
            </div>
        </div>
        <div class="form-group">
            <button type="submit">Submit Payment</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        var cardPayment = document.getElementById('card_payment');
        var upiPayment = document.getElementById('upi_payment');
        
        if (this.value === 'card') {
            cardPayment.style.display = 'block';
            upiPayment.style.display = 'none';
        } else if (this.value === 'upi') {
            cardPayment.style.display = 'none';
            upiPayment.style.display = 'block';
        }
    });
</script>

</body>
</html>
<?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $payment_method = $_POST['payment_method'];
  
      if ($payment_method == 'card') {
          $cardholder_name = $_POST['cardholder_name'];
          $card_number = $_POST['card_number'];
          $expiry_date = $_POST['expiry_date'];
          $cvv = $_POST['cvv'];
  
          // Process card payment with the payment gateway
  
          // Example response handling
          $payment_success = true; // This should be replaced with actual response from the payment gateway
  
          if ($payment_success) {
              echo "Card Payment Successful!";
          } else {
              echo "Card Payment Failed!";
          }
      } elseif ($payment_method == 'upi') {
          $upi_id = $_POST['upi_id'];
  
          // Process UPI payment with the payment gateway
  
          // Example response handling
          $payment_success = true; // This should be replaced with actual response from the payment gateway
  
          if ($payment_success) {
              echo "UPI Payment Successful!";
          } else {
              echo "UPI Payment Failed!";
          }
      }
  }



?>
