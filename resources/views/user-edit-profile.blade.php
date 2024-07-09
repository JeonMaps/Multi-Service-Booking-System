@extends('layouts.app')

 <head>
     <link href="{{ asset('assets/css/test.css') }}" rel="stylesheet">
 </head>

 @section('content')
 <br>
 <div class="container">
 <aside id="sidebar" class="sidebar">
         <div class="d-flex whole" id="wrapper">
             <!-- Sidebar-->
             <div class="sidebar-nav" id="sidebar-wrapper">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-edit-profile') }}">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-change-password') }}">
                        <i class="bi bi-key"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-change-password') }}">
                        <i class="bi bi-bell-fill"></i>
                        <span>Notification Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-change-password') }}">
                        <i class="bi bi-shield"></i>
                        <span>Privacy Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user-change-password') }}">
                        <i class="bi bi-lock-fill"></i>
                        <span>Security Settings</span>
                    </a>
                </li>
             </div>
            </div>
        </aside>
             <!-- Page content-->
        <div class="cont">
             <h1>Edit your Profile </h1>
             
                 <!--wala pa tong form-->
                 
                <label>Name</label>
                    <input class="form-control textfield" type="Name" placeholder=" {{ Auth::user()->name }}"
                          aria-label="default input example">
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
                      <a href="#" class="cancel">Cancel</a>
                 
             
            </div>
</div>


 @endsection
