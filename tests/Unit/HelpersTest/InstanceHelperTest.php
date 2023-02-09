<?php

use Strictus\Exceptions\StrictusTypeException;
use Strictus\Types\StrictusInstance;

it('can instantiate a strictus variable using the helper')
    ->expect(fn () => strictus(MyTestClass::class, new MyTestClass()))
    ->toBeInstanceOf(StrictusInstance::class);

it('instantiates a nullable variable')
    ->expect(fn () => nullableStrictus(MyTestClass::class, null))
    ->toBeInstanceOf(StrictusInstance::class);

it('throws exception when trying to instantiate non-nullable variable with null')
    ->expect(fn () => strictus(MyTestClass::class, null))
    ->toThrow(StrictusTypeException::class);

it('returns the value correctly', function () {
    $value = strictus(MyTestClass::class, new MyTestClass());

    expect($value->value)
        ->toBeInstanceOf(MyTestClass::class)
        ->and($value())
        ->toBeInstanceOf(MyTestClass::class);
});

it('updates the value correctly', function () {
    $value = strictus(MyTestClass::class, new MyTestClass());

    expect($value->value)
        ->toBeInstanceOf(MyTestClass::class)
        ->and($value())
        ->toBeInstanceOf(MyTestClass::class);

    $value->value = new MyTestClass();
    expect($value->value)
        ->toBeInstanceOf(MyTestClass::class);

    $value(new MyTestClass());
    expect($value())
        ->toBeInstanceOf(MyTestClass::class);
});

class MyTestClass
{
}
