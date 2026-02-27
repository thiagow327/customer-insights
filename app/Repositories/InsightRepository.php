<?php

namespace App\Repositories;

use App\Models\Insight;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class InsightRepository
{
    public function all(array $filters = []): Collection
    {
        $query = Insight::query();

        if (!empty($filters['protocolo'])) {
            $query->where('protocolo', $filters['protocolo']);
        }

        if (!empty($filters['cliente'])) {
            $query->where('cliente', 'like', '%' . $filters['cliente'] . '%');
        }

        return $query->get();
    }

    public function create(array $data): Insight
    {
        $data['protocolo'] = $this->generateProtocolo();

        return Insight::create($data);
    }

    public function update(Insight $insight, array $data): Insight
    {
        $insight->update($data);

        return $insight;
    }

    public function delete(Insight $insight): void
    {
        $insight->delete();
    }

    private function generateProtocolo(): string
    {
        do {
            $protocolo = 'INS-' . strtoupper(Str::random(8));
        } while (Insight::where('protocolo', $protocolo)->exists());

        return $protocolo;
    }
}