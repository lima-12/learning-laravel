<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use app\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request)
    {
        #$series = Series::query()->orderBy('nome')->get();
        $series = Series::all();
        #$series = Series::with(['season'])->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso)
            ;
    }

    public function create()
    {
        return view('series.crate');
    }

    public function store(SeriesFormRequest $request)
    {
        //dd($request->all()); # debug

        # existem varios jeitos de fazer essa adicao no banco
        //Series::create($request->all());
        //Series::create($request->except(['_token'])); # exceto um campo
        //$serie = Series::create($request->only(['nome'])); # somente um campo

        # vamos padronizar usando o with
        //$request->session()->flash('mensagem.sucesso', "A Série '{$serie->nome}' foi Adicionada com sucesso!");

        $serie = $this->repository->add($request);


        return to_route('series.index')
            ->with('mensagem.sucesso', "A Série '{$serie->nome}' foi Adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        //$serie = Series::find($request->series);
        //dd($request->serie);
        //Series::destroy($request->series); // DELETE FROM serie WHERE id = $request->series

        # nao precisamos usar o metodo destroy nesse caso
        $series->delete();

        # o uso do flash dura apenas um request e ao atualizar a pagina a mensagem some
        # $request->session()->flash('mensagem.sucesso', "A Série '{$series->nome}' foi removida com sucesso!");
        # similar ao flash, podemos utilizar o with e nao precisamos do parametro 'Request $request'
        return to_route('series.index')
            ->with('mensagem.sucesso', "A Série '{$series->nome}' foi removida com sucesso!");
    }

    public function edit(Series $series)
    {
        //dd($series->id, $series->nome);
        //dd($series->temporadas);

        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        //dd($request->all()); # debug

        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A Série '{$series->nome}' foi Alterada com sucesso!");
    }
}
