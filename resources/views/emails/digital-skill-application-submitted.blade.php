<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4C808A;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .program-info {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4C808A;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            background-color: #4C808A;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Application Received!</h1>
    </div>
    
    <div class="content">
        <p>Dear {{ $application->full_name }},</p>
        
        <p>Thank you for your interest in our Digital Skills Training program. We have successfully received your application and wanted to confirm the details:</p>
        
        <div class="program-info">
            <h3>Application Details</h3>
            <p><strong>Program:</strong> {{ $application->digitalSkill->title }}</p>
            <p><strong>Applied on:</strong> {{ $application->applied_at->format('F j, Y \a\t g:i A') }}</p>
            <p><strong>Application ID:</strong> #{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}</p>
            @if($application->message)
                <p><strong>Your message:</strong></p>
                <p style="font-style: italic; background-color: #f0f0f0; padding: 10px; border-radius: 4px;">{{ $application->message }}</p>
            @endif
        </div>
        
        <h3>What's Next?</h3>
        <ul>
            <li>Our team will review your application within 2-3 business days</li>
            <li>We'll contact you via email or phone to discuss the next steps</li>
            <li>If approved, you'll receive detailed information about the program schedule and requirements</li>
        </ul>
        
        <p>If you have any questions in the meantime, please don't hesitate to contact us.</p>
        
        <p>Best regards,<br>
        <strong>Digital Skills Training Team</strong></p>
    </div>
    
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
        <p>If you need assistance, please contact us through our website or call our support line.</p>
    </div>
</body>
</html>