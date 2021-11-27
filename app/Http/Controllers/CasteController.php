<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use Illuminate\Http\Request;
use App\Http\Requests\CasteStoreRequest;
use App\Http\Requests\CasteUpdateRequest;

class CasteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Caste::class);

        $search = $request->get('search', '');

        $castes = Caste::search($search)
            ->latest()
            ->paginate(5);

        return view('app.castes.index', compact('castes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Caste::class);

        return view('app.castes.create');
    }

    /**
     * @param \App\Http\Requests\CasteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CasteStoreRequest $request)
    {
        $this->authorize('create', Caste::class);

        $validated = $request->validated();

        $caste = Caste::create($validated);

        return redirect()
            ->route('castes.edit', $caste)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caste $caste
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Caste $caste)
    {
        $this->authorize('view', $caste);

        return view('app.castes.show', compact('caste'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caste $caste
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Caste $caste)
    {
        $this->authorize('update', $caste);

        return view('app.castes.edit', compact('caste'));
    }

    /**
     * @param \App\Http\Requests\CasteUpdateRequest $request
     * @param \App\Models\Caste $caste
     * @return \Illuminate\Http\Response
     */
    public function update(CasteUpdateRequest $request, Caste $caste)
    {
        $this->authorize('update', $caste);

        $validated = $request->validated();

        $caste->update($validated);

        return redirect()
            ->route('castes.edit', $caste)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caste $caste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Caste $caste)
    {
        $this->authorize('delete', $caste);

        $caste->delete();

        return redirect()
            ->route('castes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
