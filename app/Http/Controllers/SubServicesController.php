<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\SubServices;
use Illuminate\Http\Request;

class SubServicesController extends Controller
{
    public function subServicesForm(Request $request){
        // Fetch all main services for the dropdown
        $services = Services::all();

        // compact is for passing the variables
        return view('admin/add-sub-services', compact('services'));
    }

    public function addSubServices(Request $request){
        $subName = request()->subName;
        $subCost = request()->subCost;

        $subServices = new SubServices();
        
        // Store the selected main services
        $subServices->service_id = $request->input('main_service');

        $subServices->subName = $subName;
        $subServices->subCost = $subCost;
        $subServices->save();

        return redirect()->back();
    }

    public function showAllSubServices(){
        // $subServices = SubServices::select('id', 'subName', 'subCost', 'created_at')->get();

        // Eager laod the service relationship
        $subServices = SubServices::with('service')->get(); 
        return view('admin/all-sub-services', compact('subServices'));
    }

    public function showUpdateSubServicesForm(Request $request, $id){
        // dd($id);
        $subService=SubServices::where('id',$id)->first();

        // Fetch all main services for the dropdown
        $services = Services::all();

        return view('admin/update-sub-services',compact('subService', 'services'));
    }

    public function updateSubServices(Request $request, $id) {
        // dd($id);
        // Find the sub-service by ID
        $subService = SubServices::find($id);
        $subService->subName = $request->input('subName');
        $subService->subCost = $request->input('subCost');

        // Update the main services
        $subService->service_id = $request->input('main_service');

        $subService->save();
        return redirect()->route('showAllSubServices')->with('success', 'Sub Service updated successfully');
    }

    // // For the customer side (Service List)
    // public function showCustomerServices(){
    //     // Fetch sub services along with their related main services
    //     $subServices = SubServices::with('service')->get();

    //     // Return a view for the customer side, passing the data of services list
    //     return view('services', compact('subServices'));
    // }
}