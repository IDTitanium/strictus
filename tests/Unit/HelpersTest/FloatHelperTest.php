<?php

use Strictus\Exceptions\StrictusTypeException;
use Strictus\Types\StrictusFloat;

it('can instantiate a strict float using the helper')
    ->expect(fn () => strictFloat(10.5))
    ->toBeInstanceOf(StrictusFloat::class);

it('throws exception when trying to instantiate a non nullable variable', function () {
    expect(fn () => strictFloat(null))
        ->toThrow(StrictusTypeException::class);
});

it('throws exception when trying to assign null to a non nullable variable', function () {
    $float = strictFloat(1.2);
    expect(fn () => $float->value = null)
        ->toThrow(StrictusTypeException::class);
});

it('can instantiate a nullable array using the helper')
    ->expect(fn () => strictNullableFloat(null))
    ->toBeInstanceOf(StrictusFloat::class);

it('can assign null to a nullable array', function () {
    $nullableFloat = strictNullableFloat(1.2);
    $nullableFloat->value = null;
    expect($nullableFloat)->toBeInstanceOf(StrictusFloat::class);
});

it('returns values correctly', function () {
    $float = strictFloat(10.5);

    expect($float->value)->toEqualCanonicalizing(10.5)
        ->and($float())->toEqualCanonicalizing(10.5);

    $float = strictNullableFloat(1.2);

    expect($float->value)->toEqualCanonicalizing(1.2)
        ->and($float())->toEqualCanonicalizing(1.2);
});

it('updates values correctly', function () {
    $float = strictFloat(1.2);
    $float->value = 10.2;

    expect($float->value)->toEqualCanonicalizing(10.2)
        ->and($float())->toEqualCanonicalizing(10.2);

    $float = strictNullableArray(['m1', 'm2']);
    $float->value = ['p1', 'p2'];

    expect($float->value)->toEqualCanonicalizing(['p1', 'p2'])
        ->and($float())->toEqualCanonicalizing(['p1', 'p2']);
});
