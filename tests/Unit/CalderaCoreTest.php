<?php
namespace calderawp\caldera\Core\Tests\Unit;
use calderawp\caldera\DataSource\CalderaDataSource;
use calderawp\caldera\DataSource\Contracts\CalderaDataSourceContract;
use calderawp\interop\Contracts\CalderaModule;
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\Core\CalderaCore;
use calderawp\caldera\Events\Contracts\CalderaEventsContract;
use calderawp\caldera\Forms\Contracts\CalderaFormsContract;
use calderawp\caldera\restApi\Contracts\CalderaRestApiContract;

class CalderaCoreTest extends TestCase
{
    /**
     * @covers \calderawp\caldera\core\CalderaCore::addModule()
     * @covers \calderawp\caldera\core\CalderaCore::getModule()
     */
    public function testAddModule()
    {
        $module = \Mockery::mock('HiRoy', CalderaModule::class);
        $module->shouldReceive('getIdentifier')
            ->andReturn('hiRoy');
        $core = new CalderaCore($this->serviceContainer());
        $core->addModule($module);
        $this->assertEquals($module, $core->getModule('hiRoy'));
    }

    /**
     * @covers \calderawp\caldera\core\CalderaCore::addModule()
     * @covers \calderawp\caldera\core\CalderaCore::getModule()
     */
    public function testGetDefaultModulesByIdentifiers()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            \calderawp\caldera\Forms\CalderaForms::class,
            $core->getModule(\calderawp\caldera\Forms\CalderaForms::IDENTIFIER)
        );

        $this->assertInstanceOf(
            \calderawp\caldera\restApi\CalderaRestApi::class,
            $core->getModule(\calderawp\caldera\restApi\CalderaRestApi::IDENTIFIER)
        );

        $this->assertInstanceOf(
            \calderawp\caldera\Events\CalderaEvents::class,
            $core->getModule(\calderawp\caldera\Events\CalderaEvents::IDENTIFIER)
        );
        $this->assertInstanceOf(
            CalderaDataSourceContract::class,
            $core->getModule(CalderaDataSource::IDENTIFIER)
        );

    }

    /**
     * @covers \calderawp\caldera\core\CalderaCore::getEvents()
     * @covers \calderawp\caldera\core\CalderaCore::registerServices()
     */
    public function testGetEvents()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            CalderaEventsContract::class,
            $core->getEvents()
        );
    }

    /**
     * @covers \calderawp\caldera\core\CalderaCore::getServiceContainer()
     */
    public function testGetServiceContainer()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            \calderawp\CalderaContainers\Service\Container::class,
            $core->getServiceContainer()
        );
    }

    /**
     * @covers \calderawp\caldera\core\CalderaCore::getCalderaForms()
     * @covers \calderawp\caldera\core\CalderaCore::registerServices()
     */
    public function testGetCalderaForms()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            CalderaFormsContract::class,
            $core->getCalderaForms()
        );
    }
    /**
     * @covers \calderawp\caldera\core\CalderaCore::getIdentifier()
     */
    public function testGetIdentifier()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertSame('calderaCore', $core->getIdentifier());
    }

    /**
     * @covers \calderawp\caldera\core\CalderaCore::getRestApi()
     * @covers \calderawp\caldera\core\CalderaCore::registerServices()
     */
    public function testGetRestApi()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            CalderaRestApiContract::class,
            $core->getRestApi()
        );
    }


    /**
     * @covers \calderawp\caldera\core\CalderaCore::getDataSource()
     * @covers \calderawp\caldera\core\CalderaCore::registerServices()
     */
    public function testGetDataSource()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            CalderaDataSourceContract::class,
            $core->getDataSource()
        );
    }

    /**
     * @covers \calderawp\caldera\core\CalderaCore::getHttp()
     * @covers \calderawp\caldera\core\CalderaCore::registerServices()
     */
    public function testGetHttp()
    {
        $core = new CalderaCore($this->serviceContainer());
        $this->assertInstanceOf(
            \calderawp\caldera\Http\Contracts\CalderaHttpContract::class,
            $core->getHttp()
        );
    }
}
