<?php

/*
 * This file is part of the Video Publisher plugin.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VideoPublisher;

interface TableInterface
{
    public function db();
    public function create(): void;
    public function find($uniqid, string $column): ?object;
}
