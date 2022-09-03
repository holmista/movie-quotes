<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;
use App\Models\User;

class CreateUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'user:create {email} {password}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a user';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$email = $this->argument('email');
		$password = bcrypt($this->argument('password'));
		try
		{
			User::create(['email'=>$email, 'password'=>$password]);
			$this->info('User created successfully!');
			return true;
		}
		catch (Exception $e)
		{
			$this->error('An error occurred: ' . $e->getMessage());
			return false;
		}
	}
}
