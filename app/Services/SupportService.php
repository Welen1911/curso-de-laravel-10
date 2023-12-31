<?php 
namespace App\Services;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use App\Repositories\PaginateInterface;
use App\Models\Support;

use stdClass;

class SupportService {

    public function __construct(
        protected SupportRepositoryInterface $repository
    ) {}

    public function paginate(int $pag = 1, int $totPerPag = 15, string $filter = null): PaginateInterface {
        return $this->repository->paginate($pag, $totPerPag, $filter);
     }

    public function getAll(string $filter = null): array | null {
       return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass | null {
        return $this->repository->findOne($id);
    }

    public function new(
        CreateSupportDTO $dto
    ): Support {
        return $this->repository->new($dto);
    }

    public function update(
        UpdateSupportDTO $dto
    ): stdClass | null {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void {
        $this->repository->delete($id);
    }
}

