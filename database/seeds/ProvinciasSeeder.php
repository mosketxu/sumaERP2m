<?php

use Illuminate\Database\Seeder;


class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->delete();

        DB::table('provincias')->insert([
        ['id'=>'01','name'=>'ALABA','created_at'=>new  DateTime,'updated_at'=>new DateTime],
        ['id'=>'02','name'=>'ALBACETE','created_at'=> new DateTime,'updated_at'=>new DateTime],
        ['id'=>'03','name'=>'ALICANTE','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'04','name'=>'ALMERÍA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'05','name'=>'ÁVILA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'06','name'=>'BADAJOZ','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'07','name'=>'BALEARES','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'08','name'=>'BARCELONA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'09','name'=>'BURGOS', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'10','name'=>'CÁCERES','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'11','name'=>'CÁDIZ','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'12','name'=>'CASTELLÓN','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'13','name'=>'C.REAL', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'14','name'=>'CÓRDOBA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'15','name'=>'A CORUÑA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'16','name'=>'CUENCA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'17','name'=>'GIRONA', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'18','name'=>'GRANADA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'19','name'=>'GUADALAJARA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'20','name'=>'GUIPÚZCOA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'21','name'=>'HUELVA', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'22','name'=>'HUESCA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'23','name'=>'JAÉN','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'24','name'=>'LEÓN', 'created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'25','name'=>'LLEIDA', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'26','name'=>'LA RIOJA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'27','name'=>'LUGO','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'28','name'=>'MADRID','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'29','name'=>'MÁLAGA', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'30','name'=>'MURCIA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'31','name'=>'NAVARRA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'32','name'=>'ORENSE','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'33','name'=>'ASTURIAS','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'34','name'=>'PALENCIA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'35','name'=>'CANARIAS','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'36','name'=>'PONTEVEDRA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'37','name'=>'SALAMANCA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'38','name'=>'TENERIFE','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'39','name'=>'SANTANDER','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'40','name'=>'SEGOVIA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'41','name'=>'SEVILLA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'42','name'=>'SORIA', 'created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'43','name'=>'TARRAGONA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'44','name'=>'TERUEL','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'45','name'=>'TOLEDO', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'46','name'=>'VALENCIA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'47','name'=>'VALLADOLID','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'48','name'=>'VIZCAYA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'49','name'=>'ZAMORA', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'50','name'=>'ZARAGOZA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'51','name'=>'CEUTA', 'created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ['id'=>'52','name'=>'MELILLA','created_at'=> new DateTime,'updated_at'=> new DateTime],
        ['id'=>'57','name'=>'ANDORRA','created_at'=> new  DateTime,'updated_at'=> new  DateTime],
        ]);
    }
}

