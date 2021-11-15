<x-template>
  <x-slot name='content'>
    <div class='header-div'>
      <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1 class='text-4xl'>Create New Company</h1>
    </div>
    <div>
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'company_dashboard', 'files' => 'true']) }}

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('company_name', 'Company Name') }}
        {{ Form::text('company_name', old('name')) }}
    </div>

    <div class='form-group'>
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', old('address')) }}
    </div>
    </div>

    <div style='display: flex; flex-direction: row; align-items: flex-start; margin-left: 19%; padding: 5px;'>
    <div class='form-group' style='margin: 5px;'>
        {{ Form::label('logo', 'Logo') }}
        {{ Form::file('logo', old('logo')) }}
    </div>
    </div>

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', old('email')) }}
    </div>

    <div class='form-group'>
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', old('website')) }}
    </div>
    </div>

    <div class='flex-row-center'>
    {{ Form::submit('Create Company', ['class' => 'create-new']) }}
    </div>

    {{ Form::close() }}
  </div>
  </x-slot>
</x-template>