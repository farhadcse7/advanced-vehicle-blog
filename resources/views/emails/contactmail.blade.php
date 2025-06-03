<!DOCTYPE html>
<html>

<head>
    <title>New Contact Form Submission</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">

    <div
        style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        <h1 style="font-size: 24px; margin-bottom: 20px; color: #2c3e50;">📬 New Contact Form Submission</h1>

        <p style="margin-bottom: 10px;"><strong>Name:</strong> {{ $formData['name'] }}</p>
        <p style="margin-bottom: 10px;"><strong>Email:</strong> {{ $formData['email'] }}</p>
        <p style="margin-bottom: 10px;"><strong>Subject:</strong> {{ $formData['subject'] }}</p>
        <p style="margin-bottom: 10px;"><strong>Message:</strong></p>
        <div style="background-color: #f2f2f2; padding: 15px; border-radius: 5px; white-space: pre-wrap;">
            {{ $formData['message'] }}
        </div>
    </div>

    <p style="text-align: center; font-size: 12px; color: #999; margin-top: 30px;">
        This message was sent from your website's contact form.
    </p>

</body>

</html>
