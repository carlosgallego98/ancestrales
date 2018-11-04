  <li class="dropdown messages-menu" id="notificaciones">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-truck"></i>
                        <span class="label label-success">@{{notificaciones.length}}</span>
                      </a>

                      <ul class="dropdown-menu"  style="min-width: 280px;width:auto">
                      <li class="header">Hay <b>@{{notificaciones.length}}</b> nuevas Notificaciones .</li>
                        <li>
                          <ul class="menu">
                            <li v-for="notificacion in notificaciones" :key="notificacion.id">
                                <a :href="notificacion.data.url" target="_blank">
                                        <h4>
                                          <b>@{{ notificacion.data.titulo }}</b><small class="label pull-right bg-green">Nuevo</small>
                                        </h4>
                                        <p>@{{ notificacion.data.texto }}</p>
                                    <p>@{{ formatFecha(notificacion.created_at) }}</p>
                                </a>
                            </li>
                          </ul>
                        </li>
                        <li class="footer">
                          <a href="#" @click.prevent="reacargarNotificaciones">
                            <i class="fa fa-sync"></i> Recargar
                          </a>
                          <a href="#" @click.prevent="marcarLedido">
                            <form method="post">@csrf</form>
                            <i class="fa fa-check"></i> Marcar como Leidos
                          </a>
                        </li>
                      </ul>
                    </li>
@push('scripts')
<script src="{{asset('js/vue.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script>

    var routeNotificaciones = "{{route('user.notificaciones')}}";
    var routeMarcarLeido = "{{url('/notificaciones/marcar-todo')}}";

    var app = new Vue({
    el: '#notificaciones',
    data: {
      notificaciones: [],
    },

    created: function(){
      this.getNotificaciones();
      moment.locale('es')
      setInterval(function () {
        this.getNotificaciones();
      }.bind(this), 30000);
    },

    methods:{
      formatFecha: function(fecha){
          return moment(fecha, 'YYYY-MM-DD h:mm:ss').format('MMMM DD YYYY, h:mm')
      },
      getNotificaciones: function(){
        this.$http.get(routeNotificaciones).then(function(response){
          this.notificaciones = response.data;
        })
      },
      reacargarNotificaciones: function(){
        this.getNotificaciones()
      },
      marcarLedido: function(){
        this.$http.post(routeMarcarLeido).then(function(response){
          this.getNotificaciones()
        })
      },
    }
    })
    Vue.http.headers.common['X-CSRF-TOKEN'] = "{{csrf_token()}}";
</script>
@endpush
