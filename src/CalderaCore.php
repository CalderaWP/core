<?php


namespace calderawp\caldera\Core;

use calderawp\caldera\Core\CalderaCoreContract;
use calderawp\caldera\Http\CalderaHttp;
use calderawp\caldera\Http\Contracts\CalderaHttpContract;
use calderawp\caldera\DataSource\CalderaDataSource;
use calderawp\caldera\Events\CalderaEvents;
use calderawp\caldera\Forms\CalderaForms;
use calderawp\caldera\Forms\Exception;
use calderawp\caldera\restApi\CalderaRestApi;
use calderawp\CalderaContainers\Service\Container;
use calderawp\interop\Contracts\CalderaModule;
use calderawp\caldera\Events\Contracts\CalderaEventsContract;
use calderawp\caldera\Forms\Contracts\CalderaFormsContract;
use calderawp\caldera\restApi\Contracts\CalderaRestApiContract;
use calderawp\caldera\DataSource\Contracts\CalderaDataSourceContract;
class CalderaCore implements CalderaCoreContract, CalderaModule
{

    protected $modules;
    /**
     * @var Container
     */
    protected $serviceContainer;

    public function __construct(Container$container)
    {
        $this->serviceContainer = $container;
        $this->registerServices($this->serviceContainer);
    }

    /**
     * @inheritdoc
     */
    public function addModule(CalderaModule$module): CalderaCoreContract
    {
        $this->modules[$module->getIdentifier()] = $module;
        return$this;
    }

    /**
     * @inheritdoc
     */
    public function getModule(string $moduleIdentifier): CalderaModule
    {

        if(is_array($this->modules) ) {
            if(array_key_exists($moduleIdentifier, $this->modules)) {
                return $this->modules[$moduleIdentifier];
            }

        }
        $module = null;

        switch( $moduleIdentifier ){
        case CalderaForms::IDENTIFIER:
            $module = $this->getCalderaForms();
            break;
        case CalderaRestApi::IDENTIFIER:
            $module = $this->getRestApi();
            break;
        case CalderaEvents::IDENTIFIER:
            $module = $this->getEvents();
            break;
        case CalderaDataSource::IDENTIFIER:
            $module = $this->getDataSource();
            break;
		case CalderaHttpContract::IDENTIFIER:
			$module = $this->getHttp();
			break;

        }
        if($module ) {
            $this->modules[$moduleIdentifier] = $module;
            return $module;
        }
        throw new Exception('Module Not Found');

    }

    /**
     * @inheritdoc
     */
    public function getCalderaForms(): CalderaFormsContract
    {
        return $this
            ->getServiceContainer()
            ->make(CalderaFormsContract::class);
    }

    /**
     * @inheritdoc
     */
    public function getRestApi(): CalderaRestApiContract
    {
        return $this
            ->getServiceContainer()
            ->make(CalderaRestApiContract::class);
    }

    /**
     * @inheritdoc
     */
    public function getEvents(): CalderaEventsContract
    {
        return $this
            ->getServiceContainer()
            ->make(CalderaEventsContract::class);
    }

    /**
     * @inheritdoc
     */
    public function getDataSource() :CalderaDataSourceContract
    {
        return $this
            ->getServiceContainer()
            ->make(CalderaDataSourceContract::class);
    }

	/**
	 * @inheritdoc
	 */
	public function getHttp() :CalderaHttpContract
	{
		return $this
			->getServiceContainer()
			->make(CalderaHttpContract::class);
	}

    /**
     * @inheritDoc
     */
    public function getCore(): CalderaCoreContract
    {
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function getIdentifier(): string
    {
        return 'calderaCore';
    }

    /**
     * @inheritDoc
     */
    public function getServiceContainer(): Container
    {
        return $this->serviceContainer;
    }

    /**
     * @inheritdoc
     */
    public function registerServices(Container $container): CalderaModule
    {
        $container->bind(
            Container::class, function () {
                $serviceContainer = new Container();
                return $serviceContainer;
            }
        );

        $container->singleton(
            CalderaFormsContract::class,
            function () {
                return new CalderaForms($this, $this->serviceContainerFactory());
            }
        );

        $container->singleton(
            CalderaRestApiContract::class,
            function () {
                return new CalderaRestApi($this, $this->serviceContainerFactory());
            }
        );

        $container->singleton(
            CalderaEventsContract::class,
            function () {
                return new CalderaEvents($this, $this->serviceContainerFactory());
            }
        );

        $container->singleton(
            CalderaDataSourceContract::class,
            function () {
                return new CalderaDataSource($this, $this->serviceContainerFactory());
            }
        );

		$container->singleton(
			CalderaHttpContract::class,
			function () {
				return new CalderaHttp($this, $this->serviceContainerFactory());
			}
		);


		return$this;
    }


    protected function serviceContainerFactory(): Container
    {
        return $this->getServiceContainer()->make(Container::class);
    }


}
