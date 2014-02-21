BetaUp [beta]
=======

It's a Composer package for **Laravel** taht allows setting up pre-launch, sign up page with e-mail activation (confirmation). Package includes model for beta-user, migrations and basic view.

####Installation
1. Add `"belar/betaup": "dev-master"` to your composer.json file and do `composer update`.
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

####Docs - Available functions
#####Beta key generator  
`generateBetaCode($amount)` - Generates `$amount` of unique Beta codes, 1 by default.  
`getBetaCodes($type)` - Will fetch all beta keys matching criteria, avaialble options are `used` for keys already activated and `available` for unused keys. Empty call will return all codes available.  
`getFirstBetaCodeAvailable` - Returns 1st available key.  
`checkBetaCode` - Checks if code submited by user is vaild aka exists in beta codes table. Returns `true` if code is correct and unused.  

####Incoming features

After meeting initial goals I need to do some clean up and adjustments. In the mean time, I would like to boost mass mail option a bit with some extra features and maybe add extra customization via simple config file. Stay tuned!

####Changelog

2.2.0
- mass mail

2.1.0  
- beta code generator

2.0.0  
- composer package

1.0.0  
- intial release 

