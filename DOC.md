## Installation Command
- Login to Vagrant with commands <br>
`vagrant up` and `vagrant ssh` <br>
- Run command 
`laravel new smartmenu`
- Config file Homestead.yaml for connect Laravel with VM
- Run `vagrant up --provision` for restart the VM

## Config Database in .env File
- Setup DB NAME
- Setup DB USER
- Setup DB PASSWORD

## Folder & Pattern Organizations
- Create Models folder inside app Folder
- Run command for autoload `composer dump-autoload`

## Create Authentications Files & Routes
Laravel's laravel/jetstream package provides a quick way to scaffold all of the routes and views you need for authentication using a few simple commands:
- `composer require laravel/jetstream`
- `php artisan jetstream:install livewire`
- `php artisan migrate`

## NPM Install & Run Watch for deploy
- `npm install`
- `npm run watch-poll`

## Install ADMIN LTE Theme
- *https://github.com/jeroennoten/Laravel-AdminLTE*
1. Require the package using composer:
    ```
    composer require jeroennoten/laravel-adminlte
    ```
2. (Laravel 7+ only) Require the laravel/ui package using composer:
    ```
    composer require laravel/ui
    php artisan ui:controllers
    ```
3. Install the package using the command (For fresh laravel installations):
    ```
    php artisan adminlte:install
    ```
4. You can install all required & additional resources with the adminlte:install command.
   Without any option it will install AdminLTE assets, config & translations. You can also install the Authentication 
   Views with adding --type=enhanced or additional to the Authentication Views also the Basic Views & Routes with adding 
   --type=full to the adminlte:install command.
    ```
    php artisan adminlte:install --type=full
    ```
   
5. Install Admin LTE Plugins
    ```
    php artisan adminlte:plugins install
    ```
   
6. Publish view on Resorouce Folder
    ```
    php artisan adminlte:install --only=main_views
    ```
   
7. Enable Laravel Mix in config/adminlte.php to enable app.scss e app.js

  
## Install Lara Trust for Role & Permissions
- *https://github.com/santigarcor/laratrust*
1. You can install the package using composer:
    ```
    composer require santigarcor/laratrust
    ```
2. Publish all the configuration files:
    ```
    php artisan vendor:publish --tag="laratrust"
   ```
3. Run the setup command:<br>
   *IMPORTANT:   Before running the command go to your config/laratrust.php file and change the values according to your needs.*
   ```
   php artisan laratrust:setup
   ```
   This command will generate the migrations, create the Role and Permission models (if you are using the teams feature it will also create a Team model) and will add the trait to the configured user models.
 4. Dump the autoloader:
    ```
    composer dump-autoload
    ```
 5. Run the migrations:
    ```
    php artisan migrate
    ```
 6. Run the seeder:<br>
    - Create Laratrust Seeder
    ```
    php artisan laratrust:seeder
    ```
    - Go to your database/seeds/DatabaseSeeder.php and add this in the run() method:
    ```
    public function run()
    {
        // ...
    
        $this->call(LaratrustSeeder::class);
    }
    ```  
    - Run the seed
     
    ```
    php artisan db:seed
    ```
## Laravel Collective
- *https://github.com/LaravelCollective/html*
1. You can install the package using composer:
    ```
    composer require laravelcollective/html
    ```
## Laravel File Manager
- *https://github.com/UniSharp/laravel-filemanager*
1. Run these lines
    ```
    composer require unisharp/laravel-filemanager
    ```

2. Publish the package’s config and assets :
    ```
     php artisan vendor:publish --tag=lfm_config
     php artisan vendor:publish --tag=lfm_public
    ```

3. Run commands to clear cache (optional):
    ```
    php artisan route:clear
    php artisan config:clear
    ```
4. Create symbolic link:
    ```
    php artisan storage:link
    ```
5. Edit APP_URL in .env.
 
6. Edit routes/web.php: <br>
Create route group to wrap package routes.
     ```
      Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
          \UniSharp\LaravelFilemanager\Lfm::routes();
      });
    ```
    Make sure auth middleware is present to:<br>
    - prevent unauthorized uploads
    - work properly with multi-user mode
    - make sure database exists

## Artisan Command
- Create Model Controller Migrations
    ```
    php artisan make:model Todo -mcr
    ```
- Run Migration
    ```
    php artisan migrate
    ```
- Rollback Last Migration
    ```
    php artisan migrate:rollback
    ```

## Upload Shared Hosting
- Generate JS
   ```
  npm run production
   ```
- Move all file includes in public folder in root folder
- Change index.php
    ```
    require __DIR__.'/vendor/autoload.php';
    $app = require_once __DIR__.'/bootstrap/app.php';
    ```
- Add to boot function in AppServiceProvider.php
    ```
     $this->app->bind('path.public', function() {
        return base_path().'/';
     });
    ```
- Change File System Public Disk for Laravel File Manager
    ```
    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'storage/app/public/',
        'visibility' => 'public',
    ],
    ```
