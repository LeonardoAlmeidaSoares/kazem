<?php

namespace App\Livewire;

use App\Models\ArmaModel;
use App\Models\PersonagemArmaModel;
use App\Models\PersonagemAtributoModel;
use App\Models\PersonagemModel;
use App\Models\PersonagemPericiaModel;
use App\Models\PersonagemRiquezaModel;
use App\Models\PersonagemTextoModel;
use Illuminate\Http\Request;

use App\Models\AntecedenteModel;
use App\Models\DivindadeModel;
use App\Models\JogadorModel;
use App\Models\RacaModel;
use Livewire\Component;

class FichaPersonagem extends Component
{

    public $personagem = null;
    public $id_personagem = 0;
    public $id_antecedente = 0;
    public $id_raca = 0;
    public $id_divindade = 0;
    public $id_jogador = 0;
    public $alinhamento = '';
    public $nome = "";
    public $deslocamento = "9m";
    public $hp_maximo = 10;
    public $dado_vida = "D8";
    public $texto_classe = "Bárbaro 1";
    public $idade_personagem = 10;
    public $altura_personagem = "150 cm";
    public $peso_personagem = "85 Kg";
    public $olhos_personagem = "Marrons";
    public $pele_personagem = "Cinza";
    public $cabelo_personagem = "Loiro";
    public $imagem = "";
    
    
    //FORÇA
    public $attr_for = 10;
    public $mod_for = 0;
    public $treinamento_forca = false;
    public $saving_throw_forca = 0;
    
    //DESTREZA  
    public $attr_des = 10;
    public $mod_des = 0;
    public $treinamento_destreza = false;
    public $saving_throw_destreza = 0;
    
    //CONSTITUIÇÃO
    public $attr_con = 10;
    public $mod_con = 0;
    public $treinamento_constituicao = false;
    public $saving_throw_constituicao = 0;
    
    //INTELIGENCIA
    public $attr_int = 10;
    public $mod_int = 0;
    public $treinamento_inteligencia = false;
    public $saving_throw_inteligencia = 0;
    
    //SABEDORIA
    public $attr_sab = 10; 
    public $mod_sab = 0;
    public $treinamento_sabedoria = false;
    public $saving_throw_sabedoria = 0;

    //CARISMA
    public $attr_car = 10; 
    public$mod_car = 0; 
    public $treinamento_carisma = false;
    public $saving_throw_carisma = 0;

    //PERICIAS
    public $treinamento_acrobacia = false;
    public $treinamento_adestrar_animais = false;
    public $treinamento_arcanismo = false;
    public $treinamento_atletismo = false;
    public $treinamento_atuacao = false;
    public $treinamento_enganacao = false;
    public $treinamento_furtividade = false;
    public $treinamento_historia = false;
    public $treinamento_intimidacao= false;
    public $treinamento_intuicao = false;
    public $treinamento_investigacao = false;
    public $treinamento_medicina = false;
    public $treinamento_natureza = false;
    public $treinamento_percepcao = false;
    public $treinamento_persuasao = false;
    public $treinamento_prestidigitacao = false;
    public $treinamento_religiao= false;
    public $treinamento_sobrevivencia = false;

    public $acrobacia = 0;
    public $adestrar_animais = 0;
    public $arcanismo = 0;
    public $atletismo = 0;
    public $atuacao = 0;
    public $enganacao = 0;
    public $furtividade = 0;
    public $historia = 0;
    public $intimidacao = 0;
    public $intuicao = 0;
    public $investigacao = 0;
    public $medicina = 0;
    public $natureza = 0;
    public $percepcao = 0;
    public $persuasao = 0;
    public $prestidigitacao = 0;
    public $religiao = 0;
    public $sobrevivencia = 0;


    //TEXTOS
    public $personalidade;
    public $ideais;
    public $vinculos;
    public $defeitos;
    public $caracs;
    public $aliados;
    public $carac_tracos_adicionais;
    public $tesouro;
    public $historico;

    //RIQUEZA
    public $qtd_pc = 0;
    public $qtd_pp = 0;
    public $qtd_pe = 0;
    public $qtd_po = 0;
    public $qtd_pl = 0;

    //ARMAS
    public $arma1 = 0; 
    public $bonus_arma1 = 0; 
    public $tipo_dano_arma1 = ""; 

    public $arma2 = 0;
    public $bonus_arma2 = 0; 
    public $tipo_dano_arma2 = "";

    public $arma3 = 0;
    public $bonus_arma3 = 0; 
    public $tipo_dano_arma3 = ""; 

    public $inspiracao = 1;

    public $classe_armadura = 10;

    public $bonus_proficiencia = 2;

    public $iniciativa = 0;

    public $lastRace = 0;

    public $pericias = ["acrobacia" => "Des", "adestrar_animais" => "Sab", "arcanismo" => "Int", "atletismo" => "For", "atuacao" => "Car",
                         "enganacao" => "Car", "furtividade" => "Des", "historia" => "Int", "intimidacao" => "Car", "intuicao" => "Sab", 
                         "investigacao" => "Int", "medicina" => "Sab", "natureza" => "Int", "percepcao" => "Sab", "persuasao" => "Car", 
                         "prestidigitacao" => "Des", "religiao" => "Int", "sobrevivencia" => "Sab"];


    public function ajustaProficiencia()
    {
        $this->ajustaMod();
    }

    public function getDadosArma($id)
    {
        $dados = $this->{"arma$id"};
        $dados = ArmaModel::find($dados);

        $this->{"tipo_dano_arma$id"} = $dados->dano . " " . substr($dados->tipo, 0, 4); 
    }

    public function ajustaMod(){
    
        $this->mod_for = floor(($this->attr_for - 10)/2);
        $this->saving_throw_forca = ($this->treinamento_forca) ? $this->mod_for + $this->bonus_proficiencia : $this->mod_for;
    
        $this->mod_des = floor(($this->attr_des - 10)/2);
        $this->saving_throw_destreza = ($this->treinamento_destreza) ? $this->mod_des + $this->bonus_proficiencia : $this->mod_des;
        $this->classe_armadura = 10 + $this->mod_des;
        $this->iniciativa = $this->mod_des;
    
        $this->mod_con = floor(($this->attr_con - 10)/2);
        $this->saving_throw_constituicao = ($this->treinamento_constituicao) ? $this->mod_con + $this->bonus_proficiencia : $this->mod_con;
    
        $this->mod_int = floor(($this->attr_int - 10)/2);
        $this->saving_throw_inteligencia = ($this->treinamento_inteligencia) ? $this->mod_int + $this->bonus_proficiencia : $this->mod_int;
    
        $this->mod_sab = floor(($this->attr_sab - 10)/2);
        $this->saving_throw_sabedoria = ($this->treinamento_sabedoria) ? $this->mod_sab + $this->bonus_proficiencia : $this->mod_sab;
    
        $this->mod_car = floor(($this->attr_car - 10)/2);
        $this->saving_throw_carisma = ($this->treinamento_carisma) ? $this->mod_car + $this->bonus_proficiencia : $this->mod_car;
    
        $this->ajustaPericias();

    }

    public function ajustaPericias()
    {
        //FORÇA
        $this->atletismo = ($this->treinamento_atletismo) ? $this->mod_for + $this->bonus_proficiencia : $this->mod_for;

        //DESTREZA
        $this->acrobacia = ($this->treinamento_acrobacia) ? $this->mod_des + $this->bonus_proficiencia : $this->mod_des;
        $this->furtividade = ($this->treinamento_furtividade) ? $this->mod_des + $this->bonus_proficiencia : $this->mod_des;
        $this->prestidigitacao = ($this->treinamento_prestidigitacao) ? $this->mod_des + $this->bonus_proficiencia : $this->mod_des;

        //SABEDORIA
        $this->adestrar_animais = ($this->treinamento_adestrar_animais) ? $this->mod_sab + $this->bonus_proficiencia: $this->mod_sab;
        $this->intuicao = ($this->treinamento_intuicao) ? $this->mod_sab + $this->bonus_proficiencia: $this->mod_sab;
        $this->medicina = ($this->treinamento_medicina) ? $this->mod_sab + $this->bonus_proficiencia: $this->mod_sab;
        $this->percepcao = ($this->treinamento_percepcao) ? $this->mod_sab + $this->bonus_proficiencia: $this->mod_sab;
        $this->sobrevivencia = ($this->treinamento_sobrevivencia) ? $this->mod_sab + $this->bonus_proficiencia: $this->mod_sab;
        
        //INTELIGENCIA
        $this->arcanismo = ($this->treinamento_arcanismo) ? $this->mod_int + $this->bonus_proficiencia: $this->mod_int;
        $this->historia = ($this->treinamento_historia) ? $this->mod_int + $this->bonus_proficiencia: $this->mod_int;
        $this->investigacao = ($this->treinamento_investigacao) ? $this->mod_int + $this->bonus_proficiencia: $this->mod_int;
        $this->natureza = ($this->treinamento_natureza) ? $this->mod_int + $this->bonus_proficiencia: $this->mod_int;
        $this->religiao = ($this->treinamento_religiao) ? $this->mod_int + $this->bonus_proficiencia: $this->mod_int;
        
        //CARISMA
        $this->atuacao = ($this->treinamento_atuacao) ? $this->mod_car + $this->bonus_proficiencia: $this->mod_car;
        $this->enganacao = ($this->treinamento_enganacao) ? $this->mod_car + $this->bonus_proficiencia: $this->mod_car;
        $this->intimidacao = ($this->treinamento_intimidacao) ? $this->mod_car + $this->bonus_proficiencia: $this->mod_car;
        $this->persuasao = ($this->treinamento_persuasao) ? $this->mod_car + $this->bonus_proficiencia: $this->mod_car;
    }

    public function mudarRaca()
    {
        if ($this->id_raca > 0) {
            $raca = RacaModel::find($this->id_raca);
            $this->deslocamento = strval($raca->deslocamento) . "m";
        }

        $this->lastRace = $this->id_raca;
        
    }

    public function mudarimagem($request)
    {
        dd($request);
    }

    public function render(Request $request)
    {

        if ($request->id > 0) {
            
            $this->personagem = PersonagemModel::find($request->id);

            $this->nome = $this->personagem->nome;
            $this->id_raca = $this->personagem->id_raca;
            $this->id_jogador = $this->personagem->id_jogador;
            $this->id_personagem = $this->personagem->id_personagem;
            $this->id_antecedente = $this->personagem->id_antecedente;
            $this->id_divindade = $this->personagem->id_divindade;
            $this->alinhamento = $this->personagem->alinhamento;
            $this->hp_maximo = $this->personagem->pv_total;

            $this->imagem = $this->personagem->imagem;

            $this->lastRace = $this->id_raca;

            //Caso não tenha referencia a atributos no banco de dados, crio uma pra ser adicionada posteriormente
            if (is_null($this->personagem->atributos))
            {
            
                $this->personagem->atributos = new PersonagemAtributoModel([
                    "id_personagem" => $this->id_personagem,
                    'attr_forca' => 10,
                    "attr_destreza" => 10,
                    "attr_constituicao" => 10,
                    "attr_inteligencia" => 10,
                    "attr_sabedoria" => 10,
                    "attr_carisma" => 10,
                    "prof_forca" => 'N',
                    "prof_destreza" => 'N',
                    "prof_constituicao" => 'N',
                    "prof_inteligencia" => 'N',
                    "prof_sabedoria" => 'N',
                    "prof_carisma" => 'N',
                ]);
            }

            $this->attr_for = $this->personagem->atributos->attr_forca;
            $this->attr_des = $this->personagem->atributos->attr_destreza;
            $this->attr_con = $this->personagem->atributos->attr_constituicao;
            $this->attr_int = $this->personagem->atributos->attr_inteligencia;
            $this->attr_sab = $this->personagem->atributos->attr_sabedoria; 
            $this->attr_car = $this->personagem->atributos->attr_carisma;

            $this->treinamento_forca = ($this->personagem->atributos->prof_forca == 'S');
            $this->treinamento_destreza = ($this->personagem->atributos->prof_destreza == 'S');
            $this->treinamento_constituicao = ($this->personagem->atributos->prof_constituicao == 'S');
            $this->treinamento_inteligencia = ($this->personagem->atributos->prof_inteligencia == 'S');
            $this->treinamento_sabedoria = ($this->personagem->atributos->prof_sabedoria == 'S');
            $this->treinamento_carisma = ($this->personagem->atributos->prof_carisma == 'S');

            if(is_null($this->personagem->texto))
            {
                $this->personagem->texto = new PersonagemTextoModel([
                    "id_personagem" => $this->id_personagem
                ]);
            }
            
            $this->personalidade = $this->personagem->texto->personalidade;
            $this->ideais = $this->personagem->texto->ideais;   
            $this->vinculos = $this->personagem->texto->vinculos;
            $this->defeitos = $this->personagem->texto->defeitos;
            $this->caracs = $this->personagem->texto->carac_tracos;
            $this->historico = $this->personagem->texto->historico;
            $this->aliados = $this->personagem->texto->aliados; 
            $this->carac_tracos_adicionais = $this->personagem->texto->carac_tracos_adicionais;
            $this->tesouro = $this->personagem->texto->tesouro;

            //Caso não tenha referencia a riqueza no banco de dados, crio uma pra ser adicionada posteriormente
            if(is_null($this->personagem->riqueza))
            {
                $this->personagem->riqueza = new PersonagemRiquezaModel([
                    'qtd_pc' => 0,
                    "qtd_pp" => 0,
                    "qtd_pe" => 0,
                    "qtd_po" => 0,
                    "qtd_pl" => 0,
                    "id_personagem" => $this->id_personagem
                ]);
            }

            $this->qtd_pc = $this->personagem->riqueza->qtd_pc;
            $this->qtd_pl = $this->personagem->riqueza->qtd_pl;
            $this->qtd_pe = $this->personagem->riqueza->qtd_pe;
            $this->qtd_po = $this->personagem->riqueza->qtd_po;
            $this->qtd_pp = $this->personagem->riqueza->qtd_pp;

            foreach($this->personagem->pericias as $item)
            {
                $this->{$item->id_pericia} = $item->valor;
                $this->{"treinamento_" . $item->id_pericia} = ($item->treinamento == "S");
            }

            //Caso não tenha referencia a riqueza no banco de dados, crio uma pra ser adicionada posteriormente
            if(is_null($this->personagem->armas))
            {
                $this->personagem->armas = new PersonagemArmaModel([
                    'id_arma' => 0,
                    "equipado" => 0,
                    "id_personagem" => $this->id_personagem
                ]);
            }

            $contadorArmas = 0;

            foreach($this->personagem->armas as $item)
            {
                $contadorArmas++;
                $this->{"arma$contadorArmas"} = $item->id_arma;
                if($contadorArmas < 4)
                {
                    $this->getDadosArma($contadorArmas);
                } 
            }
            
        } else {
            $this->personagem = new PersonagemModel();
        }

        $this->ajustaMod();

        $lista_antecedentes = AntecedenteModel::all();
        $lista_racas = RacaModel::all();
        $lista_divindades = DivindadeModel::all();
        $lista_jogadores = JogadorModel::all();
        $lista_armas = ArmaModel::all();

        return view('livewire.ficha-personagem', [
            "antecedentes" => $lista_antecedentes,
            "racas" => $lista_racas,
            "divindades" => $lista_divindades,
            "jogadores" => $lista_jogadores,
            "title" => $this->personagem->nome, 
            "pericias" => $this->pericias,
            "lista_armas" => $lista_armas,
        ])->extends('template.ficha')->title($this->nome);
    }

    public function save()
    {
        if($this->id_personagem > 0)
            $this->personagem = PersonagemModel::find($this->id_personagem);
        else
            $this->personagem = new PersonagemModel();
        
        $this->personagem->nome = $this->nome;
        
        $this->personagem->id_raca = $this->id_raca;
        $this->personagem->id_antecedente = $this->id_antecedente;
        $this->personagem->id_jogador = $this->id_jogador;
        $this->personagem->id_cidade = 1;
        $this->personagem->id_divindade = $this->id_divindade;
        $this->personagem->alinhamento = $this->alinhamento;
        $this->personagem->pv_total = $this->hp_maximo;
        $this->personagem->imagem = $this->imagem;
        
        if($this->personagem->save())
        {
            //Torno global o código do personagem
            $this->id_personagem = $this->personagem->id_personagem;

            //Adiciono todas as pericias, apagando os valores anteriores
            $this->adicionarAtributos();
            $this->adicionarPericias();
            $this->adicionarTextos();
            $this->adicionarRiqueza();
            $this->adiconarArmas();
        }
    }

    public function adicionarAtributos()
    {
        PersonagemAtributoModel::where('id_personagem', $this->id_personagem)->delete();

        $atributos = new PersonagemAtributoModel([
            "id_personagem" => $this->id_personagem,
            'attr_forca' => $this->attr_for,
            "attr_destreza" => $this->attr_des,
            "attr_constituicao" => $this->attr_con,
            "attr_inteligencia" => $this->attr_int,
            "attr_sabedoria" => $this->attr_sab,
            "attr_carisma" => $this->attr_car,
            "prof_forca" => ($this->treinamento_forca)?'S':'N',
            "prof_destreza" => ($this->treinamento_destreza)?'S':'N',
            "prof_constituicao" => ($this->treinamento_constituicao)?'S':'N',
            "prof_inteligencia" => ($this->treinamento_inteligencia)?'S':'N',
            "prof_sabedoria" => ($this->treinamento_sabedoria)?'S':'N',
            "prof_carisma" => ($this->treinamento_carisma)?'S':'N',
        ]);

        $atributos->save();

    }

    public function adicionarPericias(){

        PersonagemPericiaModel::where("id_personagem", $this->id_personagem)->delete();

        foreach ($this->pericias as $item => $attr){
            $pericia = new PersonagemPericiaModel();
            $pericia->id_personagem = $this->id_personagem;
            $pericia->id_pericia = $item;
            $pericia->valor = $this->{$item};
            $pericia->treinamento = ($this->{"treinamento_$item"}) ? 'S' : 'N';
            if (!$pericia->save()){
                return false;
            } 

        }

        return true;
        
    }

    public function adicionarTextos(){
        PersonagemTextoModel::where("id_personagem", $this->id_personagem)->delete();

        $textos = new PersonagemTextoModel();
        $textos->id_personagem = $this->id_personagem;
        $textos->personalidade = $this->personalidade;
        $textos->ideais = $this->ideais;
        $textos->vinculos = $this->vinculos;
        $textos->defeitos = $this->defeitos;
        $textos->carac_tracos = $this->caracs;
        $textos->historico = $this->historico;
        $textos->aliados = $this->aliados;
        $textos->carac_tracos_adicionais = $this->carac_tracos_adicionais;
        $textos->tesouro = $this->tesouro;

        $textos->save();

    }

    public function adicionarRiqueza()
    {
        PersonagemRiquezaModel::where("id_personagem", $this->id_personagem)->delete();

        $riqueza = new PersonagemRiquezaModel([
            "id_personagem" => $this->id_personagem,
            "qtd_pc" => $this->qtd_pc,
            "qtd_pp" => $this->qtd_pp,
            "qtd_pe" => $this->qtd_pe,
            "qtd_po" => $this->qtd_po,
            "qtd_pl" => $this->qtd_pl
        ]);

        $riqueza->save();
    }

    public function adiconarArmas()
    {

        PersonagemArmaModel::find( $this->id_personagem)->delete();

        for($i=1; $i<=3; $i++)
        {

            if($this->{"arma$i"} > 0)
            {
                
                $arma = new PersonagemArmaModel([
                    "id_personagem" => $this->id_personagem,
                    "id_arma" => $this->{"arma$i"},
                    "equipado" => 1
                ]);

                $arma->save();
            }
        }

    }

}
