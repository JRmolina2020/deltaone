<?php

$rodo = array(
	'tipo_documento' 	=> "01", 
	'prefijo' 		    => "", 
	'numero' 		    => 1032336,
	'factura_afectada' 	=> 0, 
	'nota' 		        => "37951.00", 
	'metodo_pago' 		=> 1, 
	'valor_bruto' 	    => 31891, 
	'valor_iva' 	    => 6059,
	'valor_ico' 		=> 0,
	'valor_retencion'   => 0, 
	'valor_descuento'   => 0, 
	'valor_neto' 	    => 37951, 
    'planilla' 		    => "", 
    'zona'              =>"ZH323",
    'codigo_empresa'    =>49,
    'extensibles' 	=> array( 
        'planilla' 		=> "P1", 
        'zona' 	        => "Z1", 
        'pedido' 		=> "P11", 
        'recibo_caja' 		  => 200.00,
        'orden' 		      => 1,
        'cantidad_productos'  => 49.00, 
        'peso' 		          => 11, 
        'canastas' 		      => 2,
        'logistica' 		  => "ANDRES", 
        'logistica_numero'    => 300675910, 
        'distribucion' 		  => "CARLOS", 
        'distribucion_numero' => 301207482,
        'asesor' 		      => "MILENA", 
        'asesor_numero' 	  =>300200200, 
    ),
	'Cliente' 	=> array( 
			'codigo' 		=> "10323", 
			'departamento' 	=> "05", 
			'ciudad' 		=> "05001", 
            'codigo_postal' 		=> "000000",
            'tipo_persona' 		=> 1,
			'tipo_regimen' 	=> "49", 
			'telefono' 		=> 630075910, 
            'tipo_identificacion' 		=> 42,
            'documento' 		=> 49776763, 
			'correo' 	=> "sant@gmail.com", 
			'dirección' 		=> "mayales", 
            'razon_social' 		=> "sas",
            'nombre_comercial' 		=> "atrato", 
			'nombres' 	=> "2", 
			'apellidos' 		=> "2", 
            'es_responsable_iva' 		=> True,
            'numero_mercantil' 		=> 6,
            'obligaciones' => array(
            array(
            '0-13'=>'Gran contribuyente',
            '0-15'=>'Autorrenedor',
            '0-23'=>'Agente de retencia de Iva',
            )
            ), 
            'punto_venta' => 'delta', 
			'punto_venta_nombre' 	=> "atrato ", 
			'barrio' 	=> "la granja", 
            'informacion_tributaria' 		=> "01"
			
        ),
        'productos' 	=> array( 
            array(
                'codigo' 		=> "12345", 
                'tipo' 	        => 1, 
                'nombre' 		=> "colgate familia", 
                'cantidad' 		=> 11,
                'valor_unitario_bruto' 		=> 200.00, 
                'valor_unitario_sugerido' 		=> 250.00, 
                'tipo_gravado' 		=> 1, 
                'marca' 		    => "colgate", 
                'valor_referencial' 		=> 200.00, 
                'extensibles' => array(
                array(
                'tipo_embalaje'   => "caja",
                'numero_unidades' => 2,
                )
                ), 
                'impuestos' => array(
                    array(
                    'porcentaje' => 19.0,
                    'tipo' => "01",
                    )
                    ), 
                'descuentos' => array(
                    array(
                    'razon'  => "amigo",
                    'codigo' => 01,
                    'valor'  => 100.00,
                    'porcentaje' => "",
                    )
                    ), 
                )
                ),
                'fecha_documento' 	  => "2020-01-13",
                'fecha_expiracion'    => "2020-01-13",
                'descuentos' => array(
                    array(
                    'razon'  => "amigo",
                    'codigo' => 01,
                    'valor'  => 100.00,
                    'porcentaje' => "",
                    ),
                   ),
                   'anticipos' => array(
                    array(
                    'valor'    => 11,
                    'fecha'    => 12,
                    'descripcion' => 12,
                    )
                    ), 
                'Factura' 	=> array( 
                    array(
                        'moneda' 		=> "$$$", 
                        'intercambio_acordado' 	=> 1, 
                        'subtipo_factura' 		=> "09", 
                    )
                    ),
                'nota_credito' 	=> array( 
                    array(
                        'razon' 	        	=> 4, 
                        'id_felam' 	            => 22, 
                        'factura' 		        => "05001", 
                        'tipo_documento' 		=> "30", 
                        'descripcion_razon' 		=> "holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", 
                    )
                    ),
                'nota_debito' 	=> array( 
                    array(
                        'razon' 		=> 4, 
                        'id_felam'    	=> 22, 
                        'factura' 		=> "05001", 
                        'tipo_documento' 		=> "30", 
                        'descripcion_razon' 		=> "holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    )
                    ),
                'Pagos' 	=> array( 
                    array(
                        'metodo_pago' 	=> 10, 
                        'detalle_pago' 	=> "34", 
                        'valor' 		=> 200.00, 
                        'fecha'         => "2020-01-13",
                        
                    )
                    ),
                 

            );

echo $data_json=json_encode([$rodo]);
$token ="f6cc368f88204f6d38e049cefd8a8eecb6fa752f";
$url="https://fepruebas.amovil.co:8080/api/";
$ruta=$url."integration/upload/";

//curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
$ch, CURLOPT_HTTPHEADER, array(
'Authorization: Token a0c4d50754ab4057abc579a5bd58a53239a33634',
'Content-Type: multipart/form-data',
)
);

curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
//cambio
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$result = curl_exec ($ch);
curl_close($ch);

//echo $result;

//endcurl


?>