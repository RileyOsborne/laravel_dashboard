<x-template>
  <x-slot name='content'>
    <div class='header-div'>
      <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1>Employees</h1>
    </div>
    <div class='create-new-div'>
      <a href='{{route('employee_dashboard.create')}}' class='create-new'><i class='fa fa-address-book'></i>Create New Employee</a>
    </div>
    <table class='styled-table'>
      <thead>
      <tr>
        <th>Employee ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($employees as $employee)
      <tr>
        <td>{{$employee->employee_id}}</td>
        <td>{{$employee->first_name}}</td>
        <td>{{$employee->last_name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
        <td class='flex-row-center'>
          <a href='{{route('employee_dashboard.edit', $employee->employee_id)}}' class='edit'>
            <i class='fa fa-address-book'></i>Edit
          </a>    

          <form action="{{ route('employee_dashboard.destroy', $employee->employee_id)}}" method="POST">
            @csrf
            @method("DELETE")
            <button class='delete'><i class='fa fa-trash'></i>Delete</button>   
          </form>
          
        </td>
      </tr>
      </tbody>
      @endforeach
    </table>
  </x-slot>
</x-template>