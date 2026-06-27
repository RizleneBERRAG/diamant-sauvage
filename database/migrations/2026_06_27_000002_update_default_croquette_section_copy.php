<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $oldTitle = 'Les 3 gammes de croquettes utilisées chez nous.';

    private string $oldDescription = 'Pour rendre la page plus claire, chaque gamme est présentée sous forme de carte avec les informations essentielles visibles immédiatement et la composition complète accessible au clic.';

    private string $newTitle = 'Les croquettes utilisées et recommandées chez nous.';

    private string $newDescription = 'Les gammes présentées ici peuvent évoluer selon l’âge, les besoins et la sensibilité de chaque chat. Elles sont affichées sous forme de cartes pour consulter facilement les informations essentielles et, lorsqu’elle est renseignée, la composition complète.';

    public function up(): void
    {
        if (! Schema::hasTable('croquette_sections')) {
            return;
        }

        DB::table('croquette_sections')
            ->where('title', $this->oldTitle)
            ->update(['title' => $this->newTitle]);

        DB::table('croquette_sections')
            ->where('description', $this->oldDescription)
            ->update(['description' => $this->newDescription]);
    }

    public function down(): void
    {
        if (! Schema::hasTable('croquette_sections')) {
            return;
        }

        DB::table('croquette_sections')
            ->where('title', $this->newTitle)
            ->update(['title' => $this->oldTitle]);

        DB::table('croquette_sections')
            ->where('description', $this->newDescription)
            ->update(['description' => $this->oldDescription]);
    }
};
