<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function serviceReports(){

        // Fetch and count occurrences of sub_services_id from invoices_services
        $serviceCounts = DB::table('invoices_services')->join('sub_services', 'invoices_services.sub_services_id', '=', 'sub_services.id')
            ->select('sub_services.subName', DB::raw('count(*) as count'))
            ->groupBy('sub_services.subName')
            ->pluck('count', 'sub_services.subName');

        // Convert counts to arrays
        $services = $serviceCounts->keys()->toArray();
        $counts = $serviceCounts->values()->toArray();

        return view('admin/service-reports', [
            'services' => $services,
            'counts' => $counts
        ]);

        // // Fetch all services from invoices
        // $servicesRaw = DB::table('invoices')
        //     ->pluck('services');


        // // Split services and count occurrences
        // $serviceCounts = [];

        // foreach ($servicesRaw as $services) {
        //     // Split the services by comma
        //     $servicesArray = explode(',', $services);

        //     foreach ($servicesArray as $service) {
        //         $service = trim($service); // Trim any extra spaces
        //         if (!empty($service)) {
        //             if (!isset($serviceCounts[$service])) {
        //                 $serviceCounts[$service] = 0;
        //             }
        //             $serviceCounts[$service]++;
        //         }
        //     }
        // }

        // // Convert counts to collections for Blade
        // $services = array_keys($serviceCounts);
        // $counts = array_values($serviceCounts);

        // return view('admin/service-reports', [
        //     'services' => $services,
        //     'counts' => $counts
        // ]);
    }
}
