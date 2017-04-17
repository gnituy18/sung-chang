<style media="screen">
  .a {
    text-decoration: none;
  }
  .a:hover {
    text-decoration: none;
  }
  .a:active {
    text-decoration: none;
  }
  .tn{
    background-size: cover;
    background-position: center;
    width:100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    position: relative;
    cursor: pointer;
  }
</style>
@foreach ($photos as $photo)
  <div class="col-md-3">
    <div id="{{$photo->id}}" data-target="#photo-modal" data-name="{{$photo->name}}" data-order="{{$photo->order}}" class="tn" style="background-image:url({{asset($photo->path)}})"></div>
    <div>
      @if ($photo->order !== 1)
        <a class="a" href="{{ route('photos.up',['photo' => $photo->id]) }}">◄</a>
      @else
        <span>◄</span>
      @endif
      @if ($photo->order !== $photo->product->photos->count())
        <a class="a" style="float:right" href="{{ route('photos.down',['photo' => $photo->id]) }}">►</a>
      @else
        <span style="float:right">►</span>
      @endif
    </div>
  </div>
@endforeach
<div id="photo-modal" class="modal bs-example-modal-sm" tabindex="-1" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form action="{{ route('photos.update', ['product' => $product_eng_name]) }}" method="post">
        <div class="modal-body">
            <div class="form-group">
              <label for="rename">重新命名</label>
              <input id="rename" type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
              <label for="order">順序</label>
              <select id="order" class="form-control" name="order">
                @for ($i = 1; $i <= $photos->count(); $i++)
                  <<option>{{$i}}</option>>
                @endfor
              </select>
            </div>
        </div>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="modal-footer">
          <button type="button" id="photo-del" data-target="#photo-delete-modal" class="btn btn-danger">刪除</button>
          <button type="submit" class="btn btn-primary">確認</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="photo-delete-modal" class="modal bs-example-modal-sm" tabindex="-1" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">你確定要刪除嗎？</h4>
      </div>
      <form method="POST">
        <div class="modal-footer">
          <button id="cancel" type="button" class="btn btn-default">取消</button>
          <button type="submit" class="btn btn-danger">確定刪除</button>
        </div>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
<script>
  (function(){
    var currentPhoto
    $('#cancel').on('click', function(){
      $('#photo-modal').modal('show', currentPhoto)
      $('#photo-delete-modal').modal('hide')
    })
    $('#photo-del').on('click', function(){
      $('#photo-modal').modal('hide')
      $('#photo-delete-modal').modal('show')
    })
    $('.tn').on('click', function(){
      currentPhoto = $(this)
      $('#photo-modal').modal('show', $(this))
    })
    $('#photo-modal').on('show.bs.modal', function (event) {
      var photo = $(event.relatedTarget)
      var id = photo.attr('id')
      var name = photo.data('name')
      var order = photo.data('order')
      console.log(order)
      var modal = $(this)
      modal.find('.modal-title').text(name)
      modal.find('.modal-body #rename').val(name)
      modal.find('.modal-body #order').val(order)
      modal.find('form').attr('action', '/photos/'+id)
      $('#photo-delete-modal').find('form').attr('action', '/photos/'+id)
    })
  })()
</script>
