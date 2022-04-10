<?php

namespace App\Commands;
 

 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
 
class MakeModelCommad extends Command
{
    protected function configure()
    {
        $this->setName('make:model')
            ->setDescription('Create new model')
            // ->setHelp('')
            ->addArgument('name', InputArgument::REQUIRED, 'Pass model name, a singular.');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {   
        
        $name = $input->getArgument('name');

        if(!file_exists(__DIR__.'/../Models/'.ucfirst($name).'.php')){
          
         
          $template = file_get_contents(__DIR__.'/templates/model.stub');
          $template = str_replace('[tablename]',  strtolower($name), $template);
          $template = str_replace('[modelname]',  ucfirst(strtolower($name)), $template);
       
          file_put_contents(__DIR__.'/../Models/'.ucfirst($name).'.php', $template);

          $output->writeln(sprintf('<info>Model %s created successfully</info>', ucfirst(strtolower($name))));

          return Command::SUCCESS;
        }

        $output->writeln(sprintf('<error>Model %s already exists</error>', ucfirst(strtolower($name))));
        return Command::FAILURE;
        
    }
}