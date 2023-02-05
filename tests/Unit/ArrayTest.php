<?php

use Strictus\Exceptions\StrictusTypeException;
use Strictus\Strictus;
use Strictus\Types\StrictusArray;

it('instantiates an array variable', function () {
    $myArray = Strictus::array([1, 2, 3]);
    expect($myArray)
        ->toBeInstanceOf(StrictusArray::class);
});

it('gets the correct array value', function () {
    $myArray = Strictus::array([1, 2, 3]);

    expect($myArray->value)
        ->toBe([1, 2, 3])
        ->and($myArray())
        ->toBe([1, 2, 3]);
});

it('sets the correct array value', function () {
    $myArray = Strictus::array([1, 2, 3]);

    expect($myArray->value)
        ->toBe([1, 2, 3])
        ->and($myArray())
        ->toBe([1, 2, 3]);

    $myArray->value = [4, 5, 6];
    expect($myArray)->toBe([4, 5, 6]);

    $myArray([7, 8, 9]);
    expect($myArray)->toBe([7, 8, 9]);
});

it('instantiates a nullable array variable with array method', function () {
    $myArray = Strictus::array(null, true);
    expect($myArray)
        ->toBeInstanceOf(StrictusArray::class);
});

it('instantiates a nullable array variable with nullableArray method', function () {
    $myArray = Strictus::nullableArray(null);
    expect($myArray)
        ->toBeInstanceOf(StrictusArray::class);
});

it('throws exception when trying to instantiate an array as nullable with array method', function () {
    expect(Strictus::array(null))->toThrow(StrictusTypeException::class);
});

it('throws exception when trying to instantiate an array with wrong type', function () {
    expect(Strictus::array('foo'))->toThrow(StrictusTypeException::class);
});