# DESFAIO 01 - LARAVEL BÁSICO
- Faça um sistema para o controle de personagens de um jogo
- A pessoa/nosso cliente, quer um sistema onde ele possa cadastrar os personagens do jogo dele, e ter um controle melhor de quantos personagens ele tem, de qual raça, classe e level
- Os dados mínimos que ele precisa é:
  - cadastro de raças (humano, elfo, orc, anão)
  - cadastro de classes (guerreiro, arqueiro, mago)
  - cadastro de personagens (relacionados a raça e classe)
    - todo personagem tem no mínimo os dados básicos:
      - raça, classe, nome, level, observações
- O Cliente quer que o sistema seja fechado ao público, ou seja, que dependa de uma autenticação, onde ele poderá logar e fazer o que quiser


# Relação
```php
// no model
// um p um
public function raca()
    {
        return $this->belongsTo(Raca::class, 'raca_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

// no controller
$personagens = Personagem::with(['raca', 'classe'])->get();

// na view
<p>Raça: {{ $personagem->raca->nome }}</p>
<p>Classe: {{ $personagem->classe->nome }}</p>


// um p muitos
public function personagens()
{
    return $this->hasMany(Personagem::class, 'raca_id');
}

// no controller
$raca = Raca::with(['personagens'])->findOrFail($id);

return view('racas.show', compact('raca'));

// na view
@foreach ($raca->personagens as $personagem)
    <li class="text-green-500">
        {{ $personagem->nome }}
    </li>
@endforeach

```

# Quero ver quais os equipamentos de um personagem
