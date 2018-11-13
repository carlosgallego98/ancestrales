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
      // EmpresaTransporte::create([
      //   'nombre' => 'Camino Veloz S.A.',
      //   'correo' => 'contacto.transporte@caminoveloz.org',
      //   'numero_teléfono' => '+57 2445894',
      //   'img_empresa' => 'camino_veloz_logo.jpg']);
      //
      // EmpresaTransporte::create(
      //   ['nombre' => 'RapiEntrega.',
      //   'correo' => 'rapientrega.contacto@rapientrega.com',
      //   'numero_teléfono' => '+57 2446873',
      //   'img_empresa' => 'rapi_entrega_logo.jpg']);
      //
      // EmpresaTransporte::create(
      //   ['nombre' => 'Envios Gallego',
      //   'correo' => 'enviosgallego@contactogallego.com',
      //   'numero_teléfono' => '+57 2446398',
      //   'img_empresa' => 'eg_logo.jpg']);

        EmpresaTransporte::create([
          'nombre' => 'Servientrega',
          'direccion' => 'AV. 20 DE NOVIEMBRE NO 1540',
          'correo' => 'contacto.transporte@servientrega.org',
          'numero_teléfono' => '+57 2445894',
          'img_empresa' => '/img/empresas_transporte/servientrega_logo.jpg']);

        EmpresaTransporte::create(
          ['nombre' => 'Envia',
          'direccion' => ' 	CALLE MATAMOROS NO. 127',
          'correo' => 'envia_contacto@enviatrasportes.com',
          'numero_teléfono' => '+57 2446873',
          'img_empresa' => '/img/empresas_transporte/envia_entrega_logo.jpg']);

        EmpresaTransporte::create(
          ['nombre' => 'Deprisa',
          'direccion' => ' 	CAMINO LOMA ALTA NO. 1000',
          'correo' => 'deprisa@contactodeprisa.com',
          'numero_teléfono' => '+57 2446398',
          'img_empresa' => '/img/empresas_transporte/deprisa_logo.jpg']);
    }
}
