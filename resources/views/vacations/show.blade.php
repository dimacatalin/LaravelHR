<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">

                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{--                    Vacation - {{ $vacation->employee->first_name }} {{ $vacation->employee->last_name }}--}}
                </h2>

            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info btn-sm" title="Edit item" href="{{route('vacations.edit', [$vacation])}}">
                    edit
                </a>
                <a class="btn btn-warning btn-sm" title="Download item" href="{{route('vacations.download', [$vacation])}}">
                    download
                </a>
                {!! Form::model($vacation, ['url' => route('vacations.destroy', [$vacation]), 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                <button class="btn btn-danger btn-sm d-inline" title="Delete item"
                        onclick="return confirm('Are you sure you want to delete this leave?')">
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
                                    <table class="table table-striped table-borderless text-gray-900 dark:text-gray-100">
                                        <tbody>
                                        <tr>
                                            <th>Employee</th>
                                            <td>{{$vacation->employee->first_name}} {{$vacation->employee->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Start date</th>
                                            <td>{{$vacation->start_date}}</td>
                                        </tr>
                                        <tr>
                                            <th>End date</th>
                                            <td>{{$vacation->end_date}}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>{{$vacation->type}}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{$vacation->description}}</td>
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
</x-app-layout>
