<?php

$dirs = [
    __DIR__ . '/../../spec',
    __DIR__ . '/../../src',
    __DIR__ . '/../../tests',
];

$finder = PhpCsFixer\Finder::create()
    ->in($dirs);

return PhpCsFixer\Config::create()
    ->setRules(
        [
            '@Symfony'                              => true,
            '@PSR1'                                 => true,
            '@PSR2'                                 => true,
            '@PHP71Migration'                       => true,
            '@PHP73Migration'                       => true,
            'concat_space'                          => ['spacing' => 'one'],
            'array_syntax'                          => ['syntax' => 'short'],
            'binary_operator_spaces'                => [
                'default' => 'align_single_space_minimal',
            ],
            'combine_consecutive_unsets'            => true,
            'declare_strict_types'                  => true,
            'ordered_class_elements'                => true,
            'ordered_imports'                       => true,
            'yoda_style'                            => true,
            'modernize_types_casting'               => true,
            'no_multiline_whitespace_before_semicolons' => true,
            'native_function_invocation'            => true,
            'no_superfluous_phpdoc_tags'            => true,
            'no_superfluous_elseif'                 => true,
            'no_unreachable_default_argument_value' => true,
            'no_useless_else'                       => true,
            'no_useless_return'                     => true,
            'random_api_migration'                  => true,
            'mb_str_functions'                      => true,
            // Doctrine
            'doctrine_annotation_braces'            => true,
            'doctrine_annotation_indentation'       => true,
            'doctrine_annotation_spaces'            => true,
        ]
    )
    ->setFinder($finder)
    ->setUsingCache(true);
