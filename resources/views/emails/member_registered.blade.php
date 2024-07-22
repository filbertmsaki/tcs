<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Membership</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, {{ $member->fullname }}!</h1>

        <p>Thank you for registering with us. We are excited to have you as a member.</p>
        <p>Your Membership ID is: <strong>{{ $member->membership_no }}</strong></p>

        <p>Best regards,<br>
        The Team</p>
    </div>
</body>
</html>
