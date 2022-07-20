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
Editor::inst( $db, 'producto' )
	->fields(
		Field::inst( 'producto.cbarra' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Este campo es obligatorio' )
			) ),
		Field::inst( 'producto.nombre_producto' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Este campo es obligatorio' )
			) ),
		Field::inst( 'marca.id_marca' )
				->options( Options::inst()
					->table( 'marca' )
					->value( 'id_marca' )
					->label( 'nombre_marca' )
				)
				->validator( Validate::dbValues() ),
		Field::inst( 'marca.nombre_marca' ),
		Field::inst( 'impuesto.id_impuesto' )
			->options( Options::inst()
				->table( 'impuesto' )
				->value( 'id_impuesto' )
				->label( 'nombre_impuesto' )
			)
			->validator( Validate::dbValues() ),
		Field::inst( 'impuesto.nombre_impuesto' ),

		Field::inst( 'ila.id_impuesto' )
		->options( Options::inst()
			->table( 'impuesto' )
			->value( 'id_impuesto' )
			->label( 'nombre_impuesto' )
		)
		->validator( Validate::dbValues() ),
		Field::inst( 'ila.nombre_impuesto' ),

		Field::inst( 'familia.id_familia' )
		->options( Options::inst()
			->table( 'familia' )
			->value( 'id_familia' )
			->label( 'nombre_familia' )
		)
		->validator( Validate::dbValues() ),
		Field::inst( 'familia.nombre_familia' ),

		Field::inst( 'umedida.id_umedida' )
		->options( Options::inst()
			->table( 'umedida' )
			->value( 'id_umedida' )
			->label( 'nombre_umedida' )
		)
		->validator( Validate::dbValues() ),
		Field::inst( 'umedida.nombre_umedida' ),
		Field::inst( 'producto.vigente' )
            ->setFormatter( function ( $val, $data, $opts ) {
                return ! $val ? 0 : 1;
            } )
			,
		Field::inst( 'producto.venta_publico' )
				->setFormatter( function ( $val, $data, $opts ) {
					return ! $val ? 0 : 1;
				} ),
		Field::inst( 'producto.es_pesable' )
				->setFormatter( function ( $val, $data, $opts ) {
					return ! $val ? 0 : 1;
				} ),
		Field::inst( 'producto.permite_porcion' )
						->setFormatter( function ( $val, $data, $opts ) {
							return ! $val ? 0 : 1;
						} ),
		Field::inst( 'producto.calcular_gramos_venta' )
						->setFormatter( function ( $val, $data, $opts ) {
							return ! $val ? 0 : 1;
						} )
		
	)
	->leftJoin( 'umedida', 'umedida.id_umedida', '=', 'producto.id_umedida' )
	->leftJoin( 'familia', 'familia.id_familia', '=', 'producto.id_marca' )
	->leftJoin( 'marca', 'marca.id_marca', '=', 'producto.id_marca' )
	->leftJoin( 'impuesto', 'impuesto.id_impuesto', '=', 'producto.impto_iva' )
	->leftJoin( 'impuesto as ila', 'ila.id_impuesto', '=', 'producto.impto_ila' )
	->pkey( 'id_producto' )	
	->debug(true)
	->process( $_POST )
	->json();

 