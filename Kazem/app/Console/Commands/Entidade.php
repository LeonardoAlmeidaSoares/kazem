<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Entidade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:entidade {entidade}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma entidade no sistema';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $arquivo_rotas = "routes/web.php";
        $arquivo_padrao_index = "resources/views/template/modelos/index.txt"; 
        $arquivo_padrao_form  = "resources/views/template/modelos/form.txt";
        
        $arquivo_index = "";
        $arquivo_form = "";

        $entidade = $this->argument('entidade');

        echo "\nCriando Controller e Model";
        
        Artisan::call('make:controller ' . ucwords($entidade)."Controller");
        Artisan::call('make:model ' . ucwords($entidade)."Model");

        echo "\nCriando os arquivos de view";
        
        $diretorioViews = "resources/views/_" . strtolower($entidade); 
        
        mkdir($diretorioViews, 0700);

        $arquivo_index = $diretorioViews . "/index.blade.php";
        $arquivo_form = $diretorioViews . "/form.blade.php";

        copy($arquivo_padrao_index, $arquivo_index);
        copy($arquivo_padrao_form,  $arquivo_form);
        
        file_put_contents($arquivo_index, str_replace('---ENTIDADE---', $entidade, file_get_contents($arquivo_index)));
        file_put_contents($arquivo_form, str_replace('---ENTIDADE---', $entidade, file_get_contents($arquivo_form)));

        echo "\nAtualizando Rotas";

        $addRota = "\n\nuse App\Http\Controllers\\" . ucwords($entidade) . "Controller;\n\nRoute::controller(". ucwords($entidade) ."Controller::class)->group(function () {
    Route::get('" . strtolower($entidade) . "', 'index');
    Route::match(['get', 'post'], '" . strtolower($entidade) . "/form/{id}', 'form');
});";

        file_put_contents($arquivo_rotas, $addRota, FILE_APPEND);

        echo "\nDeu Certo!";
    }
}
