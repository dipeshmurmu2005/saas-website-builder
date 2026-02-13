<?php

namespace App\Providers\Filament;

use App\Models\Tenant;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AccountPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('account')
            ->path('account')
            ->login()
            ->brandLogo(asset('images/gridlayer.png'))
            ->brandLogoHeight('3rem')
            ->colors([
                'primary' => [
                    50  => 'oklch(0.97 0.05 240)',
                    100 => 'oklch(0.93 0.10 240)',
                    200 => 'oklch(0.85 0.18 240)',
                    300 => 'oklch(0.75 0.24 240)',
                    400 => 'oklch(0.65 0.28 240)',
                    500 => 'oklch(0.55 0.30 240)',
                    600 => 'oklch(0.48 0.27 240)',
                    700 => 'oklch(0.40 0.23 240)',
                    800 => 'oklch(0.33 0.19 240)',
                    900 => 'oklch(0.26 0.15 240)',
                    950 => 'oklch(0.18 0.10 240)',
                ],
            ])
            ->topNavigation(true)
            ->discoverResources(in: app_path('Filament/Account/Resources'), for: 'App\Filament\Account\Resources')
            ->discoverPages(in: app_path('Filament/Account/Pages'), for: 'App\Filament\Account\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Account/Widgets'), for: 'App\Filament\Account\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
