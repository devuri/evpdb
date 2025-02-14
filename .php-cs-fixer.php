<?php

$sourceCodeHeader = <<<'EOF'
This file is part of the Video Publisher plugin.

(c) Uriel Wilson

The full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = Symfony\Component\Finder\Finder::create()
    ->exclude([
        'assets',
        'public',
        'bin',
        'build',
        'docs',
        'node_modules',
        'tmp',
        'vendor',
        'wordpress',
        'wp',
    ])
    ->notPath('tests/stubs.php')
    ->notPath('video-publisher.php')
    ->in(__DIR__)
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'yoda_style' => false,
		'protected_to_private' => false,
		'header_comment' => ['header' => $sourceCodeHeader]
    ])
    ->setLineEnding("\n")
    ->setIndent(str_repeat(' ', 4)) // Use 4 spaces for indentation
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setFinder($finder);
