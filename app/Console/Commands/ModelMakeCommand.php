<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends Command
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\Models";
    }

    /**
     * Build the class with the given name.
     *
     * @param  string $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        return $this
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('pivot') || $this->option('default')) {
            return parent::getStub();
        }
        return __DIR__ . '/stubs/model.stub';
    }

    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a migration, factory, and resource controller for the model'],

            ['controller', 'c', InputOption::VALUE_NONE, 'Create a new controller for the model'],

            ['factory', 'f', InputOption::VALUE_NONE, 'Create a new factory for the model'],

            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],

            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model'],

            ['pivot', 'p', InputOption::VALUE_NONE, 'Indicates if the generated model should be a custom intermediate table model'],

            ['resource', 'r', InputOption::VALUE_NONE, 'Indicates if the generated controller should be a resource controller'],

            ['default', 'd', InputOption::VALUE_NONE, 'Indicates if the generated model without trait Uuid'],
        ];
    }
}
