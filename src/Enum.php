<?php

namespace Salekur\Enum;

/**
 * Base class for Enumerations
 * 
 * @package Salekur\Enums
 * @method static array options() Get all options
 * @method static string get(string $key) Get option by key
 * @method static bool has(string $key) Check if option exists
 * @method static array keys() Get all keys
 * @method static array labels() Get all values
 */
class Enum {
    /**
     * Get all options in the enumeration
     * 
     * @return array All options in the enumeration
     */
    public static function options(): array {
        $options = [];
        $constants = (new \ReflectionClass(get_called_class()))->getConstants();
        $labels = method_exists(get_called_class(), 'values') ? get_called_class()::values() : [];

        foreach ($constants as $key) {
            // check if the value exists in the labels array
            if (array_key_exists($key, $labels)) {
                // set the value from the labels
                $options[$key] = $labels[$key];
            } else {
                // generate the value from the key
                $options[$key] = ucwords(str_replace(['-', '_'], ' ', $key));
            }
        }

        return $options;
    }

    /**
     * Get option by key
     * 
     * @param string $key Key of the option
     * @return string Option value
     */
    public static function get(string $key): string {
        return self::options()[$key];
    }

    /**
     * Check if option exists
     * 
     * @param string $key Key of the option
     * @return bool True if option exists, false otherwise
     */
    public static function has(string $key): bool {
        return array_key_exists($key, self::options());
    }

    /**
     * Get all keys in the enumeration
     * 
     * @return array All keys in the enumeration
     */
    public static function keys(): array {
        return array_keys(self::options());
    }

    /**
     * Get all labels in the enumeration
     * 
     * @return array All labels in the enumeration
     */
    public static function labels(): array {
        return array_values(self::options());
    }
    
}
