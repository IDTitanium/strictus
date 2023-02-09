<?php

use Strictus\Exceptions\StrictusTypeException;
use Strictus\Types\StrictusBoolean;

it('can instantiate a strict boolean using the helper')
    ->expect(fn () => strictBool(true))
    ->toBeInstanceOf(StrictusBoolean::class);

it('throws exception when trying to instantiate a non nullable variable', function () {
    expect(fn () => strictBool(null))
        ->toThrow(StrictusTypeException::class);
});

it('throws exception when trying to assign null to a non nullable variable', function () {
    $bool = strictBool(false);
    expect(fn () => $bool->value = null)
        ->toThrow(StrictusTypeException::class);
});

it('can instantiate a nullable array using the helper')
    ->expect(fn () => strictNullableBool(null))
    ->toBeInstanceOf(StrictusBoolean::class);

it('can assign null to a nullable array', function () {
    $nullableBool = strictNullableBool(false);
    $nullableBool->value = null;
    expect($nullableBool)->toBeInstanceOf(StrictusBoolean::class);
});

it('returns values correctly', function () {
    $bool = strictBool(false);

    expect($bool->value)->toEqualCanonicalizing(false)
        ->and($bool())->toEqualCanonicalizing(false);

    $bool = strictNullableBool(true);

    expect($bool->value)->toEqualCanonicalizing(true)
        ->and($bool())->toEqualCanonicalizing(true);
});

it('updates values correctly', function () {
    $bool = strictBool(false);
    $bool->value = true;

    expect($bool->value)->toEqualCanonicalizing(true)
        ->and($bool())->toEqualCanonicalizing(true);

    $bool = strictNullableBool(false);
    $bool->value = null;

    expect($bool->value)->toEqualCanonicalizing(null)
        ->and($bool())->toEqualCanonicalizing(null);
});
