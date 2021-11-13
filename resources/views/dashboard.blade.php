<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="{{ mix('/css/dashboard.css') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class='parent-div'>
    <div class='companies-div'>
      <h1>Companies</h1>
    </div>
    <div class='create-new-company-div'>
      <button class='create-new-company'><i class='fa fa-address-card'></i>Create New Company</button>
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
        <td>1600 Amphitheatre Parkway, Mountain View, CA</td>
        <td><a href="https://google.com">www.google.com</td>
        <td>{{$company->email}}</td>
        <td>
          <button class='edit'><i class='fa fa-edit'></i>Edit</button>
          <button class='delete'><i class='fa fa-trash'></i>Delete</button>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>