<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacationRequest;
use App\Http\Requests\UpdateVacationRequest;
use App\Models\Vacation;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use mPDF;
use MpdfException;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacations = Vacation::orderBy('created_at', 'DESC')->paginate(50);
        return view('vacations.index', compact('vacations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vacation = null;
        $route = 'vacations.store';

        return view('vacations.create', compact('vacation', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacationRequest $request)
    {
        try {
            Vacation::create($request->input());
            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('vacations.index');
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacation $vacation)
    {
        return view('vacations.show', compact('vacation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacation $vacation)
    {
        $route = 'vacations.update';
        return view('vacations.create', compact('vacation', 'route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacationRequest $request, Vacation $vacation)
    {
        try {
            $vacation->update($request->input());

            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('vacations.edit', [$vacation]);
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    public function download(Vacation $vacation)
    {
        $data = [
            'vacation' => $vacation
        ];
        $fileName = $vacation->employee->last_name . ' - ' . $vacation->start_date . '_' . $vacation->end_date . '.pdf';

        $pdf = PDF::loadView('pdf.leave',$data);
        return $pdf->stream($fileName);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacation $vacation)
    {
        $vacation->delete();
        return Redirect::back();
    }
}
