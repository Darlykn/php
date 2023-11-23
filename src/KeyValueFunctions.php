<?php

namespace App\KeyValueFunctions;
function swapKeyValue($databaseObject): void {
    $databaseObjectAsArray = array_flip($databaseObject->toArray());

    foreach ($databaseObjectAsArray as $key => $value) {
        $databaseObject->set($key, $value);

        if ($databaseObject->get($value) == $key) {
            $databaseObject->unset($value);
        }
    }
}