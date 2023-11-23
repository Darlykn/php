<?php
namespace App\HTML;
use Tightenco\Collect;

function stringify(array $tag): ?string {
    switch ($tag['tagType']) {
        case 'single':
            return '<' . tagPart($tag) . '>';
        case 'pair':
            return '<' . tagPart($tag) . '>' . $tag['body'] . '</' . $tag['name'] . '>';
        default:
            return null;
    }
}

function tagPart(array $tag): string {
    $exceptedTags = [
        'single' => ['name', 'tagType'],
        'pair' => ['name', 'tagType', 'body']
    ];

    return trim($tag['name'] . ' ' . collect($tag)
                ->except($exceptedTags[$tag['tagType']])
                ->implode(fn ($value, $key) => $key . '=' . '"' . $value . '"', ' '));
}
