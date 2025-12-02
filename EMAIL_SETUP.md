# Email Configuration for Digital Skills Applications

## Overview
The digital skills application system sends two types of emails:
1. **Confirmation email** to the applicant
2. **Notification email** to the admin

## Configuration

### Development (Local Testing)
For local development, use the log driver to see email content in logs:

```env
MAIL_MAILER=log
```

Emails will be written to `storage/logs/laravel.log`

### Production (Plunk Integration)
For production, use Plunk for actual email delivery:

```env
MAIL_MAILER=plunk
PLUNK_API_KEY=your_plunk_api_key
PLUNK_API_URL=https://api.useplunk.com
ADMIN_EMAIL=your_admin_email@domain.com
```

## Email Templates
- **Applicant confirmation**: `resources/views/emails/digital-skill-application-submitted.blade.php`
- **Admin notification**: `resources/views/emails/digital-skill-application-received.blade.php`

## Plunk Setup
1. Sign up at [useplunk.com](https://useplunk.com)
2. Get your API key from the dashboard
3. Update the `.env` file with your API key
4. Set `MAIL_MAILER=plunk`

## Troubleshooting

### Common Issues
1. **Domain verification**: Plunk requires domain verification for custom from addresses
2. **API key**: Ensure your Plunk API key is correct
3. **Rate limits**: Check Plunk's rate limits for your plan

### Testing
To test email functionality:
```bash
# Switch to log driver
MAIL_MAILER=log

# Submit a test application through the website
# Check storage/logs/laravel.log for email content
```

### Logs
Email sending is logged with detailed information:
- Success: `INFO` level logs
- Errors: `ERROR` level logs with full error details

## Email Content
Both emails include:
- Application details (name, email, phone, program)
- Program information (title, level, duration, price)
- Application ID for tracking
- Professional HTML formatting with inline CSS