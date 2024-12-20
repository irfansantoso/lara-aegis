<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Notification</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; color: #333;">
    <div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;">
        <h2 style="color: #d9534f;">New User Created</h2>
        <p>A new user has registered on the platform. Here are their details:</p>
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</li>
        </ul>
        <p>Please log in to the admin dashboard for more information or to manage user accounts.</p>
        <p style="color: #555;">Sincerely,<br>Team Example</p>
    </div>
</body>
</html>
