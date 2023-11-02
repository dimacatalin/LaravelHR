<x-app-layout>
    <x-slot name="header">
                <h2 class="dark:bg-gray-800 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    @if (!empty($employee))
                        {{ __('Edit employees') }}
                    @else
                        {{ __('Add employees') }}
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
                                            {!! Form::model($employee, ['url' => route($route, [$employee??null]), 'method' => $employee?'PUT':'POST']) !!}
                                            {!! Form::hidden('id') !!}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        {!! Form::text('first_name', null, ['class' => 'form-control date-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'id' => 'first_name']); !!}
                                                        {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        {!! Form::text('last_name', null, ['class' => 'form-control date-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'id' => 'last_name']); !!}
                                                        {!! $errors->first('last_name', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        {!! Form::text('email', null, ['class' => 'form-control date-control' . ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email']); !!}
                                                        {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone_number">Phone number</label>
                                                        {!! Form::text('phone_number', null, ['class' => 'form-control date-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'id' => 'phone_number']); !!}
                                                        {!! $errors->first('phone_number', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="project_id">Project</label>
                                                        {!! Form::select('project_id', \App\Models\Project::getProjectsForSelect(), null, [
                                                            'required',
                                                            'class' => 'form-control' . ($errors->has('project_id') ? ' is-invalid' : ''),
                                                            'id' => 'project_id',
                                                            'placeholder' => 'Select a project']); !!}
                                                        {!! $errors->first('project_id', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salary_id">Salary</label>
                                                        {!! Form::select('salary_id', \App\Models\Salary::getSalariesForSelect(), null, [
                                                            'required',
                                                            'class' => 'form-control' . ($errors->has('salary_id') ? ' is-invalid' : ''),
                                                            'id' => 'salary_id',
                                                            'placeholder' => 'Select a salary']); !!}
                                                        {!! $errors->first('salary_id', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_active">Is active</label>
                                                        {!! Form::checkbox('is_active', true, null, ['class' => 'form-control date-control' . ($errors->has('is_active') ? ' is-invalid' : ''), 'id' => 'phone_number']); !!}
                                                        {!! $errors->first('is_active', '<small class="text-danger">:message</small>') !!}
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-6">
                                                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
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
