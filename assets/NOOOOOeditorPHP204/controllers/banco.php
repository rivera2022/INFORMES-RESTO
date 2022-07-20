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
Editor::inst( $db, 'banco' )
	->fields(
		Field::inst( 'nombre_banco' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'El campo es obligatorio' )	
			) )
	)
	->pkey( 'id_banco' )
	->debug(true)
	->process( $_POST )
	->json();
