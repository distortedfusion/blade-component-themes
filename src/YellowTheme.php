<?php

declare(strict_types=1);

namespace DistortedFusion\BladeComponentThemes;

use DistortedFusion\BladeComponents\Contracts\ThemeContract;
use DistortedFusion\BladeComponents\Enums\ThemeVariable;
use DistortedFusion\BladeComponents\Enums\ThemeVariant;
use DistortedFusion\BladeComponents\Themes\DefaultTheme;
use Illuminate\Support\Arr;

class YellowTheme implements ThemeContract
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
            ThemeVariable::FOREGROUND->value => 'hsl(20 14.3% 4.1%)',

            ThemeVariable::PRIMARY->value => 'hsl(47.9 95.8% 53.1%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(26 83.3% 14.1%)',

            ThemeVariable::SECONDARY->value => 'hsl(60 4.8% 95.9%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(24 9.8% 10%)',

            ThemeVariable::ACCENT->value => 'var(--secondary)',
            ThemeVariable::ACCENT_FOREGROUND->value => 'var(--secondary-foreground)',

            ThemeVariable::MUTED->value => 'var(--secondary)',
            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(25 5.3% 44.7%)',

            ThemeVariable::CARD->value => 'var(--background)',
            ThemeVariable::CARD_FOREGROUND->value => 'var(--foreground)',

            ThemeVariable::BORDER->value => 'hsl(20 5.9% 90%)',
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
            ThemeVariable::FOREGROUND->value => 'hsl(60 9.1% 97.8%)',

            ThemeVariable::PRIMARY->value => 'hsl(47.9 95.8% 53.1%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(26 83.3% 14.1%)',

            ThemeVariable::SECONDARY->value => 'hsl(12 6.5% 15.1%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'var(--foreground)',

            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(24 5.4% 63.9%)',

            ThemeVariable::CARD->value => 'hsl(20 14.3% 4.1%)',

            ThemeVariable::BORDER->value => 'hsl(12 6.5% 15.1%)',
            ThemeVariable::INPUT->value => 'var(--border)',
        ];
    }
}
