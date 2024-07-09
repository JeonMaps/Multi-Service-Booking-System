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
                 <h1>Change your password</h1>
                         <label>Current Password</label>
                         <input class="form-control" type="Password"
                             aria-label="default input example">
                         <label>New Password</label>
                         <input class="form-control" type="Password" 
                             aria-label="default input example">
                         <label>Repeat New Password</label>
                         <input class="form-control" type="Password" 
                             aria-label="default input example">
                         <a href="#" class="viewserve">Set new password</a>
                         <a href="#" class="cancel">Cancel</a>
             </div>
         </div>
     
 @endsection
