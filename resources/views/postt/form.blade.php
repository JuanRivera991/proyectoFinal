<!-- old('contenido', $post->contenido)-> -->
<div class="container mt-5">
  <div class="card">
      <div class="card-body">
      <form action="{{ $url }}" method="POST">
        @method($method)
        @csrf

        <div class="form-group"> 
                <label class="form-label">{{ __('title')}}</label>
                <input type="text-area" name="Titulo" required class="form-control " placeholder="{{ __('Titulo')}}"  value="{{old('titulo', $post->Titulo)}}">
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('Contenido')}}</label>

          <textarea cols="80" rows="5" placeholder="{{ __('ContentPlaceholder')}}" class="rounded-lg form-control @error('Contenido') is-invalid @enderror " required name='Contenido'>{{old('Contenido', $post->Contenido)}}</textarea>
          @error('Contenido')
               <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

       <button type="submit" class="btn btn-primary" >{{ __('Send')}}</button>

       </form>
      </div>
  </div>
</div>