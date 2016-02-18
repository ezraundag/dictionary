<?php
    
$filename = './words.txt';
if( !file_exists( $filename ) ) { //checks if source file exists
    exit( "$filename does not exist" );
}
$handle = @fopen( $filename, "r" ) //open file
        or exit( "unable to open file ($filename)" ); //outputs a message on error
$uniques = @fopen( "./uniques.txt", "w" ) 
        or exit( "unable to open file uniques.txt" );
$fullwords = @fopen( "./fullwords.txt", "w" ) 
        or exit( "unable to open file fullwords.txt" ); 

$assoc = array();
while( !feof( $handle ) ){ //checks if pointer is not yet at end of file
    $line = fgets( $handle ); //gets line from file pointer
    $str = preg_replace( "/[^a-zA-Z]/", '', $line ); //strips out non-alphabetic characters
    $str_length = strlen( $str );
    if( $str_length >= 4 ) { //processes alphabetic strings with 4 or more letters
        for( $i = 0; $i <= $str_length - 4; $i++ ){
            $key = strtolower( substr( $str, $i, 4  ) ); //makes case-insensitive keys to prevent duplicates
            if( !isset( $assoc[ $key ] ) ) {
                $assoc[ $key ] = array(); 
            }
            $assoc[ $key ][] = $line; //stores original word in unique-word indexed array
        }
    }
    
}
ksort($assoc); //alphabetizes by array key
foreach( $assoc as $key => $lines ){
    if( count( $lines ) == 1 ) { //checks if unique word occurs in only one original word
        fwrite( $uniques, "$key\n" );
        fwrite( $fullwords, $lines[0] ); //get first element, write source word    
    }

} 

fclose( $uniques ); //closes pointer
fclose( $fullwords );
fclose( $handle );  
