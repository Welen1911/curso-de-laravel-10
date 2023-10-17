<?php 

namespace App\Repositories;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginateInterface {

    /**
     * @var stdclass[]
     */

    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator
    )
    {
        $this->items = $this->resolveItems($this->paginator->items());
    }

    /**
     * @return stdClass[]
     */

    public function items(): array {
        return $this->paginator->items();
    }

    public function tot(): int {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPag(): bool {
        return $this->paginator->onFirstPage();
    }

    public function isLastPag(): bool {
        return $this->paginator->currentPage() == $this->paginator->lastPage() ?? false;
    }

    public function currentPag(): int {
        return $this->paginator->currentPage() ?? 1;
    }
    
    public function getNumNextPag(): int {
        return $this->paginator->currentPage() + 1;
    }
    
    public function getNumPrevPag(): int {
        return $this->paginator->currentPage() - 1;
    }

    private function resolveItems(array $items): array {
        $response = [];
        foreach($items as $item) {
            $stdclass = new stdClass();
            foreach($item->toArray() as $key => $value) {
                $stdclass->{$key} = $value;
            }
            array_push($response, $stdclass);
        }
        return $response;
    }
}