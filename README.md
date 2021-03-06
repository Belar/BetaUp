
> BetaUp is no longer being actively developed. Feel free to fork and use this repo, but at the moment, I can't promise it will be updated to the newest version of Laravel.

BetaUp
=======

It's a Composer package for **Laravel** that allows setting up pre-launch, sign up page with e-mail activation (confirmation). Package includes model for beta-user, migrations and basic view.

![BetaUp Default Theme - Magister](betaup.jpg)


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
4. (Optional) Publish config to adjust `php artisan config:publish belar/betaup`
5. (Optional) Copy Views to adjust `php artisan view:publish belar/betaup`
6. (Optional) Publish assets [for default theme] `php artisan asset:publish belar/betaup`

Now you should be able to access BetaUp via `your_domain/betaup`.

####Docs - Available functions
#####Config 
Configuration file allows you to customize **BetaUp** options and you can find it in `app/config/packages/belar/betaup` after publication (step 4 of installation).    
`'uri' => 'betaup'` - package address prefix, by default it's yourdomain/betaup, you can change it to ex. yourdomain/amazinghype etc.  
`'email_confirmation' => 'true'` True by default, this option allows to turn e-mail confirmation off.  
`'activated_by_default' => 'false'` False by default, you can determine if user should be activated by default.     
`'social_icons' => 'true'` True by default, allows you to turn off Twitter and Facebook icons visible on landing page.  
`'twitter_profile' => 'twitter_url'` URL for Twitter profile.  
`'facebook_profile' => 'facebook_url'`URL for Facebook profile.  
`'alert_timeout' => '5000'` 5000 by default, determines time after which alerts should fade out (ms).  
`'dark_theme' => 'true'` Changes colour scheme to dark, set to 'false' for bright style.  
`'main_background_image' => ''` Requires full URL path to the image, leave empty to keep default picture.  

#####Beta key generator  
`generateBetaCode($amount)` - Generates `$amount` of unique Beta codes, 1 by default.  
`getBetaCodes($type)` - Will fetch all beta keys matching criteria, avaialble options are `used` for keys already activated and `available` for unused keys. Empty call will return all codes available.  
`getFirstBetaCodeAvailable` - Returns 1st available key.  
`checkBetaCode` - Checks if code submited by user is vaild aka exists in beta codes table. Returns `true` if code is correct and unused.  

#####Referal links & karma system
NOTE: This options are available since version 2.3. If you are updating from version 2.2.1 or earlier, you need to run a migration which adds fields for referal code and karma value.  
By default referal code is genereted to every newly submited email and 1 karma point is added to every user who successfuly confirms his email with activation link. At the same time referer is getting +1 karma if form was accessed via referal link in form of `.../betaup/referal/referal_code`.

`showRefLink($cred)` - Shows referal code of a user based on it's id or email. Returns ref code or false if no data is present.  
`currentKarma($cred)` - Shows user's current karma based on if, referal code or email. Default karma is set to 0, but if no value is present, it will return false.  
`karmaUp($cred, $amount)` - Adds karma to user based on id, ref code or email. Second variable determines value. If user isn't present, returns false.  
`karmaOrMore($amount)` - Returns data of all users with karma even or higher than `$amount`.  

####Incoming features

I'm open for suggestions; feel free to write to me on [Twitter](https://twitter.com/belardesign) or submit an issue via GitHub.

####Credits

Default theme is a modification of Magister template, published by Sergey Pozhilov on [gettemplate.com](http://www.gettemplate.com/).

####Changelog

#####2.4

- added new default theme
- config update with theming options

#####2.3

- mass mail active/inactive users
- referal links
- karma system
- alert fade-out after X ms

#####2.2.1

- removed assets physical dependency  
- views are split into parent-childs model  
- added config support (check docs above)  
- added social media icons  
- added error/success alert with fade-out  
- minor clean-ups  

#####2.2

- mass mail

#####2.1.  

- beta code generator

#####2.0  

- composer package

#####1.0  

- intial release 

