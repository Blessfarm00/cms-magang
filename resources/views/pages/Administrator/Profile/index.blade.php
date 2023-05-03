@extends('layouts.main')

@section('container')
    
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset($profiles->avatar) }}" alt="Profile" class="rounded-circle">
            <h2></h2>
            <h3>{{ $profiles->nama_user }}</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>


            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama User</div>
                  <div class="col-lg-9 col-md-8">{{$profiles->nama_user}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{$profiles->email}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">No Handphone</div>
                  <div class="col-lg-9 col-md-8">{{$profiles->no_hp}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Posisi</div>
                  <div class="col-lg-9 col-md-8">{{$profiles->posisi}}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Role</div>
                  <div class="col-lg-9 col-md-8">{{$profiles->role}}</div>
                </div>
                <div class="text-center">
                  <a href="/profile/{{ $profiles->user_id }}" class="btn btn-dark">Edit Profile</a>
                </div>

              </div>
         
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection