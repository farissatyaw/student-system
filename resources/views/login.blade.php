@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="container2">
        <div class="row">
          <h1 class="h13">LOG IN</h1>
        </div>
        <div>
          <form action="{{route('doLogin')}}" method="post">
            @csrf
          <div class="label2">
            <label>Email</label>
            <label>
              <input type="text" name="email" class="input2" style="margin-left: 30px" />
            </label>
          </div>

          <br />

          <div class="label3">
            <label>Password</label>
            <label>
              <input type="password" name="password" class="input2" style="margin-left: 26px" />
            </label>
          </div>
          
        </div>
        <div class="row">
          <div class="col">
            <label>
              <button type="submit" class="btn btn-warning">Log In</button>
            </label>
            <label>
              <a class="a2" href="">Forget Password?</a>
            </label>
          </div>
        </div>
        </form>
      </div>
    </div>
  @endsection

