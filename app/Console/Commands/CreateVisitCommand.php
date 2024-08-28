<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use App\Models\Visit;

class CreateVisitCommand extends Command
{
    protected $signature = 'visit:create';
    protected $description = 'Create a new visit record';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = text(
            label: 'Enter the name of the visit:',
            required: 'Name is required.',
            validate: ['name' => 'required|string|max:80']
        );

        $email = text(
            label: 'Enter the email of the visit:',
            required: 'Email is required.',
            validate: ['email' => 'required|email|max:150|unique:visits,email']
        );

        $latitude = text(
            label: 'Enter the latitude of the visit:',
            required: 'Latitude is required.',
            validate: fn (string $value) => is_numeric($value) && $value >= -90 && $value <= 90 ? null : 'Latitude must be a number between -90 and 90.'
        );

        $longitude = text(
            label: 'Enter the longitude of the visit:',
            required: 'Longitude is required.',
            validate: fn (string $value) => is_numeric($value) && $value >= -180 && $value <= 180 ? null : 'Longitude must be a number between -180 and 180.'
        );

        Visit::create([
            'name' => $name,
            'email' => $email,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->info('Visit created successfully.');

        return 0;
    }
}
