<?php
namespace CodeceptionZf2CodeCoverage\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\CallbackHandler;

/**
 * Class C3
 *
 * @package CodeceptionZf2CodeCoverage
 */
class C3 implements ListenerAggregateInterface
{

    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * @return array
     */
    public function getListeners()
    {
        return $this->listeners;
    }

    /**
     * @param CallbackHandler $listeners
     *
     * @return C3
     */
    public function addListener(CallbackHandler $listeners)
    {
        $this->listeners[] = $listeners;

        return $this;
    }

    /**
     * @param int $index
     *
     * @return bool
     */
    public function removeListener($index)
    {
        if (!empty($this->listeners[$index])) {
            unset($this->listeners[$index]);

            return true;
        }

        return false;
    }

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->addListener($events->attach(MvcEvent::EVENT_BOOTSTRAP, array($this, 'codeCoverage')));
    }

    /**
     * @param EventManagerInterface $events
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->getListeners() as $index => $listener) {
            if ($events->detach($listener)) {
                $this->removeListener($index);
            }
        }
    }

    /**
     * @param EventInterface $event
     */
    public function codeCoverage(EventInterface $event)
    {
        if ('development' === getenv('APP_ENV')) {
            include 'vendor/codeception/c3/c3.php';
        }
    }
}
