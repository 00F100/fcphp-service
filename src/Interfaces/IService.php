<?php

namespace FcPhp\Service\Interfaces
{
    interface IService
    {
        /**
         * Method to configure repository
         *
         * @param string $repository Name of repository
         * @param mixed $instance Instance of repository
         * @return void
         */
        public function setRepository(string $repository, $instance) :void;
        
        /**
         * Method to return repository
         *
         * @param string $repository Name of repository
         * @throws FcPhp\Service\Exceptions\RepositoryNotFoundException
         * @return mixed
         */
        public function getRepository(string $repository);

        /**
         * Method to verify repository exists
         *
         * @param string $repository Name of repository
         * @return bool
         */
        public function hasRepository(string $repository) :bool;

        /**
         * Method to configure callback
         *
         * @param string $name Name of callback
         * @param object $callback Callback to execute
         * @return void
         */
        public function callback(string $name, object $callback) :void;

        /**
         * Method to configure callback
         *
         * @param string $repository Name of repository
         * @param mixed $instance Instance of repository
         * @return void
         */
        public function callbackRepository(string $repository, $instance) :void;
    }
}
