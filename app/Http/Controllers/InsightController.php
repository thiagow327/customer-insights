<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;
use App\Http\Requests\InsightRequest;
use App\Services\InsightService;

class InsightController extends Controller
{
    public function __construct(private InsightService $service) {}

    public function index(Request $request)
    {
        $insights = $this->service->all($request->only(['protocolo', 'cliente']));
        return view('insights.index', compact('insights'));
    }

    public function create()
    {
        return view('insights.create');
    }

    public function store(InsightRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('insights.index')->with('success', 'Insight criado com sucesso.');
    }

    public function show(Insight $insight)
    {
        return view('insights.show', compact('insight'));
    }

    public function edit(Insight $insight)
    {
        return view('insights.edit', compact('insight'));
    }

    public function update(InsightRequest $request, Insight $insight)
    {
        try {
            $this->service->update($insight, $request->validated());
            return redirect()->route('insights.index')->with('success', 'Insight atualizado com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(Insight $insight)
    {
        $this->service->delete($insight);
        return redirect()->route('insights.index')->with('success', 'Insight excluído com sucesso.');
    }
}