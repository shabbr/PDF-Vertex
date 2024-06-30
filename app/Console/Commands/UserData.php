<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:user {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'show data from users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {

     if($this->argument('id')){
       $data=User::get(['id','name'])->where('id',$this->argument('id'));
       if(count($data)>0){
        $this->table(['id','name'],$data);
       }else{
        $this->error('User data not exist');
       }
     }else{
       $data=User::get(['id','name']);
         $this->table(['id','name'],$data);
     }
    }
}
