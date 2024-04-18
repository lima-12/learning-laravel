<x-layout title="Editar Série '{!! $serie->nome !!}'">

    <div class="d-flex aling-items-center py-4" style="height: 100%;">
        <div class="card w-100 m-auto" style="max-width: 500px; padding: 1rem;">
            <form action="{{ route('series.update', $serie->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-header text-center">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome: </label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $serie->nome }}">
                    </div>
                </div>

                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary w-25"> Alterar </button>
                    <a class="btn btn-secondary w-25" type="button" href="{{ route('series.index') }}"> Voltar </a>
                </div>
            </form>
        </div>
    </div>

</x-layout>
