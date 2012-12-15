<?php require_once "final-calc-production.php";
// testing code for final calculator dojo

//Sunday

/**addition, subtraction, multiplication, & division
 * 
 * positive and negative as inputs (--,-+,++, +-, 0+, 0-, +0, -0)
 */
 
 // Friday
// testing for one number given, adding class & register, adding $calc-> to all tests to make them pass
if ( assert( class_exists ('Calculator'))) echo ' there is a calculator';
if ( assert( property_exists ('Calculator', 'register'))) echo ' there is a register';
if ( assert( $calc = new Calculator)) echo ' there is a new calculatr';
if ( assert( $calc->register == 0)) echo ' register = 0';

//Sunday
// Testing for addition
if ( assert( $calc->add( 1, 3 ) == 4)) echo ' pass';
if ( assert( $calc->add( 2, -2 ) == 0)) echo ' pass';
if ( assert( $calc->add( -5, 3 ) == -2)) echo ' pass';
if ( assert( $calc->add( 0, 5 ) == 5)) echo ' pass';
if ( assert( $calc->add( 2, 0 ) == 2)) echo ' pass';
if ( assert( $calc->add( -2, -2) == -4)) echo ' pass';

// Monday
// testing for subtraction 
if ( assert( "sub( 1, 3 ) == -2")) echo ' pass';
if ( assert( "sub( 5, 3 ) == 2")) echo ' pass';
if ( assert( "sub( -1, -1) == 0")) echo ' pass';
if ( assert( "sub( -5, -7) == 2")) echo ' pass';
if ( assert( "sub( 0, 5) == -5")) echo ' pass'; 

//Tuesday
// testing for multiplication
if ( assert( "multi( 5, 0) == 0")) echo ' pass';
if ( assert( "multi( 0, 2) == 0")) echo ' pass';
if ( assert( "multi( 2, 2) == 4")) echo ' pass';
if ( assert( "multi( 2, -1) == -2")) echo ' pass';
if ( assert( "multi( -5, -2) == 10")) echo ' pass';

// Wednesday & Thursday
// testing for division
if ( assert( "div( -8, 2) == -4")) echo ' pass';
if ( assert( "div( -4, -2) == 2")) echo ' pass';
if ( assert( "div( 10, -5) == -2")) echo ' pass';


