<x-layout title="Séries" :mensagemSucesso="$mensagemSucesso">

    <a class="btn btn-dark mb-3" type="button" href="{{ route('series.create') }}"> Adicionar </a>

    <div>
        <table class="table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($series as $serie)
                    <tr>
                        <td>
                            <a href="{{ route('seasons.index', $serie->id) }}"> {{ $serie->nome }} </a>
                        </td>

                        <td>
                            <div class="d-flex my-1">
                                <div class="mx-1">
                                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(event, {{ $serie->id }})">
                                            delete
                                        </button>
                                    </form>
                                </div>
                                <div>
                                    <a class="btn btn-primary btn-sm" type="button" href="{{ route('series.edit', $serie->id) }}">
                                        edit
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const series = {{ \Illuminate\Support\Js::from($series) }};

        function confirmDelete(event, id) {

            // Impede que o formulário seja enviado imediatamente
            event.preventDefault();

            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, delete isso!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Envia o formulário
                    event.target.form.submit();
                }
            });
        }
    </script>
</x-layout>

