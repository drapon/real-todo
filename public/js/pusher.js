( function( $, pusher, addItem, removeItem ) {

var itemActionChannel = pusher.subscribe( 'itemAction' );

itemActionChannel.bind( "App\\Events\\ItemCreated", function( data ) {

    addItem( data.id, false );
} );

itemActionChannel.bind( "App\\Events\\ItemUpdated", function( data ) {

    removeItem( data.id );
    addItem( data.id, data.isCompleted );
} );

itemActionChannel.bind( "App\\Events\\ItemDeleted", function( data ) {

    removeItem( data.id );
} );

} )( jQuery, pusher, addItem, removeItem);
