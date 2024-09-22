<form class="charsheet" wire:submit="save">
    <header>
        <section class="charname">
            <label for="charname">Nome do Personagem</label>
            <input name="charname" wire:model="nome" />
            <input type="hidden" wire:model="id_personagem" id="id_personagem"/>
        </section>
        <section class="misc">
            <ul>
                <li>
                    <label for="classlevel">Classe e Nível</label>
                    <input name="classlevel" placeholder="" wire:model="texto_classe" />
                </li>
                <li>
                    <label for="background">Antecedente</label>
                    <select name="background" wire:model="id_antecedente">
                        <option hidden selected>Selecione</option>
                        @foreach ($antecedentes as $item)
                            <option value="{{ $item->id_antecedente}}">{{ $item->titulo }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="playername">Jogador</label>
                    <select name="jogador" wire:model="id_jogador">
                        <option hidden selected>Selecione</option>
                        @foreach ($jogadores as $item)
                            <option value="{{ $item->id_jogador}}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="race">Raça</label>
                    <select name="background" wire:model="id_raca" wire:change="mudarRaca()">
                        <option hidden selected>Selecione</option>
                        @foreach ($racas as $item)
                            <option value="{{ $item->id_raca}}">{{ $item->titulo }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="alignment">Alinhamento</label>
                    <select name="background" wire:model="alinhamento">
                        <option hidden selected>Selecione</option>
                        <option value='L/B' >Leal e Bom</option>
                        <option value='L/N' >Leal e Neutro</option>
                        <option value='L/M' >Leal e Mal</option>
                        <option value='N/B' >Neutro e Bom</option>
                        <option value='N/N' >Neutro e Neutro</option>
                        <option value='N/M' >Neutro e Mal</option>
                        <option value='C/B' >Caótico e Bom</option>
                        <option value='C/N' >Caótico e Neutro</option>
                        <option value='C/M' >Caótico e Mal</option>
                    </select>
                </li>
                <li>
                    <label for="divinity">Divindade</label>
                    <select name="background" wire:model="id_divindade">
                        <option hidden selected>Selecione</option>
                        @foreach ($divindades as $item)
                            <option value="{{ $item->id_divindade}}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
            </ul>
        </section>
    </header>
    <main>
        <section class="linha1">
            <section class="attributes">
                <div class="scores">
                    <ul>
                        <li>
                            <div class="score">
                                <label for="Strengthscore">Força</label>
                                <input name="Strengthscore" placeholder="10" wire:model="attr_for" type="number"
                                    wire:keydown="ajustaMod('For')"  wire:click="ajustaMod('For')"/>
                            </div>
                            <div class="modifier">
                                <input name="Strengthmod" placeholder="+0" wire:model="mod_for" />
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Dexterityscore">Destreza</label>
                                <input name="Dexterityscore" placeholder="10" wire:model="attr_des" type="number"
                                    wire:keydown="ajustaMod('Des')"  wire:click="ajustaMod('Des')" />
                            </div>
                            <div class="modifier">
                                <input name="Dexteritymod" placeholder="+0" wire:model="mod_des" />
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Constitutionscore">Constituição</label>
                                <input name="Constitutionscore" placeholder="10" wire:model="attr_con" type="number"
                                    wire:keydown="ajustaMod('Con')"  wire:click="ajustaMod('Con')" />
                            </div>
                            <div class="modifier">
                                <input name="Constitutionmod" placeholder="+0" wire:model="mod_con" />
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Wisdomscore">Sabedoria</label>
                                <input name="Wisdomscore" placeholder="10" wire:model="attr_sab" type="number"
                                    wire:keydown="ajustaMod('Sab')"  wire:click="ajustaMod('Sab')" />
                            </div>
                            <div class="modifier">
                                <input name="Wisdommod" placeholder="+0" wire:model="mod_sab" />
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Intelligencescore">Inteligencia</label>
                                <input name="Intelligencescore" placeholder="10" wire:model="attr_int" type="number"
                                    wire:keydown="ajustaMod('Int')"  wire:click="ajustaMod('Int')" />
                            </div>
                            <div class="modifier">
                                <input name="Intelligencemod" placeholder="+0" wire:model="mod_int" />
                            </div>
                        </li>
                        <li>
                            <div class="score">
                                <label for="Charismascore">Carisma</label>
                                <input name="Charismascore" placeholder="10" wire:model="attr_car" type="number"
                                    wire:keydown="ajustaMod('Car')"  wire:click="ajustaMod('Car')"  />
                            </div>
                            <div class="modifier">
                                <input name="Charismamod" placeholder="+0" wire:model="mod_car" />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="attr-applications">
                    <div class="inspiration box">
                        <div class="label-container">
                            <label for="inspiration">Inspiração</label>
                        </div>
                        <input name="inspiration" type="checkbox" wire:model="inspiracao" />
                    </div>
                    <div class="proficiencybonus box">
                        <div class="label-container">
                            <label for="proficiencybonus">Bonus Proficiencia</label>
                        </div>
                        <input name="proficiencybonus" placeholder="+2" wire:model="bonus_proficiencia" wire:keydown="ajustaProficiencia()" />
                    </div>
                    <div class="saves list-section box">
                        <ul>
                            <li>
                                <label for="Strength-save">Força</label>
                                <input name="Strength-save" placeholder="+0" wire:model="saving_throw_forca" type="text" wire:click="ajustaMod()" />
                                <input wire:model="treinamento_forca" type="checkbox" wire:click="ajustaMod()" />
                            </li>
                            <li>
                                <label for="Dexterity-save">Destreza</label>
                                <input name="Dexterity-save" placeholder="+0" type="text" wire:model="saving_throw_destreza" wire:click="ajustaMod()" />
                                <input wire:model="treinamento_destreza" type="checkbox" wire:click="ajustaMod()" />
                            </li>
                            <li>
                                <label for="Constitution-save">Constituição</label>
                                <input name="Constitution-save" placeholder="+0" type="text" wire:model="saving_throw_constituicao" wire:click="ajustaMod()" />
                                <input wire:model="treinamento_constituicao" type="checkbox" wire:click="ajustaMod()" />
                            </li>
                            <li>
                                <label for="Wisdom-save">Sabedoria</label>
                                <input name="Wisdom-save" placeholder="+0" type="text" wire:model="saving_throw_sabedoria" wire:click="ajustaMod()" />
                                <input wire:model="treinamento_sabedoria" type="checkbox" wire:click="ajustaMod()" />
                            </li>
                            <li>
                                <label for="Intelligence-save">Inteligencia</label>
                                <input name="Intelligence-save" placeholder="+0" type="text" wire:model="saving_throw_inteligencia" wire:click="ajustaMod(')" />
                                <input wire:model="treinamento_inteligencia" type="checkbox" wire:click="ajustaMod()" />
                            </li>
                            <li>
                                <label for="Charisma-save">Carisma</label>
                                <input name="Charisma-save" placeholder="+0" type="text" wire:model="saving_throw_carisma" wire:click="ajustaMod()" />
                                <input wire:model="treinamento_carisma" type="checkbox"  wire:click="ajustaMod()" />
                            </li>
                        </ul>
                        <div class="label">
                            Salvaguardas
                        </div>
                    </div>
                    <div class="skills list-section box">
                        <ul>
                            @foreach($pericias as $item => $mod)
                            <li>
                                <label for="{{$item}}">{{ $item }} <span class="skill">({{ $mod}})</span></label>
                                <input name="{{$item}}" placeholder="+0" type="text" wire:model="{{ $item }}"/>
                                <input name="{{$item}}-prof" type="checkbox" wire:model="treinamento_{{$item}}" wire:click="ajustaPericias()"/>
                            </li>
                            @endforeach
                        </ul>
                        <div class="label">
                            Perícias
                        </div>
                    </div>
                </div>
            </section>
            <div class="passive-perception box">
                <div class="label-container">
                    <label for="passiveperception">Percepção Passiva</label>
                </div>
                <input name="passiveperception" placeholder="10" wire:model="percepcao" />
            </div>
            <div class="otherprofs box textblock">
                <label for="otherprofs">Proficiencias e Idiomas</label>
                <textarea name="otherprofs" style="height: 24.5em;"></textarea>
            </div>
        </section>
        <section class="linha1">
            <section class="combat">
                <div class="armorclass">
                    <div>
                        <label for="ac">Classe de Armadura</label>
                        <input name="ac" placeholder="10" type="text" wire:model="classe_armadura" />
                    </div>
                </div>
                <div class="initiative">
                    <div>
                        <label for="initiative">Iniciativa</label>
                        <input name="initiative" placeholder="+0" type="text" wire:model="iniciativa" />
                    </div>
                </div>
                <div class="speed">
                    <div>
                        <label for="speed">Desloc.</label><input name="speed" placeholder="9m" type="text" wire:model="deslocamento" />
                    </div>
                </div>
                <div class="hp">
                    <div class="regular">
                        <div class="max">
                            <label for="maxhp">HP Máximo</label>
                            <input name="maxhp" placeholder="10" type="text" wire:model="hp_maximo"/>
                        </div>
                        <div class="current">
                            <label for="currenthp">HP Atual</label><input name="currenthp" type="text" />
                        </div>
                    </div>
                    <div class="temporary">
                        <label for="temphp">HP Temporário</label><input name="temphp" type="text" />
                    </div>
                </div>
                <div class="hitdice">
                    <div>
                        <div class="total">
                            <label for="totalhd">Total</label><input name="totalhd" placeholder="2d10" type="text" />
                        </div>
                        <div class="remaining">
                            <label for="remaininghd">Dado de Vida</label><input name="remaininghd" type="text" wire:model="dado_vida" />
                        </div>
                    </div>
                </div>
                <div class="deathsaves">
                    <div>
                        <div class="label">
                            <label>Teste de Morte</label>
                        </div>
                        <div class="marks">
                            <div class="deathsuccesses">
                                <label>Successos</label>
                                <div class="bubbles">
                                    <input name="deathsuccess1" type="checkbox" />
                                    <input name="deathsuccess2" type="checkbox" />
                                    <input name="deathsuccess3" type="checkbox" />
                                </div>
                            </div>
                            <div class="deathfails">
                                <label>Falhas&nbsp;</label>
                                <div class="bubbles">
                                    <input name="deathfail1" type="checkbox" />
                                    <input name="deathfail2" type="checkbox" />
                                    <input name="deathfail3" type="checkbox" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="attacksandspellcasting">
                <div>
                    <label>Ataques & Magias</label>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Bonus Atk
                                </th>
                                <th>
                                    Dano/Tipo
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select wire:model="arma1" class="arma" wire:change="getDadosArma(1)">
                                        <option value="0" hidden selected>Selecione</option>
                                    @foreach($lista_armas as $item)
                                        <option value="{{$item->id_arma}}">{{ $item->nome }}</option>
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="atkbonus1" type="text" wire:model="bonus_arma1" />
                                </td>
                                <td>
                                    <input name="atkdamage1" type="text" wire:model="tipo_dano_arma1"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select wire:model="arma2" class="arma" wire:change="getDadosArma(2)">
                                        <option value="0" hidden selected>Selecione</option>
                                        @foreach($lista_armas as $item)
                                            <option value="{{$item->id_arma}}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="atkbonus2" type="text"  wire:model="bonus_arma2" />
                                </td>
                                <td>
                                    <input name="atkdamage2" type="text"  wire:model="tipo_dano_arma2" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select wire:model="arma3" class="arma" wire:change="getDadosArma(3)">
                                        <option value="0" hidden selected>Selecione</option>
                                        @foreach($lista_armas as $item)
                                            <option value="{{$item->id_arma}}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input name="atkbonus3" type="text" wire:model="bonus_arma3" />
                                </td>
                                <td>
                                    <input name="atkdamage3" type="text"  wire:model="tipo_dano_arma3" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <textarea></textarea>
                </div>
            </section>
            <section class="equipment">
                <div>
                    <label>Equipamentos</label>
                    <div class="money">
                        <ul>
                            <li>
                                <label for="cp">PC</label>
                                <input name="cp" type="number" wire:model="qtd_pc"/>
                            </li>
                            <li>
                                <label for="sp">PP</label>
                                <input name="sp" type="number" wire:model="qtd_pp"/>
                            </li>
                            <li>
                                <label for="ep">PE</label>
                                <input name="ep" type="number" wire:model="qtd_pe" />
                            </li>
                            <li>
                                <label for="gp">PO</label>
                                <input name="gp" type="number" wire:model="qtd_po" />
                            </li>
                            <li>
                                <label for="pp">PL</label>
                                <input name="pp" type="number" wire:model="qtd_pl" />
                            </li>
                        </ul>
                    </div>
                    <textarea placeholder="Equipamentos aqui"></textarea>
                </div>
            </section>
        </section>
        <section class="linha1">
            <section class="flavor">
                <div class="personality">
                    <label for="personality">Personalidade</label>
                    <textarea name="personality" wire:model="personalidade"></textarea>
                </div>
                <div class="ideals">
                    <label for="ideals">Ideais</label>
                    <textarea name="ideals" wire:model="ideais"></textarea>
                </div>
                <div class="bonds">
                    <label for="bonds">Vínculos</label>
                    <textarea name="bonds" wire:model="vinculos"></textarea>
                </div>
                <div class="flaws">
                    <label for="flaws">Defeitos</label>
                    <textarea name="flaws" wire:model="defeitos"></textarea>
                </div>
            </section>
            <section class="features">
                <div>
                    <label for="features">Características e Traços</label>
                    <textarea name="features" wire:model="caracs"></textarea>
                </div>
            </section>
        </section>
    </main>

    <hr class="linha_separadora" />

    <header>
        <section class="charname">
            <label for="charname">Nome do Personagem</label>
            <input name="charname" wire:model="nome" />
            <input type="hidden" wire:model="id_personagem" />
        </section>
        <section class="misc">
            <ul>
                <li>
                    <label for="idadepersonagem">Idade</label>
                    <input name="idadepersonagem" placeholder="Idade" wire:model="idade_personagem" />
                </li>
                <li>
                    <label for="alturapersonagem">Altura</label>
                    <input name="alturapersonagem" placeholder="Altura" wire:model="altura_personagem" />
                </li>
                <li>
                    <label for="pesopersonagem">Peso</label>
                    <input name="pesopersonagem" placeholder="Peso" wire:model="peso_personagem" />
                </li>
                <li>
                    <label for="olhospersonagem">Olhos</label>
                    <input name="olhospersonagem" placeholder="olhos" wire:model="olhos_personagem" />
                </li>
                <li>
                    <label for="pelepersonagem">Pele</label>
                    <input name="pelepersonagem" placeholder="Pele" wire:model="pele_personagem" />
                </li>
                <li>
                    <label for="cabelopersonagem">Cabelo</label>
                    <input name="cabelopersonagem" placeholder="Cabelo" wire:model="cabelo_personagem" />
                </li>
                
            </ul>
        </section>
    </header>

    <main>
        <section class="linha1">
           <div class="box textblock features">
                <label for="otherprofs">Aparencia do Personagem</label>
                <img  class="aparencia" src="{{ Storage::url($imagem) }}" style="cursor:pointer;"/>
                <input type="hidden" name="caminho_imagem" id="caminho_imagem" wire:model="imagem" wire:change="mudarimagem(this)" />
            </div>
            <div class="box textblock hist_personagem">
                <label for="hist_personagem">Histórico do Personagem</label>
                <textarea name="hist_personagem" wire:model="historico"></textarea>
            </div>
        </section>

        <section class="linha2">
            <div class="otherprofs box textblock">
                 <label for="otherprofs">Aliados e Organizações</label>
                 <textarea name="otherprofs" wire:model="aliados"></textarea>
             </div>
             <div class="otherprofs box textblock">
                 <label for="otherprofs">Características e Traços Adicionais</label>
                 <textarea name="outras_caracteristicas" id="outras_caracteristicas" wire:model="carac_tracos_adicionais"></textarea>
             </div>
             <div class="otherprofs box textblock">
                <label for="otherprofs">Tesouro</label>
                <textarea name="otherprofs" wire:model="tesouro"></textarea>
            </div>
         </section>
        
    </main>

    <hr  class="linha_separadora"/>
    <button type="submit" style="width: 100%; margin-bottom: 10px;">Salvar</button>
</form>
