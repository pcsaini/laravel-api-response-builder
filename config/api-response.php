<?php

return [

    /**
     * default HTTP code for validation failed.
     */
    'validation_http_code' => \Illuminate\Http\Response::HTTP_BAD_REQUEST,

    /**
     * default Validation fail message
     *
     * first | all
     *
     * first => Display the first validation error message
     * all => Display all errors messages
     *
     */
    'show_validation_failed_message'  => 'all',

];
