<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-6">

                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Projects') }}
                </h2>

            </div>
            <div class="col-md-6 text-right">

                <a href="{{route('projects.create')}}" class="btn btn-danger"> Add project </a>
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
                                                <th class="text-center" style="width: 20%">Name</th>
                                                <th class="text-center" style="width: 20%">Contracting company</th>
                                                <th class="text-center" style="width: 20%">Position</th>
                                                <th class="text-center" style="width: 20%">Rate per month (RON)</th>
                                                <th class="text-center" style="width: 20%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td class="text-center">{{ $project->name }}</td>
                                                <td class="text-center">{{ $project->contracting_company }}</td>
                                                <td class="text-center">{{ $project->position }}</td>
                                                <td class="text-center">{{ $project->rate_per_month_per_employee }}</td>
                                                {{--                                @if (Auth::user()->isAdmin())--}}
                                                <td class="text-right">
                                                    <a class="btn btn-primary btn-sm" title="View details" href="{{route('projects.show', [$project])}}">
                                                        show
                                                    </a>
                                                    <a href="{{route('projects.edit', [$project])}}" class="btn btn-info btn-sm" title="Edit item">
                                                        edit
                                                    </a>
                                                    {!! Form::model($project, ['url' => route('projects.destroy', [$project]), 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                                                    <button class="btn btn-danger btn-sm d-inline" title="Delete item"
                                                            onclick="return confirm('Are you sure you want to delete this project?')">
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

