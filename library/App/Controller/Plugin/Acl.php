<?php

class App_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
    
{

   
    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $paginasPublicas = array(
            'usuario/login',
            'usuario/autenticar',
            'usuario/carregar-municipio',
            'usuario/alterar',
            'usuario/formulario',
            'usuario/logout',
            'error/error',
                       
        );
        
        $paginasAdministrador = array(
            'usuario/index',
            'usuario/formulario',
            'usuario/gravar',
            'usuario/excluir',
            'usuario/carregar-municipio',
            'usuario/alterar',
            
            'perfil/index',
            'perfil/formulario',
            'perfil/gravar',
            'perfil/excluir',
            
        );
    
        
        $paginasCliente = array(
            'perfil/index',
            'usuario/carregar-municipio',
            'usuario/alterar',
            'perfil/alterar',
            'usuario/formulario',
            
        );
        
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        
        $url = $controller .'/'. $action;
        
        if(in_array($url, $paginasPublicas)){
            return true;
          
        }
        
        // o perfil 16 foi localizado no banco de dados
        if(!empty($_SESSION['id_usuario'])){
           if($_SESSION['id_perfil'] == 1 && in_array($url, $paginasAdministrador)) {
            return true;
           }
           if($_SESSION['id_perfil'] == 2 && in_array($url, $paginasCliente)) {
            return true;
           }
          
        }
      
        $request->SetControllerName('usuario');
        $request->SetActionName('login');
        
      }
        

        
}
       
