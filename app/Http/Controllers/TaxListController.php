<?php

namespace App\Http\Controllers;

use App\Models\TaxList;
use Illuminate\Http\Request;
use App\Http\Requests\TaxListStoreRequest;
use App\Http\Requests\TaxListUpdateRequest;

class TaxListController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TaxList::class);

        $search = $request->get('search', '');

        $taxLists = TaxList::search($search)
            ->latest()
            ->paginate(5);

        return view('app.tax_lists.index', compact('taxLists', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TaxList::class);

        return view('app.tax_lists.create');
    }

    /**
     * @param \App\Http\Requests\TaxListStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxListStoreRequest $request)
    {
        $this->authorize('create', TaxList::class);

        $validated = $request->validated();

        $taxList = TaxList::create($validated);

        return redirect()
            ->route('tax-lists.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxList $taxList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TaxList $taxList)
    {
        $this->authorize('view', $taxList);

        return view('app.tax_lists.show', compact('taxList'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxList $taxList
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TaxList $taxList)
    {
        $this->authorize('update', $taxList);

        return view('app.tax_lists.edit', compact('taxList'));
    }

    /**
     * @param \App\Http\Requests\TaxListUpdateRequest $request
     * @param \App\Models\TaxList $taxList
     * @return \Illuminate\Http\Response
     */
    public function update(TaxListUpdateRequest $request, TaxList $taxList)
    {
        $this->authorize('update', $taxList);

        $validated = $request->validated();

        $taxList->update($validated);

        return redirect()
            ->route('tax-lists.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxList $taxList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TaxList $taxList)
    {
        $this->authorize('delete', $taxList);

        $taxList->delete();

        return redirect()
            ->route('tax-lists.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
