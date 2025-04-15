<?php 

/**
*
*/

class Page_clubsocialController extends Page_mainController
{

	public function indexAction()
	{
        $this->_view->clubsocial = $this->template->getContentseccion(6);
	}

}