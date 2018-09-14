<?php

namespace App\Controllers;

class Base extends \MvcCore\Controller
{
	public function PreDispatch () {
		parent::PreDispatch();
		if (!$this->ajax) {

			\MvcCore\Ext\Views\Helpers\Assets::SetGlobalOptions([
				'cssMinify'		=> 1,
				'cssJoin'		=> 1,
				'jsMinify'		=> 1,
				'jsJoin'		=> 1,
			]);

			$static = self::$staticPath;
			$this->view->Css('fixedHead')
				->Append($static . '/css/old-browsers-warning.css')
				->AppendRendered($static . '/css/all.css');
			$this->view->Js('fixedHead')
				->Append($static . '/js/libs/class.min.js')
				->Append($static . '/js/libs/ajax.min.js')
				->Append($static . '/js/libs/Module.js');
			$this->view->Js('varFoot')
				->Append($static . '/js/Front.js');

		}
	}
}
