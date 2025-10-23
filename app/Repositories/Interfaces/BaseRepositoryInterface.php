<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BasetRepositoryInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
        public function all();
        public function findById(int $id);
        public function update(int $id = 0, array $payload = []);
        public function delete(int $id = 0);
        public function pagination(
                array $column = ['*'],
                array $condition = [],
                array $join = [],
                array $extend = [],
                int $perpage = 1,
                 array $relation = []
        );
        public function updateByWhereIn( string $whereInField = '', array $WhereIn = [],  array $payload = []);
}
