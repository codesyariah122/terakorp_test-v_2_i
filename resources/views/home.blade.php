@extends('layouts.global')

@section('content')
<div id="rs" class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Welcome ') }} <b class="text-secondary"> {{ Auth::user()->username }} </b>
                </div>
            </div> --}}
            <blockquote class="blockquote-footer">
                {{ __('Welcome ') }} <b class="text-secondary"> {{ Auth::user()->email }} </b>
            </blockquote>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-mx-8 mt-5">
            <h1 class="mt-2 mb-3">@{{title.rs}}</h1>
            <div class="row justify-content-start">
                <div class="col-md-6 mb-3 ">
                    <a href="/rumahsakit/add" class="btn btn-sm btn-secondary"><i class="far fa-plus-square"></i> Add Data </a>
                </div>
                <div class="col-12">
                   @if ($message = Session::get('success'))
                   <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
                  @endif
                </div>
            </div>
            <table class="table table-hover table-dark table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scotpe="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Telepon</th>
                  <th scope="col">Operation</th>
              </tr>
          </thead>
          <tbody>
            <tr v-for="hospital in hospitals">
                <th scope="row">@{{no ++}}</th>
                <td>@{{hospital.nama}}</td>
                <td>
                    <a :href="'mailto:'+hospital.email">@{{hospital.email}}</a>
                </td>
                <td>@{{hospital.alamat}}</td>
                <td>@{{hospital.telepon}}</td>
                <td>
                  <a :href="'/rumahsakit/edit/' + hospital.id" class="btn btn-info btn-sm mr-2"> <i class="fas fa-edit"></i> </a>
                  <a v-on:click="DeleteRumahSakit(hospital.id)" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
              </td>
          </tr>
      </tbody>
    </table>
</div>
</div>

</div>
@endsection
