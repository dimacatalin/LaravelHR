<x-app-layout>
    <x-slot name="header">
                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    @if (!empty($salary))
                        {{ __('Edit salaries') }}
                    @else
                        {{ __('Add salaries') }}
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
                                            {!! Form::model($salary, ['url' => route($route, [$salary??null]), 'method' => $salary?'PUT':'POST']) !!}
                                            {!! Form::hidden('id') !!}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="position">Position</label>
                                                        {!! Form::text('position', null, ['class' => 'form-control date-control' . ($errors->has('position') ? ' is-invalid' : ''), 'id' => 'position']); !!}
                                                        {!! $errors->first('position', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gross_amount">Gross amount (RON)</label>
                                                        {!! Form::number('gross_amount', null, ['class' => 'form-control date-control' . ($errors->has('gross_amount') ? ' is-invalid' : ''), 'id' => 'gross_amount']); !!}
                                                        {!! $errors->first('gross_amount', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="type">Type</label>
                                                        {!! Form::select('type', \App\Models\Salary::SELECT_TYPES, null, [
                                                            'required',
                                                            'class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''),
                                                            'id' => 'type',
                                                            'placeholder' => 'Select a type']); !!}
                                                        {!! $errors->first('type', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-6">
                                                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Cancel</a>
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
