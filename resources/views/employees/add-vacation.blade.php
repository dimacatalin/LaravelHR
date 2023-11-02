<x-app-layout>
    <x-slot name="header">
        <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (!empty($vacation))
                {{ __('Edit vacations') }}
            @else
                {{ __('Add vacations') }}
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
                                            {!! Form::model($vacation, ['url' => route($route, [$vacation??null]), 'method' => $vacation?'PUT':'POST']) !!}
                                            {!! Form::hidden('id') !!}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="employee_id">Employee</label>
                                                        {!! Form::select('employee_id', $employee, null, [
                                                            'required',
                                                            'class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''),
                                                            'id' => 'employee_id']); !!}
                                                        {!! $errors->first('employee_id', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="type">Type</label>
                                                        {!! Form::select('type', \App\Models\Vacation::SELECT_TYPES, null, [
                                                            'required',
                                                            'class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''),
                                                            'id' => 'type',
                                                            'placeholder' => 'Select a type']); !!}
                                                        {!! $errors->first('type', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="start_date">Start date</label>
                                                        @if($vacation)
                                                            {!! Form::date('start_date',  date('Y-m-d', strtotime($vacation->start_date)), ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'id' => 'start_date']); !!}
                                                            {!! $errors->first('start_date', '<small class="text-danger">:message</small>') !!}
                                                        @else
                                                            {!! Form::date('start_date',  null, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'id' => 'start_date']); !!}
                                                            {!! $errors->first('start_date', '<small class="text-danger">:message</small>') !!}
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end_date">End date</label>
                                                        @if($vacation)
                                                            {!! Form::date('end_date',  date('Y-m-d', strtotime($vacation->end_date)), ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'id' => 'end_date']); !!}
                                                            {!! $errors->first('end_date', '<small class="text-danger">:message</small>') !!}
                                                        @else
                                                            {!! Form::date('end_date',  null, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'id' => 'end_date']); !!}
                                                            {!! $errors->first('end_date', '<small class="text-danger">:message</small>') !!}
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        {!! Form::text('description', null, ['class' => 'form-control date-control' . ($errors->has('description') ? ' is-invalid' : ''), 'id' => 'description']); !!}
                                                        {!! $errors->first('description', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-6">
                                                    <a href="{{ route('vacations.index') }}" class="btn btn-secondary">Cancel</a>
                                                    <input type="submit" value="Save"
                                                           class="btn btn-success float-right">
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
