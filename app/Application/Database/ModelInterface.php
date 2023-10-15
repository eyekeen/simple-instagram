<?php

namespace App\Application\Database;

/**
 *
 * @author tarum2
 */
interface ModelInterface {

    public function find(string $column, string $value, bool $many = false): array|bool|Model;
    public function all(): array;

    public function store(): void;
    
    public function update(array $data): void;
}
