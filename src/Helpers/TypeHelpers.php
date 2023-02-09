<?php

declare(strict_types=1);

use Strictus\Types\StrictusArray;
use Strictus\Types\StrictusBoolean;
use Strictus\Types\StrictusFloat;
use Strictus\Types\StrictusInstance;
use Strictus\Types\StrictusInteger;
use Strictus\Types\StrictusObject;
use Strictus\Types\StrictusString;

if (! function_exists('strictInt')) {
    /**
     * @param  mixed  $integer
     * @param  bool  $nullable
     * @return StrictusInteger
     */
    function strictInt(mixed $integer, bool $nullable = false): StrictusInteger
    {
        return new StrictusInteger($integer, $nullable);
    }
}

if (! function_exists('strictNullableInt')) {
    /**
     * @param  mixed  $integer
     * @return StrictusInteger
     */
    function strictNullableInt(mixed $integer): StrictusInteger
    {
        return new StrictusInteger($integer, true);
    }
}

if (! function_exists('strictString')) {
    /**
     * @param  mixed  $integer
     * @param  bool  $nullable
     * @return StrictusString
     */
    function strictString(mixed $string, bool $nullable = false): StrictusString
    {
        return new StrictusString($string, $nullable);
    }
}

if (! function_exists('strictNullableString')) {
    /**
     * @param  mixed  $string
     * @return StrictusString
     */
    function strictNullableString(mixed $string): StrictusString
    {
        return new StrictusString($string, true);
    }
}

if (! function_exists('strictFloat')) {
    /**
     * @param  mixed  $float
     * @param  mixed  $nullable
     * @return StrictusFloat
     */
    function strictFloat(mixed $float, bool $nullable = false): StrictusFloat
    {
        return new StrictusFloat($float, $nullable);
    }
}

if (! function_exists('strictNullableFloat')) {
    /**
     * @param  mixed  $float
     * @return StrictusFloat
     */
    function strictNullableFloat(mixed $float): StrictusFloat
    {
        return new StrictusFloat($float, true);
    }
}

if (! function_exists('strictBool')) {
    /**
     * @param  mixed  $bool
     * @param  mixed  $nullable
     * @return StrictusBoolean
     */
    function strictBool(mixed $bool, bool $nullable = false): StrictusBoolean
    {
        return new StrictusBoolean($bool, $nullable);
    }
}

if (! function_exists('strictNullableBool')) {
    /**
     * @param  mixed  $bool
     * @return StrictusBoolean
     */
    function strictNullableBool(mixed $bool): StrictusBoolean
    {
        return new StrictusBoolean($bool, true);
    }
}

if (! function_exists('strictArray')) {
    /**
     * @param  mixed  $array
     * @param  mixed  $nullable
     * @return StrictusArray
     */
    function strictArray(mixed $array, bool $nullable = false): StrictusArray
    {
        return new StrictusArray($array, $nullable);
    }
}

if (! function_exists('strictNullableArray')) {
    /**
     * @param  mixed  $array
     * @return StrictusArray
     */
    function strictNullableArray(mixed $array): StrictusArray
    {
        return new StrictusArray($array, true);
    }
}

if (! function_exists('strictObject')) {
    /**
     * @param  mixed  $object
     * @param  mixed  $nullable
     * @return StrictusObject
     */
    function strictObject(mixed $object, bool $nullable = false): StrictusObject
    {
        return new StrictusObject($object, $nullable);
    }
}

if (! function_exists('strictNullableObject')) {
    /**
     * @param  mixed  $object
     * @return StrictusObject
     */
    function strictNullableObject(mixed $object)
    {
        return new StrictusObject($object, true);
    }
}

if (! function_exists('strictus')) {
    /**
     * @param  string  $instanceType
     * @param  mixed  $instance
     * @param  bool  $nullable
     * @return StrictusInstance
     */
    function strictus(string $instanceType, mixed $instance, bool $nullable = false): StrictusInstance
    {
        return new StrictusInstance($instanceType, $instance, $nullable);
    }
}

if (! function_exists('nullableStrictus')) {
    /**
     * @param  string  $instanceType
     * @param  mixed  $instance
     * @return StrictusInstance
     */
    function nullableStrictus(string $instanceType, mixed $instance): StrictusInstance
    {
        return new StrictusInstance($instanceType, $instance, true);
    }
}
