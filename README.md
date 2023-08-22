## Laravel Fetch Inbound Email

Follow the following instructions:

- Clone the application
- Run composer install
- We used laravel-imap package (https://github.com/Webklex/laravel-imap)
- Create an email address against your domain in hosting
- Add the following settings in .env from mail client manual settings (Incoming Server)
```
IMAP_HOST=example.com
IMAP_PORT=993
IMAP_ENCRYPTION=ssl
IMAP_VALIDATE_CERT=true
IMAP_USERNAME=info@example.com
IMAP_PASSWORD=mail_password
IMAP_DEFAULT_ACCOUNT=default
IMAP_PROTOCOL=imap
```
- Run the command ```php artisan mail:fetch-all``` you will see the email subjects from your mail
- Go to 'app/Console/Commands/FetchInboundMail.php' command file in the project and modify code in handle method as your requirement.
- Run the command in CronJob to fetch the mail after a few minutes or hours.
