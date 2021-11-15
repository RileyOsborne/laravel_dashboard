<x-template>
  <x-slot name='content'>
    <div class='header-div'>
    <div style='display: flex; justify-content: space-between;'>
      <a href='{{route('dashboard')}}' class='home' style='margin: 5px;'><i class='fa fa-home'></i></a>
      <form action="{{ route('logout')}}" method="POST">
            @csrf
            @method("POST")
            <button style='margin: 20px; align-self: flex-end; justify-content: flex-end;'><i class="fa fa-sign-out fa-fw"></i> Logout</button>
        </form>
      </div>
      <h1 class='text-4xl'>Employees</h1>
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
        <th>Company</th>
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
        <td>{{$employee->companies->company_name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
        <td class='flex-row-center'>
          <a href='{{route('employee_dashboard.edit', $employee->employee_id)}}' class='edit'>
            <i class='fa fa-edit'></i>Edit
          </a>    

          <form action="{{ route('employee_dashboard.destroy', $employee->employee_id)}}" method="POST">
            @csrf
            @method("DELETE")
            <button class='delete' onclick="return confirm('Are you sure you want to delete this user?')"><i class='fa fa-trash'></i>Delete</button>   
          </form>
          
        </td>
      </tr>
      </tbody>
      @endforeach
    </table>
  </x-slot>
</x-template>