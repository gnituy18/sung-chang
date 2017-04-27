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
      <span style="background-color: rgba(255, 255, 255, 0.5)" id="name"></span>
    </div>
    <div class="previews">
      @foreach ($photos as $photo)
        <div id="{{ $photo->name }}" class="thumbnail" style="background-image:url({{$photo->path}})"></div>
      @endforeach
    </div>
  </div>
  <div class="photo-wall">
    @foreach ($photos as $photo)
      <div id="{{ $photo->name }}" class="photo-brick" src="{{$photo->path}}" style="background-image:url({{$photo->path}});"></div>
    @endforeach
  </div>
  <div id="modal" class="modal">
    <span class="close">&times;</span>
    <div id="modal-img" class="modal-image"></div>
    <div id="modal-content" class="modal-content"></div>
  </div>
  <script type="text/javascript">
    var bricks = window.document.getElementsByClassName('photo-brick')
    var modal = window.document.getElementById('modal')
    var modalImg = window.document.getElementById('modal-img')
    var modalContent = window.document.getElementById('modal-content')
    var closeIcon = window.document.getElementsByClassName('close')[0]
    for (var x=0; x<bricks.length; x++){
      bricks[x].onclick = showModal.bind(bricks[x])
    }
    closeIcon.onclick = closeModal
    function showModal() {
      modal.style.display = "block"
      modalContent.innerHTML = this.id
      modalImg.style.cssText = this.style.cssText;
    }
    function closeModal() {
      console.log('ss')
      modal.style.display = "none"
    }
  </script>

@endsection
