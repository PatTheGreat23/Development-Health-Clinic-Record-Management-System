@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Add New Patient</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf
      
      <label>Full Name:</label><br>
      <input type="text" name="fullname" required><br><br>

      <label>Email:</label><br>
      <input type="email" name="email" required><br><br>

      <label>Username:</label><br>
      <input type="text" name="username" required><br><br>

      <label>Password:</label><br>
      <input type="password" name="password" required><br><br>

      <input type="hidden" name="role" value="Patient">

      <button type="submit">Add Patient</button>
    </form>

  </div>
@endsection