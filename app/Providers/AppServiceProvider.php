<?php

namespace App\Providers;

// use App\Filament\Pages\Settings;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Resources\SasaranKinerjaResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            if (auth()->user()->role->id == 1) {
                return $builder->items([
                    NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->activeIcon('heroicon-s-home')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.pages.dashboard'))
                        ->url(route('filament.pages.dashboard')),
                    NavigationItem::make('Sasaran Kinerja')
                        ->icon('heroicon-o-collection')
                        ->activeIcon('heroicon-s-collection')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.resources.sasaran-kinerjas.index'))
                        ->url(route('filament.resources.sasaran-kinerjas.index')),
                    NavigationItem::make('Data Pegawai')
                        ->icon('heroicon-o-collection')
                        ->activeIcon('heroicon-s-collection')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.resources.data-pegawais.index'))
                        ->url(route('filament.resources.data-pegawais.index')),
                    NavigationItem::make('Data User')
                        ->icon('heroicon-o-collection')
                        ->activeIcon('heroicon-s-collection')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.resources.users.index'))
                        ->url(route('filament.resources.users.index')),
                ]);
                ;
            } else {
                return $builder->items([
                    NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->activeIcon('heroicon-s-home')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.pages.dashboard'))
                        ->url(route('filament.pages.dashboard')),
                    NavigationItem::make('Matriks')
                        ->icon('heroicon-o-user')
                        ->activeIcon('heroicon-s-user')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.resources.matriks.index'))
                        ->url(route('filament.resources.matriks.index')),
                    NavigationItem::make('Sasaran Pegawai')
                        ->icon('heroicon-o-user')
                        ->activeIcon('heroicon-s-user')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.resources.sasaran-pegawais.index'))
                        ->url(route('filament.resources.sasaran-pegawais.index')),
                    NavigationItem::make('Profile')
                        ->icon('heroicon-o-user')
                        ->activeIcon('heroicon-s-user')
                        ->isActiveWhen(fn(): bool => request()->routeIs('filament.resources.input-profiles.index'))
                        ->url(route('filament.resources.input-profiles.index')),


                ]);
            }

        });
    }
}