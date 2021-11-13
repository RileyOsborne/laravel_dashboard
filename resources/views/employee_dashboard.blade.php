<x-template>
  <x-slot name='content'>
    <div class='header-div'>
      <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1>Employees</h1>
    </div>
    <div class='create-new-div'>
      <button class='create-new'><i class='fa fa-building'></i>Create New Employee</button>
    </div>
    <table class='styled-table'>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
      @foreach ($employees as $employee)
      <tr>
        <td>{{$employee->first_name}}</td>
        <td>{{$employee->last_name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
        <td>
          <button class='edit'><i class='fa fa-edit'></i>Edit</button>
          <button class='delete'><i class='fa fa-trash'></i>Delete</button>
        </td>
      </tr>
      @endforeach
    </table>
  </x-slot>
</x-template>