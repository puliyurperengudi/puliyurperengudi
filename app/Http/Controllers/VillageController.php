<?php

namespace App\Http\Controllers;

use App\Http\Requests\VillageStoreRequest;
use App\Http\Requests\VillageUpdateRequest;
use App\Models\Country;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VillageController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Village::class);

        $search = $request->get('search', '');

        $villages = Village::with('city')->search($search)
            ->latest()
            ->paginate(5);

        return view('app.villages.index', compact('villages', 'search'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Village::class);

        $countries = Country::pluck('name', 'id');

        return view('app.villages.create', compact('countries'));
    }

    /**
     * @param VillageStoreRequest $request
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(VillageStoreRequest $request)
    {
        $this->authorize('create', Village::class);

        $validated = $request->validated();

        Village::create($validated);

        return redirect()
            ->route('villages.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param Request $request
     * @param Village $village
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Request $request, Village $village)
    {
        $this->authorize('view', $village);

        return view('app.villages.show', compact('village'));
    }

    /**
     * @param Request $request
     * @param Village $village
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, Village $village)
    {
        $this->authorize('update', $village);

        $countries = Country::pluck('name', 'id');

        return view('app.villages.edit', compact('village', 'countries'));
    }

    /**
     * @param VillageUpdateRequest $request
     * @param Village $village
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(VillageUpdateRequest $request, Village $village)
    {
        $this->authorize('update', $village);

        $validated = $request->validated();

        $village->update($validated);

        return redirect()
            ->route('villages.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param Request $request
     * @param Village $village
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, Village $village)
    {
        $this->authorize('delete', $village);

        $village->delete();

        return redirect()
            ->route('villages.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
