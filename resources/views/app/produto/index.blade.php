@extends('app.layouts._partials.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome do Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->fornecedor->site }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimeto ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button typt="submit">Excluir</button>
                                        <!--a href="">Excluir</a-->
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr> 

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($produto->pedidos as $pedido)
                                     <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                        Pedido: {{ $pedido->id }}
                                    </a>    
                                    @endforeach   
                                </td>
                            </tr>
                               
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links() }}

                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection