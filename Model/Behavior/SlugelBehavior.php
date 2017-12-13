<?php

/**
 * Slugel behavior
 *
 * Create slug from field
 *
 *
 * Copyright 2017, Helder Burato Berto
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2017, Helder Burato Berto
 * @package       slugel
 * @subpackage    slugel.models.behaviors
 * @link          http://github.com/helderburato/slugel
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class SlugelBehavior extends ModelBehavior {

  public $defaultSettings = array(
    'field' => 'name',
    'slug' => 'slug'
  );

  private $field;
  private $slug;

  public function setup(Model $Model, $settings = array()) {
    if (!isset($this->settings[$Model->alias])) {
      $this->settings[$Model->alias] = $this->defaultSettings;
    }
    $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (array)$settings);

    $this->setField($this->settings[$Model->alias]['field']);
    $this->setSlug($this->settings[$Model->alias]['slug']);
  }
  
  public function setField($field) {
    $this->field = $field;
  }

  public function setSlug($slug) {
    $this->slug = $slug;
  }

  public function getField() {
    return $this->field;
  }

  public function getSlug() {
    return $this->slug;
  }

  public function afterFind(Model $Model, $results, $primary = false) {
    $field = self::getField();
    $slug = self::getSlug();

    foreach ($results as $key => $result) {
      $text = self::createSlug($result[$Model->alias][$field], $result[$Model->alias][$Model->primaryKey]);

      $result[$Model->alias][$slug] = $text;
      $results[$key] = $result;
    }
    return $results;
  }

  public function createSlug($text = null, $id) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
  
    if (empty($text)) {
      return 'n-a';
    }
    return $text.'-'.$id;
  }

}