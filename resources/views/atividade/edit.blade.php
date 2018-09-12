<h1> Formulário topper {{$atividade=>id}}</h1>
<hr>

<form action="/atividades/{{$atividade->id}}" method="POST">
   {{csrf_field() }}
   {{ method_field('PUT')  }}
   Título:  <input type="text" name="title" value="{{$atividade->title">    <br>
   Descrição:  <input type="text" name="description" value="{{$atividade->description">    <br> 
   Agendado para:  <input type="datetime-local" name="scheduledto" value="{{$atividade->scheduledto"> <br>
   <input type="submit" value="Salvar">
</form>  