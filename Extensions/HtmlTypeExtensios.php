<?php

namespace YusufTogtay\Extensions;


use YusufTogtay\Base\Extensions\BaseEnumExtension;
use Exception;
use YusufTogtay\Constants\Enums\HtmlType;

    /**
     * Get the value of the given html type.
     *
     * @param  string  $value
     * @return string|null
     */
class HtmlTypeExtension extends BaseEnumExtension
{
    public static function getValue(string $value): ?string
    {
        $type = strtolower($value);

        switch ($type) {
            case 'text':
                return HtmlType::TEXT;
            case 'email':
                return HtmlType::EMAIL;
            case 'number':
                return HtmlType::NUMBER;
            case 'file':
                return HtmlType::FILE;
            case 'image':
                return HtmlType::IMAGE;
            case 'password':
                return HtmlType::PASSWORD;
            case 'select':
                return HtmlType::SELECT;
            case 'radio':
                return HtmlType::RADIO;
            case 'checkbox':
                return HtmlType::CHECKBOX;
            case 'textarea':
                return HtmlType::TEXTAREA;
            case 'toggle-switch':
                return HtmlType::TOGGLE_SWITCH;
            default:
                throw new Exception('ERROR: Unknown html type');
        }
    }
}
