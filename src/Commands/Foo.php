<?php

namespace DrupalCodeGenerator\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use DrupalCodeGenerator\Commands\BaseGenerator;

/**
 * Implements foo command.
 */
class Foo extends BaseGenerator {

  protected $name = 'foo';
  protected $description = 'Generates foo';

  /**
   * {@inheritdoc}
   */
  protected function interact(InputInterface $input, OutputInterface $output) {
    
    $questions = [
      'name' => ['Foo name', [$this, 'defaultName']],
      'machine_name' => ['Foo machine name', [$this, 'defaultMachineName']],
      'description' => ['Foo description', 'This is foo'],
    ];
    
    $vars = $this->collectVars($input, $output, $questions);

    $this->files['Foo.php'] = $this->render('foo.twig', $vars);
  }

}
