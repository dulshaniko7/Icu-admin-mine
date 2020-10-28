<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaxRequest;
use App\Http\Requests\StoreTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Tax;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxes = Tax::all();

        return view('admin.taxes.index', compact('taxes'));
    }

    public function create()
    {
        abort_if(Gate::denies('tax_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id');

        return view('admin.taxes.create', compact('countries'));
    }

    public function store(StoreTaxRequest $request)
    {

        $tax = Tax::create($request->all());
        $tax->countries()->sync($request->input('countries', []));

        return redirect()->route('admin.taxes.index');
    }

    public function edit(Tax $tax)
    {
        abort_if(Gate::denies('tax_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id');

        $tax->load('countries');

        return view('admin.taxes.edit', compact('countries', 'tax'));
    }

    public function update(UpdateTaxRequest $request, Tax $tax)
    {
        $tax->update($request->all());
        $tax->countries()->sync($request->input('countries', []));

        return redirect()->route('admin.taxes.index');
    }

    public function show(Tax $tax)
    {
        abort_if(Gate::denies('tax_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tax->load('countries');

        return view('admin.taxes.show', compact('tax'));
    }

    public function destroy(Tax $tax)
    {
        abort_if(Gate::denies('tax_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tax->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaxRequest $request)
    {
        Tax::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
