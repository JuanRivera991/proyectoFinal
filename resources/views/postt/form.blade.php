<!-- old('contenido', $post->contenido)-> -->
<div class="container mt-5">
  <div class="card">
      <div class="card-body">
      <form action="{{ $url }}" method="POST">
        @method($method)
        @csrf
        <div class="mb-3">
          <label class="form-label">{{ __('Contenido')}}</label>
          <input type="text-area" name="contenido"  required class="form-control" placeholder="{{ __('ContentPlaceholder')}}" value="{{isset($post->Contenido) ? $post->Contenido: ''}}">   
        </div>

       <button type="submit" class="btn btn-primary" >{{ __('Send')}}</button>

       </form>
      </div>
  </div>
</div>