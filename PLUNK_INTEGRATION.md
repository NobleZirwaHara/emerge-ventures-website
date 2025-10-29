# Plunk Email Integration

This document explains the Plunk email integration implemented for the Emerge Ventures contact form and newsletter subscription.

## Features Implemented

### 1. Contact Form Integration
- **Admin Notification**: Sends detailed contact form submissions to admin email
- **Auto-Reply**: Sends professional auto-reply to form submitters
- **Event Tracking**: Tracks contact form submissions in Plunk for analytics
- **Form Validation**: Client-side and server-side validation
- **AJAX Submission**: Smooth user experience without page reload

### 2. Newsletter Subscription
- **Subscription Tracking**: Tracks newsletter subscriptions as events
- **Welcome Email**: Sends branded welcome email to new subscribers
- **Admin Notification**: Notifies admin of new subscriptions
- **AJAX Handling**: Real-time feedback for subscription attempts

### 3. Plunk Service Integration
- **Event Tracking**: Track user actions and behaviors
- **Transactional Emails**: Send emails via Plunk API
- **Contact Management**: Create and manage contacts
- **Error Handling**: Comprehensive error logging and handling

## Configuration

### Environment Variables
```env
# Plunk API Configuration
PLUNK_SECRET_KEY=your_secret_key_here
USE_PLUNK_PUBLIC_API_KEY=your_public_key_here
PLUNK_API_URL=https://api.useplunk.com

# Admin Email Configuration
ADMIN_EMAIL=your_admin@email.com
APP_ADMIN_EMAIL=your_admin@email.com
```

### Service Configuration
The Plunk service is configured in `config/services.php`:
```php
'plunk' => [
    'secret_key' => env('PLUNK_SECRET_KEY'),
    'public_key' => env('USE_PLUNK_PUBLIC_API_KEY'),
    'api_url' => env('PLUNK_API_URL', 'https://api.useplunk.com'),
],
```

## Files Created/Modified

### New Files
- `app/Http/Controllers/ContactController.php` - Handles contact form submissions
- `app/Http/Controllers/NewsletterController.php` - Handles newsletter subscriptions
- `app/Services/PlunkService.php` - Plunk API integration service
- `routes/test.php` - Test routes for Plunk integration (development only)

### Modified Files
- `resources/views/contact.blade.php` - Updated with functional forms and JavaScript
- `routes/web.php` - Added contact and newsletter routes
- `config/services.php` - Added Plunk configuration
- `config/app.php` - Added admin email configuration
- `app/Providers/AppServiceProvider.php` - Registered PlunkService

## API Endpoints

### Contact Form
- **POST** `/contact` - Submit contact form
- **GET** `/contact` - Display contact page

### Newsletter
- **POST** `/newsletter/subscribe` - Subscribe to newsletter

### Testing (Development Only)
- **GET** `/test-plunk` - Test Plunk integration

## Email Templates

### Contact Form Emails
1. **Admin Notification**: Professional email with contact details and message
2. **Auto-Reply**: Branded response with next steps and contact information

### Newsletter Emails
1. **Welcome Email**: Branded welcome message with service highlights
2. **Admin Notification**: Simple notification of new subscription

## JavaScript Features

### Contact Form
- Real-time form validation
- Loading states with spinner
- Success/error message display
- Form reset on successful submission

### Newsletter Form
- Email validation
- Loading states
- Success/error feedback
- Form reset on success

## Error Handling

- Comprehensive try-catch blocks
- Detailed error logging
- User-friendly error messages
- Graceful fallbacks

## Security Features

- CSRF protection on all forms
- Input validation and sanitization
- Rate limiting (can be added)
- XSS protection through Laravel's built-in features

## Testing

To test the Plunk integration in development:

1. Visit `/test-plunk` to verify API connectivity
2. Submit the contact form to test email sending
3. Subscribe to newsletter to test subscription flow
4. Check logs for any errors: `tail -f storage/logs/laravel.log`

## Production Considerations

1. Remove test routes in production
2. Set up proper error monitoring
3. Configure rate limiting for forms
4. Set up email templates in Plunk dashboard
5. Monitor email delivery rates
6. Set up webhooks for email events (optional)

## Troubleshooting

### Common Issues
1. **API Key Issues**: Verify PLUNK_SECRET_KEY is set correctly
2. **Email Not Sending**: Check Plunk dashboard for API usage and errors
3. **Form Not Submitting**: Check browser console for JavaScript errors
4. **Validation Errors**: Ensure all required fields are filled

### Debug Steps
1. Check Laravel logs: `storage/logs/laravel.log`
2. Test API connectivity: Visit `/test-plunk`
3. Verify environment variables: `php artisan config:show`
4. Check Plunk dashboard for API calls and errors

## Future Enhancements

1. **Email Templates**: Create reusable email templates
2. **Campaign Integration**: Add campaign management features
3. **Analytics Dashboard**: Display email metrics
4. **A/B Testing**: Test different email versions
5. **Automation**: Set up email sequences and triggers
6. **Webhooks**: Handle email events (opens, clicks, bounces)