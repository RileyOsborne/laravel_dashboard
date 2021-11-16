<x-template>
  <x-slot name='content'>

    <div class='header-div'>
      <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1 class='text-4xl'>Editing: {{$company->company_name}}</h1>
    </div>

    <div>

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($company, ['route' => ['company_dashboard.update', $company->company_id], 'method' => 'PUT', 'files' => 'true']) }}

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('company_name', 'Company Name') }}
        {{ Form::text('company_name', $company->company_name) }}
    </div>

    <div class='form-group'>
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $company->address) }}
    </div>

    </div>

    <div style='display: flex; flex-direction: row; align-items: flex-start; margin-left: 19%; padding: 5px;'>
    <div class='form-group' style='margin: 5px;'>
        {{ Form::label('logo', 'Logo') }}
        {{ Form::file('logo', old($company->logo)) }}
    </div>
    </div>

    <div class='flex-row-center'>
    <div class='form-group'>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $company->email) }}
    </div>

    <div class='form-group'>
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', $company->website) }}
    </div>
    </div>

    <div class='flex-row-center'>
    {{ Form::submit('Edit Company', ['class' => 'create-new']) }}
    </div>

    {{ Form::close() }}

  </div>
  
  </x-slot>
</x-template>