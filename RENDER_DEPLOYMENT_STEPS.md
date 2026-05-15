# Smart Farming Assistant - Render Deployment Notes

This project is HTML + CSS + JavaScript + PHP + MySQL.
Render needs the `Dockerfile` in this folder to run PHP + Apache.

## Files added/changed
- `Dockerfile` - lets Render run PHP/Apache
- `db.php` - database connection using Render environment variables
- `.env.example` - example variables to copy into Render
- `.htaccess` - makes `index.html` the default homepage
- `deploy_database.sql` - combined SQL import file

## Required Render Environment Variables
Set these in Render > your web service > Environment:

DB_HOST=your MySQL host
DB_USER=your MySQL username
DB_PASS=your MySQL password
DB_NAME=smartfarm
DB_PORT=your MySQL port
DB_SSL=false

If using Aiven and SSL is required, set DB_SSL=true and upload the CA file as `ca.pem`, then set:
DB_SSL_CA=/var/www/html/ca.pem

## Important
Do not use localhost/root on Render. Render is not your XAMPP machine.
