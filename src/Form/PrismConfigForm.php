<?php

/**
 * @file
 * Contains Drupal\prism\Form\PrismConfigForm.
 */

namespace Drupal\prism\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PrismConfigForm.
 *
 * @package Drupal\prism\Form
 */
class PrismConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'prism.prismconfig_config'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'prism_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('prism.prismconfig_config');

    $languages = array(
      'markup' => $this->t('Markup'),
      'css' => $this->t('CSS'),
      'clike' => $this->t('C-like'),
      'javascript' => $this->t('JavaScript'),
      'abap' => $this->t('ABAP'),
      'actionscript' => $this->t('ActionScript'),
      'apacheconf' => $this->t('Apache Configuration'),
      'apl' => $this->t('APL'),
      'applescript' => $this->t('AppleScript'),
      'aspnet' => $this->t('ASP.NET (C#)'),
      'autoit' => $this->t('AutoIt'),
      'autohotkey' => $this->t('AutoHotkey'),
      'bash' => $this->t('Bash'),
      'basic' => $this->t('BASIC'),
      'batch' => $this->t('Batch'),
      'bison' => $this->t('Bison'),
      'brainfuck' => $this->t('Brainfuck'),
      'c' => $this->t('C'),
      'csharp' => $this->t('C#'),
      'cpp' => $this->t('C++'),
      'coffeescript' => $this->t('CoffeeScript'),
      'crystal' => $this->t('Crystal'),
      'css-extras' => $this->t('CSS Extras'),
      'd' => $this->t('D'),
      'dart' => $this->t('Dart'),
      'diff' => $this->t('Diff'),
      'docker' => $this->t('Docker'),
      'eiffel' => $this->t('Eiffel'),
      'elixir' => $this->t('Elixir'),
      'erlang' => $this->t('Erlang'),
      'fsharp' => $this->t('F#'),
      'fortran' => $this->t('Fortran'),
      'gherkin' => $this->t('Gherkin'),
      'git' => $this->t('Git'),
      'glsl' => $this->t('GLSL'),
      'go' => $this->t('Go'),
      'groovy' => $this->t('Groovy'),
      'haml' => $this->t('Haml'),
      'handlebars' => $this->t('Handlebars'),
      'haskell' => $this->t('Haskell'),
      'http' => $this->t('HTTP'),
      'inform7' => $this->t('Inform 7 '),
      'ini' => $this->t('Ini'),
      'j' => $this->t('J'),
      'jade' => $this->t('Jade'),
      'java' => $this->t('Java'),
      'julia' => $this->t('Julia'),
      'keyman' => $this->t('Keyman'),
      'latex' => $this->t('LaTeX'),
      'less' => $this->t('Less'),
      'lolcode' => $this->t('LOLCODE'),
      'makefile' => $this->t('Makefile'),
      'markdown' => $this->t('Markdown'),
      'matlab' => $this->t('MATLAB'),
      'mel' => $this->t('MEL'),
      'mizar' => $this->t('Mizar'),
      'monkey' => $this->t('Monkey'),
      'nasm' => $this->t('NASM'),
      'nginx' => $this->t('nginx'),
      'nim' => $this->t('Nim'),
      'nix' => $this->t('Nix'),
      'nsis' => $this->t('NSIS'),
      'objectivec' => $this->t('Objective-C'),
      'ocaml' => $this->t('OCaml'),
      'pascal' => $this->t('Pascal'),
      'perl' => $this->t('Perl'),
      'php' => $this->t('PHP'),
      'php-extras' => $this->t('PHP Extras'),
      'powershell' => $this->t('PowerShell'),
      'processing' => $this->t('Processing'),
      'prolog' => $this->t('Prolog'),
      'pure' => $this->t('Pure'),
      'python' => $this->t('Python'),
      'q' => $this->t('Q'),
      'qore' => $this->t('Qore'),
      'r' => $this->t('R'),
      'jsx' => $this->t('React JSX'),
      'rest' => $this->t('reST (reStructuredText)'),
      'rip' => $this->t('Rip'),
      'ruby' => $this->t('Ruby'),
      'rust' => $this->t('Rust'),
      'sas' => $this->t('SAS'),
      'sass' => $this->t('Sass (Sass)'),
      'scss' => $this->t('Sass (Scss)'),
      'scala' => $this->t('Scala'),
      'scheme' => $this->t('Scheme'),
      'smalltalk' => $this->t('Smalltalk'),
      'smarty' => $this->t('Smarty'),
      'sql' => $this->t('SQL'),
      'stylus' => $this->t('Stylus'),
      'swift' => $this->t('Swift'),
      'tcl' => $this->t('Tcl'),
      'textile' => $this->t('Textile'),
      'twig' => $this->t('Twig'),
      'typescript' => $this->t('TypeScript'),
      'verilog' => $this->t('Verilog'),
      'vhdl' => $this->t('VHDL'),
      'vim' => $this->t('vim'),
      'wiki' => $this->t('Wiki markup'),
      'yaml' => $this->t('YAML'),
    );

    $form['languages'] = array(
      '#type' => 'checkboxes',
      '#title' => $this->t('Languages'),
      '#description' => $this->t('Select the allowed languages'),
      '#options' => $languages,
      '#default_value' => $config->get('languages'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('prism.prismconfig_config')
      ->set('languages', $form_state->getValue('languages'))
      ->save();
  }

}
