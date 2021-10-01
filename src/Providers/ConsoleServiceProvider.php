<?php

namespace Alishplugins\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Alishplugins\Modules\Commands\CommandMakeCommand;
use Alishplugins\Modules\Commands\ComponentClassMakeCommand;
use Alishplugins\Modules\Commands\ComponentViewMakeCommand;
use Alishplugins\Modules\Commands\ControllerMakeCommand;
use Alishplugins\Modules\Commands\DisableCommand;
use Alishplugins\Modules\Commands\DumpCommand;
use Alishplugins\Modules\Commands\EnableCommand;
use Alishplugins\Modules\Commands\EventMakeCommand;
use Alishplugins\Modules\Commands\FactoryMakeCommand;
use Alishplugins\Modules\Commands\InstallCommand;
use Alishplugins\Modules\Commands\JobMakeCommand;
use Alishplugins\Modules\Commands\LaravelModulesV6Migrator;
use Alishplugins\Modules\Commands\ListCommand;
use Alishplugins\Modules\Commands\ListenerMakeCommand;
use Alishplugins\Modules\Commands\MailMakeCommand;
use Alishplugins\Modules\Commands\MiddlewareMakeCommand;
use Alishplugins\Modules\Commands\MigrateCommand;
use Alishplugins\Modules\Commands\MigrateRefreshCommand;
use Alishplugins\Modules\Commands\MigrateResetCommand;
use Alishplugins\Modules\Commands\MigrateRollbackCommand;
use Alishplugins\Modules\Commands\MigrateStatusCommand;
use Alishplugins\Modules\Commands\MigrationMakeCommand;
use Alishplugins\Modules\Commands\ModelMakeCommand;
use Alishplugins\Modules\Commands\ModuleDeleteCommand;
use Alishplugins\Modules\Commands\ModuleMakeCommand;
use Alishplugins\Modules\Commands\NotificationMakeCommand;
use Alishplugins\Modules\Commands\PolicyMakeCommand;
use Alishplugins\Modules\Commands\ProviderMakeCommand;
use Alishplugins\Modules\Commands\PublishCommand;
use Alishplugins\Modules\Commands\PublishConfigurationCommand;
use Alishplugins\Modules\Commands\PublishMigrationCommand;
use Alishplugins\Modules\Commands\PublishTranslationCommand;
use Alishplugins\Modules\Commands\RequestMakeCommand;
use Alishplugins\Modules\Commands\ResourceMakeCommand;
use Alishplugins\Modules\Commands\RouteProviderMakeCommand;
use Alishplugins\Modules\Commands\RuleMakeCommand;
use Alishplugins\Modules\Commands\SeedCommand;
use Alishplugins\Modules\Commands\SeedMakeCommand;
use Alishplugins\Modules\Commands\SetupCommand;
use Alishplugins\Modules\Commands\TestMakeCommand;
use Alishplugins\Modules\Commands\UnUseCommand;
use Alishplugins\Modules\Commands\UpdateCommand;
use Alishplugins\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Namespace of the console commands
     * @var string
     */
    protected $consoleNamespace = "Alishplugins\\Modules\\Commands";

    /**
     * The available commands
     * @var array
     */
    protected $commands = [
        CommandMakeCommand::class,
        ControllerMakeCommand::class,
        DisableCommand::class,
        DumpCommand::class,
        EnableCommand::class,
        EventMakeCommand::class,
        JobMakeCommand::class,
        ListenerMakeCommand::class,
        MailMakeCommand::class,
        MiddlewareMakeCommand::class,
        NotificationMakeCommand::class,
        ProviderMakeCommand::class,
        RouteProviderMakeCommand::class,
        InstallCommand::class,
        ListCommand::class,
        ModuleDeleteCommand::class,
        ModuleMakeCommand::class,
        FactoryMakeCommand::class,
        PolicyMakeCommand::class,
        RequestMakeCommand::class,
        RuleMakeCommand::class,
        MigrateCommand::class,
        MigrateRefreshCommand::class,
        MigrateResetCommand::class,
        MigrateRollbackCommand::class,
        MigrateStatusCommand::class,
        MigrationMakeCommand::class,
        ModelMakeCommand::class,
        PublishCommand::class,
        PublishConfigurationCommand::class,
        PublishMigrationCommand::class,
        PublishTranslationCommand::class,
        SeedCommand::class,
        SeedMakeCommand::class,
        SetupCommand::class,
        UnUseCommand::class,
        UpdateCommand::class,
        UseCommand::class,
        ResourceMakeCommand::class,
        TestMakeCommand::class,
        LaravelModulesV6Migrator::class,
        ComponentClassMakeCommand::class,
        ComponentViewMakeCommand::class,
    ];

    public function register(): void
    {
        $this->commands($this->resolveCommands());
    }

    private function resolveCommands(): array
    {
        $commands = [];

        foreach (config('modules.commands', $this->commands) as $command) {
            $commands[] = Str::contains($command, $this->consoleNamespace) ?
                $command :
                $this->consoleNamespace . "\\" . $command;
        }

        return $commands;
    }

    public function provides(): array
    {
        return $this->commands;
    }
}
