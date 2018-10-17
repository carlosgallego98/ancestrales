<li class="dropdown messages-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-truck"></i>
                      <span class="label label-success">{{count($pedidos_proveedor)}}</span>
                    </a>
                    
                    <ul class="dropdown-menu">
                      <li class="header">Tienes <b>{{count($pedidos_proveedor)}}</b> pedido(s).</li>
                      <li>
                        <ul class="menu">
                          <li>
                            @foreach($pedidos_proveedor as $pedido)
<a href="#">
                                        <h4>
                                          <i class="fas fa-cubes"></i>
                                          {{$pedido->material->nombre}}
                                          <small><i class="fa fa-clock-o"></i>{{$pedido->created_at->diffForHumans()}}</small>
                                        </h4>
                                        <p><b>{{$pedido->estado->nombre}}</b></p>
                                      </a>
                            @endforeach
                          </li>
                        </ul>
                      </li>
                      <li class="footer"><a href="#">Ver todos los pedidos</a></li>
                    </ul>
                  </li>