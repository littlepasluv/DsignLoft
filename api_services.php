<?php
require_once 'config.php';

setCORSHeaders();

try {
    $serviceManager = new ServiceManager();
    $services = $serviceManager->getAllServices();
    
    // Group services by type for better organization
    $groupedServices = [];
    foreach ($services as $service) {
        $type = $service['service_type'];
        if (!isset($groupedServices[$type])) {
            $groupedServices[$type] = [];
        }
        
        // Decode JSON fields
        $service['features'] = json_decode($service['features'], true);
        $groupedServices[$type][] = $service;
    }
    
    jsonResponse([
        'success' => true,
        'services' => $groupedServices,
        'all_services' => $services
    ]);
    
} catch (Exception $e) {
    jsonResponse(['error' => $e->getMessage()], 500);
}
?>

