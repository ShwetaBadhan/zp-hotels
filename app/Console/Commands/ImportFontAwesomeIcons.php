<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Icon;

class ImportFontAwesomeIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-font-awesome-icons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */


    public function handle()
    {
        $path = base_path('node_modules/@fortawesome/fontawesome-free/metadata/icon-families.json');

        if (!file_exists($path)) {
            $this->error('icon-families.json not found');
            return;
        }

        $icons = json_decode(file_get_contents($path), true);

        foreach ($icons as $iconName => $iconData) {

            if (!isset($iconData['familyStylesByLicense']['free'])) {
                continue;
            }

            foreach ($iconData['familyStylesByLicense']['free'] as $styleData) {

                $style = $styleData['style'];

                $prefix = match ($style) {
                    'solid' => 'fa-solid',
                    'regular' => 'fa-regular',
                    'brands' => 'fa-brands',
                    default => 'fa-solid',
                };

                Icon::updateOrCreate(
                    [
                        'class' => $prefix . ' fa-' . $iconName
                    ],
                    [
                        'name' => ucwords(str_replace('-', ' ', $iconName))
                    ]
                );
            }
        }

        $this->info('Icons imported successfully');
    }
}
