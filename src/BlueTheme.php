<?php

declare(strict_types=1);

namespace DistortedFusion\BladeComponentThemes;

use DistortedFusion\BladeComponents\Contracts\ThemeContract;
use DistortedFusion\BladeComponents\Enums\ThemeVariable;
use DistortedFusion\BladeComponents\Enums\ThemeVariant;
use DistortedFusion\BladeComponents\Themes\DefaultTheme;
use Illuminate\Support\Arr;

class BlueTheme implements ThemeContract
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
            ThemeVariable::FOREGROUND->value => 'hsl(222.2 84% 4.9%)',

            ThemeVariable::PRIMARY->value => 'hsl(221.2 83.2% 53.3%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(210 40% 98%)',

            ThemeVariable::SECONDARY->value => 'hsl(210 40% 96.1%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(222.2 47.4% 11.2%)',

            ThemeVariable::ACCENT->value => 'var(--secondary)',
            ThemeVariable::ACCENT_FOREGROUND->value => 'var(--secondary-foreground)',

            ThemeVariable::MUTED->value => 'var(--secondary)',
            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(215.4 16.3% 46.9%)',

            ThemeVariable::CARD->value => 'var(--background)',
            ThemeVariable::CARD_FOREGROUND->value => 'var(--foreground)',

            ThemeVariable::BORDER->value => 'hsl(214.3 31.8% 91.4%)',
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

            ThemeVariable::BACKGROUND->value => 'hsl(222.2 84% 4.9%)',
            ThemeVariable::FOREGROUND->value => 'hsl(210 40% 98%)',

            ThemeVariable::PRIMARY->value => 'hsl(217.2 91.2% 59.8%)',
            ThemeVariable::PRIMARY_FOREGROUND->value => 'hsl(222.2 47.4% 11.2%)',

            ThemeVariable::SECONDARY->value => 'hsl(217.2 32.6% 17.5%)',
            ThemeVariable::SECONDARY_FOREGROUND->value => 'hsl(210 40% 98%)',

            ThemeVariable::MUTED_FOREGROUND->value => 'hsl(215 20.2% 65.1%)',

            ThemeVariable::BORDER->value => 'hsl(217.2 32.6% 17.5%)',
            ThemeVariable::INPUT->value => 'var(--border)',
        ];
    }
}
