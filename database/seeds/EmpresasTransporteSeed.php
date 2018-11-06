<?php

use Illuminate\Database\Seeder;
use App\EmpresaTransporte;
class EmpresasTransporteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $empresa = EmpresaTransporte::create([
        'nombre' => 'Camino Veloz S.A.',
        'correo' => 'contacto.transporte@caminoveloz.org',
        'numero_teléfono' => '+57 2445894',
        'img_empresa' => 'camino_veloz_logo.jpg']);

      $empresa = EmpresaTransporte::create(
        ['nombre' => 'RapiEntrega.',
        'correo' => 'rapientrega.contacto@rapientrega.com',
        'numero_teléfono' => '+57 2446873',
        'img_empresa' => 'rapi_entrega_logo.jpg']);

      $empresa = EmpresaTransporte::create(
        ['nombre' => 'Envios Gallego',
        'correo' => 'enviosgallego@contactogallego.com',
        'numero_teléfono' => '+57 2446398',
        'img_empresa' => 'eg_logo.jpg']);
    }
}
