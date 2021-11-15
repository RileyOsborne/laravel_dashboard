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
      <h1 class='text-4xl'>Welcome!</h1>
    </div>
    <table class='styled-table'>
      <tr>
        <th>Companies</th>
        <th>Employees</th>
      </tr>
      <tr>
        <td>
          <a href='{{ route('company_dashboard.index') }}' class='see-companies'><i class='fa fa-building'></i>See Companies</a>
        </td>
        <td>
          <a href='{{ route('employee_dashboard.index') }}' class='see-employees'><i class='fa fa-address-book'></i>See Employees</a>
        </td>
      </tr>
    </table>
  </x-slot>
</x-template>