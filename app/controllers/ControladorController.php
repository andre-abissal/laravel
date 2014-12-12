<?php

class ControladorController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * laravel.dev/controlador
     */
    public function getIndex()
    {
        return 'Ação do index';
    }

    /**
     * laravel.dev/controlador/json
     */
    public function getJson()
    {
        return Response::json(array('name' => 'Steve', 'state' => 'CA'));
    }
    /**
     * laravel.dev/controlador/show-profile
     */
    public function getShowProfile()
    {
        return 'Exibir perfil';
    }
    
    public function missingMethod($parameters = array())
    {
        
        return 'Método não encontrado';
    }

}
