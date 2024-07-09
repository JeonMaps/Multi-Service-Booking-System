<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class UserController extends Controller
{
    use Notifiable;
    public function index()
    {
        $users = User::all();
        return view('admin.users-crud.index', compact('users'));
    }

    public function createAdmin()
    {
        return view('admin.users-crud.createAdmin');
    }

    public function createBusiness()
    {
        $serviceProviders = ServiceProvider::all();

        return view('admin.users-crud.createBusiness', compact('serviceProviders'));
    }

    protected function storeAdmin(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:User,Admin,Service Provider',
        ]);


        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);

        return redirect('/users')->with('success', 'Admin has been created successfully!');
    }

    protected function storeBusiness(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:service_providers',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'service_provider_id' => 'nullable|in:None,' . ServiceProvider::pluck('id')->implode(','),
            'role' => 'required|in:User,Admin,Service Provider',
        ], [
            'name.unique' => 'The name has already been taken.',
        ]);

        if (!isset($data['service_provider_id'])) {
            $data['service_provider_id'] = null;
        }

        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);

        return redirect('/users')->with('success', 'Service Provider has been created successfully!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users-crud.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $serviceProviders = ServiceProvider::all();

        return view('admin.users-crud.edit', compact('user','serviceProviders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:User,Admin,Service Provider',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect('/users')->with('success', 'User has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->appointments()->exists()) {
            return back()->with('error', 'Cannot delete service provider because it is connected to appointments table');
        } elseif ($user->serviceProvider()->count() > 0) {
            return back()->with('error', 'Cannot delete user because it is connected to a service provider.');
        }

        $user->delete();

        return redirect('/users')->with('success', 'Service Provider has been deleted successfully!');
    }
}
