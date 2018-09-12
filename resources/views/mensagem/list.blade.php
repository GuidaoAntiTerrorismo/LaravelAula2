<center><h1>Lista de Mensagem</h1></center>
<hr>

  <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
  <div class="container">
      <div class="alert alert-success">
        {{\Session::get('success')}}
      </div>
    </div>
  @endif

@foreach($mensagens as $Mensagem)
  <h3>Título: <b><a href="/mensagens/{{$Mensagem->id}}">{{$Mensagem->titulo}}</a></b></h3>
  <p>Texto: <b>{{$Mensagem->texto}}</b></p>
  <p>Autor: <b>{{$Mensagem->autor}}</b></p>
  <p>Ações: 
    <a href="/mensagens/{{$Mensagem->id}}">Ver Mais</a> -
    <a href="/mensagens/{{$Mensagem->id}}/edit">Editar</a> -
    <a href="/mensagens/{{$Mensagem->id}}/delete">Deletar</a> -
  </p>
  <br>
@endforeach

<br>
<h2><a href="/mensagens/create">Criar novo registro</a></h2>
