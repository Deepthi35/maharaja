<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\Location;

$locationIds = Location::where('publish', 1)->pluck('id')->map(fn($id) => (string) $id)->toArray();

if (count($locationIds) < 2) {
    echo "Need at least 2 published locations.\n";
    exit(1);
}

$products = Product::all();
$updated  = 0;

foreach ($products as $product) {
    // Randomly pick: only first, only second, or both
    $choice = rand(1, 3);

    $assigned = match ($choice) {
        1 => [$locationIds[0]],
        2 => [$locationIds[1]],
        3 => $locationIds,          // both
    };

    // Store as plain array — the model's array cast handles JSON encoding
    $product->location_id = $assigned;
    $product->save();

    $label = implode(', ', $assigned);
    echo "Product #{$product->id} \"{$product->title}\" => [{$label}]\n";
    $updated++;
}

echo "\nDone. {$updated} products updated.\n";
