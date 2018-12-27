<?php


namespace calderawp\caldera\Tests\Traits;
use calderawp\caldera\core\CalderaCore;
use calderawp\caldera\Events\CalderaEvents;
use calderawp\caldera\Forms\CalderaForms;
use calderawp\caldera\restApi\CalderaRestApi;
use calderawp\CalderaContainers\Service\Container;

trait SharedFactories
{
	protected function createCalderaModuleRestApi(): CalderaRestApi
	{
		$restApi = new CalderaRestApi($this->core(), $this->serviceContainer());
		return $restApi;
	}

	protected function core(): CalderaCore
	{
		return new CalderaCore($this->serviceContainer());
	}

	protected function serviceContainer(): Container
	{
		return new Container();
	}

	public function calderaForms(): CalderaForms
	{
		return $this->core()->getCalderaForms();
	}

	public function calderaRestApi(): CalderaRestApi
	{
		return $this->core()->getRestApi();
	}

	/**
	 * @return CalderaEvents
	 */
	protected function calderaEventsModule(): CalderaEvents
	{
		$module = new CalderaEvents($this->core(), $this->serviceContainer());
		return $module;
	}
}
