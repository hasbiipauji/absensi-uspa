
  
  {{-- <script>
          $('#location-button').click(function(){
            
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                  console.log(position);});}}); 
  </script> --}}




@extends('template_backend.master')
@section('sub-judul', 'Lokasi '.$idabsen->user->name." tanggal : ".$idabsen->created_at)

@section('content')


<div>
  
  {{ $idabsen->id }}
  

  {{ $idabsen->user->name }}
  

  {{ $idabsen->status }}
  
  
  {{ $idabsen->latitude }}
  
  
  {{ $idabsen->longitude }}
  
</div>


<div id="output">


  @if ($idabsen->latitude==true)

    <iframe 
    id="map" 
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA8hPLAUviqX-ix5rMigQfbAwMi-edHszk&q={{ $idabsen->latitude }} , {{ $idabsen->longitude }} "
    height="700px"
    width="100%"
    frameborder="0" 
    style="border:0"
    allowfullscreen
    ></iframe>          

  @else
    <div>
      user {{ $idabsen->user->name }} tidak memasukkan lokasi absen
    </div>
  @endif


    {{-- <iframe
        width="600"
        height="450"
        frameborder="0" style="border:0"
        src="" allowfullscreen>
    </iframe> --}}

</div>


@endsection
