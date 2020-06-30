$(document).ready(function(){
    
    ClassicEditor
    .create( document.querySelector( '#body' ), {
        // The language code is defined in the https://en.wikipedia.org/wiki/ISO_639-1 standard.
        language: 'es'
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
});

