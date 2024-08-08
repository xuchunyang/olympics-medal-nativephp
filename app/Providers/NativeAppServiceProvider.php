<?php

namespace App\Providers;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        MenuBar::create()
            ->icon(resource_path('images/menuBarIconTemplate.png'))
            ->width(400)
            ->height(500)
            ->withContextMenu(
                Menu::new()
                    ->label(config('app.name'))
                    ->separator()
                    ->link('https://github.com/xuchunyang/olympics-medal-nativephp', 'GitHub')
                    ->separator()
                    ->quit()
            )
            ->route('medals');
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
