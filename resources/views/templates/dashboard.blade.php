<!DOCTYPE html>
<html lang="en" ng-app="xenon-app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="BMW Notification Calendar" />
        <meta name="author" content="Acrontum GmbH" />
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"
                integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
                crossorigin="anonymous"></script>

        <script>

            var localStorageKeys = [
                'tsdg',
                'sfydfjy',
                'shtdfjy',
                'deviceTysdht'
            ];

            var self = {

                /**
                 * Get a single value
                 * @param key
                 * @returns {boolean}
                 */
                get: function( key ){
                    if( localStorageKeys.indexOf( key ) !== -1 ) {
                        return JSON.parse( window.localStorage.getItem( key ) );
                    }
                    else return false;
                },

                /**
                 * Set a single value
                 * @param key
                 * @param value
                 * @returns {boolean}
                 */
                set: function( key, value ){
                    if( localStorageKeys.indexOf( key ) !== -1 ) {
                        self.remove( key );
                        window.localStorage.setItem( key, JSON.stringify( value ));
                        return true;
                    }
                    return false
                },

                /**
                 * Remove a single key value pair
                 * @param key
                 * @returns {boolean}
                 */
                remove: function( key ){
                    if( localStorageKeys.indexOf( key ) !== -1 ) {
                        window.localStorage.removeItem( key );
                        return true;
                    }
                    return false
                },

                /**
                 * Remove all local storage
                 * @param cb
                 * @returns {*}
                 */
                removeAll: function( cb ){
                    for( var i=0;i<localStorageKeys.length;++i ){
                        self.remove( localStorageKeys[i] );
                    }
                    if( cb ) return cb();
                    else return true;
                }

            };

            $( document ).ready( function(  ){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $( '#logout' ).click( function( e ){

                    self.removeAll( function(){
                        $.get('/auth/logout', function(){
                            window.location = '/';
                        });
                    } );
                } );

                $('#testapi').click( function(){
                    $.post('/api/get/something', {
                        email:'bob@google.com'
                    }, function(){
                        window.location = '/';
                    });
                } );

                for( var key in localStorageKeys ){
                    self.set( localStorageKeys[key], {321:654,'g67hyt':[1,2,5,4,8,7,5,95,3,6,5,1,2,5,8,5,2,2,1]} );
                }

            } );

        </script>

    </head>
    <body class="page-body">

        logged in.
        <br/><br/>
        <span id="logout">LOGOUT</span>
        <br/><br/>
        <span id="testapi">test api call</span>
    </body>
</html>