<?php

namespace YusufTogtay\Extensions;

use Exception;
use YusufTogtay\Constants\Enums\HtmlType;
use YusufTogtay\Constants\Enums\DataBaseType;
use YusufTogtay\Base\Extensions\BaseEnumExtension;

class DataBaseTypeExtension extends BaseEnumExtension
{

    /**
     * Get the value of the given data base type.
     *
     * @param  string  $value
     * @return string|null
     */
    public static function getValue(string $value): ?string
    {
        $type = strtolower($value);

        switch ($type) {
            case 'increment':
                return DataBaseType::INCREMENT;
            case 'integer':
                return DataBaseType::INTEGER;
            case 'small_integer':
                return DataBaseType::SMALL_INTEGER;
            case 'big_integer':
                return DataBaseType::BIG_INTEGER;
            case 'decimal':
                return DataBaseType::DECIMAL;
            case 'boolean':
                return DataBaseType::BOOLEAN;
            case 'double':
                return DataBaseType::DOUBLE;
            case 'float':
                return DataBaseType::FLOAT;
            case 'string':
                return DataBaseType::STRING;
            case 'CHAR':
                return DataBaseType::CHAR;
            case 'text':
                return DataBaseType::TEXT;
            case 'medium_text':
                return DataBaseType::MEDIUM_TEXT;
            case 'long_text':
                return DataBaseType::LONG_TEXT;
            case 'enum':
                return DataBaseType::ENUM;
            case 'binary':
                return DataBaseType::BINARY;
            case 'date_time':
                return DataBaseType::DATE_TIME;
            case 'date':
                return DataBaseType::DATE;
            case 'timestamp':
                return DataBaseType::TIMESTAMP;
            default:
                throw new Exception('Error: Unknown database type');
        }
    }

    /**
     * Get the compatible HTML input types for the given database type.
     *
     * @param string $databaseType The database type.
     * @return array The array of compatible HTML input types.
     */
    public static function getCompatibleHtmlTypes(string $databaseType): array
    {
        switch ($databaseType) {
            case DataBaseType::INCREMENT:
            case DataBaseType::INTEGER:
            case DataBaseType::SMALL_INTEGER:
            case DataBaseType::BIG_INTEGER:
                return [
                    HtmlType::NUMBER,
                    HtmlType::SELECT,
                ];
            case DataBaseType::DOUBLE:
            case DataBaseType::FLOAT:
            case DataBaseType::DECIMAL:
                return [
                    HtmlType::DOUBLE,
                    HtmlType::SELECT,
                ];
            case DataBaseType::BOOLEAN:
                return [
                    HtmlType::CHECKBOX,
                    HtmlType::TOGGLE_SWITCH,
                ];
            case DataBaseType::STRING:
            case DataBaseType::CHAR:
            case DataBaseType::TEXT:
            case DataBaseType::MEDIUM_TEXT:
            case DataBaseType::LONG_TEXT:
                return [
                    HtmlType::TEXT,
                    HtmlType::TEXTAREA,
                    HtmlType::SELECT,
                ];
            case DataBaseType::ENUM:
                return [
                    HtmlType::SELECT,
                ];
            case DataBaseType::BINARY:
                return [
                    HtmlType::FILE,
                ];
            case DataBaseType::DATE_TIME:
            case DataBaseType::DATE:
            case DataBaseType::TIMESTAMP:
                return [
                    HtmlType::TEXT,
                    HtmlType::DATE,
                ];
            case DataBaseType::JSON:
                return [
                    HtmlType::TEXTAREA,
                ];
            default:
                return [];
        }
    }
}
