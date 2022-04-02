<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\Country;
use App\Models\Kootam;
use App\Models\TempleUser;
use App\Models\Vagera;
use App\Models\TaxList;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Requests\DonationStoreRequest;
use App\Http\Requests\DonationUpdateRequest;

class DonationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Donation::class);

        $search = $request->get('search', '');

        $donations = Donation::with('taxList', 'templeUser')->search($search)
            ->latest()
            ->paginate(5);

        return view('app.donations.index', compact('donations', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Donation::class);

        $taxLists = TaxList::pluck('name', 'id');
        $kootams = Kootam::pluck('name', 'id');
        $castes = Caste::pluck('name', 'id');
        $templeUsers = TempleUser::all();
        $countries = Country::pluck('name', 'id');

        return view(
            'app.donations.create',
            compact('taxLists', 'kootams', 'castes', 'templeUsers', 'countries')
        );
    }

    /**
     * @param \App\Http\Requests\DonationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationStoreRequest $request)
    {
        $this->authorize('create', Donation::class);

        $validated = $request->validated();

        if ($request->get('user_type') == 'new-user') {
            $templeUser = TempleUser::create([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'address' => $request->address,
                'mobile_number' => $request->mobile_number,
                'kootam_id' => $request->kootam_id,
                'caste_id' => $request->caste_id,
                'vagera' => $request->vagera ?? null,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'village_id' => $request->village_id,
            ]);
            $validated['temple_user_id'] = $templeUser->id;
        }
        $donation = Donation::create($validated);

        return redirect()
            ->route('donations.index', $donation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Donation $donation)
    {
        $this->authorize('view', $donation);

        return view('app.donations.show', compact('donation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Donation $donation)
    {
        $this->authorize('update', $donation);

        $taxLists = TaxList::pluck('name', 'id');
        $kootams = Kootam::pluck('name', 'id');
        $castes = Caste::pluck('name', 'id');
        $templeUsers = TempleUser::all();
        $countries = Country::pluck('name', 'id');

        return view(
            'app.donations.edit',
            compact('donation', 'taxLists', 'kootams', 'castes', 'templeUsers', 'countries')
        );
    }

    /**
     * @param \App\Http\Requests\DonationUpdateRequest $request
     * @param \App\Models\Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function update(DonationUpdateRequest $request, Donation $donation)
    {
        $this->authorize('update', $donation);

        $validated = $request->validated();

        $donation->update($validated);

        return redirect()
            ->route('donations.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Donation $donation)
    {
        $this->authorize('delete', $donation);

        $donation->delete();

        return redirect()
            ->route('donations.index')
            ->withSuccess(__('crud.common.removed'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Donation $donation
     * @return \Illuminate\Http\Response
     */
    public function downloadInvoice(Request $request, Donation $donation)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('donations.invoice');
        return $pdf->stream();
    }
}
