<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'detalle_lprecio' )
	->fields(
		Field::inst( 'producto.cbarra' ),
        Field::inst( 'producto.nombre_producto' ),
        Field::inst( 'detalle_lprecio.total' ),
        Field::inst( 'umedida.nombre_umedida' ),
        Field::inst( 'producto.pponderado' ),
        Field::inst( 'producto.precio_ucompra' ),
        Field::inst( 'detalle_lprecio.por_ganancia' )
	)
	->leftJoin( 'producto', 'producto.id_producto', '=', 'detalle_lprecio.id_producto' )
    ->leftJoin( 'umedida', 'producto.id_umedida', '=', 'umedida.id_umedida' )
	->pkey( 'id_detalle_lprecio' )	
	->debug(true)
	->process( $_POST )
	->json();

 