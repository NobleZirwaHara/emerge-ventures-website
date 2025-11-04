<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Application Received</title>
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
            background-color: #3B4167;
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
        .applicant-info {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4C808A;
        }
        .program-info {
            background-color: #e8f4f8;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        .btn {
            display: inline-block;
            background-color: #4C808A;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Digital Skills Application</h1>
    </div>
    
    <div class="content">
        <p>A new application has been submitted for the Digital Skills Training program.</p>
        
        <div class="applicant-info">
            <h3>Applicant Information</h3>
            <p><strong>Name:</strong> {{ $application->full_name }}</p>
            <p><strong>Email:</strong> {{ $application->email }}</p>
            <p><strong>Phone:</strong> {{ $application->phone }}</p>
            <p><strong>Applied on:</strong> {{ $application->applied_at->format('F j, Y \a\t g:i A') }}</p>
            <p><strong>Application ID:</strong> #{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}</p>
        </div>
        
        <div class="program-info">
            <h3>Program Details</h3>
            <p><strong>Program:</strong> {{ $application->digitalSkill->title }}</p>
            <p><strong>Level:</strong> {{ ucfirst($application->digitalSkill->level) }}</p>
            <p><strong>Duration:</strong> {{ $application->digitalSkill->duration_hours }} hours</p>
            @if($application->digitalSkill->price)
                <p><strong>Price:</strong> MWK {{ number_format($application->digitalSkill->price, 2) }}</p>
            @endif
        </div>
        
        @if($application->message)
            <div class="applicant-info">
                <h3>Applicant's Message</h3>
                <p style="font-style: italic; background-color: #f0f0f0; padding: 15px; border-radius: 4px;">{{ $application->message }}</p>
            </div>
        @endif
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ url('/admin/digital-skill-applications/' . $application->id) }}" class="btn">View Application</a>
            <a href="{{ url('/admin/digital-skill-applications') }}" class="btn">All Applications</a>
        </div>
        
        <p><strong>Action Required:</strong> Please review this application and update its status in the admin panel.</p>
    </div>
    
    <div class="footer">
        <p>This is an automated notification from the Digital Skills Training system.</p>
    </div>
</body>
</html>