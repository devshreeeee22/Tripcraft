<?php
// Include the generate_itinerary.php to use the getItinerary function
include('../backend/generate_itinerary.php');

// Initialize variables to avoid "undefined variable" errors
$destination = '';
$places = [];

if (isset($_GET['destination']) && !empty($_GET['destination'])) {
    // Get the destination from the URL parameter
    $destination = htmlspecialchars($_GET['destination']);
    
    // Fetch itinerary for the given destination
    $places = getItinerary($destination);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Your Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-4">
                Itinerary for <?php echo $destination ? htmlspecialchars($destination) : 'your destination'; ?>
            </h1>

            <?php if (!empty($places) && isset($places['results']) && !empty($places['results'])): ?>
                <h2 class="text-xl font-semibold mb-4">Suggested Places</h2>
                <ul class="list-disc pl-6">
                    <?php foreach ($places['results'] as $place): ?>
                        <li class="mb-2">
                            <strong><?php echo htmlspecialchars($place['name']); ?></strong><br>
                            <?php echo htmlspecialchars($place['formatted_address']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No places found for this destination.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
