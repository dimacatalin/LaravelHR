<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Employee - {{ $employee->first_name }} {{ $employee->last_name }}
                </h2>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary btn-sm" title="Add leave"
                   href="{{route('employees.add-vacation', [$employee])}}">
                    add leave
                </a>
                <a class="btn btn-info btn-sm" title="Edit item" href="{{route('employees.edit', [$employee])}}">
                    edit
                </a>
                {!! Form::model($employee, ['url' => route('employees.destroy', [$employee]), 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                <button class="btn btn-danger btn-sm d-inline" title="Delete item"
                        onclick="return confirm('Are you sure you want to delete this employee?')">
                    delete
                </button>
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
                            <div class="card dark:bg-gray-800">
                                <div class="card-body p-0 dark:bg-gray-800">
                                    <table
                                        class="table table-striped table-borderless text-gray-900 dark:text-gray-100">
                                        <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <td>{{$employee->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>{{$employee->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$employee->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone number</th>
                                            <td>{{$employee->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <th>Salary</th>
                                            <td><a href="{{route('salaries.show', [$employee->salary])}}">
                                                    {{ $employee->salary->gross_amount }}
                                                </a></td>
                                        </tr>
                                        <tr>
                                            <th>Project</th>
                                            <td><a href="{{route('projects.show', [$employee->project])}}">
                                                    {{ $employee->project->name }}
                                                </a></td>
                                        </tr>
                                        <tr>
                                            <th>Active</th>
                                            <td>
                                                @if($employee->is_active == 1)
                                                    true
                                                @else
                                                    false
                                                @endif
                                            </td>
                                        </tr>
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
    @if(count($employee->vacations))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Main content -->
                        <section class="content dark:bg-gray-800">
                            <!-- Default box -->
                            <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                Leaves
                            </h2>
                            <br>
                            <div class="card dark:bg-gray-800">
                                <div class="card-body p-0 dark:bg-gray-800">
                                    <table class="table table-striped table-borderless text-gray-900 dark:text-gray-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 12%">Start date</th>
                                            <th class="text-center" style="width: 12%">End date</th>
                                            <th class="text-center" style="width: 12%">Type</th>
                                            <th class="text-center" style="width: 20%">Description</th>
                                            <th class="text-center" style="width: 25%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employee->vacations as $vacation)
                                            <tr>
                                            <td class="text-center">{{ $vacation->start_date }}</td>
                                            <td class="text-center">{{ $vacation->end_date }}</td>
                                            <td class="text-center">{{ $vacation->type }}</td>
                                            <td class="text-center">{{ $vacation->description }}</td>
                                            {{--                                @if (Auth::user()->isAdmin())--}}
                                            <td class="text-right">
                                                <a class="btn btn-primary btn-sm" title="View details" href="{{route('vacations.show', [$vacation])}}">
                                                    show
                                                </a>
                                                <a class="btn btn-info btn-sm" title="Edit item" href="{{route('vacations.edit', [$vacation])}}">
                                                    edit
                                                </a>
                                                {!! Form::model($vacation, ['url' => route('vacations.destroy', [$vacation]), 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                                                <button class="btn btn-danger btn-sm d-inline" title="Delete item"
                                                        onclick="return confirm('Are you sure you want to delete this leave?')">
                                                    delete
                                                </button>
                                            </td>
                                            {{--                                @endif--}}
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    <br><br>
    @endif
</x-app-layout>
