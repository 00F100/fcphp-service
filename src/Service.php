<?php

namespace FcPhp\Service
{
    use FcPhp\Service\Interfaces\IService;
    use FcPhp\Service\Exceptions\RepositoryNotFoundException;

    class Service implements IService
    {
        /**
         * @var array $repositories List of repositories
         */
        private $repositories = [];

        /**
         * @var object $callbackRepository Callback of repository find
         */
        private $callbackRepository;

        /**
         * Method to configure repository
         *
         * @param string $repository Name of repository
         * @param mixed $instance Instance of repository
         * @return void
         */
        public function setRepository(string $repository, $instance) :void
        {
            $this->repositories[$repository] = $instance;
        }

        /**
         * Method to return repository
         *
         * @param string $repository Name of repository
         * @throws FcPhp\Service\Exceptions\RepositoryNotFoundException
         * @return mixed
         */
        public function getRepository(string $repository)
        {
            if($this->hasRepository($repository)) {
                $repositoryInstance = $this->repositories[$repository];
                $this->callbackRepository($repository, $repositoryInstance);
                return $repositoryInstance;
            }
            throw new RepositoryNotFoundException();
        }

        /**
         * Method to verify repository exists
         *
         * @param string $repository Name of repository
         * @return bool
         */
        public function hasRepository(string $repository) :bool
        {
            return array_key_exists($repository, $this->repositories);
        }

        /**
         * Method to configure callback
         *
         * @param string $name Name of callback
         * @param object $callback Callback to execute
         * @return void
         */
        public function callback(string $name, object $callback) :void
        {
            if(property_exists($this, $name)) {
                $this->{$name} = $callback;
            }
        }

        /**
         * Method to configure callback
         *
         * @param string $repository Name of repository
         * @param mixed $instance Instance of repository
         * @return void
         */
        public function callbackRepository(string $repository, $instance) :void
        {
            $callbackRepository = $this->callbackRepository;
            if(is_object($callbackRepository)) {
                $callbackRepository($repository, $instance);
            }
        }
    }
}
