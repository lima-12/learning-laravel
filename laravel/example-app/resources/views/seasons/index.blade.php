<x-layout title="Teporadas de {!! $series->nome !!}">

{{--    @dd($seasons)--}}

    <div>
        <table class="table" style="width: 100%;">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($seasons as $season)
                <tr>
                    <td>
                        <a href="{{ route('episodes.index', $season->id) }}">
                            Temporada {{ $season->number }}
                        </a>
                    </td>

                    <td>
                        {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a class="btn btn-secondary mt-3" type="button" href="{{ route('series.index') }}"> Voltar </a>
</x-layout>

