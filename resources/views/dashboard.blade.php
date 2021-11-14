<x-template>
  <x-slot name='content'>
    <div class='header-div'>
      <h1>Welcome!</h1>
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