<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\Kootam;
use Illuminate\Http\Request;
use App\Http\Requests\KootamStoreRequest;
use App\Http\Requests\KootamUpdateRequest;

class KootamController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Kootam::class);

        $search = $request->get('search', '');

        $kootams = Kootam::search($search)
            ->latest()
            ->paginate(5);

        return view('app.kootams.index', compact('kootams', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Kootam::class);

        $castes = Caste::pluck('name', 'id');

        return view('app.kootams.create', compact('castes'));
    }

    /**
     * @param \App\Http\Requests\KootamStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(KootamStoreRequest $request)
    {
        $this->authorize('create', Kootam::class);

        $validated = $request->validated();

        $kootam = Kootam::create($validated);

        return redirect()
            ->route('kootams.edit', $kootam)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kootam $kootam
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Kootam $kootam)
    {
        $this->authorize('view', $kootam);

        return view('app.kootams.show', compact('kootam'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kootam $kootam
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kootam $kootam)
    {
        $this->authorize('update', $kootam);

        $castes = Caste::pluck('name', 'id');

        return view('app.kootams.edit', compact('kootam', 'castes'));
    }

    /**
     * @param \App\Http\Requests\KootamUpdateRequest $request
     * @param \App\Models\Kootam $kootam
     * @return \Illuminate\Http\Response
     */
    public function update(KootamUpdateRequest $request, Kootam $kootam)
    {
        $this->authorize('update', $kootam);

        $validated = $request->validated();

        $kootam->update($validated);

        return redirect()
            ->route('kootams.edit', $kootam)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kootam $kootam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Kootam $kootam)
    {
        $this->authorize('delete', $kootam);

        $kootam->delete();

        return redirect()
            ->route('kootams.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
