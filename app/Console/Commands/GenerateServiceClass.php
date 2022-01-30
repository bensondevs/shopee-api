<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateServiceClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service : Name of service} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create service class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $serviceName = $this->argument('service');

        $serviceBasePath = app_path('Services');
        if (! file_exists($serviceBasePath)) {
            shell_exec('mkdir ' . $serviceBasePath);
        }

        $serviceFileName = $serviceBasePath . '/' . $serviceName;
        if (file_exists($serviceFileName . '.php')) {
            return $this->error('Documentation already exists.');
        }

        $explode = explode('/', $serviceName);

        $fileName = $explode[count($explode) - 1] . '.php';

        $extendedPath = '';
        if (count($explode) > 1) {
            unset($explode[count($explode) - 1]);
            $extendedPath = implode('/', $explode);
            $serviceBasePath = $serviceBasePath . '/' . $extendedPath;
        }
        
        $serviceBasePath = $serviceBasePath . '/' . $serviceName . '.php';

        $templatePath = resource_path('stubs/Service.stub');
        $template = file_get_contents($templatePath);
        $content = str_replace(['{{serviceName}}', '{{extendedPath}}'], [$serviceName, str_replace('/', '\\', $extendedPath)], $template);

        if (! file_put_contents($serviceBasePath, $content)) {
            return $this->error('Failed to create service class file to folder.');
        }

        return $this->info($serviceName . ' has been created successfully!');
    }
}
