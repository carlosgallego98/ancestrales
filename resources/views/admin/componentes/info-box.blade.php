    @if (@$t == 1)
    <div class="col-sm-6 col-md-{{@$tamaño ? $tamaño : '3'}} {{@$class}}">
      <div class="small-box bg-{{$color}}">
              <div class="inner">
                <h3>{{$numero}}</h3>
                <p>{{$titulo}}</p>
              </div>
              <div class="icon">
                <i class="fa fa-{{$icono}}"></i>
              </div>
              <a href="{{@$detalles}}" class="small-box-footer">
                Ver más <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
    </div>
    @else
    <div class="col-sm-6 col-md-{{@$tamaño ? $tamaño : '3'}} {{@$class}}">
    <div class="info-box">
        <span class="info-box-icon bg-{{$color}}"><i class="fa fa-{{$icono}}"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{$titulo}}</span>
          <span class="info-box-number">{{$numero}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    @endif
