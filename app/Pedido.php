<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');

        //3 param - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
        //4 param - Representa o nome da Fk da tabela mapeada pelo model ultilizado no relacionamento que estamo implementando;
    }
    
}
