<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Models\Salary;
use Exception;
use Illuminate\Support\Facades\Redirect;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::orderBy('created_at', 'DESC')->paginate(50);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salary = null;
        $route = 'salaries.store';

        return view('salaries.create', compact('salary', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaryRequest $request)
    {
        try {
            Salary::create($request->input());
            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('salaries.index');
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $route = 'salaries.update';

        return view('salaries.create', compact('salary', 'route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        try {
            $salary->update($request->input());

            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('salaries.edit', [$salary]);
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return Redirect::back();
    }
}
