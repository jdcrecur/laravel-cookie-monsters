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

            $( document ).ready( function(  ){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $( '#login' ).submit( function( e ){
                    e.preventDefault();

                    $.ajax( {
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: $(this).serialize(),
                        success: function( response ){

                            if( response.success ){
                                window.location = '/dashboard';
                            } else {
                                alert('Bad login');
                            }

                        }
                    } );


                } );

            } );

        </script>

    </head>
    <body class="page-body">

        <div class="login-container">

            <div class="row">

                <div class="col-sm-6">

                    <!-- Errors container -->
                    <div class="errors-container"></div>

                    <form action="/auth/login" method="post" role="form" id="login" class="login-form fade-in-effect">

                        <div class="form-group">
                            <input type="text" class="form-control input-dark" name="user_name" id="user_name" autocomplete="off" placeholder=" Email"/>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control input-dark" name="password" id="password" autocomplete="off" placeholder="Password"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark  btn-block text-left">
                                <i class="fa-lock"></i>
                                Login
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </body>
</html>