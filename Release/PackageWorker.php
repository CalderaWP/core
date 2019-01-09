<?php


namespace calderawp\caldera\Core\Release;

use Symplify\MonorepoBuilder\Release\Process\ProcessRunner;

use PharIo\Version\Version;

class PackageWorker implements \Symplify\MonorepoBuilder\Release\Contract\ReleaseWorker\ReleaseWorkerInterface
{

	/**
	 * @var ProcessRunner
	 */
	private $processRunner;

	public function __construct(ProcessRunner $processRunner)
	{
		$this->processRunner = $processRunner;
	}

	/**
	 * @inheritDoc
	 */
	public function getDescription(Version $version): string
	{
		return 'release packages';
	}

	/**
	 * @inheritDoc
	 */
	public function getPriority(): int
	{
		return 10;
	}

	public function work(Version $version): void
	{
		$this->processRunner->run( 'Tag : ' . $version->getVersionString() );
	}


}
