<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">

            <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Employees') }}
            </h2>

            </div>
            <div class="col-md-6 text-right">

            <a href="{{route('employees.create')}}" class="btn btn-danger"> Add employee </a>
        </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Main content -->
                        <section class="content dark:bg-gray-800">

                            <!-- Default box -->
                            <div class="card bg-gray-800">
                                <div class="card-body p-0 bg-gray-800">
                                    <table class="table table-striped table-borderless text-gray-900 dark:text-gray-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 12%">First Name</th>
                                            <th class="text-center" style="width: 12%">Last Name</th>
                                            <th class="text-center" style="width: 12%">Email</th>
                                            <th class="text-center" style="width: 12%">Phone number</th>
                                            <th class="text-center" style="width: 12%">Salary</th>
                                            <th class="text-center" style="width: 12%">Project</th>
                                            <th class="text-center" style="width: 8%">Active</th>
                                            <th class="text-center" style="width: 30%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $employee)
                                            <tr>
                                                <td class="text-center">{{ $employee->first_name }}</td>
                                                <td class="text-center">{{ $employee->last_name }}</td>
                                                <td class="text-center">{{ $employee->email }}</td>
                                                <td class="text-center">{{ $employee->phone_number }}</td>
                                                <td class="text-center">
                                                    <a href="{{route('salaries.show', [$employee->salary])}}">
                                                        {{ $employee->salary->gross_amount }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('projects.show', [$employee->project])}}">
                                                        {{ $employee->project->name }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    @if($employee->is_active == 1)
                                                        true
                                                    @else
                                                        false
                                                    @endif
                                                </td>
                                                {{--                                @if (Auth::user()->isAdmin())--}}
                                                <td class="text-right">
                                                    <a class="btn btn-primary btn-sm" title="View details" href="{{route('employees.show', [$employee])}}">
                                                        show
                                                    </a>
                                                    <a class="btn btn-info btn-sm" title="Edit item" href="{{route('employees.edit', [$employee])}}">
                                                        edit
                                                    </a>
                                                    {!! Form::model($employee, ['url' => route('employees.destroy', [$employee]), 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                                                    <button class="btn btn-danger btn-sm d-inline" title="Delete item"
                                                            onclick="return confirm('Are you sure you want to delete this employee?')">
                                                        delete
                                                    </button>
                                                </td>
                                                {{--                                @endif--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

