@extends('layouts.master')

@section('content')
  @include('includes._banner', ['url' => '/storage/'.$currentCategory->eng_name.'-banner.png'])

  <div style="padding-bottom:15px;">
    <div class="intro">
      @include('includes._title', ['title' => $currentCategory->name])
      <p>{{ $currentCategory->intro }}</p>
    </div>
    @if ($currentCategory->eng_name !== 'Collection')
      @include('includes._side_menu', ['category' => $currentCategory])
    @endif
  </div>
  <div class="photo-container">
    <div class="photo" id="show">
      <span style="text-shadow: 0 0 2px white;" id="name"></span>
    </div>
    <div class="previews">
      @foreach ($photos as $photo)
        <div id="{{ $photo->name }}" class="thumbnail" style="background-image:url({{$photo->path}})">

        </div>

      @endforeach
    </div>
  </div>
  <div class="photo-wall">
    @foreach ($photos as $photo)
      <img class="photo-brick" src="{{ $photo->path }}" alt="{{ $photo->name }}">
    @endforeach
  </div>
  <div id="modal" class="modal">
    <span class="close">&times;</span>
    <img id="modal-img" class="modal-content"></img>
  </div>
  <script type="text/javascript">
    var bricks = window.document.getElementsByClassName('photo-brick')
    var modal = window.document.getElementById('modal')
    var modalImg = window.document.getElementById('modal-img')
    var closeIcon = window.document.getElementsByClassName('close')[0]
    for (var x=0; x<bricks.length; x++){
      bricks[x].onclick = showModal.bind(bricks[x])
    }
    closeIcon.onclick = closeModal
    function showModal() {
      modal.style.display = "block"
      modalImg.src = this.src
    }
    function closeModal() {
      console.log('ss')
      modal.style.display = "none"
    }
  </script>

@endsection
