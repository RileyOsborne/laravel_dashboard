<x-template>
  <x-slot name='content'>
    <div class='header-div'>
      <a href='{{route('dashboard')}}' class='home'><i class='fa fa-home'></i></a>
      <h1>Companies</h1>
    </div>
    <div class='create-new-div'>
      <a href='{{route('company_dashboard.create')}}' class='create-new'><i class='fa fa-address-book'></i>Create New Company</a>
    </div>
    <div>
      {{ $companies->links() }}
    </div>
    <table class='styled-table'>
      <thead>
      <tr>
        <th>Company Id</th>
        <th>Company Name</th>
        <th>Logo</th>
        <th>Email</th>
        <th>Address</th>
        <th>Website</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($companies as $company)
      <tr>
        <td>{{$company->company_id}}</td>
        <td>{{$company->company_name}}</td>
        <td><img src='{{Storage::url(Str::snake($company->company_name).'_logo'. '.jpg')}}' alt='{{$company->company_name}} Logo' width='25' height='25'></td>
        <td>{{$company->email}}</td>
        <td>{{$company->address}}</td>
        <td><a href="{{$company->website}}">{{str_replace(['Https://', 'https://', 'Http://', 'http://', '/'], '', $company->website)}}</a></td>
        <td class='flex-row-center'>
          <a href='{{route('company_dashboard.edit', $company->company_id)}}' class='edit'>
            <i class='fa fa-edit'></i>Edit
          </a>    

          <form action="{{ route('company_dashboard.destroy', $company->company_id)}}" method="POST">
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