<?php

/**
 * fdPagePlugin configuration.
 * 
 * @package     fdPagePlugin
 * @subpackage  config
 * @author      4DROPS Solutions Kft. <4drops@4drops.hu>
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class sfTwitterBootstrapPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $defaultFormFormatter = sfTwitterBootstrap::getProperty('default_form_formatter');

    if (null !== $defaultFormFormatter)
    {
      sfWidgetFormSchema::setDefaultFormFormatterName($defaultFormFormatter);
    }
  }
}
