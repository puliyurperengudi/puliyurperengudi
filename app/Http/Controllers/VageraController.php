<?php

namespace App\Http\Controllers;

use App\Models\Vagera;
use App\Models\Kootam;
use Illuminate\Http\Request;
use App\Http\Requests\VageraStoreRequest;
use App\Http\Requests\VageraUpdateRequest;

class VageraController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Vagera::class);

        $search = $request->get('search', '');

        $vageras = Vagera::search($search)
            ->latest()
            ->paginate(5);

        return view('app.vageras.index', compact('vageras', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Vagera::class);

        $kootams = Kootam::pluck('name', 'id');

        return view('app.vageras.create', compact('kootams'));
    }

    /**
     * @param \App\Http\Requests\VageraStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VageraStoreRequest $request)
    {
        $this->authorize('create', Vagera::class);

        $validated = $request->validated();

        $vagera = Vagera::create($validated);

        return redirect()
            ->route('vageras.edit', $vagera)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vagera $vagera
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Vagera $vagera)
    {
        $this->authorize('view', $vagera);

        return view('app.vageras.show', compact('vagera'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vagera $vagera
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Vagera $vagera)
    {
        $this->authorize('update', $vagera);

        $kootams = Kootam::pluck('name', 'id');

        return view('app.vageras.edit', compact('vagera', 'kootams'));
    }

    /**
     * @param \App\Http\Requests\VageraUpdateRequest $request
     * @param \App\Models\Vagera $vagera
     * @return \Illuminate\Http\Response
     */
    public function update(VageraUpdateRequest $request, Vagera $vagera)
    {
        $this->authorize('update', $vagera);

        $validated = $request->validated();

        $vagera->update($validated);

        return redirect()
            ->route('vageras.edit', $vagera)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vagera $vagera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vagera $vagera)
    {
        $this->authorize('delete', $vagera);

        $vagera->delete();

        return redirect()
            ->route('vageras.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
