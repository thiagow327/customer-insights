<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;
use App\Services\InsightService;

class InsightController extends Controller
{
    public function __construct(private InsightService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->service->all($request->only(['protocolo', 'cliente']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Insight $insight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insight $insight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insight $insight)
    {
        return $this->service->update($insight, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insight $insight)
    {
        return $this->service->delete($insight);
    }
}
