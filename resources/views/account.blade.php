@extends('layouts.app')
@section('content')
<div class="container">
      <div class="row">
        <div class="col" style="margin-right: -500px">
          <div class="row">
            <div
              style="
                width: 275px;
                height: 375px;
                background-color: white;
                padding-top: 30px;
                margin-top: 50px;
                border-radius: 5px;
              "
            >
              <div style="text-align: center">
                <img
                  src="/assets/images/Group 3.png"
                  alt=""
                  width="125px"
                  style="border-radius: 150px"
                />
              </div>
              <h6
                style="
                  margin-top: 30px;
                  font-weight: bolder;
                  text-align: center;
                "
              >
                {{$user->name}}
              </h6>
              <h6
                style="
                  font-size: small;
                  text-align: center;
                  margin-bottom: 40px;
                "
              >
              @php $id = explode("-", $user->uuid); echo $id[0];@endphp | @php $jurusan = explode(" ", $user->kelas->name); echo $jurusan[1]; @endphp
              </h6>
              <label for="" style="font-size: small">KELAS</label>
              <label for="" style="font-size: small; margin-left: 40px"
                >:</label
              >
              <label for="" style="font-size: small">{{$user->kelas->name}}</label>
              <br />
              <label for="" style="font-size: small">SEMESTER</label>
              <label for="" style="font-size: small; margin-left: 12px"
                >:</label
              >
              <label for="" style="font-size: small">{{$user->semester}} {{$user->semester%2==0 ? '(GENAP)' : '(GANJIL)'}}</label>
              <br />
              <label for="" style="font-size: small">NO. TELP</label>
              <label for="" style="font-size: small; margin-left: 22px"
                >:</label
              >
              <label for="" style="font-size: small">{{$user->phonenumber}}</label>
            </div>
          </div>
          <div class="row">

              <form action="{{route('doLogout')}}" style="margin:0;padding:0;" method="post">
                @csrf
                <button class="btn btn-light mt-2" style="width: 275px;" type="submit">Log Out</button>
              </form>

          </div>
        </div>
        <div class="col">
          <div class="row">
            <div style="margin-top: 50px">
              <h1>BIODATA</h1>
            </div>
          </div>
          <div class="row">
            <div
              style="
                height: 670px;
                background-color: white;
                padding: -20px;
                margin-top: 20px;
                border-radius: 5px;
              "
            >
              <div
                style="
                  border: 1.5px solid grey;
                  border-radius: 5px;
                  width: 700px;
                  margin: auto;
                  margin-top: 50px;
                  padding: 30px;
                  margin-bottom: 20px;
                "
              >
                <label for="">Nama</label>
                <label for="" style="margin-left: 100px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->name}}</label>
                <br />
                <label for="">Kelas</label>
                <label for="" style="margin-left: 104px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">12 MIPA 4</label>
                <br />
                <label for="">Wali Kelas</label>
                <label for="" style="margin-left: 65px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->kelas->teacher}}</label>
                <br />
                <label for="">Tahun Angkatan</label>
                <label for="" style="margin-left: 17px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->registeredyear}}</label>
                <br />
                <label for="">Semester</label>
                <label for="" style="margin-left: 70px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->semester}} {{$user->semester%2==0 ? '(GENAP)' : '(GANJIL)'}}</label>
                <br />
                <label for="">Jenis Kelamin</label>
                <label for="" style="margin-left: 37px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->gender=='0' ? 'Perempuan' : 'Laki-laki'}}</label>
                <br />
                <label for="">Tempat Lahir</label>
                <label for="" style="margin-left: 42px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->birthplace}}</label>
                <br />
                <label for="">Tanggal Lahir</label>
                <label for="" style="margin-left: 39px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">{{$user->birthday}}</label>
                <br />
                <form action="{{route('account.update', [$user->uuid])}}" method="post">
                  @csrf
                  @method('PUT')
                <label for="">Alamat</label>
                <label for="" style="margin-left: 90px; margin-bottom: 10px"
                  >:</label
                >
                
                <label for="">
                  <input
                    type="text"
                    name="address"
                    value="{{$user->address}}"
                    style="width: 470px; border: 0px;"
                    required
                  />
                </label>
                <br />
                <label for="">Email</label>
                <label for="" style="margin-left: 102px; margin-bottom: 10px"
                  >:</label
                >
                <label for="">
                  <input
                    type="text"
                    name="email"
                    value="{{$user->email}}"
                    style="width: 470px; border: 0px;"
                    required
                  />
                </label>
                <br />
                <label for="">No. Telp</label>
                <label for="" style="margin-left: 81px">:</label>
                <label for="">
                  <label for="">
                    <input
                      type="text"
                      name="phonenumber"
                      style="width: 470px; border: 0px;"
                      value="{{$user->phonenumber}}"
                      required
                    />
                  </label>
                </label>
                <br />
                <div style="text-align: center; margin-top: {{$errors->any() ? '35px' : '95px'}}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <button type="submit" class="btn btn-warning">
                    Save Changes
                  </button>
                </div>
              </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
