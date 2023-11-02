<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">

            <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Leaves') }}
            </h2>

            </div>
            <div class="col-md-6 text-right">

            <a href="{{route('vacations.create')}}" class="btn btn-danger"> Add leave </a>
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
                                    <table class="table table-striped table-borderless text-gray-900 dark:text-gray-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 13%">Employee</th>
                                            <th class="text-center" style="width: 12%">Start date</th>
                                            <th class="text-center" style="width: 12%">End date</th>
                                            <th class="text-center" style="width: 12%">Type</th>
                                            <th class="text-center" style="width: 20%">Description</th>
                                            <th class="text-center" style="width: 25%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vacations as $vacation)
                                            <tr>
                                                <td class="text-center">
                                                    <a title="View details" href="{{route('employees.show', [$vacation->employee])}}">
                                                        {{ $vacation->employee->first_name }} {{ $vacation->employee->last_name }}
                                                    </a>
                                                </td>
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

