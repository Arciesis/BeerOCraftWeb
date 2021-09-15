<?php

namespace ContainerGiD2ZmB;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderfe692 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializere2c8c = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties6fd8e = [
        
    ];

    public function getConnection()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getConnection', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getMetadataFactory', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getExpressionBuilder', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'beginTransaction', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->beginTransaction();
    }

    public function getCache()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getCache', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getCache();
    }

    public function transactional($func)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'transactional', array('func' => $func), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->transactional($func);
    }

    public function commit()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'commit', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->commit();
    }

    public function rollback()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'rollback', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getClassMetadata', array('className' => $className), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'createQuery', array('dql' => $dql), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'createNamedQuery', array('name' => $name), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'createQueryBuilder', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'flush', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'clear', array('entityName' => $entityName), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->clear($entityName);
    }

    public function close()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'close', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->close();
    }

    public function persist($entity)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'persist', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'remove', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'refresh', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'detach', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'merge', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getRepository', array('entityName' => $entityName), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'contains', array('entity' => $entity), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getEventManager', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getConfiguration', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'isOpen', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getUnitOfWork', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getProxyFactory', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'initializeObject', array('obj' => $obj), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'getFilters', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'isFiltersStateClean', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'hasFilters', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return $this->valueHolderfe692->hasFilters();
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

        $instance->initializere2c8c = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderfe692) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderfe692 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderfe692->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, '__get', ['name' => $name], $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        if (isset(self::$publicProperties6fd8e[$name])) {
            return $this->valueHolderfe692->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfe692;

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

        $targetObject = $this->valueHolderfe692;
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
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, '__set', array('name' => $name, 'value' => $value), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfe692;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderfe692;
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
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, '__isset', array('name' => $name), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfe692;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderfe692;
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
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, '__unset', array('name' => $name), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfe692;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderfe692;
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
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, '__clone', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        $this->valueHolderfe692 = clone $this->valueHolderfe692;
    }

    public function __sleep()
    {
        $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, '__sleep', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;

        return array('valueHolderfe692');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializere2c8c = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializere2c8c;
    }

    public function initializeProxy() : bool
    {
        return $this->initializere2c8c && ($this->initializere2c8c->__invoke($valueHolderfe692, $this, 'initializeProxy', array(), $this->initializere2c8c) || 1) && $this->valueHolderfe692 = $valueHolderfe692;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderfe692;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderfe692;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
