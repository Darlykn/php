<?php
namespace App\LinkedList;

use App\Node;
function reverse($node)
{
    $reversedList = new Node($node->getValue());
    $current = $node -> getNext();

    while ($current) {
        $reversedList = new Node($current->getValue(), $reversedList);
        $current = $current->getNext();
    }
    return $reversedList;
}