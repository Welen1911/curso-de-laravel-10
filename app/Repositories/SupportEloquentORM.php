<?php

namespace App\Repositories;
use App\Repositories\SupportRepositoryInterface;
use stdClass;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Models\Support;

class SupportEloquentORM implements SupportRepositoryInterface {
    
    public function __construct(
        protected Support $model
    ) {}

    public function paginate(int $pag = 1, int $totPerPag = 15, string $filter = null): PaginateInterface {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->paginate($totPerPag, ['*'], 'page', $pag);
            return new PaginationPresenter($result);
    }


    public function getAll(string $filter = null): array | null {
        
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id): stdClass | null {
        $support = $this->model->find($id);
        if (!$support) {
            return null;
        }
        
        return (object) $support->toArray();
    }

    public function new(CreateSupportDTO $dto): void {
        // return (object) 
        $this->model->create(
           (array) $dto
        );
    }

    public function update(UpdateSupportDTO $dto): stdClass | null {
        if (!$support = $this->model->find($dto->id)) return null;

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function delete(string $id): void {
        $this->model->findOrFail($id)->delete();
    }
}