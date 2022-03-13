<?php

class SkinDogFoot extends SkinTemplate
{
  var $skinname = 'dogfoot';
  var $stylename = 'DogFoot';
  var $template = 'DogFootTemplate';

  public function initPage(OutputPage $out)
  {
    parent::initPage($out);
    $out->addModules('skins.dogfoot.js');
    $out->addModuleStyles(
      array(
        'mediawiki.skinning.interface',
        'skins.dogfoot'
      )
    );
  }
}
