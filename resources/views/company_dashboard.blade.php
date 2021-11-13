<x-template>
  <x-slot name='content'>
    <div class='header-div'>
    <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1>Companies</h1>
    </div>
    <div class='create-new-div'>
      <button class='create-new'><i class='fa fa-building'></i>Create New Company</button>
    </div>
    <table class='styled-table'>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Website</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
      @foreach ($companies as $company)
      <tr>
        <td>{{$company->company_name}}</td>
        <td>{{$company->address}}</td>
        <td><a href="{{$company->website}}">{{str_replace(['https://', 'http://', '/'], '', $company->website)}}</td>
        <td>{{$company->email}}</td>
        <td>
          <button class='edit'><i class='fa fa-edit'></i>Edit</button>
          <button class='delete'><i class='fa fa-trash'></i>Delete</button>
        </td>
      </tr>
      @endforeach
    </table>
  </x-slot>
</x-template>