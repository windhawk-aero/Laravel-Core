<?php

namespace YusufTogtay\Extensions;


use YusufTogtay\Base\Extensions\BaseEnumExtension;
use Exception;
use YusufTogtay\Constants\Enums\CommandType;

class CommandTypeExtension extends BaseEnumExtension
{
    public static function getValue(string $value): ?string
    {
        $type = strtolower($value);

        switch ($type) {
            case 'yusuftogtay:api':
                return CommandType::API;
            case 'yusuftogtay:api_scaffold':
                return CommandType::API_SCAFFOLD;
            case 'yusuftogtay:scaffold':
                return CommandType::SCAFFOLD;
            case 'yusuftogtay:vue':
                return CommandType::VUE;
            case 'yusuftogtay:vue_scaffold_api':
                return CommandType::VUE_SCAFFOLD_API;
            default:
                throw new Exception('ERROR: Unknown command type');
        }
    }
}
