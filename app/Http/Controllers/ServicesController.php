<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function services(Request $request){
        // file name is services
        // return view('services');

        // Fetch all services with their sub-services
        $services = Services::with('subServices')->get();
        
        // Pass the services data to the view
        return view('services', compact('services'));
    }

    public function servicesList(Request $request){
        return view('admin/add-services');
    }

    public function addServices(Request $request){
        $name = request()->name;

        $services = new Services;
        $services->name = $name;
        $services->save();

        return redirect()->back();
    }

    public function showAllServices(){
        $services = Services::select('id', 'name', 'created_at')->get();
        return view('admin/all-services', compact('services'));
    }

    public function deleteServices(){
        $serviceID = request()->id;
        $service = Services:: find($serviceID);
        if($service !== NULL){
            $service->delete();
        }

        return redirect()->back();
    }

    public function updateServices($id){
        $service = Services::find($id);
        return view('admin/update-services', compact('service'));
    }

    public function tableServices(){
        $query = Services::select('id', 'name');
        
        return DataTables::of($query)->make(true);
    }
}