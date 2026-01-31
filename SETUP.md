# QORTA Website - Quick Setup Guide

## Fastest Deployment Path (No Server Required)

### Option A: Use FormSubmit (Easiest - No Signup)

1. **Update contact.html:**
   - Replace the form action with:
     ```html
     <form action="https://formsubmit.co/anopashekajokoto1@gmail.com" method="POST">
     ```
   
2. **Deploy to Netlify:**
   - Drag and drop the entire `qorta-website` folder to netlify.com
   - Done! Your site is live.

3. **First form submission:**
   - FormSubmit will send a confirmation email
   - Click the link to activate
   - All future submissions go straight to your inbox

### Option B: Use Formspree (Free - Better Features)

1. **Setup:**
   - Sign up at formspree.io (free)
   - Create new form
   - Copy your form ID

2. **Update contact.html:**
   - Open `contact-formspree.html`
   - Replace `YOUR_FORM_ID` with your actual form ID
   - Rename file to `contact.html` (replace the existing one)

3. **Deploy:**
   - Upload to any hosting (Netlify, Vercel, GitHub Pages)
   - Forms will work immediately

### Option C: Full Server Setup (Most Control)

Use the included `submit-demo.php` with:
1. Traditional web hosting
2. Resend API account
3. Your API key configured

---

## Deployment Platforms

### Netlify (Recommended)
1. Go to netlify.com
2. Drag folder into browser
3. Custom domain: Settings → Domain management
4. Done!

### Vercel
1. Install Vercel CLI: `npm i -g vercel`
2. Run: `vercel` in the qorta-website folder
3. Follow prompts

### GitHub Pages
1. Create GitHub repo
2. Upload files
3. Settings → Pages → Deploy from main branch

### Traditional Hosting
1. Upload via FTP
2. Point domain to directory
3. Ensure PHP enabled (if using submit-demo.php)

---

## Quick Checklist

- [ ] Choose email solution (FormSubmit/Formspree/Resend)
- [ ] Update form action in contact.html
- [ ] Test form locally
- [ ] Deploy to hosting
- [ ] Test live form
- [ ] Add custom domain (optional)
- [ ] Add analytics (optional)

---

## Customization Quick Reference

**Change accent color:**
`styles.css` line 7: `--color-accent: #0DC0E0;`

**Update email recipient:**
- FormSubmit: Change in form action URL
- Formspree: Change in Formspree dashboard
- PHP: `submit-demo.php` line 28

**Add logo:**
Replace "QORTA" text in navbar with:
```html
<img src="logo.png" alt="QORTA" class="logo">
```

---

## Need Help?

Common issues:

**Form not submitting?**
- Check console for errors
- Verify form action URL
- Test with different browser

**Styling looks wrong?**
- Clear browser cache
- Check fonts loaded (inspect network tab)

**Mobile menu not working?**
- Designed for desktop (hamburger menu can be added)
- Consider adding mobile nav if needed

---

Your website is ready to deploy. Choose your email solution and go live!
