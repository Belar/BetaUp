BetaUp [beta]
=======

It's a Composer package for **Laravel** taht allows setting up pre-launch, sign up page with e-mail activation (confirmation). Package includes model for beta-user, migrations and basic view.

####Installation
1. Add `"belar/betaup": "dev-master"` to your composer.json file.
2. Edit app/config/app.php and add `'Belar\Betaup\BetaupServiceProvider',` to your providers list:
```php
'providers' => array(
		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		...
		'Belar\Betaup\BetaupServiceProvider',
	),
```
3. Migrate `php artisan migrate --package="belar/betaup"`
4. Publish assets `php artisan asset:publish belar/betaup`
5. (Optional) Copy Views to adjust `php artisan view:publish belar/betaup`

Now you should be able to access BetaUp via `your_domain/beta`.

####Changelog

2.0.0  
- composer package

1.0.0  
- intial release 

