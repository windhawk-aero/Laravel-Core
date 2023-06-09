<?php

namespace YusufTogtay\Base\Extensions;

use YusufTogtay\Interfaces\Extensions\EnumExtensionInterface;

abstract class BaseEnumExtension implements EnumExtensionInterface
{
    protected $enum;

    public static function getAllTypes($enum): array
    {
        $reflectionClass = new \ReflectionClass($enum);

        $constants = $reflectionClass->getConstants();
        return array_values($constants);
    }

    public function setEnum($enum)
    {
        $this->enum = $enum;
    }
}
