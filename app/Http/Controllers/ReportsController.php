<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function serviceReports()
{
    // Fetch all services from invoices
    $servicesRaw = DB::table('invoices')
        ->pluck('services');

    // Split services and count occurrences
    $serviceCounts = [];

    foreach ($servicesRaw as $services) {
        // Split the services by comma
        $servicesArray = explode(',', $services);

        foreach ($servicesArray as $service) {
            $service = trim($service); // Trim any extra spaces
            if (!empty($service)) {
                if (!isset($serviceCounts[$service])) {
                    $serviceCounts[$service] = 0;
                }
                $serviceCounts[$service]++;
            }
        }
    }

    // Convert counts to collections for Blade
    $services = array_keys($serviceCounts);
    $counts = array_values($serviceCounts);

    return view('admin.service-reports', [
        'services' => $services,
        'counts' => $counts
    ]);
}
}
