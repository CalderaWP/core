<?php


namespace calderawp\caldera\Core;

use calderawp\caldera\Events\Contracts\CalderaEventsContract as CalderaEvents;
use calderawp\caldera\Forms\Contracts\CalderaFormsContract as CalderaForms;
use calderawp\caldera\Http\Contracts\CalderaHttpContract as CalderaHttp;
use calderawp\caldera\restApi\Contracts\CalderaRestApiContract as CalderaRestApi;
use calderawp\caldera\DataSource\Contracts\CalderaDataSourceContract as DataSource;
use calderawp\interop\Contracts\CalderaModule;

interface CalderaCoreContract
{


    /**
     * Get the CalderaForms modules
     *
     * @return CalderaForms
     */
    public function getCalderaForms(): CalderaForms;

    /**
     * Get the CalderaEvents modules
     *
     * @return CalderaRestApi
     */
    public function getRestApi(): CalderaRestApi;

    /**
     * Get the CalderaEvents module
     *
     * @return CalderaEvents
     */
    public function getEvents(): CalderaEvents;

    /**
     * Get the DataSource module
     *
     * @return DataSource
     */
    public function getDataSource(): DataSource;

    /**
     * Get the HTTP module
     *
     * @return CalderaHttp
     */
    public function getHttp(): CalderaHttp;

    /**
     * Get a module
     *
     * @param string $moduleIdentifier
     *
     * @return CalderaModule
     */
    public function getModule(string $moduleIdentifier): CalderaModule;

    /**
     * Add new module
     *
     * @param CalderaModule $module
     *
     * @return CalderaCoreContract
     */
    public function addModule(CalderaModule $module): CalderaCoreContract;


}
