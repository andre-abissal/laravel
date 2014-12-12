<?php

class UsuarioController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * Show the user profile.
     */
    public function showProfile()
    {
        $this->layout->content = View::make('usuario.profile');
    }

    /**
     * Retornando um json
     */
    public function testeJson()
    {
        return Response::json(array('name' => 'Steve', 'state' => 'CA'));
    }

}
