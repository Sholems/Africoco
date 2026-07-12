<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeBanner extends Widget
{
    protected static string $view = 'filament.widgets.welcome-banner';

    protected int | string | array $columnSpan = 'full';

    public static function canView(): bool
    {
        return true;
    }
}
