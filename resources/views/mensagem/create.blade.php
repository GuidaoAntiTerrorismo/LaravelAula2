<center><h1>Cadastro de Mensagem</h1></center>
<hr>
<form action="/mensagens" method="post">
	{{ csrf_field() }}
	Título: <input type="text" name="titulo"> <br>
	Descrição: <input type="text" name="texto"> <br>
	Autor: <input type="text" name="autor"> <br><br>
	<input type="submit" value="Salvar">
</form>

@if ($errors->any())
<div class="container">
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif