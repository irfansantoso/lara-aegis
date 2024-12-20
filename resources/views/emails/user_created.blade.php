<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; color: #333;">
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;">
        <h2 style="color: #0056b3;">Welcome, {{ $user->name }}!</h2>
        <p>Your account has been successfully created. Here are your details:</p>
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</li>
        </ul>
        <p>If you have any questions or need assistance, feel free to contact us at support@example.com.</p>
        <p>Thank you for joining us!</p>
        <p style="color: #555;">Sincerely,<br>Team Example</p>
    </div>
</body>
</html>
