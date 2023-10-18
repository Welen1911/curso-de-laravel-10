<?php 


namespace App\Repositories;

use stdClass;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Models\Support;


interface SupportRepositoryInterface {
    
    public function paginate(int $pag = 1, int $totPerPag = 15, string $filter = null): PaginateInterface ;
    
    public function getAll(string $filter = null): array | null;

    public function findOne(string $id): stdClass | null;

    public function new(CreateSupportDTO $dto): Support;

    public function update(UpdateSupportDTO $dto): stdClass | null;

    public function delete(string $id): void;

}