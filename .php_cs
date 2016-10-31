<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude([
        __DIR__ . '/app/cache/',
        __DIR__ . '/app/logs/',
    ])
    ->in([
        
        __DIR__ . '/.',
    ]);

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->finder($finder)
    ->fixers([
        'align_double_arrow',
        'align_equals',
        'concat_with_spaces',
        'multiline_spaces_before_semicolon',
        'ordered_use',
        'short_array_syntax',
    ]);
