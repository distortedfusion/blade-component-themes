<?php

declare(strict_types=1);

namespace DistortedFusion\BladeComponentThemes;

use DistortedFusion\BladeComponents\Contracts\ThemeContract;
use DistortedFusion\BladeComponents\Enums\ThemeVariable;
use DistortedFusion\BladeComponents\Enums\ThemeVariant;
use DistortedFusion\BladeComponents\Themes\DefaultTheme;
use Illuminate\Support\Arr;

class RedTheme implements ThemeContract
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
            ...Arr::only(DefaultTheme::definitions(ThemeVariant::LIGHT), [
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
            ThemeVariable::FOREGROUND->value => 'hsl(0 0% 3.9%)',

            ThemeVariable::PRIMARY->value => 'hsl(0 72.2% 50.6%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(0 85.7% 97.3%)',

            ThemeVariable::SECONDARY->value => 'hsl(0 0% 96.1%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(0 0% 9%)',

            ThemeVariable::ACCENT->value => 'var(--secondary)',
            ThemeVariable::ACCENT_FOREGROUND->value => 'var(--secondary-foreground)',

            ThemeVariable::MUTED->value => 'var(--secondary)',
            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(0 0% 45.1%)',

            ThemeVariable::CARD->value => 'var(--background)',
            ThemeVariable::CARD_FOREGROUND->value => 'var(--foreground)',

            ThemeVariable::BORDER->value => 'hsl(0 0% 89.8%)',
            ThemeVariable::INPUT->value => 'oklch(1 0 0)', // white
            ThemeVariable::RING->value => 'var(--primary)',
        ];
    }

    private static function darkColors(): array
    {
        return [
            ...Arr::only(DefaultTheme::definitions(ThemeVariant::DARK), [
                ThemeVariable::SUCCESS->value,
                ThemeVariable::SUCCESS_FOREGROUND->value,
                ThemeVariable::INFO->value,
                ThemeVariable::INFO_FOREGROUND->value,
                ThemeVariable::WARNING->value,
                ThemeVariable::WARNING_FOREGROUND->value,
                ThemeVariable::DANGER->value,
                ThemeVariable::DANGER_FOREGROUND->value,
            ]),

            ThemeVariable::BACKGROUND->value => 'hsl(0 0% 3.9%)',
            ThemeVariable::FOREGROUND->value => 'hsl(0 0% 98%)',

            ThemeVariable::PRIMARY->value => 'hsl(0 72.2% 50.6%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(0 85.7% 97.3%)',

            ThemeVariable::SECONDARY->value => 'hsl(0 0% 14.9%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(0 0 98%)',

            ThemeVariable::MUTED->value => 'hsl(0 0% 14.9%)',
            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(0 0% 63.9%)',

            ThemeVariable::BORDER->value => 'hsl(0 0% 14.9%)',
            ThemeVariable::INPUT->value => 'var(--border)',
        ];
    }
}
