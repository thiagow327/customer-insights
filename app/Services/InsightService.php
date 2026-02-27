<?php

namespace App\Services;

use App\Models\Insight;
use App\Enums\StatusEnum;
use App\Repositories\InsightRepository;

class InsightService
{
    public function __construct(private InsightRepository $repository) {}

    public function create(array $data): Insight
    {
        return $this->repository->create($data);
    }

    public function update(Insight $insight, array $data): Insight
    {
        if (
            isset($data['status']) &&
            $data['status'] === StatusEnum::FECHADO->value &&
            $insight->status !== StatusEnum::EM_ANDAMENTO->value
        ) {
            throw new \Exception('O insight só pode ser fechado se estiver em andamento.');
        }

        return $this->repository->update($insight, $data);
    }

    public function delete(Insight $insight): void
    {
        $this->repository->delete($insight);
    }
}
