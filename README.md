Abd El-rahman
- composer require laravel/ui
- php artisan ui bootstrap --auth
- npm install    *hint*=> before doing this command you've to download node js and put path in enviroment variables 
		    to add path=> go to C disk in program file and take node js path and copy it 
		                              on your PC click right and go to advanced system setting and add path in enviroment 
			            variables in system variables 
- npm run dev 
- npm run dev 
*two times*
- npm install admin-lte@^3.2 --save
*after editing in front pages and ui* we run => npm run dev *not necessary to do it*
- npm install --save @fortawesome/fontawesome-free
- npm run dev

------------------------------------------------------------------------------
Ashour
** add laravel permissions:
- composer require spatie/laravel-permission
- Spatie\Permission\PermissionServiceProvider::class, اتأكد إنه موجود جوه config/app.php
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
دة ساعات بيضرب إيرور لأن مفيش داتابيز لسه باين
- php artisan optimize:clear
- php artisan migrate

** add laravel ban:
- composer require cybercog/laravel-ban
- Cog\Laravel\Ban\Providers\BanServiceProvider::class, اتأكد إنه موجود جوه config/app.php
- php artisan vendor:publish --provider="Cog\Laravel\Ban\Providers\BanServiceProvider" --tag="migrations"
- php artisan migrate
