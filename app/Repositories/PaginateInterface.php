<?php 

namespace App\Repositories;


interface PaginateInterface {

    /**
     * @return stdClass[]
     */

    public function items(): array;
    public function tot(): int;
    public function isFirstPag(): bool;
    public function isLastPag(): bool;
    public function currentPag(): int;
    public function getNumNextPag(): int;
    public function getNumPrevPag(): int;
}