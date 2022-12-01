@component('mail::message')

    # {{ $nomeSerie }} criada

    A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas e {{ $episodiosPorTemporada }} episódios por temporada
    foi criada.

    Acesse aqui:

    @component('mail::button', ['url' => route('seasons.index', $idSerie)]) Ver série @endcomponent

@endcomponent

{{-- @component('mail::message')

# <center>Série {{ $nomeSerie}} foi criada!<br/></center>

<center><img src="{{ asset('storage/' . $cover) }}" alt="Capa da série {!! $nomeSerie !!}" class="img-fluid" style="height: 400px; margin: auto;"></center>

A série {{ $nomeSerie}} possui {{ $qtdTemporadas }} temporadas com {{ $episodiosPorTemporada }} episódios cada.

Clique aqui para acessá-la:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
Acessar
@endcomponent

@endcomponent --}}
