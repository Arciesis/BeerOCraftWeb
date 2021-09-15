<?php

namespace Container4D7qsUn;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderbad3e = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer7d514 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesb8ee1 = [
        
    ];

    public function getConnection()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getConnection', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getMetadataFactory', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getExpressionBuilder', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'beginTransaction', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getCache', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getCache();
    }

    public function transactional($func)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'transactional', array('func' => $func), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->transactional($func);
    }

    public function commit()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'commit', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->commit();
    }

    public function rollback()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'rollback', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getClassMetadata', array('className' => $className), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'createQuery', array('dql' => $dql), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'createNamedQuery', array('name' => $name), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'createQueryBuilder', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'flush', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'clear', array('entityName' => $entityName), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->clear($entityName);
    }

    public function close()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'close', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->close();
    }

    public function persist($entity)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'persist', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'remove', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'refresh', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'detach', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'merge', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getRepository', array('entityName' => $entityName), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'contains', array('entity' => $entity), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getEventManager', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getConfiguration', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'isOpen', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getUnitOfWork', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getProxyFactory', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'initializeObject', array('obj' => $obj), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'getFilters', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'isFiltersStateClean', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'hasFilters', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return $this->valueHolderbad3e->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer7d514 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderbad3e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderbad3e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderbad3e->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, '__get', ['name' => $name], $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        if (isset(self::$publicPropertiesb8ee1[$name])) {
            return $this->valueHolderbad3e->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderbad3e;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderbad3e;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderbad3e;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderbad3e;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, '__isset', array('name' => $name), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderbad3e;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderbad3e;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, '__unset', array('name' => $name), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderbad3e;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderbad3e;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, '__clone', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        $this->valueHolderbad3e = clone $this->valueHolderbad3e;
    }

    public function __sleep()
    {
        $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, '__sleep', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;

        return array('valueHolderbad3e');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer7d514 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer7d514;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer7d514 && ($this->initializer7d514->__invoke($valueHolderbad3e, $this, 'initializeProxy', array(), $this->initializer7d514) || 1) && $this->valueHolderbad3e = $valueHolderbad3e;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderbad3e;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderbad3e;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
