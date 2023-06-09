<?php

namespace YusufTogtay\Constants\Enums;

abstract class RuleType
{
    const ACCEPTED = 'accepted';
    const ACCEPTED_IF = 'accepted_if';
    const ACTIVE_URL = 'active_url';
    const AFTER = 'after';
    const AFTER_OR_EQUAL = 'after_or_equal';
    const ALPHA = 'alpha';
    const ALPHA_DASH = 'alpha_dash';
    const ALPHA_NUM = 'alpha_num';
    const ARRAY = 'array';
    const ASCII = 'ascii';
    const BAIL = 'bail';
    const BEFORE = 'date_before';
    const BEFORE_OR_EQUAL = 'date_before_equal';
    const BETWEEN = 'between';
    const BOOLEAN = 'boolean';
    const CONFIRMED = 'confirmed';
    const CURRENT_PASSWORD = 'current_password';
    const DATE = 'date';
    const DATE_EQUALS = 'date_equals';
    const DATE_FORMAT = 'date_format';
    const DECIMAL = 'decimal';
    const DECLINED = 'declined';
    const DECLINED_IF = 'declined_if';
    const DIFFERENT = 'different';
    const DIGITS = 'digits';
    const DIGITS_BETWEEN = 'digits_between';
    const DIMENSIONS = 'dimension';
    const DISTINCT = 'distinct';
    const DOSENT_START_WITH = 'dosent_start_with';
    const DOSENT_END_WITH = 'dosent_end_with';
    const EMAIL = 'email';
    const ENDS_WITH = 'ends_with';
    const ENUM = 'enum';
    const EXCLUDE = 'exclude';
    const EXCLUDE_IF = 'exclude_if';
    const EXCLUDE_UNLESS = 'exclude_unless';
    const EXCLUDE_WITH = 'exclude_with';
    const EXCLUDE_WITHOUT = 'exclude_without';
    const EXISTS = 'exists';
    const FILE = 'file';
    const FILLED = 'filled';
    const GT = 'gt';
    const GTE = 'gte';
    const IMAGE = 'image';
    const IN = 'in';
    const IN_ARRAY = 'in_array';
    const INTEGER = 'integer';
    const IP = 'ip';
    const IPV4 = 'ipv4';
    const IPV6 = 'ipv6';
    const JSON = 'json';
    const LT = 'lt';
    const LTE = 'lt';
    const LOWER_CASE = 'lower_case';
    const MAC_ADDRESS = 'mac_address';
    const MAX = 'max';
    const MAX_DIGITS = 'max_digits';
    const MIME_TYPES = 'mime_types';
    const MIMES = 'mimes';
    const MIN = 'min';
    const MIN_DIGITS = 'min_digits';
    const MULTIPLE_OF = 'multiple_of';
    const MISSING = 'missing';
    const MISSING_IF = 'missing_if';
    const MISSING_UNLESS = 'missing_unless';
    const MISSING_WITH =  'missing_with';
    const MISSING_WITH_ALL = 'missing_with_all';
    const NOT_IN = 'not_in';
    const NOT_REGEX = 'not_regex';
    const NULLABLE = 'nullable';
    const NUMERIC = 'numeric';
    const PASSWORD = 'password';
    const PRESENT = 'present';
    const PROHIBITED = 'prohibited';
    const PROHIBITED_IF = 'prohibited_if';
    const PROHIBITED_UNLESS = 'prohibited_unless';
    const PROHIBITS = 'prohibits';
    const REGEX = 'regex';
    const REQUIRED = 'required';
    const REQUIRED_IF = 'required_if';
    const REQUIRED_UNLESS = 'required_unless';
    const REQUIRED_WITH = 'required_with';
    const REQUIRED_WITH_ALL = 'required_with_all';
    const REQUIRED_WITHOUT = 'required_without';
    const REQUIRED_WITHOUT_ALL = 'required_without_all';
    const REQUIRED_ARRAY_KEYS = 'required_array_keys';
    const SAME = 'same';
    const SIZE = 'size';
    const STARTS_WITH = 'starts_with';
    const STRING = 'string';
    const TIMEZONE = 'time_zone';
    const UNIQUE = 'unique';
    const UPPERCASE = 'uppercase';
    const URL = 'url';
    const ULID = 'ulid';
    const UUID = 'uuid';
}
