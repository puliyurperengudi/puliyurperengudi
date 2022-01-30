<?php

namespace App\Http\Controllers;

use App\Models\TaxList;
use App\Models\TaxPayers;
use App\Models\TempleUser;
use Illuminate\Http\Request;
use App\Http\Requests\TaxPayersStoreRequest;
use App\Http\Requests\TaxPayersUpdateRequest;

class TaxPayersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TaxPayers::class);

        $search = $request->get('search', '');

        $allTaxPayers = TaxPayers::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.all_tax_payers.index',
            compact('allTaxPayers', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TaxPayers::class);

        $templeUsers = TempleUser::all()->groupBy('id');
        $taxLists = TaxList::pluck('name', 'id');

        return view(
            'app.all_tax_payers.create',
            compact('templeUsers', 'taxLists')
        );
    }

    /**
     * @param \App\Http\Requests\TaxPayersStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxPayersStoreRequest $request)
    {
        $this->authorize('create', TaxPayers::class);

        $validated = $request->validated();

        $taxPayers = TaxPayers::create($validated);

        return redirect()
            ->route('all-tax-payers.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxPayers $taxPayers
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TaxPayers $taxPayers)
    {
        $this->authorize('view', $taxPayers);

        return view('app.all_tax_payers.show', compact('taxPayers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxPayers $taxPayers
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TaxPayers $taxPayers)
    {
        $this->authorize('update', $taxPayers);

        $templeUsers = TempleUser::pluck('name', 'id');
        $taxLists = TaxList::pluck('name', 'id');

        return view(
            'app.all_tax_payers.edit',
            compact('taxPayers', 'templeUsers', 'taxLists')
        );
    }

    /**
     * @param \App\Http\Requests\TaxPayersUpdateRequest $request
     * @param \App\Models\TaxPayers $taxPayers
     * @return \Illuminate\Http\Response
     */
    public function update(
        TaxPayersUpdateRequest $request,
        TaxPayers $taxPayers
    ) {
        $this->authorize('update', $taxPayers);

        $validated = $request->validated();

        $taxPayers->update($validated);

        return redirect()
            ->route('all-tax-payers.index')
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxPayers $taxPayers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TaxPayers $taxPayers)
    {
        $this->authorize('delete', $taxPayers);

        $taxPayers->delete();

        return redirect()
            ->route('all-tax-payers.index')
            ->withSuccess(__('crud.common.removed'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaxPayers $taxPayers
     * @return \Illuminate\Http\Response
     */
    public function downloadInvoice(Request $request, TaxPayers $taxPayers)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('app.all_tax_payers.invoice');
        return $pdf->stream();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPendingTaxDetails(Request $request)
    {
        $templeUserId = $request->temple_user_id;
        $taxListId = $request->tax_list_id;
        if ($templeUserId && $taxListId) {
            $totalAmount = TaxList::find($taxListId)->amount ?? 0;
            $alreadyPaidAmount = TaxPayers::where('temple_user_id', $templeUserId)->where('tax_list_id', $taxListId)->sum('paid_amount');
            $totalAmount -= $alreadyPaidAmount;
            return response()->json(['status' => 'success', 'amount' => $totalAmount]);
        }
        return response()->json(['status' => 'error', 'amount' => 0]);
    }
}
