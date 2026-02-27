<?php

namespace App\Services;

use App\Models\Insight;
use App\Enums\StatusEnum;
use App\Repositories\InsightRepository;
use Illuminate\Database\Eloquent\Collection;

class InsightService
{
    public function __construct(private InsightRepository $repository) {}

    public function all(array $filters = []): Collection
    {
        return $this->repository->all($filters);
    }

    public function create(array $data): Insight
    {
        return $this->repository->create($data);
    }

    public function update(Insight $insight, array $data): Insight
    {
        $statusMudando = isset($data['status']) && $insight->status->value !== $data['status'];

        if (
            $statusMudando &&
            $data['status'] === StatusEnum::RESOLVIDO->value &&
            $insight->status !== StatusEnum::EM_ANDAMENTO
        ) {
            throw new \Exception('O insight só pode ser resolvido se estiver em andamento.');
        }

        return $this->repository->update($insight, $data);
    }

    public function delete(Insight $insight): void
    {
        $this->repository->delete($insight);
    }
}
