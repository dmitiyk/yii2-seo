<?php
namespace dmitiyk\seo;

use Yii;
use yii\base\Component;

class Seo extends Component
{
	private $seo = null;

	private $metatags = [];

	public function init()
	{
    	parent::init();
	}

	public function addTags($tags = array())
	{
		foreach ($tags as $key => $value) {
			$this->metatags[$key] = $value;
		}
	}

	public function registerFullMetaTags($views)
	{
		if( $this->seo !== null ) {
			if( $this->seo->description ) {
				$this->addTags(['description'=>$this->seo->description]);
			}
			if( $this->seo->keywords ) {
				$this->addTags(['keywords'=>$this->seo->keywords]);
			}
		}

		$tags = '';
		foreach ($this->metatags as $key => $value) {
			$tags .= $views->registerMetaTag([
    			'name' => $key,
    			'content' => $value,
			]);
		}
		return $tags;
	}
}
