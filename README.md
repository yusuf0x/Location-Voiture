# Location-Voiture

# Setup 
```bash
:~$ cp .env.example .env 
:~$ composer install 
:~$ php artisan migrate:fresh
:~$ php artisan db:seed
:~$ php artisan key:generate
:~$ cp -r public/images/  ./storage/app/public/
:~$ php artisan storage:link
:~$ php artisan serve
:~$ npm install 
:~$ npm run dev 
```

# For Email Tesing 
Make Configuration 
```

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=tls 

```