<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSecurityEntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('social_security_entities')->delete();

        DB::table('social_security_entities')->insert([
            [
                'type' => 'EPS',
                'code' => 'EAS016',
                'nit' => '890904996-1',
                'name' => 'Empresas Públicas de Medellín Departamento Médico'
            ],
            [
                'type' => 'EPS',
                'code' => 'EAS027',
                'nit' => '800112806-2',
                'name' => 'Fondo de Pasivo Social de Ferrocarriles'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS001',
                'nit' => '830113831-0',
                'name' => 'Aliansalud EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS002',
                'nit' => '800130907-4',
                'name' => 'Salud Total S.A.'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS003',
                'nit' => '800140949-6',
                'name' => 'Cafesalud EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS005',
                'nit' => '800251440-6',
                'name' => 'E.P.S Sanitas'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS008',
                'nit' => '860066942-7',
                'name' => 'Compensar Entidad Promotora de Salud'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS010',
                'nit' => '800088702-2',
                'name' => 'EPS Sura'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS012',
                'nit' => '890303093-5',
                'name' => 'Comfenalco Valle EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS016',
                'nit' => '805000427-1',
                'name' => 'Coomeva EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS017',
                'nit' => '830003564-7',
                'name' => 'Famisanar'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS018',
                'nit' => '805001157-2',
                'name' => 'Servicio Occidental de Salud S.O.S. S.A.'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS023',
                'nit' => '830009783-0',
                'name' => 'Cruz Blanca S.A'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS033',
                'nit' => '830074184-5',
                'name' => 'Saludvida S.A EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS037',
                'nit' => '900156264-2',
                'name' => 'Nueva EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'MIN001',
                'nit' => '900462447-5',
                'name' => 'Fondo de Solidaridad y Garantía Fosyga'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES005',
                'nit' => '890102257-3',
                'name' => 'Universidad del Atlántico'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES006',
                'nit' => '890203183-0',
                'name' => 'Universidad Industrial de Santander'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES007',
                'nit' => '890399010-6',
                'name' => 'Universidad del Valle'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES008',
                'nit' => '899999063-3',
                'name' => 'Universidad Nacional de Colombia'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES009',
                'nit' => '891500319-2',
                'name' => 'Universidad del Cauca',
            ],
            [
                'type' => 'EPS',
                'code' => 'RES011',
                'nit' => '890980040-8',
                'name' => 'Universidad de Antioquia'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES012',
                'nit' => '891080031-3',
                'name' => 'Universidad de Córdoba'
            ],
            [
                'type' => 'EPS',
                'code' => 'RES014',
                'nit' => '891800330-1',
                'name' => 'Universidad Pedagógica y Tecnológica de Colombia - UPTC'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSC03',
                'nit' => '8001409496',
                'name' => 'Cafesalud Entidad  Promotora de Salud S.A'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSC22',
                'nit' => '899999107',
                'name' => 'Entidad Administradora de Régimen Subsidiado Convida'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSC25',
                'nit' => '891856000',
                'name' => 'Capresoca EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSC34',
                'nit' => '900298372',
                'name' => 'Capital Salud EPSS S.A.S.'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSIC1',
                'nit' => '824001398',
                'name' => 'Asociación de Cabildos Indígenas del Cesar "Dusakawi"'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSIC2',
                'nit' => '812002376',
                'name' => 'Asociación de Cabildos Indígenas del Resguardo Indígena Zenó de San Andrés de Sotavento Córdoba - Sucre "Manexka"'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSIC3',
                'nit' => '817001773',
                'name' => 'Asociación Indígena del Cauca - A.I.C.'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSIC4',
                'nit' => '839000495',
                'name' => 'Entidad Promotora de Salud Anas Wayuu EPSI'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSIC5',
                'nit' => '837000084',
                'name' => 'Entidad Promotora de Salud Mallamas EPSI'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPSIC6',
                'nit' => '809008362',
                'name' => 'Entidad Promotora de Salud Pijaosalud EPSI'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC02',
                'nit' => '811004055',
                'name' => 'Empresa Mutual para el desarrollo integral de la salud E.S.S. Emdisalud ESS'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC07',
                'nit' => '806008394',
                'name' => 'Asociación Mutual Ser Empresa Solidaría de Salud ESS'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC18',
                'nit' => '814000337',
                'name' => 'Asociación Mutual Empresa Solidaria de Salud de Nariño E.S.S. Emssanar E.S.S.'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC24',
                'nit' => '800249241',
                'name' => 'Cooperativa de Salud y Desarrollo Integral de la Zona Sur Oriental de Cartagena  b aLtda.  Coosalud E.S.S.'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC33',
                'nit' => '804002105',
                'name' => 'Cooperativa de Salud Comunitaria "Comparta"'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC62',
                'nit' => '817000248',
                'name' => 'Asociación Mutual La Esperanza Asmet Salud'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC76',
                'nit' => '818000140',
                'name' => 'Asociación Mutual Barrios Unidos de Quibdó E.S.S. AMBUQ'
            ],
            [
                'type' => 'EPS',
                'code' => 'ESSC91',
                'nit' => '832000760',
                'name' => 'Entidad Cooperativa Solidaria de Salud Ecoopsos'
            ],
            [
                'type' => 'EPS',
                'code' => 'EPS 040',
                'nit' => '900604350',
                'name' => 'Caja de Compensación Familiar de Antioquía - Comfama - Hoy Savia Salud EPS'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC09',
                'nit' => '891800213',
                'name' => 'Comfaboy EPS-CCF de Boyacá'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC15',
                'nit' => '891080005',
                'name' => 'Comfacor EPS - CCF de Córdoba'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC20',
                'nit' => '891600091',
                'name' => 'Comfachoco - CCF del Chocó'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC23',
                'nit' => '892115006',
                'name' => 'Caja de Compensación Familiar de La Guajira'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC24',
                'nit' => '891180008',
                'name' => 'Comfamiliar Huila EPS - CCF'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC27',
                'nit' => '891280008',
                'name' => 'Comfamiliar de Nariño EPS - CCF'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC33',
                'nit' => '892200015',
                'name' => 'Comfasucre EPS-CCF de Sucre'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC53',
                'nit' => '860045904',
                'name' => 'Comfacundi - CCF de Cundinamarca'
            ],
            [
                'type' => 'EPS',
                'code' => 'CCFC55',
                'nit' => '890102044',
                'name' => 'Cajacopi Atlántico - CCF'
            ],
            [
                'type' => 'ARL',
                'code' => '14-4',
                'nit' => '860002183-9',
                'name' => 'A.R.L. Seguros de Vida Colpatria S.A.'
            ],
            [
                'type' => 'ARL',
                'code' => '14-7',
                'nit' => '860002503-2',
                'name' => 'Compañía de Seguros Bolívar S.A.'
            ],
            [
                'type' => 'ARL',
                'code' => '14-8',
                'nit' => '860022137-5',
                'name' => 'Seguros de Vida Aurora'
            ],
            [
                'type' => 'ARL',
                'code' => '14-17',
                'nit' => '860503617-3',
                'name' => 'ARP Alfa'
            ],
            [
                'type' => 'ARL',
                'code' => '14-18',
                'nit' => '860008645-7',
                'name' => 'Liberty Seguros de Vida S.A.'
            ],
            [
                'type' => 'ARL',
                'code' => '14-23',
                'nit' => '860011153-6',
                'name' => 'Positiva Compañía de Seguros'
            ],
            [
                'type' => 'ARL',
                'code' => '14-25',
                'nit' => '800226175-3',
                'name' => 'Colmena Riesgos Profesionales'
            ],
            [
                'type' => 'ARL',
                'code' => '14-28',
                'nit' => '800256161-9',
                'name' => 'ARL Sura'
            ],
            [
                'type' => 'ARL',
                'code' => '14-29',
                'nit' => '830008686-1',
                'name' => 'La Equidad Seguros de Vida'
            ],
            [
                'type' => 'ARL',
                'code' => '14-30',
                'nit' => '830054904-6',
                'name' => 'Mapfre Colombia Vida Seguros S.A'
            ],
        ]);

        if(env('DB_CONNECTION') == 'sqlsrv') {
            DB::unprepared ('SET IDENTITY_INSERT social_security_entities OFF');
        }

        Model::reguard();
    }
}
