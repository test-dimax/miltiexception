<?php

use App\Exceptions\MultiException;

require __DIR__ . '/autoload.php';

$test1 = false;
$test2 = false;
$test3 = false;

$errors = new MultiException();

try {
    if ($test1 !== true) {
        $errors->add(new \Exception('Исключение 1!'));
    }
    if ($test2 !== true) {
        $errors->add(new \Exception('Исключение 2!'));
    }
    if ($test3 !== true) {
        $errors->add(new \Exception('Исключение 3!'));
    }
    if (!$errors->emptyExceptions()) {
        throw $errors;
    }
} catch (MultiException $ex) {
    $allEx = $ex->all();
    foreach ($allEx as $itemEx) {
        var_dump($itemEx->getMessage());
    }
}
