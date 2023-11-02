<x-app-layout>
    <x-slot name="header">
                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    @if (!empty($project))
                        {{ __('Edit project') }}
                    @else
                        {{ __('Add projects') }}
                    @endif
                </h2>
        @include('partials.alerts')
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
                                    <div class="content-wrapper">
                                        <!-- Main content -->
                                        <section class="content">
                                            {!! Form::model($project, ['url' => route($route, [$project??null]), 'method' => $project?'PUT':'POST']) !!}
                                            {!! Form::hidden('id') !!}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        {!! Form::text('name', null, ['class' => 'form-control date-control' . ($errors->has('name') ? ' is-invalid' : ''), 'id' => 'name']); !!}
                                                        {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contracting_company">Contracting company</label>
                                                        {!! Form::text('contracting_company', null, ['class' => 'form-control date-control' . ($errors->has('contracting_company') ? ' is-invalid' : ''), 'id' => 'contracting_company']); !!}
                                                        {!! $errors->first('contracting_company', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position">Position</label>
                                                        {!! Form::text('position', null, ['class' => 'form-control date-control' . ($errors->has('position') ? ' is-invalid' : ''), 'id' => 'position']); !!}
                                                        {!! $errors->first('position', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rate_per_month_per_employee">Rate per month (RON)</label>
                                                        {!! Form::number('rate_per_month_per_employee', null, ['class' => 'form-control date-control' . ($errors->has('rate_per_month_per_employee') ? ' is-invalid' : ''), 'id' => 'rate_per_month_per_employee']); !!}
                                                        {!! $errors->first('rate_per_month_per_employee', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-6">
                                                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </section>
                                        <!-- /.content -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
