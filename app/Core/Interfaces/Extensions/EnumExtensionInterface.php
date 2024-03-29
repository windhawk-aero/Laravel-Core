<?php

namespace App\Core\Interfaces\Extensions;

interface EnumExtensionInterface
{
    public static function getValue(string $value): ?string;

    public static function getAllTypes($enum): array;
}
