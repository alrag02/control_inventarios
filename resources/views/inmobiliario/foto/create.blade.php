@include('layouts.app')
@include('layouts.alert')
<div class="container">

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                        <h3>Agregue una foto</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('inmobiliario.foto.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="lbl_name">Descripción</label>
                                <input type="text" name="name" id="lbl_name" class="form-control" placeholder="Describa lo que hay en la foto" required>
                            </div>
                            <div class="form-group">
                                <label for="lbl_image">Imagen</label>
                                <input type="file" id="lbl_image" name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Subir</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Galería de fotos</h3>
                </div>
                <div class="card-body">
                    <div class="row" >
                        @if($images->count())
                            @foreach($images as $imagen)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card">
                                        <a class="thumbnail fancybox" rel="lightbox" href="{{url('/thumbnail/'.$imagen->image)}}">
                                            <img class="img-responsive mx-auto d-block" alt="" src="{{ url('/thumbnail/'.$imagen->image)  }}" style="width: 90px; height: 90px;"/>
                                            <div class='card-body text-center'>
                                                <small class='text-muted'>{{ $imagen->name }}</small>
                                            </div> <!-- text-center / end -->
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div> <!-- row / end -->
                </div>
            </div>
        </div>
    </div>




</div>
