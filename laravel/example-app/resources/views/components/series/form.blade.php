<div class="d-flex aling-items-center py-4" style="height: 100%;">
    <div class="card w-100 m-auto" style="max-width: 500px; padding: 1rem;">
        <form action="{{ $action }}" method="post">
            @csrf
            @if($update)
                @method('PUT')
            @endif
            <div class="card-header text-center">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome: </label>
                    <input type="text" class="form-control" id="nome" name="nome" @isset($nome)value="{{ $nome }}@endisset">
                </div>
            </div>

            <div class="card-body text-center">
                <button type="submit" class="btn btn-primary w-25"> {{ $botao }} </button>
                <a class="btn btn-secondary w-25" type="button" href="{{ route('series.index') }}"> Voltar </a>
            </div>
        </form>
    </div>
</div>
