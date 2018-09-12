<?php
namespace App\Http\Controllers;
use App\Mensagem;
use Illuminate\Http\Request;
use Validator, Input, Redirect;
class MensagemController extends Controller
{
    public function index()
    {
        $listaMensagens = Mensagem::all();
        return view('mensagem.list',['mensagens' => $listaMensagens]);
    }
    public function create()
    {
        return view('mensagem.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'titulo.required' => 'É obrigatório um título',
            'texto.required' => 'É obrigatório uma descrição',
            'autor.required' => 'É obrigatório um autor',
            );
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
            );
        $validador = Validator::make($request->all(), $regras, $messages);
        if ($validador->fails()){
            return redirect('mensagens/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        $obj_Mensagem = new Mensagem();
        $obj_Mensagem->titulo = $request['titulo'];
        $obj_Mensagem->texto = $request['texto'];
        $obj_Mensagem->autor = $request['autor'];
        $obj_Mensagem->save();
        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso!');
    }
    public function show($id)
    {
        $Mensagem = Mensagem::find($id);
        return view('mensagem.show',['mensagens' => $Mensagem]);
    }
    public function edit($id)
    {
        $obj_Mensagem = Mensagem::find($id);
        return view('mensagem.edit',['Mensagem' => $obj_Mensagem]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a atividade',
            'texto.required' => 'É obrigatória uma descrição para a atividade',
            'autor.required' => 'É obrigatório o cadastro da data/hora da atividade',
        );
        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("mensagens/$id/edit")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Mensagem = Mensagem::findOrFail($id);
        $obj_Mensagem->titulo =       $request['titulo'];
        $obj_Mensagem->texto = $request['texto'];
        $obj_Mensagem->autor = $request['autor'];
        $obj_Mensagem->save();
        return redirect('/mensagens')->with('success', 'Mensagem alterada com sucesso!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_Mensagem = Mensagem::findOrFail($id);
        $obj_Mensagem->delete($id);
        return redirect('/mensagens')->with('sucess','Mensagem excluída com Sucesso!!');    
    }
    public function delete($id)
    {
        $obj_Mensagem = Mensagem::find($id);
        return view('mensagem.delete',['Mensagem' => $obj_Mensagem]);
    }
}