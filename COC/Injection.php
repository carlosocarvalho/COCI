<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 27/05/2015
 * Time: 18:40
 */

namespace COC\COCI;


class Injection {

    /**
     * @var array
     * Registers all keys
     */
    private $regiters = [];
    /**
     * @var array
     * Container off instances
     */
    private $instances =[];
    /**
     * @var array
     * Container factorie of classes instantiabled
     */
    private $factories =[];

    /**
     * @param $key name classe for instantiabled
     * @param callable $resolver  closure
     */
    public function set($key , Callable $resolver){
        $this->regiters[$key] = $resolver;
    }

    /**
     * @param $instance class instantiabled
     */
    public function setInstance($instance){
        $reflection = new \ReflectionClass($instance);
        $this->instances[$reflection->getName()]= $instance;
    }

    /**
     * @param $key nameclasse factory
     * @param callable $resolver  closure function
     */
    public function setFactory($key , Callable $resolver){
        $this->factories[$key] = $resolver;
    }

    /**
     * @param $key nameclasse instantiabled
     * @return mixed instance
     * @throws Exception
     */
    public function get($key){

        if(isset($this->factories[$key]))
            return $this->factories[$key]();

        if(!isset($this->instances[$key])){

            if(isset($this->regiters[$key])){
                $this->instances[$key] = $this->regiters[$key]();
            }else{

                $reflected = new \ReflectionClass($key);
                if($reflected->isInstantiable()){
                    $constructor = $reflected->getConstructor();
                    if($constructor) {
                        $params = $constructor->getParameters();
                        $has_parameters = [];

                        var_dump($params);
                        foreach ($params as $param) {
                            if ($param->getClass()) {
                                $has_parameters[] = $this->get($param->getClass()->getName());
                            } else {
                                $has_parameters[] = $param->getDefaultValue();
                            }
                        }
                        $this->instances[$key] = $reflected->newInstanceArgs($has_parameters);
                    }else{
                        $this->instances[$key] = $reflected->newInstance();
                    }
                }else{
                    throw new Exception($key.' is not instantiabled ');
                }

            }
        }

        return $this->instances[$key];
    }
}