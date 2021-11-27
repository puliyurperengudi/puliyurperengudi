<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseTypeStoreRequest;
use App\Http\Requests\ExpenseTypeUpdateRequest;

class ExpenseTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ExpenseType::class);

        $search = $request->get('search', '');

        $expenseTypes = ExpenseType::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.expense_types.index',
            compact('expenseTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ExpenseType::class);

        return view('app.expense_types.create');
    }

    /**
     * @param \App\Http\Requests\ExpenseTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseTypeStoreRequest $request)
    {
        $this->authorize('create', ExpenseType::class);

        $validated = $request->validated();

        $expenseType = ExpenseType::create($validated);

        return redirect()
            ->route('expense-types.edit', $expenseType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExpenseType $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ExpenseType $expenseType)
    {
        $this->authorize('view', $expenseType);

        return view('app.expense_types.show', compact('expenseType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExpenseType $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ExpenseType $expenseType)
    {
        $this->authorize('update', $expenseType);

        return view('app.expense_types.edit', compact('expenseType'));
    }

    /**
     * @param \App\Http\Requests\ExpenseTypeUpdateRequest $request
     * @param \App\Models\ExpenseType $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(
        ExpenseTypeUpdateRequest $request,
        ExpenseType $expenseType
    ) {
        $this->authorize('update', $expenseType);

        $validated = $request->validated();

        $expenseType->update($validated);

        return redirect()
            ->route('expense-types.edit', $expenseType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExpenseType $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ExpenseType $expenseType)
    {
        $this->authorize('delete', $expenseType);

        $expenseType->delete();

        return redirect()
            ->route('expense-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
