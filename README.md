# Hubleto MCP Server

MCP Server for Hubleto.

## Installation

```
composer require hubleto/mcp-server
```

## How to use

  1. Create your Hubleto project
    `composer create-project hubleto/erp-project .`
  2. Add Hubleto MCP server to your project
    `composer require hubleto/mcp-server`
  3. Run the server
    `php mcp-server.php`

## How to test

**Option 1: `npx @modelcontextprotocol/inspector`**

In this test, you will connect to the Hubleto MCP server using an inspector, which will allow you to run any tool provided by the server. This is an analogy to unit testing.

  1. Run `npx @modelcontextprotocol/inspector php mcp-server.php` in your project folder.
  2. Click `Connect` in the web browser (the browser should start automatically).
  3. Check the list of tools.
  4. Run a specific tool.

*Note: There are some tools already available in Hubleto's community apps. Search for `getMcpTools()` method in the https://github.com/hubleto/erp for more details.*

**Option 2: `mcp-cli`**

Testing with `mcp-cli` provides you an option to use LLMs like Claude or ChatGPT to test the Hubleto MCP server using natural language queries. This is an analogy to integration tests.

  1. Install *mcp-cli* with `pip install mcp-cli`
  2. Run `mcp-cli chat --server hubleto-mcp-server` in your project folder.

*Note: The `mcp-cli` uses the `server_config.json` file in your project folder. Take a look on it.*

You might need to configure your LLM provider's API key (e.g., ANTHROPIC_API_KEY or OPENAI_API_KEY) in your environment variables.

There are some other modes of operation for the *mcp-cli*, e.g. `interaction` or `command` modes. For more information refer to mcp-cli's documentation.