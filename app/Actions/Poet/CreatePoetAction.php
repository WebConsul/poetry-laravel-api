<?php

namespace App\Actions\Poet;

use MediawikiSdkPhp\MediaWiki;

class CreatePoetAction
{
    public function __construct(
        private string $lang,
        private string $full_name,
    )
    {
    }


    // todo: возможно я не верно установил пакет (composer require ekut/mediawiki-sdk-php)
    //  или я не очень понял как его использовать, т.к. получаю такой результат
    //  https://drive.google.com/file/d/1L9k_l1dasT9zDEN3EWFhHCkznMWpKStH/view?usp=sharing
    public function execute()
    {
        $wiki = new MediaWiki($this->lang);
        $params = ['title'=> $this->full_name];
        $res = $wiki->page()->get($params);
        dd($res);
    }
}
