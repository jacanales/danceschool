<?php

$dirs = [
    __DIR__ . '/spec',
    __DIR__ . '/src',
    __DIR__ . '/tests',
];

$finder = PhpCsFixer\Finder::create()
    ->in($dirs)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'binary_operator_spaces' => [
            'align_double_arrow' => true,
            'align_equals' => true,
        ],
        'ordered_imports' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(true)
;
