<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::all();
        return view('admin.service-providers-crud.index', compact('serviceProviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.service-providers-crud.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|unique:service_providers',
            'description' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'category' => ['min:1','required', 'array']
        ],[
            'category.required' => 'Please select at least one category.',
        ]);

        $validatedData['category'] = "";

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $serviceProvider = ServiceProvider::create($validatedData);

        $selectedCategories = $request->input('category', []);
        $serviceProvider->categories()->attach($selectedCategories);

        return redirect('/service-providers')->with('success', 'Service Provider has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceProvider = ServiceProvider::findOrFail($id);

        return view('admin.service-providers-crud.show', compact('serviceProvider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $serviceProvider = ServiceProvider::findOrFail($id);

        return view('admin.service-providers-crud.edit', compact('serviceProvider', 'categories'));
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
        $serviceProvider = ServiceProvider::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'category' => ['min:1','required', 'array']
        ],[
            'category.required' => 'Please select at least one category.',
        ]);

        $validatedData['category'] = "";

        $serviceProvider->name = $validatedData['name'];
        $serviceProvider->description = $validatedData['description'];
        $serviceProvider->location = $validatedData['location'];
        $serviceProvider->phone_number = $validatedData['phone_number'];


        if ($request->hasFile('logo')) {
            $serviceProvider->logo = $request->file('logo')->store('logos', 'public');
        }

        $serviceProvider->save();

        // Detach all existing categories
        $serviceProvider->categories()->detach();

        $selectedCategories = $request->input('category', []);
        $serviceProvider->categories()->attach($selectedCategories);

        return redirect()->route('service-providers.index')
            ->with('success', 'Service provider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceProvider = ServiceProvider::findOrFail($id);
        $serviceProvider->delete();

        return redirect('/service-providers')->with('success', 'Service Provider has been deleted successfully!');
    }
}
