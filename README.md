# Location-Voiture
cp .env.example .env 
composer install 
php artisan migrate
php artisan migrate:fresh
php artisan db:seed
npm i 
npm run dev 
php artisan key:generate
npm run dev 

cp -r public/images/  ./storage/app/public/
php artisan storage:link
php artisan serve
