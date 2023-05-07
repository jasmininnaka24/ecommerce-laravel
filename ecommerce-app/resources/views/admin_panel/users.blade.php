@extends('layouts.admin_header')


@section('content')

  <div class="col-12 mx-auto bgc-white rounded-3 mt-4 mx-4" style="min-height: 70vh;">
    <br>
    <div class="d-md-flex d-block align-items-center justify-content-between px-5">
      <h2 class="txt-primary font-reg">Users</h2>
        <div id="search" class="input-group d-flex align-items-center justify-content-md-end"
            >
            <input type="text" class="font-reg txt-primary  search-input px-3 bg-transparent txt-primary"
              placeholder="Search here..." style="height: 2.4rem; width: 12rem; border: #804916 2px solid; font-size: 16px;" />
              <button class="bgc-primary position-md-absolute"
                style="border: none; outline: none; right: 10%; top: 15%; padding: .45rem; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                  <i class="fa-solid fa-magnifying-glass text-light"
                style="font-size: 1rem"></i>
            </button>
      </div>
    </div>

    <div class="col-11 rounded-3 bgc-white mx-auto" style="min-height: 20vh;">
      <div class="table-responsive mt-3">

        <table class="table bgc-primary rounded-3 my-3" style="min-height: 15vh;">
          <thead>
          <tr>
            <th style="font-size: 18px;" class="txt-light font-med">ID</th>
            <th style="font-size: 18px;" class="txt-light font-med">Name</th>
            <th style="font-size: 18px;" class="txt-light font-med">Email</th>
            <th style="font-size: 18px;" class="txt-light font-med">Action</th>
          </tr>
        </thead>
        <tbody class="bgc-light rounded-3 mt-3">
          @foreach ($users as $user)
              
          <tr>
            <td style="font-size: 18px;" class="font-reg">{{ $user->id }}</td>
            <td style="font-size: 18px;" class="font-reg">{{ $user->name }}</td>
            <td style="font-size: 18px;" class="font-reg">{{ $user->email }}</td>
            <td>
              <form action="{{ route('users.delete_user', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                  <button onclick="return confirm('Are you sure?')" style="font-size: 18px; border:none" class="font-reg px-4 bg-transparent"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          
          @endforeach

        </tbody>
      </table>
    </div>
    </div>
    <br>
  </div>
  <br>


      </div>
    </div>
    <br>
    

@endsection