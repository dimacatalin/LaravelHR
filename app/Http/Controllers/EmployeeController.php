<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'DESC')->paginate(50);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = null;
        $route = 'employees.store';

        return view('employees.create', compact('employee', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            Employee::create($request->input());
            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('employees.index');
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $route = 'employees.update';

        return view('employees.create', compact('employee', 'route'));
    }

    public function addVacation(Employee $employee)
    {
        $route = 'vacations.store';

        $employee = Employee::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"), 'id')
            ->where('id', $employee->id)
            ->orderBy('name')
            ->get()
            ->pluck('name', 'id')
            ->toArray();

        $vacation = null;

        return view('employees.add-vacation', compact('employee', 'vacation', 'route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $employee->update($request->input());

            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('employees.edit', [$employee]);
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return Redirect::back();
    }
}
