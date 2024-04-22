<x-layout title="Episódios" :mensagemSucesso="$mensagemSucesso">

{{--    @dd($episodes)--}}

    <form method="post">
        @csrf
        <div>
            <table class="table" style="width: 100%;">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($episodes as $episode)
                    <tr>
                        <td>
                            Episódio {{ $episode->number }}
                        </td>

                        <td>
                            <input 
                            type="checkbox" 
                            name="episodes[]" 
                            value="{{ $episode->id }}"
                            @if ($episode->watched) checked @endif
                            />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <button class="btn btn-primary mt-3"> Salvar </button>
        <a class="btn btn-secondary mt-3" type="button" href="{{ route('series.index') }}"> Voltar </a>
    </form>


</x-layout>

