<?php

namespace Hubleto\McpServer;

use Hubleto\Framework\DependencyInjection;
use Mcp\Server;
use Mcp\Server\Transport\StdioTransport;

class Builder
{
  protected $server;
  protected \Hubleto\Erp\Loader $hubleto;

  public function __construct(\Hubleto\Erp\Loader $hubleto)
  {
    $this->hubleto = $hubleto;
  }

  public function build(): Builder
  {
    // $hubletoContainer = new DependencyInjection();
    $serverBuilder = Server::builder()
      ->setServerInfo('Hubleto MCP Server', '1.0.0')
    ;

    foreach ($this->hubleto->appManager()->getEnabledApps() as $app) {
      try {
        $mcpTools = $app->getMcpTools();
        foreach ($mcpTools as $mcpTool) {
          $serverBuilder->addTool($mcpTool);
        }
      } catch (\Throwable $e) {
        //
      }
    }
      // ->addTool([MyTools::class, 'executeTask']) // Register specific method
      // OR use discovery to find all attributes in a directory:
      // ->setDiscovery($this->projectFolder . '/vendor/hubleto/erp/apps/Contacts/McpTools')
      // ->setContainer($hubletoContainer) // This is the key!
    $this->server = $serverBuilder->build();

    return $this;
  }

  public function run(): void
  {
    // Use StdioTransport if you want to run it via CLI (common for local apps)
    $transport = new StdioTransport();
    $this->server->run($transport);
  }

}