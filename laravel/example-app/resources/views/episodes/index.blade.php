<x-layout title="Episódios">

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
                            <input type="checkbox" name="episodes[]" value="{{ $episode->id }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <button class="btn btn-primary mt-3"> Salvar </button>
    </form>


    <a class="btn btn-secondary mt-3" type="button" href="{{ route('series.index') }}"> Voltar </a>
</x-layout>

