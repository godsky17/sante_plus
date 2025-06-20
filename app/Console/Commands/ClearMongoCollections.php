<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearMongoCollections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mongo:clear';

    protected $description = 'Supprime les collections MongoDB principales';

    public function handle()
    {
        $collections = ['utilisateur', 'patients', 'hopitaux', 'medecins']; // adapte ici

        foreach ($collections as $collection) {
            DB::connection('mongodb')->getMongoDB()->selectCollection($collection)->deleteMany([]);
            $this->info("Collection $collection vidée.");
        }

        $this->info('Toutes les collections ont été vidées.');
    }
}
