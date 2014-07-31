<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

Artisan::resolve(Example\ArtisanCommands\AddMemberCommand::class);
Artisan::resolve(Example\ArtisanCommands\GetAllMembersCommand::class);
Artisan::resolve(Example\ArtisanCommands\SortAllMembersCommand::class);
Artisan::resolve(Example\ArtisanCommands\GetMemberByIdCommand::class);
Artisan::resolve(Example\ArtisanCommands\AddMemberPostCommand::class);
Artisan::resolve(Example\ArtisanCommands\CompareNamesCommand::class);
Artisan::resolve(Example\ArtisanCommands\AddTagToPostCommand::class);
Artisan::resolve(Example\ArtisanCommands\GetPostByIdCommand::class);
