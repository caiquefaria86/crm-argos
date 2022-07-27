<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Console\Command;
use App\Notifications\AutoMoveToRecontact;

class MoveAutoToRecontact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'automation:move:recontact';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dayCheck =  date('Y-m-d', strtotime('-3 days'));

        $allContactsApresentation = Contact::where('list', 'budgetSent')
                                                ->where('date_recontact', $dayCheck)
                                                ->get();

        foreach ($allContactsApresentation as $key => $c) {
            //atualizando e movendo o contato de lista
            $move = Contact::where('id', $c->id)
              ->update([
                'list'              => 'recontact',
            ]);

            //notificar usuario foi movido
            //instanciar o contato para passar para o notifition
            $contact  = Contact::where('id', $c->id);
            //instanciar o user para chamar o notify
            $user = User::where('id', $c->user_id);
            $user->notify(new AutoMoveToRecontact($contact));
        }

    }
}
