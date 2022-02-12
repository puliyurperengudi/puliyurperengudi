<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\Country;
use App\Models\Kootam;
use App\Models\Vagera;
use App\Models\TempleUser;
use Illuminate\Http\Request;
use App\Http\Requests\TempleUserStoreRequest;
use App\Http\Requests\TempleUserUpdateRequest;

class TempleUserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TempleUser::class);

        $search = $request->get('search', '');

        $templeUsers = TempleUser::search($search)
            ->latest()
            ->paginate(5);

        return view('app.temple_users.index', compact('templeUsers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TempleUser::class);

        $kootams = Kootam::pluck('name', 'id');
        $castes = Caste::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');

        return view(
            'app.temple_users.create',
            compact('kootams','castes', 'countries')
        );
    }

    /**
     * @param \App\Http\Requests\TempleUserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TempleUserStoreRequest $request)
    {
        $this->authorize('create', TempleUser::class);

        $validated = $request->validated();

        $templeUser = TempleUser::create($validated);

        return redirect()
            ->route('temple-users.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TempleUser $templeUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TempleUser $templeUser)
    {
        $this->authorize('view', $templeUser);

        return view('app.temple_users.show', compact('templeUser'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TempleUser $templeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TempleUser $templeUser)
    {
        $this->authorize('update', $templeUser);

        $kootams = Kootam::pluck('name', 'id');
        $vageras = Vagera::pluck('name', 'id');
        $castes = Caste::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');

        return view(
            'app.temple_users.edit',
            compact('templeUser', 'kootams', 'vageras', 'castes', 'countries')
        );
    }

    /**
     * @param \App\Http\Requests\TempleUserUpdateRequest $request
     * @param \App\Models\TempleUser $templeUser
     * @return \Illuminate\Http\Response
     */
    public function update(
        TempleUserUpdateRequest $request,
        TempleUser $templeUser
    ) {
        $this->authorize('update', $templeUser);

        $validated = $request->validated();

        $templeUser->update($validated);

        return redirect()
            ->route('temple-users.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TempleUser $templeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TempleUser $templeUser)
    {
        $this->authorize('delete', $templeUser);

        $templeUser->delete();

        return redirect()
            ->route('temple-users.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
