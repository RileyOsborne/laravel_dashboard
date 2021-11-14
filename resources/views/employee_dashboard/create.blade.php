<x-template>
  <x-slot name='content'>
    <div class='header-div'>
      <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1>Create New Employee</h1>
    </div>
    <div>
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'employee_dashboard']) }}

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', old('first_name')) }}
    </div>

    <div class='form-group'>
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', old('last_name')) }}
    </div>
    </div>

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('company_id', 'Company') }}
        {{ Form::text('company_id', old('company_id')) }}
    </div>

    <div class='form-group'>
        {{ Form::label('phone', 'Phone Number') }}
        {{ Form::text('phone', old('phone')) }}
    </div>
    </div>

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', old('email')) }}
    </div>

    <div class='form-group'>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', old('password')) }}
    </div>
    </div>

    <div class='flex-row-center'>
    {{ Form::submit('Create Employee', ['class' => 'create-new']) }}
    </div>

    {{ Form::close() }}
  </div>
  </x-slot>
</x-template>