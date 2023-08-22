<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;

class FetchInboundMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:fetch-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to fetch all inbound emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = Client::account('default');

        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        $folders = $client->getFolders();

        //Loop through every Mailbox
        foreach($folders as $folder){

            //Get all Messages of the current Mailbox $folder
            $messages = $folder->messages()->all()->get();

//            dd($messages);

            foreach($messages as $message){
//                echo $message->getSubject().'<br />';
//                echo 'Attachments: '.$message->getAttachments()->count().'<br />';
//                echo $message->getHTMLBody();
                $this->info($message->getSubject());
            }
        }
    }
}
