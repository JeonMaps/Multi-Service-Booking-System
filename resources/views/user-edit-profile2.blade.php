@extends('layouts.app')

 <head>
     <link href="{{ asset('assets/css/test.css') }}" rel="stylesheet">
 </head>

 @section('content')
 <br>
     <div class="container">
         <div class="d-flex whole" id="wrapper">
             <!-- Sidebar-->
             <div class="side" id="sidebar-wrapper">
                 <div class="list-group list-group-flush list-group-mine">
                    <a class="list-group-item p-3" href="{{ route('user-edit-profile') }}"><strong>Edit profile</strong></a>
                    <a class="list-group-item p-3"href="{{ route('user-change-password') }}"><strong>Change password</strong></a>
                    <a class="list-group-item p-3" href="/path"><strong>Notification settings</strong></a>
                    <a class="list-group-item p-3" href="/path"><strong>Privacy settings</strong></a>
                    <a class="list-group-item p-3" href="/path"><strong>Security settings</strong></a>
                 </div>
             </div>
             <!-- Page content-->
             <div class="container cont">
                <br>
                <h1>Edit your profile </h1>
                    <section id='first'>
                        
                        <div class="container">
                            <label>Email</label>
                             <input class="form-control textfield" type="Email" placeholder=" {{ Auth::user()->email }}"
                                 aria-label="default input example">
                             <label>Password</label>
                             <input class="form-control textfield" type="Password" placeholder=""
                                 aria-label="default input example">
                             <label>Gender</label>
                             <select class="form-select textfield" aria-label="Default select example">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                              </select>
                              <label>Birth Date</label>
                              <input class="form-control textfield" type="Date" placeholder=""
                                 aria-label="default input example">
                             <a href="#" class="viewserve">Save Profile</a>
                             <a href="#" class="cancel">cancel</a>
                        </div>
                    </section>
             </div>
         </div>
     </div>
 @endsection
