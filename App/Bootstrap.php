<?php

namespace App;

class Bootstrap
{
	public static function Init () {

		$app = \MvcCore\Application::GetInstance();
		
		// patch debug class
		if (class_exists('\MvcCore\Ext\Debugs\Tracy')) {
			//\MvcCore\Ext\Debugs\Tracy::$Editor = 'MSVS2015';
			$app->SetDebugClass('\\MvcCore\\Ext\\Debugs\\Tracy');
		}

		/**
		 * Uncomment this line before generate any assets into temporary directory, before application 
		 * packing/building, only if you want to pack application without JS/CSS/fonts/images inside
		 * result PHP package and you want to have all those files placed on hard drive.
		 * You can use this variant in modes `PHP_PRESERVE_PACKAGE`, `PHP_PRESERVE_HDD` and `PHP_STRICT_HDD`.
		 */
		//\MvcCore\Ext\Views\Helpers\Assets::SetAssetUrlCompletion(FALSE);

		// setup homepage route (optional, everything in '/' is routed to 'Index:Index' by default)
		$app->GetRouter()->SetRoutes([
			'home' => "/"
		]);
	}
}
