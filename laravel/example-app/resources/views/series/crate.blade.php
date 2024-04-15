<x-layout title="Nova Série">

    <div class="d-flex aling-items-center py-4" style="height: 100%;">
        <div class="card w-100 m-auto" style="max-width: 500px; padding: 1rem;">
            <form action="{{ route('series.store') }}" method="post">
                @csrf
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nome" class="form-label">Nome: </label>
                            <input autofocus type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="seasonsQty" class="form-label">N° Temporadas: </label>
                            <input type="text" class="form-control" id="seasonsQty" name="seasonsQty" value="{{ old('seasonsQty') }}">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="episodesPerSeason" class="form-label">Eps / Temporadas: </label>
                            <input type="text" class="form-control" id="episodesPerSeason" name="episodesPerSeason" value="{{ old('episodesPerSeason') }}">
                        </div>
                    </div>
                </div>

                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary w-25"> Adicionar </button>
                    <a class="btn btn-secondary w-25" type="button" href="{{ route('series.index') }}"> Voltar </a>
                </div>
            </form>
        </div>
    </div>


</x-layout>
