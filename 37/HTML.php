<?php

namespace App\HTML;

use Tightenco\Collect;

function getLinks(array $tags): array {
    $mapping = [
        'a' =>
            fn ($tag) => $tag['href'],
        'link' =>
            fn ($tag) => $tag['href'],
        'img' =>
            fn ($tag) => $tag['src'],
    ];

    return collect($tags)
        ->filter(fn ($tag) => in_array($tag['name'], array_keys($mapping)))
        ->map(fn ($tag) => $mapping[$tag['name']]($tag))
        ->values()
        ->all();
}