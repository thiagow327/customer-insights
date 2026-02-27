<?php

namespace App\Services;

use App\Models\Insight;
use App\Enums\StatusEnum;

class InsightService
{
    public function create(array $data): Insight
    {
        return Insight::create($data);
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

        $insight->update($data);

        return $insight;
    }

    public function delete(Insight $insight): void
    {
        $insight->delete();
    }
}
