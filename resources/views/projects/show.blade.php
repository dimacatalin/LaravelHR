<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Project - {{ $project->name }}
                </h2>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info btn-sm" title="Edit item" href="{{route('projects.edit', [$project])}}">
                    edit
                </a>
                {!! Form::model($project, ['url' => route('projects.destroy', [$project]), 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                <button class="btn btn-danger btn-sm d-inline" title="Delete item"
                        onclick="return confirm('Are you sure you want to delete this project?')">
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
                                            <th>Name</th>
                                            <td>{{$project->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contracting company</th>
                                            <td>{{$project->contracting_company}}</td>
                                        </tr>
                                        <tr>
                                            <th>Position</th>
                                            <td>{{$project->position}}</td>
                                        </tr>
                                        <tr>
                                            <th>Rate per month (RON)</th>
                                            <td>{{$project->rate_per_month_per_employee}}</td>
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
