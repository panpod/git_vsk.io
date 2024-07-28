<?php


// Load configuration from .ini file
$configLoader = new ConfigLoader('ini/service.ini');
$servicesConfig = $configLoader->getConfig();

$serviceFactory = new ServiceFactory($servicesConfig);

echo '<div class="container">
        <div class="section-header text-center">
            <p>Our Services</p>
            <h2>We Provide Services</h2>
        </div>
        <div class="row">';

$delay = 0.1;
foreach ($servicesConfig as $key => $serviceConfig) {
    try {
        $serviceItem = $serviceFactory->createService($key, $delay);
        echo $serviceItem->getHtml();
        $delay += 0.1;
    } catch (Exception $e) {
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}

echo '  </div>
    </div>';