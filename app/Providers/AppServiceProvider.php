<?php

namespace App\Providers;

use App\Models\Document;
use App\Models\Gallery;
use App\Models\Logo;
use App\Models\Video;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Dispatcher $events)
    {

        if (config('fdc.app_public') == true) {
            $this->app->bind('path.public', function() {
                return base_path().'/';
            });
        }

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $array = [
                [
                    'text' => 'documents',
                    'url' => 'admin/documents',
                    'icon' => 'far fa-fw fa-file',
                    'label' => Document::count(),
                    'label_color' => 'success',
                ],
                [
                    'text' => 'logos',
                    'url' => 'admin/logos',
                    'icon' => 'fas fa-fw fa-spinner',
                    'label' => Logo::count(),
                    'label_color' => 'success',
                ],
                [
                    'text' => 'galleries',
                    'url' => 'admin/galleries',
                    'icon' => 'far fa-fw fa-images',
                    'label' => Gallery::count(),
                    'label_color' => 'success',
                ],
                [
                    'text' => 'video',
                    'url' => 'admin/videos',
                    'icon' => 'fas fa-fw fa-video',
                    'label' => Video::count(),
                    'label_color' => 'success',
                ],
            ];
            $event->menu->addAfter('menu', ...$array);
        });
    }
}
