@include('layouts.app')

    <style type="text/css">
        .gallery
        {
            display: inline-block;

            margin-top: 20px;
        }
        .close-icon{
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: -10px;
            padding: 5px 8px;
        }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Subir Fotos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('inmobiliario/foto') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Error</strong> Revise los datos<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div>
                            <div class="col-md-12">
                                <label>Descripcion:</label>
                                <input type="text" name="descripcion" class="form-control" placeholder="¿Qué contiene la foto?" required>
                            </div>
                            <div class="col-md-12">
                                <label>Imagen:</label>
                                <input type="file" name="url" class="form-control" required>
                                <small></small>
                            </div>
                            <div class="col-md-12">
                                <br/>
                                <button type="submit" class="btn btn-info">Subir</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Galería de fotos</h3></div>
                <div class="card-body">
                    <div class="row" >
                        @if($images->count())
                            @foreach($images as $image)
                                <div class="col-lg-3 col-md-4">
                                    <div class="card">
                                        <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->url }}">
                                            <img class="img-responsive mx-auto d-block" alt="" src="/images/{{ $image->url }}" style="width: 128px; height: 128px;"/>
                                            <div class='card-body text-center'>
                                                <small class='text-muted'>{{ $image->descripcion }}</small>
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

<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "",
            closeEffect: ""
        });
    });
</script>
