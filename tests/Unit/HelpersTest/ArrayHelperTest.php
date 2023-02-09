<?php

use Strictus\Exceptions\StrictusTypeException;
use Strictus\Types\StrictusArray;

it('can instantiate a strict array using the helper')
    ->expect(fn () => strictArray(['m1', 'm2']))
    ->toBeInstanceOf(StrictusArray::class);

it('throws exception when trying to instantiate a non nullable variable', function () {
    expect(fn () => strictArray(null))
        ->toThrow(StrictusTypeException::class);
});

it('throws exception when trying to assign null to a non nullable variable', function () {
    $array = strictArray([1, 2, 3, 4]);
    expect(fn () => $array->value = null)
        ->toThrow(StrictusTypeException::class);
});

it('can instantiate a nullable array using the helper')
    ->expect(fn () => strictNullableArray(null))
    ->toBeInstanceOf(StrictusArray::class);

it('can assign null to a nullable array', function () {
    $nullableArray = strictNullableArray([1, 2]);
    $nullableArray->value = null;
    expect($nullableArray)->toBeInstanceOf(StrictusArray::class);
});

it('returns values correctly', function () {
    $array = strictArray(['m1', 'm2']);

    expect($array->value)->toEqualCanonicalizing(['m1', 'm2'])
        ->and($array())->toEqualCanonicalizing(['m1', 'm2']);

    $array = strictNullableArray(['m1', 'm2']);

    expect($array->value)->toEqualCanonicalizing(['m1', 'm2'])
        ->and($array())->toEqualCanonicalizing(['m1', 'm2']);
});

it('updates values correctly', function () {
    $array = strictArray(['m1', 'm2']);
    $array->value = ['p1', 'p2'];

    expect($array->value)->toEqualCanonicalizing(['p1', 'p2'])
        ->and($array())->toEqualCanonicalizing(['p1', 'p2']);

    $array = strictNullableArray(['m1', 'm2']);
    $array->value = ['p1', 'p2'];

    expect($array->value)->toEqualCanonicalizing(['p1', 'p2'])
        ->and($array())->toEqualCanonicalizing(['p1', 'p2']);
});
