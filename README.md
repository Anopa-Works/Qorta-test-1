# QORTA Website - Tier 1

Clean, professional website for QORTA's digital menu ordering system.

## Design System

- **Colors (60/30/10 rule)**
  - 60% Light (#F0EEE9) - backgrounds
  - 30% Dark (#333333) - text, structure
  - 10% Accent (#0DC0E0) - CTAs only

- **Typography**
  - Headings: Poppins (500-700)
  - Body: Inter (400-500)

## Structure

5 focused pages:
1. **Home** - Value proposition and what QORTA does
2. **How It Works** - Simple 4-step process
3. **Features** - Tier 1 feature breakdown
4. **Pricing** - Tier 1 pricing information
5. **Contact** - Demo request form

## Email Setup

The contact form uses Resend API to send demo requests to: `anopashekajokoto1@gmail.com`

### Steps to Configure Email:

1. **Sign up for Resend** (free tier is sufficient)
   - Go to https://resend.com
   - Create account and verify your email
   - Get your API key from the dashboard

2. **Set up sender domain** (optional but recommended)
   - Add your domain in Resend dashboard
   - Verify DNS records
   - Use format: `QORTA <noreply@yourdomain.com>`

3. **Update Configuration**
   - Open `submit-demo.php`
   - Replace `YOUR_RESEND_API_KEY_HERE` with your actual API key
   - Update `from` email if using custom domain

## Deployment Options

### Option 1: Traditional Web Hosting (with PHP)
- Upload all files to your hosting via FTP
- Ensure PHP is enabled (most shared hosting has this)
- Point domain to the directory
- Done!

### Option 2: Static Hosting (Netlify/Vercel)
If using static hosting without PHP support:

1. Create a serverless function instead:
   - Netlify: Use Netlify Functions
   - Vercel: Use Vercel Serverless Functions

2. Or use a form service:
   - Formspree (easiest)
   - Basin
   - Web3Forms

**Example with Formspree:**
- Sign up at formspree.io
- Get your form endpoint
- Update the form action in `contact.html`

### Option 3: Custom Server
- Use Node.js/Express backend
- Deploy to Heroku, Railway, or similar
- Handle form submissions server-side

## Files Included

```
qorta-website/
├── index.html          # Home page
├── how-it-works.html   # Process explanation
├── features.html       # Feature breakdown
├── pricing.html        # Pricing info
├── contact.html        # Demo request form
├── styles.css          # Complete styling
├── form-handler.js     # Client-side form handling
├── submit-demo.php     # Server-side email handler
└── README.md          # This file
```

## Customization

### Change Email Recipient
Edit `submit-demo.php` line 28:
```php
'to' => 'your-new-email@example.com',
```

### Update Colors
Edit `styles.css` lines 5-7:
```css
--color-light: #F0EEE9;
--color-dark: #333333;
--color-accent: #0DC0E0;
```

### Add Analytics
Add tracking code before `</head>` in each HTML file:
```html
<!-- Google Analytics, Plausible, etc. -->
```

## Testing Locally

### With PHP:
```bash
php -S localhost:8000
```
Visit: http://localhost:8000

### Without PHP (static only):
Just open `index.html` in browser (form won't work without backend)

## Notes

- No JavaScript frameworks - pure HTML/CSS/vanilla JS
- Fully responsive design
- Fast loading times
- SEO-friendly structure
- No external dependencies except fonts
- Form validates input before submission
- Clean error handling

## Support

For questions about QORTA Tier 1, contact: anopashekajokoto1@gmail.com
