<?php

declare(strict_types=1);

namespace DistortedFusion\BladeComponentThemes;

use DistortedFusion\BladeComponents\Contracts\ThemeContract;
use DistortedFusion\BladeComponents\Enums\ThemeVariable;
use DistortedFusion\BladeComponents\Enums\ThemeVariant;
use DistortedFusion\BladeComponents\Themes\DefaultTheme;
use Illuminate\Support\Arr;

class GreenTheme implements ThemeContract
{
    /**
     * {@inheritDoc}
     */
    public static function definitions(ThemeVariant $variant): array
    {
        return match ($variant) {
            ThemeVariant::DARK => static::darkColors(),
            ThemeVariant::LIGHT => static::lightColors(),
            default => [],
        };
    }

    private static function lightColors(): array
    {
        return [
            ...Arr::only(DefaultTheme::bladeColorDefinitions(ThemeVariant::LIGHT), [
                ThemeVariable::SUCCESS->value,
                ThemeVariable::SUCCESS_FOREGROUND->value,
                ThemeVariable::INFO->value,
                ThemeVariable::INFO_FOREGROUND->value,
                ThemeVariable::WARNING->value,
                ThemeVariable::WARNING_FOREGROUND->value,
                ThemeVariable::DANGER->value,
                ThemeVariable::DANGER_FOREGROUND->value,
            ]),

            ThemeVariable::BACKGROUND->value => 'hsl(0 0% 100%)',
            ThemeVariable::FOREGROUND->value => 'hsl(240 10% 3.9%)',

            ThemeVariable::PRIMARY->value => 'hsl(142.1 76.2% 36.3%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(355.7 100% 97.3%)',

            ThemeVariable::SECONDARY->value => 'hsl(240 4.8% 95.9%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(240 5.9% 10%)',

            ThemeVariable::ACCENT->value => 'var(--secondary)',
            ThemeVariable::ACCENT_FOREGROUND->value => 'var(--secondary-foreground)',

            ThemeVariable::MUTED->value => 'var(--secondary)',
            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(240 3.8% 46.1%)',

            ThemeVariable::CARD->value => 'var(--background)',
            ThemeVariable::CARD_FOREGROUND->value => 'var(--foreground)',

            ThemeVariable::BORDER->value => 'hsl(240 5.9% 90%)',
            ThemeVariable::INPUT->value => 'oklch(1 0 0)', // white
            ThemeVariable::RING->value => 'var(--primary)',
        ];
    }

    private static function darkColors(): array
    {
        return [
            ...Arr::only(DefaultTheme::bladeColorDefinitions(ThemeVariant::DARK), [
                ThemeVariable::SUCCESS->value,
                ThemeVariable::SUCCESS_FOREGROUND->value,
                ThemeVariable::INFO->value,
                ThemeVariable::INFO_FOREGROUND->value,
                ThemeVariable::WARNING->value,
                ThemeVariable::WARNING_FOREGROUND->value,
                ThemeVariable::DANGER->value,
                ThemeVariable::DANGER_FOREGROUND->value,
            ]),

            ThemeVariable::BACKGROUND->value => 'hsl(20 14.3% 4.1%)',
            ThemeVariable::FOREGROUND->value => 'hsl(0 0% 95%)',

            ThemeVariable::PRIMARY->value => 'hsl(142.1 70.6% 45.3%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(144.9 80.4% 10%)',

            ThemeVariable::SECONDARY->value => 'hsl(240 3.7% 15.9%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(0 0 98%)',

            ThemeVariable::MUTED->value => 'hsl(0 0 15%)',
            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(240 5% 64.9%)',

            ThemeVariable::CARD->value => 'hsl(24 9.8% 10%)',

            ThemeVariable::BORDER->value => 'hsl(240 3.7% 15.9%)',
            ThemeVariable::INPUT->value => 'var(--border)',
        ];
    }
}
